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
			$query="SELECT * 
				FROM phanlop 
					JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi 
					JOIN lopgiaoly ON phanlop.id_lopgiaoly = lopgiaoly.id_lopgiaoly 
					JOIN namhoc ON phanlop.id_namhoc = namhoc.id_namhoc 
					JOIN hoctap ON phanlop.id_phanlop = hoctap.id_phanlop 
				WHERE 1 AND namhoc.id_namhoc = {$_POST["zid_namhoc"]}";
			$query_where="";
			if($_POST["zid_lopgiaoly"]!=0){
				$query_where.=" AND phanlop.id_lopgiaoly = '{$_POST["zid_lopgiaoly"]}'";
			}
			if($_POST["z_tenthanh"]!=""){
				$array_term=explode(",", $_POST["z_tenthanh"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.tenthanh REGEXP '{$term}'";
			}
			if($_POST["z_hoten"]!=""){
				$query_where.=" AND thieunhi.hoten LIKE '%{$_POST["z_hoten"]}%'";
			}
			if($_POST["z_namsinh"]!=""){
				$array_term=explode(",", $_POST["z_namsinh"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.ngaysinh REGEXP '{$term}'";
			}
			if($_POST["z_duong"]!=""){
				$array_term=explode(",", $_POST["z_duong"]);
				foreach ($array_term as $key => $value) {
					$array_term[$key]=trim($value);
				}
				$term=implode("|", $array_term);
				$query_where.=" AND thieunhi.diachi REGEXP '{$term}'";
			}
			if($_POST["z_gioitinh"]!=-1){
				$query_where.=" AND thieunhi.gioitinh = '{$_POST["z_gioitinh"]}'";
			}
			if(isset($_POST["z_khugiao"])){
				$term=implode("|", $_POST["z_khugiao"]);
				$query_where.=" AND thieunhi.khugiao REGEXP '{$term}'";
			}
			// FETCH DATA
			// echo $query.$query_where;
	        $sql_tn=$this->db->query($query.$query_where);
	        $data["result_tn"]=$sql_tn->result_array();
	        $data["id_namhoc"]      = $_POST["zid_namhoc"];
	        $data["id_lopgiaoly"]   = $_POST["zid_lopgiaoly"];
	        $data["namhoc"]         = "";
	        $data["lopgiaoly"]      = "";
	        $data["tenhuynhtruong"] = $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"];
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Báo cáo admin";
		$data["view_page"]="view_baocaoadmin";
		$this->load->view("admin/index",$data);
	}
}
?>