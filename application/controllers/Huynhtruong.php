<?php
class Huynhtruong extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
		$this->model_function->checkadmin(base_url()."admin");
	}
	public function index(){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$data["view_page"]="view_danhsachhuynhtruong";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$tenthanh=mb_convert_case(trim($_POST["tenthanh"]), MB_CASE_TITLE,'utf-8');
			$hoten=mb_convert_case(trim($_POST["hoten"]), MB_CASE_TITLE,'utf-8');
			$sql_chke=$this->db->query("SELECT * FROM huynhtruong WHERE tenthanh='$tenthanh' AND hoten='$hoten'");
			if($sql_chke->num_rows()>0){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Quản lý huynh trưởng",
					"content" => "Thêm thất bại, huynh trưởng này đã có rồi."	
				);
			}
			else{
				$value_huynhtruong = array (
					'tenthanh'			=>	$tenthanh,		
					'hoten'				=>	$hoten,
					'gioitinh'			=>	$_POST["gioitinh"],
					'ngaysinh'			=>	$_POST["ngaysinh"],
					'ngaybonmang'		=>	$_POST["ngaybonmang"],
					'diachi'			=>	$_POST["diachi"],
					'sdt'				=>	$_POST["sodienthoai"],
					'email'				=>	$_POST["email"],
					'caphuynhtruong'	=>	$_POST["caphuynhtruong"],
					'chucvu'			=>	$_POST["chucvu"],
				);
				$this->load->model("model_huynhtruong");
				$this->model_huynhtruong->set_value($value_huynhtruong);
				$this->model_huynhtruong->them();
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý huynh trưởng",
					"content" => "Thêm thành công trưởng {$value_huynhtruong["tenthanh"]} {$value_huynhtruong["hoten"]} vào hệ thống."	
				);
				// GHI LỊCH SỬ
				$array_lichsu=array(
					'lichsu'       => 'Thêm huynh trưởng mới',
					'noidung'      => 'Quản lý thêm trưởng <b class="text-red">'.$tenthanh.' '.$hoten.'</b> vào danh sách',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai' =>	2,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
			}
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$data["view_page"]="view_themhuynhtruong";
		$this->load->view("admin/index",$data);
	}
	public function themhuynhtruong(){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$data["view_page"]="view_themhuynhtruong";
		$this->load->view("admin/index",$data);
	}
	public function hieuchinh($id){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$this->load->model("model_huynhtruong");
		$data["result"]=$this->model_huynhtruong->get_value($id);
		$data["view_page"]="view_suahuynhtruong";
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		if(isset($_POST["ok"])){
			$value_huynhtruong = array (
					'tenthanh'			=>	$_POST["tenthanh"],		
					'hoten'				=>	$_POST["hoten"],
					'gioitinh'			=>	$_POST["gioitinh"],
					'ngaysinh'			=>	$_POST["ngaysinh"],
					'ngaybonmang'		=>	$_POST["ngaybonmang"],
					'diachi'			=>	$_POST["diachi"],
					'sdt'				=>	$_POST["sodienthoai"],
					'email'				=>	$_POST["email"],
					'caphuynhtruong'	=>	$_POST["caphuynhtruong"],
					'chucvu'			=>	$_POST["chucvu"],
			);
			$this->load->model("model_huynhtruong");
			$this->model_huynhtruong->set_value($value_huynhtruong);
			$this->model_huynhtruong->sua($id);
			$this->model_huynhtruong->tinhtrang($id,$_POST["tinhtrang"]);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Quản lý huynh trưởng",
				"content" => "Hiệu chỉnh thành công."	
			);
			$data["success_ht"]="Sửa thành công!";
			// GHI LỊCH SỬ
			$array_lichsu=array(
				'lichsu'       => 'Hiệu chỉnh danh sách huynh trưởng',
				'noidung'      => 'Quản lý hiệu chỉnh danh sách huynh trưởng',
				'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
				'loai' =>	2,
			);
			$this->load->model("Model_lichsu");
			$this->Model_lichsu->set_value($array_lichsu);
			$this->Model_lichsu->them();
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$data["view_page"]="view_suahuynhtruong";
		$this->load->model("model_huynhtruong");
		$data["result"]=$this->model_huynhtruong->get_value($id);
		$data["view_page"]="view_suahuynhtruong";
		$this->load->view("admin/index",$data);
	}
}
?>