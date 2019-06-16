<?php
class Quanlylophoc extends CI_Controller{
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
		if($tenlopgiaoly==NULL OR $tenlopgiaoly==""){
			$data["alert"]=array(
				"stt"     => "danger",
				"title"   => "Quản lý lớp học",
				"content" => "Thất bại."	
			);
		}
		else{
			$value_lopgiaoly=array(
				'id_lopgiaoly' => '',
				'tenlopgiaoly' => $tenlopgiaoly,
				'douutien'     => '',
			);
			$this->load->model("Model_lopgiaoly");
			$this->Model_lopgiaoly->set_value($value_lopgiaoly);
			$this->Model_lopgiaoly->them();
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Quản lý lớp học",
				"content" => "Thành công."	
			);
			// GHI LỊCH SỬ
			$this->load->model("Model_lichsu");
			$array_lichsu=array(
				'lichsu'       => 'Thêm lớp học mới',
				'noidung'      => 'Quản lý thêm lớp mới : lớp <b class="text-light-blue">'.$value_lopgiaoly["tenlopgiaoly"].'</b>',
				'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
				'loai' =>	6,
			);
			$this->Model_lichsu->set_value($array_lichsu);
			$this->Model_lichsu->them();
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
		$this->load->model("Model_lopgiaoly");
		foreach ($value['id_lopgiaoly'] as $key => $v1){
			$value_lopgiaoly=array(
				'id_lopgiaoly' => $value['id_lopgiaoly'][$key],
				'tenlopgiaoly' => $value['tenlopgiaoly'][$key],
				'douutien'     => $value['douutien'][$key],
			);
			$this->Model_lopgiaoly->set_value($value_lopgiaoly);
			$this->Model_lopgiaoly->hieuchinh();
		}
		// GHI LỊCH SỬ
		$array_lichsu=array(
			'lichsu'       => 'Hiệu chỉnh danh sách lớp học',
			'noidung'      => 'Quản lý hiệu chỉnh danh sách lớp học',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai' =>	6,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();
		$data["alert"]=array(
			"stt"     => "success",
			"title"   => "Quản lý lớp học",
			"content" => "Hiệu chỉnh thành công"	
		);
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}
	public function xoa($id_lopgiaoly){
		$this->load->model("Model_lopgiaoly");
		$value_lopgiaoly=array(
			'id_lopgiaoly' => $id_lopgiaoly,
			'tenlopgiaoly' => '',
			'douutien'     => '',
		);
		$lopgiaoly_ls=$this->Model_lopgiaoly->get_value($value_lopgiaoly["id_lopgiaoly"]);
		// GHI LỊCH SỬ
		$now=getdate();
		$array_lichsu=array(
			'lichsu'       => 'Xóa danh sách lớp học',
			'noidung'      => 'Quản lý xóa lớp <b class="text-light-blue">'.$lopgiaoly_ls["tenlopgiaoly"].'</b> khỏi danh sách lớp',
			'thoigian'     => ''.$now["mday"].'/'.$now["mon"].'/'.$now["year"].' '.$now["hours"].':'.$now["minutes"].':'.$now["seconds"].'',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai' =>	6,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();

		$this->Model_lopgiaoly->set_value($value_lopgiaoly);
		$this->Model_lopgiaoly->xoa();
		$data["view_page"]="view_danhsachlophoc";
		$data["page_title"]="Danh sách toàn bộ lớp học";
		$this->load->view("admin/index",$data);
	}
}
?>