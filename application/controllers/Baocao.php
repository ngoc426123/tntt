<?php
class Baocao extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
        $this->load->model("model_thieunhi");
        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Báo cáo";
		$data["view_page"]="view_baocao";
		$this->load->view("admin/index",$data);
	}
}
?>