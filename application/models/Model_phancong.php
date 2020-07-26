<?php
class Model_phancong extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_value($id_phancong){
		$query=$this->db->query("SELECT * FROM phancong WHERE id_phancong={$id_phancong}");
		$result=$query->row_array();
		return $result;
	}
	public function get_list($id_namhoc){
		$query=$this->db->query("SELECT * FROM phancong WHERE id_namhoc={$id_namhoc}");
        $result=$query->result_array();
        return $result;
	}
	public function check($id_huynhtruong,$id_namhoc){
		$sql=$this->db->query("SELECT * 
			FROM phancong 
			WHERE id_huynhtruong='$id_huynhtruong' AND id_namhoc='$id_namhoc'");
		return ($sql->num_rows()>0)?false:true;
	}
	public function add($id_lopgiaoly,$id_huynhtruong,$id_namhoc){
		$this->db->query("INSERT INTO phancong VALUES(
			NULL,
			{$id_lopgiaoly},
			{$id_huynhtruong},
			{$id_namhoc})");
	}
	public function edit($id_phancong,$id_lopgiaoly){
		$this->db->query("UPDATE phancong 
			SET id_lopgiaoly='$id_lopgiaoly'
			WHERE id_phancong='$id_phancong'");
	}
}
?>