<?php
class Taokiemtra extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$data["page_title"]="Tạo bài kiểm tra";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		if($id_phancong==NULL){
			$data["view_page"]="view_not_phancong";
			$this->load->view("admin/index",$data);
		}
		else{
			$data["view_page"]="view_taokiemtra";
			$this->load->view("admin/index",$data);
		}
	}
	public function taofile(){
		// set pdf
		$array_param=array('c','A4','','',1.5,1.5,1.5,1.5,0,0,'p');
		$this->load->library('pdf',$array_param);
		$this->pdf->WriteHTML("aaaaaaa");
	}
}
?>