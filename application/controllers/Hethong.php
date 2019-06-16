<?php
class Hethong extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thành viên";
		$data["view_page"]="view_thaydoimatkhau";
		$this->load->view("admin/index",$data);
	}
	public function thaydoimatkhau(){
		if(isset($_POST["ok"])){
			$matkhaucu=md5($_POST["matkhaucu"]);
			$matkhaumoi=md5($_POST["matkhaumoi"]);
			$nhaplai=md5($_POST["nhaplai"]);
			$id_huynhtruong=$_SESSION["thongtinhuynhtruong"]["id_huynhtruong"];
			$sql_mk=$this->db->query("SELECT * FROM user WHERE id_huynhtruong='$id_huynhtruong' AND password='$matkhaucu'");
			if($sql_mk->num_rows()==0){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Thay đổi mật khẩu",
					"content" => "Mật khẩu không trùng khớp."	
				);
			}
			else if($matkhaumoi!=$nhaplai){	
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Thay đổi mật khẩu",
					"content" => "Mật khẩu nhập lại không trùng khớp."	
				);
			}
			else{
				$this->db->query("UPDATE user SET password='$matkhaumoi' WHERE id_huynhtruong='$id_huynhtruong'");
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Thay đổi mật khẩu",
					"content" => "Thay đổi mật khẩu thành công"	
				);
			}
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thành viên";
		$data["view_page"]="view_thaydoimatkhau";
		$this->load->view("admin/index",$data);
	}
	public function backup(){
		$filename="backup_tntt_".date("d-m-Y_H-i-s").'.sql';
		$this->load->dbutil();
		$backup = $this->dbutil->backup();
		$this->load->helper('file');
		write_file('./backup/'.$filename, $backup);
		$this->load->helper('download');
		force_download($filename, $backup);
	}
	public function hinhdaidien(){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Hình đại diện";
		$data["view_page"]="view_hinhdaidien";
		$this->load->view("admin/index",$data);
	}
	public function upload(){
		$config['upload_path'] = "./tmp/upload/";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload("hinhdaidien")){
			$data["alert"]=array(
				"stt"     => "danger",
				"title"   => "Hình đại diện",
				"content" => "KHông thể cập nhật hình đại diện"	
			);
		}
		else{
			$id_huynhtruong=$_SESSION["thongtinhuynhtruong"]["id_huynhtruong"];
			$query=$this->db->query("SELECT * FROM user WHERE id_huynhtruong='$id_huynhtruong'");
			$result=$query->row_array();
			$oldimage=$result["avatar"];
			if($oldimage!=NULL){
				unlink("./tmp/upload/".$oldimage);
			}
			$data=$this->upload->data();
			$imagename=$data['file_name'];
			$this->db->query("UPDATE user SET avatar='$imagename' WHERE id_huynhtruong='$id_huynhtruong'");
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Hình đại diện",
				"content" => "Thay đổi hình đại diện thành công"	
			);
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Hình đại diện";
		$data["view_page"]="view_hinhdaidien";
		$this->load->view("admin/index",$data);
	}
	public function resetpass($id_huynhtruong){
		$resetpass=md5(12345678);
		$this->db->query("UPDATE user SET password='".$resetpass."' WHERE id_huynhtruong='".$id_huynhtruong."'");
		$data["alert"]=array(
			"stt"     => "success",
			"title"   => "Thay đổi mật khẩu",
			"content" => "Thay đổi mật khẩu mặc định thành công"	
		);
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Huynh trưởng";
		$data["view_page"]="view_danhsachhuynhtruong";
		$this->load->view("admin/index",$data);
	}
	public function cauhinhhethong(){
		$this->load->model("Model_cauhinh");
		$data["heso"]=$this->Model_cauhinh->get_value_heso();
		$data["namhochientai"]=$this->Model_cauhinh->get_value_namhochientai();
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Cấu hình";
		$data["view_page"]="view_cauhinhhethong";
		$this->load->view("admin/index",$data);
	}
	public function capnhatheso(){
		$value_heso=array(
			"heso_mieng_1" => $_POST["heso_mieng_1"],
			"heso_15p_1"   => $_POST["heso_15p_1"],
			"heso_45p_1"   => $_POST["heso_45p_1"],
			"heso_thi_1"   => $_POST["heso_thi_1"],
			"heso_tbhk_1"  => $_POST["heso_tbhk_1"],
			"heso_mieng_2" => $_POST["heso_mieng_2"],
			"heso_15p_2"   => $_POST["heso_15p_2"],
			"heso_45p_2"   => $_POST["heso_45p_2"],
			"heso_thi_2"   => $_POST["heso_thi_2"],
			"heso_tbhk_2"  => $_POST["heso_tbhk_2"],
			"heso_lamtron" => $_POST["heso_lamtron"],
		);
		$this->load->model("Model_cauhinh");
		$this->Model_cauhinh->set_value_heso($value_heso);
		$this->Model_cauhinh->sua_heso();
		$data["heso"]=$this->Model_cauhinh->get_value_heso();
		$data["namhochientai"]=$this->Model_cauhinh->get_value_namhochientai();
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Cấu hình";
		$data["view_page"]="view_cauhinhhethong";
		$data["alert"]=array(
			"stt"     => "success",
			"title"   => "Cấu hình hệ số năm học",
			"content" => "Cập nhật thành công"	
		);
		$this->load->view("admin/index",$data);
		// GHI LỊCH SỬ
		$array_lichsu=array(
			'lichsu'       => 'Cập nhật hệ số điểm',
			'noidung'      => 'Quản lý cập nhật hệ số điểm',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai' =>	7,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();
	}
	public function capnhatnamhoc(){
		$value_namhochientai=$_POST["id_namhoc"];
		$this->load->model("Model_cauhinh");
		$this->Model_cauhinh->set_value_namhochientai($value_namhochientai);
		$this->Model_cauhinh->sua_namhochientai();

		$data["heso"]=$this->Model_cauhinh->get_value_heso();
		$data["namhochientai"]=$this->Model_cauhinh->get_value_namhochientai();
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Cấu hình";
		$data["view_page"]="view_cauhinhhethong";
		$data["alert"]=array(
			"stt"     => "success",
			"title"   => "Cập nhật năm học",
			"content" => "Thành công"	
		);
		$this->load->view("admin/index",$data);
		// GHI LỊCH SỬ
		$array_lichsu=array(
			'lichsu'       => 'Cập nhật năm học',
			'noidung'      => 'Quản lý cập nhật năm học',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai' =>	8,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();
	}
}
?>