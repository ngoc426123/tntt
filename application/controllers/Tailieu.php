<?php
class Tailieu extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$data["view_page"]="view_tailieu";
		$data["page_title"]="Tài liệu nội bộ";
		$this->load->view("admin/index",$data);
	}
}
?>