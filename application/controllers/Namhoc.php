<?php
class Namhoc extends CI_Controller{
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
		$this->load->model("model_namhoc");
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["result"]=$this->model_namhoc->get_list();
		$data["page_title"]="Năm học";
		$data["view_page"]="view_namhoc";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$value_namhoc= array (
				'tennamhoc'	=>	$_POST["tennamhoc"],
				'chude'	 	=>	$_POST["chude"],
			);
			$namhoc_chk=$_POST["tennamhoc"];
			$sql_nh_chk=$this->db->query("SELECT * FROM namhoc WHERE tennamhoc='$namhoc_chk'");
			if($value_namhoc["chude"]==null){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Quản lý năm học",
					"content" => "Thêm thất bại, năm học này đã có."	
				);
			}
			else if($sql_nh_chk->num_rows()>0){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Quản lý năm học",
					"content" => "Thêm thất bại, năm học đã tồn tại"	
				);
			}
			else{
				$this->load->model("model_namhoc");
				$this->model_namhoc->set_value($value_namhoc);
				$this->model_namhoc->them();
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý năm học",
					"content" => "Thêm năm học mới thành công - chủ đề {$value_namhoc["chude"]}",	
				);
				$data["success_nh"]="Thêm thành công !";
				// GHI LỊCH SỬ
				$array_lichsu=array(
					'lichsu'       => 'Thêm năm học mới',
					'noidung'      => 'Thêm năm học mới chủ đề <b class="text-yellow">'.$value_namhoc["chude"].'</b>',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai' =>	4,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
			}
		}
		$this->load->model("model_namhoc");
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["result"]=$this->model_namhoc->get_list();
		$data["page_title"]="Năm học";
		$data["view_page"]="view_namhoc";
		$this->load->view("admin/index",$data);
	}
	public function hieuchinh($id){
		if(isset($_POST["ok"])){
			$value_namhoc= array (
				'tennamhoc'	=>	$_POST["tennamhoc"],
				'chude'	 	=>	$_POST["chude"],
			);
			if($value_namhoc["chude"]==null){
				$data["error_nh"]="Năm học chưa có chủ đề !";
			}
			else{
				$this->load->model("model_namhoc");
				$this->model_namhoc->set_value($value_namhoc);
				$this->model_namhoc->sua($id);
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý năm học",
					"content" => "Hiệu chỉnh thành công.",	
				);
				// GHI LỊCH SỬ
				$array_lichsu=array(
					'lichsu'       => 'Hiệu chỉnh năm học',
					'noidung'      => 'Quản lý hiệu chỉnh chủ đề năm học',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai' =>	4,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
			}
		}
		$this->load->model("model_namhoc");
		$data["result_nhl"]=$this->model_namhoc->get_value($id);
		$data["page_title"]="Năm học";
		$data["view_page"]="view_suanamhoc";
		$data["id"]=$id;
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Năm học";
		$data["view_page"]="view_suanamhoc";
		$data["id"]=$id;
		$this->load->view("admin/index",$data);
	}
}
?>