<?php
class Timkiem extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("model_function");
	}
	public function index(){
		if($_POST["query"]==NULL){
			$data["query"]="null";
		}
		else{
			$query=$_POST["query"];
			$this->load->database();
			$sql_query=$this->db->query("SELECT * FROM thieunhi WHERE mathieunhi LIKE '%".$this->db->escape_like_str($query)."%'");
			if($sql_query->num_rows()<=0){
				$query=ucwords($query);
				$sql_query2=$this->db->query("SELECT * FROM thieunhi WHERE hoten LIKE '%".$this->db->escape_like_str($query)."%'");
				if($sql_query2->num_rows()<=0){
					$data["thieunhi"]="null";
				}
				else{
					$data["thieunhi"]=$sql_query2->result_array();
				}
			}
			else{
				$data["thieunhi"]=$sql_query->result_array();
			}
		}
		$data["page_title"]="Trang chủ";
		$data["view_page"]="view_xemdiem_result";
		$this->load->view("home/index",$data);
	}
	public function ketqua($id_thieunhi){
		$data['id_thieunhi']=$id_thieunhi;
		$data["page_title"]="Trang chủ";
		$data["view_page"]="view_xemdiem_info";
		$this->load->view("home/index.php",$data);
	}
	public function xemdiem(){
		$query=explode("|", $_POST["query"]);
		$id_namhoc=$query[0];
		$id_thieunhi=$query[1];

		// LAY THONG TIN NAM HOC
		$sql_namhoc=$this->db->query("SELECT * FROM namhoc WHERE id_namhoc='$id_namhoc'");
		$result_namhoc=$sql_namhoc->row_array();
		$tennamhoc=$result_namhoc["tennamhoc"];
		$chude=$result_namhoc["chude"];

		// LAY THONG TIN LOP
		$sql_lop=$this->db->query("SELECT * FROM phanlop WHERE id_namhoc='$id_namhoc' AND id_thieunhi='$id_thieunhi'");
		$result_lop=$sql_lop->row_array();
		$id_lopgiaoly=$result_lop["id_lopgiaoly"];
		$id_phanlop=$result_lop["id_phanlop"];
		$sql_tenlop=$this->db->query("SELECT * FROM lopgiaoly WHERE id_lopgiaoly='$id_lopgiaoly'");
		$result_tenlop=$sql_tenlop->row_array();
		$tenlop=$result_tenlop["tenlopgiaoly"];

		// LAY THONG TIN HUYNH TRUONG
		$sql_pc=$this->db->query("SELECT * FROM phancong WHERE id_namhoc='$id_namhoc' AND id_lopgiaoly='$id_lopgiaoly'");
		$result_pc=$sql_pc->row_array();
		$id_huynhtruong=$result_pc["id_huynhtruong"];
		$sql_ht=$this->db->query("SELECT * FROM huynhtruong WHERE id_huynhtruong='$id_huynhtruong'");
		$result_ht=$sql_ht->row_array();
		$dunglop=$result_ht["tenthanh"]." ".$result_ht["hoten"];

		// LAY THONG TIN HOC TAP
		$sql_diem=$this->db->query("SELECT * FROM hoctap WHERE id_phanlop='$id_phanlop'");
		$result_diem=$sql_diem->row_array();
		$return["dunglop"]         = $dunglop;
		$return["namhoc"]          = $tennamhoc;
		$return["chude"]           = $chude;
		$return["tenlop"]          = $tenlop;
		$return["dmieng_1"]        = $result_diem["diemmieng_hk1"];
		$return["d15phut_1"]       = $result_diem["diem15p_hk1"];
		$return["d45phut_1"]       = $result_diem["diem45p_hk1"];
		$return["dthi_1"]          = $result_diem["diemthi_hk1"];
		$return["dtrungbinh_1"]    = $result_diem["trungbinh_hk1"];
		$return["dmieng_2"]        = $result_diem["diemmieng_hk2"];
		$return["d15phut_2"]       = $result_diem["diem15p_hk2"];
		$return["d45phut_2"]       = $result_diem["diem45p_hk2"];
		$return["dthi_2"]          = $result_diem["diemthi_hk2"];
		$return["dtrungbinh_2"]    = $result_diem["trungbinh_hk2"];
		$return["dtrungbinh_nam"]  = $result_diem["trungbinh_canam"];
		echo json_encode($return);
	}
}
?>