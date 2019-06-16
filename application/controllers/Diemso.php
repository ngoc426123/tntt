<?php
class Diemso extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
        $this->load->model("model_diemso");
        $data["result_tn"]=$this->model_diemso->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		$data["page_title"]="Điểm số";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		if($id_phancong==NULL){
			$data["view_page"]="view_not_phancong";
			$this->load->view("admin/index",$data);
		}
		else{
			$data["view_page"]="view_diemso";
			$this->load->view("admin/index",$data);
		}
	}
	public function capnhat(){
		$this->load->model('model_diemso');
		$value=array(
			'flag'		 =>	$_POST["flag"],
			'id_phanlop' =>	$_POST["id_phanlop"],
			'dmieng_1'   =>	$_POST["dmieng_1"],
			'd15phut_1'  =>	$_POST["d15phut_1"],
			'd45phut_1'  =>	$_POST["d45phut_1"],
			'dthi_1'     =>	$_POST["dthi_1"],
			'dmieng_2'   =>	$_POST["dmieng_2"],
			'd15phut_2'  =>	$_POST["d15phut_2"],
			'd45phut_2'  =>	$_POST["d45phut_2"],
			'dthi_2'     =>	$_POST["dthi_2"],
		);
		foreach ($value['id_phanlop'] as $key => $vl){
			$value_diemso=array(
				'flag'       => $value["flag"][$key],
				'id_phanlop' =>	$value["id_phanlop"][$key],
				'dmieng_1'   =>	$value["dmieng_1"][$key],
				'd15phut_1'  =>	$value["d15phut_1"][$key],
				'd45phut_1'  =>	$value["d45phut_1"][$key],
				'dthi_1'     =>	$value["dthi_1"][$key],
				'dmieng_2'   =>	$value["dmieng_2"][$key],
				'd15phut_2'  =>	$value["d15phut_2"][$key],
				'd45phut_2'  =>	$value["d45phut_2"][$key],
				'dthi_2'     =>	$value["dthi_2"][$key],
			);
			$this->model_diemso->set_value($value_diemso);
			if($value_diemso['flag']==0){
				$this->model_diemso->them();
			}
			else{
				$this->model_diemso->sua();
			}
		}
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
        $this->load->model("model_diemso");
        $data["result_tn"]=$this->model_diemso->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		$data["page_title"]="Điểm số";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		if($id_phancong==NULL){
			$data["view_page"]="view_not_phancong";
			$this->load->view("admin/index",$data);
		}
		else{
			$data["view_page"]="view_diemso";
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Quản lý điểm số",
				"content" => "Cập nhật bảng điểm thành công."	
			);
			$this->load->view("admin/index",$data);
		}
		// GHI LỊCH SỬ
		$now=getdate();
		$array_lichsu=array(
			'lichsu'       => 'Cập nhật điểm số',
			'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> cập nhật điểm số lớp <b class="text-light-blue">'.$_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"].'</b>',
			'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
			'loai'		   => 3,
		);
		$this->load->model("Model_lichsu");
		$this->Model_lichsu->set_value($array_lichsu);
		$this->Model_lichsu->them();
	}
}
?>