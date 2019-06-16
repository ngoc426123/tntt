<?php
class Model_checklogin extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function loginadmin($username,$password){
		$password=md5($password);
		$sql=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		if($sql->num_rows()>0){
			$result = $sql->row_array();
			$id_huynhtruong=$result["id_huynhtruong"];
			$sql_ht=$this->db->query("SELECT * FROM huynhtruong WHERE id_huynhtruong='$id_huynhtruong'");
			$result_ht=$sql_ht->row_array();
			if($result_ht['tinhtrang']==1){
				$ttrang="Còn sinh hoạt";
			}
			else{
				$ttrang="Nghỉ sinh hoạt";
			}
			$sql_ltv=$this->db->query("SELECT * FROM user WHERE id_huynhtruong='$id_huynhtruong'");
			$result_ltv=$sql_ltv->row_array();
			if($result_ltv['id_phanquyen']==1){
				$ltv="Administrator";
			}
			else{
				$ltv="Moderator";
			}
			$sql_hientai=$this->db->query("SELECT * FROM cauhinh WHERE tencauhinh='namhochientai'");
			$result_hientai=$sql_hientai->row_array();
			$namhochientai=$result_hientai["giatri"];
			$sql_nh=$this->db->query("SELECT * FROM namhoc WHERE id_namhoc='$namhochientai'");
			$result_nh=$sql_nh->row_array();
			$id_namhoc=$result_nh["id_namhoc"];
			$sql_pc=$this->db->query("SELECT * FROM phancong WHERE id_huynhtruong='$id_huynhtruong' AND id_namhoc='$id_namhoc'");
			$result_pc=$sql_pc->row_array();
			$id_lopgiaoly=$result_pc["id_lopgiaoly"];
			$id_namhoc=$result_pc["id_namhoc"];
			$sql_lgl=$this->db->query("SELECT * FROM lopgiaoly WHERE id_lopgiaoly='$id_lopgiaoly'");
			$result_lgl=$sql_lgl->row_array();
			session_start();
			$tt = array(
				'id_huynhtruong' 	=> $result_ht['id_huynhtruong'],
				'mahuynhtruong'  	=> $result_ht['mahuynhtruong'],
				'tenhuynhtruong' 	=> $result_ht['tenthanh']." ".$result_ht['hoten'] ,
				'loaithanhvien' 	=> $result_ltv['id_phanquyen'],
				'loaithanhvien_gra' => $ltv,	
				'tinhtrang'			=> $result_ht['tinhtrang'],
				'tinhtrang_gra'		=> $ttrang,	
				'id_phancong'		=> $result_pc["id_phancong"],
				'tenlopgiaoly'		=> $result_lgl["tenlopgiaoly"],
				'id_lopgiaoly'		=> $id_lopgiaoly,
				'id_namhoc'			=> $result_nh['id_namhoc'],
				'namhoc'			=> $result_nh['tennamhoc'],
				'chudenamhoc'		=> $result_nh['chude'],
				'avatar'			=> $result_ltv["avatar"],
				'time'				=> date("H:i:s"),
				'day'				=> date("d-m-Y"),
				'ip'				=> $_SERVER['REMOTE_ADDR'],
			);
			if($tt["tinhtrang"]==1){
				$_SESSION["thongtinhuynhtruong"]=$tt;
				return 1; // đăng nhập thành công, huynh trưởng còn sinh hoạt
			}
			else{
				return 2; //đăng nhập thất bại, huynh trưởng đã nghỉ sinh hoạt
			}
		}
		else{
			return 0; //đăng nhập thất bại
		}
	}
}
?>