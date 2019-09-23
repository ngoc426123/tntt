<?php
class Diemdanh extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("model_function");
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		if(isset($_POST["ok"])){
			$data["thang"]=$thang=$_POST["chonthang"];
			$data["nam"]=$nam=$_POST["chonnam"];
			$days_in_month = date('t',mktime(0,0,0,$thang,1,$nam));
            for($i=1;$i<=$days_in_month;$i++){
              	if(date('N',mktime(0,0,0,$thang,$i,$nam))==7){
                	$sunday[]=$i;
              	}
            }
            $data["sunday"]=$sunday;
			$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
	        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
	        $this->load->model("model_thieunhi");
	        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		}
		else{
			$data["thang"]=$thang=date('m');
			$data["nam"]=$nam=date('Y');
			$days_in_month = date('t',mktime(0,0,0,$thang,1,$nam));
            for($i=1;$i<=$days_in_month;$i++){
              	if(date('N',mktime(0,0,0,$thang,$i,$nam))==7){
                	$sunday[]=$i;
              	}
            }
            $data["sunday"]=$sunday;
			$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
	        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
	        $this->load->model("model_thieunhi");
	        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Điểm danh";
		$data["view_page"]="view_diemdanh";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		if($id_phancong==NULL){
			$data["view_pape"]="view_not_phancong";
			$this->load->view("admin/index",$data);
		}
		else{
			$data["menu_title"]="Điểm danh";
			$this->load->view("admin/index",$data);
		}
	}
	public function add(){
		$query=explode("|", $_POST["query"]);
		$id_phanlop=$query[0];
		$ngaythang=$query[1];
		echo $id_phanlop.$ngaythang;
		$this->db->query("INSERT INTO chuyencan VALUES(
			NULL,
			'$id_phanlop',
			'$ngaythang',
			'1',
			'')");
	}
	public function del(){
		$query=explode("|", $_POST["query"]);
		$id_phanlop=$query[0];
		$ngaythang=$query[1];
		$this->db->query("DELETE FROM chuyencan WHERE id_phanlop='$id_phanlop' AND ngaynghi='$ngaythang'");
	}
}
?>