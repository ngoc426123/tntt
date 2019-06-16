<?php
class Lichsu extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model(array("Model_function","Model_lichsu"));
		$this->load->database();
		$this->Model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$data["lichsu"]=$this->Model_lichsu->get_value(100);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Lịch sử sử dụng hệ thống";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		$data["view_page"]="view_lichsu";
		$this->load->view("admin/index",$data);
	}
}
?>