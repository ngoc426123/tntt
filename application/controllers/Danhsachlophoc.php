<?php
class Danhsachlophoc extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->database();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->model_function->checklogin(base_url()."adminlogin");
		$this->model_function->checkadmin(base_url()."admin");
	} 
	public function index(){
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}
	public function them(){
		$tenlopgiaoly=$_POST["tenlopgiaoly"];
		if($tenlopgiaoly==NULL OR $tenlopgiaoly==" "){
			$data['alert']="0";
		}
		else{
			$value_lopgiaoly=array(
				'id_lopgiaoly' => '',
				'tenlopgiaoly' => $tenlopgiaoly,
				'douutien'     => '',
			);
			$this->load->model("model_lopgiaoly");
			$this->model_lopgiaoly->set_value($value_lopgiaoly);
			$this->model_lopgiaoly->them();
			$data['alert']="1";
		}
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}
	public function hieuchinh(){
		$value=array(
			"id_lopgiaoly" => $_POST["id_lopgiaoly"],
			"tenlopgiaoly" => $_POST["tenlopgiaoly"],
			"douutien"     => $_POST["douutien"],
		);
		$this->load->model("model_lopgiaoly");
		foreach ($value['id_lopgiaoly'] as $key => $v1){
			$value_lopgiaoly=array(
				'id_lopgiaoly' => $value['id_lopgiaoly'][$key],
				'tenlopgiaoly' => $value['tenlopgiaoly'][$key],
				'douutien'     => $value['douutien'][$key],
			);
			$this->model_lopgiaoly->set_value($value_lopgiaoly);
			$this->model_lopgiaoly->hieuchinh();
		}
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}
	public function xoa($id_lopgiaoly){
		$value_lopgiaoly=array(
			'id_lopgiaoly' => $id_lopgiaoly,
			'tenlopgiaoly' => '',
			'douutien'     => '',
		);
		$this->load->model("model_lopgiaoly");
		$this->model_lopgiaoly->set_value($value_lopgiaoly);
		$this->model_lopgiaoly->xoa();
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}

}
?>