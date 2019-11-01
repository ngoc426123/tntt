<?php
class Baocaoadmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		if(isset($_POST["loc"])){
			// GET VALUE
			// QUERY
			$this->load->model(array("model_namhoc", "model_lopgiaoly"));
			$text_query = [];
			$query="SELECT * 
				FROM phanlop 
					JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi 
					JOIN lopgiaoly ON phanlop.id_lopgiaoly = lopgiaoly.id_lopgiaoly 
					JOIN namhoc ON phanlop.id_namhoc = namhoc.id_namhoc 
					JOIN hoctap ON phanlop.id_phanlop = hoctap.id_phanlop 
				WHERE 1 AND namhoc.id_namhoc = {$_POST["zid_namhoc"]}";
			$ten_namhoc = $this->model_namhoc->get_value($_POST["zid_namhoc"])["tennamhoc"];
			array_push($text_query, "Năm : {$ten_namhoc}");
			$query_where="";
			if($_POST["zid_lopgiaoly"]!=-1){
				$query_where.=" AND phanlop.id_lopgiaoly = '{$_POST["zid_lopgiaoly"]}'";
				$ten_lopgiaoly = $this->model_lopgiaoly->get_value($_POST["zid_lopgiaoly"])["tenlopgiaoly"];
				array_push($text_query, "Lớp : {$ten_lopgiaoly}");
			}
			if($_POST["z_tenthanh"]!=""){
				$array_term=explode(",", $_POST["z_tenthanh"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.tenthanh REGEXP '{$term}'";
				array_push($text_query, "Tên thánh : {$_POST["z_tenthanh"]}");
			}
			if($_POST["z_hoten"]!=""){
				$array_term=explode(",", $_POST["z_hoten"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.HOTEN REGEXP '{$term}'";
				array_push($text_query, "Họ tên : {$_POST["z_hoten"]}");
			}
			if($_POST["z_namsinh"]!=""){
				$array_term=explode(",", $_POST["z_namsinh"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.ngaysinh REGEXP '{$term}'";
				array_push($text_query, "Ngày sinh : {$_POST["z_namsinh"]}");
			}
			if($_POST["z_duong"]!=""){
				$array_term=explode(",", $_POST["z_duong"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.diachi REGEXP '{$term}'";
				array_push($text_query, "Địa chỉ : {$_POST["z_duong"]}");
			}
			if($_POST["z_gioitinh"]!=-1){
				$query_where.=" AND thieunhi.gioitinh = '{$_POST["z_gioitinh"]}'";
				array_push($text_query, "Giới tính : {$_POST["z_gioitinh"]}");
			}
			if(isset($_POST["z_khugiao"])){
				$term=implode("|", $_POST["z_khugiao"]);
				$query_where.=" AND thieunhi.khugiao REGEXP '{$term}'";
				$term=implode(",", $_POST["z_khugiao"]);
				array_push($text_query, "Khu giáo : {$term}");
			}
			echo $_POST["z_trungbinh1"];
			if(isset($_POST["z_trungbinh1"]) & $_POST["z_trungbinh1"]!=""){
				$query_where.=" AND hoctap.trungbinh_hk1 >= {$_POST["z_trungbinh1"]}";
				array_push($text_query, "TB HK1 >= {$_POST["z_trungbinh1"]}");
			}
			if(isset($_POST["z_trungbinh2"]) & $_POST["z_trungbinh2"]!=""){
				$query_where.=" AND hoctap.trungbinh_hk2 >= {$_POST["z_trungbinh2"]}";
				array_push($text_query, "TB HK2 : {$_POST["z_trungbinh2"]}");
			}
			if(isset($_POST["z_trungbinhnam"]) & $_POST["z_trungbinhnam"]!=""){
				$query_where.=" AND hoctap.trungbinh_canam >= {$_POST["z_trungbinhnam"]}";
				array_push($text_query, "TB cả năm : {$_POST["z_trungbinhnam"]}");
			}
			$query_order="";
			if(isset($_POST["z_sapxep"])){
				switch ($_POST["z_sapxep"]) {
					case 1:
						$query_order.=" ORDER BY thieunhi.id_thieunhi";
						array_push($text_query, "Sắp xếp theo id");
						break;
					case 2:
						$query_order.=" ORDER BY thieunhi.mathieunhi";
						array_push($text_query, "Sắp xếp theo mã");
						break;
					case 3:
						$query_order.=" ORDER BY SUBSTRING(thieunhi.hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))";
						array_push($text_query, "Sắp xếp theo tên");
						break;
					case 4:
						$query_order.=" ORDER BY SUBSTRING(thieunhi.ngaysinh,-4)";
						array_push($text_query, "Sắp xếp theo năm sinh");
						break;
				}
			}
			if(isset($_POST["z_thutu"])){
				switch ($_POST["z_thutu"]) {
					case 1:
						$query_order.=" ASC";
						break;
					case 2:
						$query_order.=" DESC";
						break;
				}
			}
			// FETCH DATA
			// echo $query.$query_where;
	        $sql_tn=$this->db->query($query.$query_where.$query_order);
	        $data["result_tn"]=$sql_tn->result_array();
	        $data["id_namhoc"]      = $_POST["zid_namhoc"];
	        $data["id_lopgiaoly"]   = $_POST["zid_lopgiaoly"];
	        $data["namhoc"]         = "";
	        $data["lopgiaoly"]      = "";
	        $data["tenhuynhtruong"] = $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"];
	        $data["text_query"]     = $text_query;
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Báo cáo admin";
		$data["view_page"]="view_baocaoadmin";
		$this->load->view("admin/index",$data);
	}
}
?>