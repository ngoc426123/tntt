<?php 
class Model_lopgiaoly extends CI_Model{
	private $id_lopgiaoly;
	private $tenlopgiaoly;
	private $douutien;
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function set_value($value_lopgiaoly){
		$this->id_lopgiaoly = $value_lopgiaoly["id_lopgiaoly"];
		$this->tenlopgiaoly = $value_lopgiaoly["tenlopgiaoly"];
		$this->douutien     = $value_lopgiaoly["douutien"];
	}
	public function get_value($id_lopgiaoly){
		$query=$this->db->query("SELECT * FROM lopgiaoly WHERE id_lopgiaoly='$id_lopgiaoly'");
		$result=$query->row_array();
		return $result;
	}
	public function get_list(){
		$query=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien");
		$result=$query->result_array();
		return $result;
	}
	public function them(){
		$query=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien DESC");
		$result=$query->row_array();
		$douutien=$result["douutien"];
		$douutien++;
		$this->db->query("INSERT INTO lopgiaoly VALUES(
			NULL,
			'$this->tenlopgiaoly',
			'$douutien')");
	}
	public function hieuchinh(){
		// echo $this->id_lopgiaoly."|".$this->tenlopgiaoly."|".$this->douutien;
		// echo "</br>";
		$this->db->query("UPDATE lopgiaoly SET tenlopgiaoly='$this->tenlopgiaoly', douutien='$this->douutien' WHERE id_lopgiaoly='$this->id_lopgiaoly'");
	}
	public function xoa(){
		$this->db->query("DELETE FROM lopgiaoly WHERE id_lopgiaoly='$this->id_lopgiaoly'");
	}
}
?>