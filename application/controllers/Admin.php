<?php
class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
	}
	public function index(){
		$this->load->model("model_huynhtruong");
		$this->model_function->checklogin(base_url()."adminlogin");
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["view_page"]="view_dashbroad";
		$data["page_title"]="Trang tổng quan";
		$this->load->view("admin/index",$data);
	}
}
?>