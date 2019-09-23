<?php
class Phancong extends CI_Controller{
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
		$this->load->model(array("model_namhoc","model_lopgiaoly","model_huynhtruong"));
		$data["namhoc"]=$this->model_namhoc->get_list();
		$data["lopgiaoly"]=$this->model_lopgiaoly->get_list();
		$data["huynhtruong"]=$this->model_huynhtruong->get_list(1);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Phân công";
		$data["view_page"]="view_phancong.php";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		$this->load->model(array("model_huynhtruong","model_phancong"));
		if(isset($_POST["ok"])){
			$id_namhoc      = $_POST["id_namhoc"];
			$id_huynhtruong = $_POST["id_huynhtruong"];
			$id_lopgiaoly   = $_POST["id_lopgiaoly"];
			$check_nh = $this->model_phancong->check($id_huynhtruong,$id_namhoc);
			$sql_chk_ht = $this->model_huynhtruong->get_value($id_huynhtruong);
			if($check_nh == false){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Phân công năm học",
					"content" => "Thất bại, trưởng này đã có lớp rồi",	
				);
			}
			else if($sql_chk_ht["tinhtrang"]==0){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Phân công năm học",
					"content" => "Thất bại, trưởng này không còn sinh hoạt nữa.",	
				);
			}
			else{
				$loged_user=$_SESSION["thongtinhuynhtruong"];
				$id_admin=$loged_user["id_huynhtruong"];
				$this->model_phancong->add($id_lopgiaoly,$id_huynhtruong,$id_namhoc);
				// GHI LỊCH SỬ
				$this->load->model("Model_huynhtruong");
				$huynhtruong_ls=$this->Model_huynhtruong->get_value($id_huynhtruong);
				$this->load->model("Model_lopgiaoly");
				$lopgiaoly_ls=$this->Model_lopgiaoly->get_value($id_lopgiaoly);
				$this->load->model("Model_namhoc");
				$namhoc_ls=$this->Model_namhoc->get_value($id_namhoc);

				$array_lichsu=array(
					'lichsu'       => 'Phân công năm học mới',
					'noidung'      => 'Quản lý phân công trưởng <b class="text-red">'.$huynhtruong_ls["tenthanh"].' '.$huynhtruong_ls["hoten"].'</b> vào lớp <b class="text-light-blue">'.$lopgiaoly_ls["tenlopgiaoly"].'</b> năm học <b class="text-yellow">'.$namhoc_ls["tennamhoc"].'</b> ',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai' =>	5,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Phân công năm học",
					"content" => "Phân công thành công - trưởng {$huynhtruong_ls["tenthanh"]} {$huynhtruong_ls["hoten"]} sẽ vào lớp {$lopgiaoly_ls["tenlopgiaoly"]}",	
				);
			}
		}
		$this->load->model(array("model_namhoc","model_lopgiaoly","model_huynhtruong"));
		$data["namhoc"]=$this->model_namhoc->get_list();
		$data["lopgiaoly"]=$this->model_lopgiaoly->get_list();
		$data["huynhtruong"]=$this->model_huynhtruong->get_list(1);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Phân công";
		$data["view_page"]="view_phancong.php";
		$this->load->view("admin/index",$data);
	}
	public function bangphancong(){
		$data["id_namhoc"]=$_POST["id_namhoc"];
		$this->load->view("admin/view_bangphancong",$data);
	}
	// public function xoaphancong($id)
	// {
	// 	$this->db->query("DELETE FROM phancong WHERE id_phancong='$id'");
	// 	$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
	// 	$data["menuchild"]=6;
	// 	$data["pape_title"]="Phân công";
	// 	$data["view_pape"]="view_phancong.php";
	// 	$data["menu_title"]="Phân công năm học";
	// 	$this->load->view("admin/index",$data);
	// }
	public function suaphancong($id){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Phân công";
		$data["view_page"]="view_suaphancong.php";
		$data["id"]=$id;
		$this->load->view("admin/index",$data);
	}
	public function edit($id_phancong){
		$this->load->model(array("model_phancong"));
		$id_lopgiaoly=$_POST["id_lopgiaoly"];
		$check_nh = $this->model_phancong->edit($id_phancong,$id_lopgiaoly);
		$data["alert"]=array(
			"stt"     => "success",
			"title"   => "Quản lý phân công",
			"content" => "Hiệu chỉnh thành công.",	
		);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Phân công";
		$data["view_page"]="view_suaphancong.php";
		$data["id"]=$id_phancong;
		$this->load->view("admin/index",$data);

		// GHI LỊCH SỬ
		$result_pc=$this->model_phancong->get_value($id_phancong);
		$id_huynhtruong=$result_pc["id_huynhtruong"];
		$id_lopgiaoly=$result_pc["id_lopgiaoly"];
		$id_namhoc=$result_pc["id_namhoc"];
		$this->load->model("Model_huynhtruong");
		$huynhtruong_ls=$this->Model_huynhtruong->get_value($id_huynhtruong);
		$this->load->model("Model_lopgiaoly");
		$lopgiaoly_ls=$this->Model_lopgiaoly->get_value($id_lopgiaoly);
		$this->load->model("Model_namhoc");
		$namhoc_ls=$this->Model_namhoc->get_value($id_namhoc);
		$array_lichsu=array(
			'lichsu'       => 'Hiệu chỉnh phân công năm học',
			'noidung'      => 'Quản lý phân công trưởng <b class="text-red">'.$huynhtruong_ls["tenthanh"].' '.$huynhtruong_ls["hoten"].'</b> vào lớp <b class="text-light-blue">'.$lopgiaoly_ls["tenlopgiaoly"].'</b> năm học <b class="text-yellow">'.$namhoc_ls["tennamhoc"].'</b> ',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai' =>	5,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();
	}
}
?>