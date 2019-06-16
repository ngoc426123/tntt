<?php
class Quanlythieunhi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("model_function");
		$this->model_function->checklogin(base_url()."adminlogin");
		$this->model_function->checkadmin(base_url()."admin");
	}
	public function danhsachthieunhi(){
		$this->load->model("model_thieunhi");
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
		$data["res"]=$this->model_thieunhi->get_danhsachthieunhi(NULL);
		$data["view_page"]="view_danhsachthieunhi";
		$data["page_title"]="Danh sách toàn bộ thiếu nhi";
		$this->load->view("admin/index",$data);
	}
	public function danhsachdiem(){
		$this->load->model("model_thieunhi");
		if(isset($_POST["ok"])){
			// get value
			$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
			$id_lopgiaoly = $_POST["id_lopgiaoly"];
			// lấy thông tin năm học và tên lớp
			$this->load->model("model_lopgiaoly");
			$lopgiaoly=$this->model_lopgiaoly->get_value($id_lopgiaoly)["tenlopgiaoly"];

			$data["query_ti"]="Điểm số lớp ".$lopgiaoly;
			$data["result_pl"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		}
		else{
			$data["query_ti"]="Chưa có lực chọn từ phía người dùng";
			$data["result_pl"]="0";
		}
		$data["view_page"]="view_danhsachdiem";
		$data["page_title"]="Danh sách điểm thiếu nhi";
		$this->load->view("admin/index",$data);
	}
}

?>
