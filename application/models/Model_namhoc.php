<?php
class Model_namhoc extends CI_Model{
	private $tennamhoc;
	private $chude;
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function set_value($value_namhoc){
		$this->tennamhoc		=	$value_namhoc["tennamhoc"];
		$this->chude			=	$value_namhoc["chude"];
	}
	public function get_value($id_namhoc){
		$query=$this->db->query("SELECT * FROM namhoc WHERE id_namhoc='$id_namhoc'");
		$result=$query->row_array();
		$value_namhoc["id_namhoc"] = $result["id_namhoc"];
		$value_namhoc["tennamhoc"] = $result["tennamhoc"];
		$value_namhoc["chude"]     = $result["chude"];
		return $value_namhoc;
	}
	public function get_list(){
		$query=$this->db->query("SELECT * FROM namhoc ORDER BY tennamhoc");
        $result=$query->result_array();
        return $result;
	}
	public function them(){
		$this->db->query("INSERT INTO namhoc VALUES(
			NULL,
			'$this->tennamhoc',
			'$this->chude')");
	}
	public function sua($id){
		$this->db->query("UPDATE namhoc SET
				tennamhoc='$this->tennamhoc', 
				chude='$this->chude'
				WHERE id_namhoc='$id'");
	}
}
?>