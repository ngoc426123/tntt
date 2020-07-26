<?php
class Model_cauhinh extends CI_Model{
	private $heso_mieng_1;
	private $heso_15p_1;
	private $heso_45p_1;
	private $heso_thi_1;
	private $heso_tbhk_1;
	private $heso_mieng_2;
	private $heso_15p_2;
	private $heso_45p_2;
	private $heso_thi_2;
	private $heso_tbhk_2;
	private $heso_lamtron;
	private $namhochientai;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function set_value_heso($value_heso){
		$this->heso_mieng_1 = $value_heso["heso_mieng_1"];
		$this->heso_15p_1   = $value_heso["heso_15p_1"];
		$this->heso_45p_1   = $value_heso["heso_45p_1"];
		$this->heso_thi_1   = $value_heso["heso_thi_1"];
		$this->heso_tbhk_1  = $value_heso["heso_tbhk_1"];
		$this->heso_mieng_2 = $value_heso["heso_mieng_2"];
		$this->heso_15p_2   = $value_heso["heso_15p_2"];
		$this->heso_45p_2   = $value_heso["heso_45p_2"];
		$this->heso_thi_2   = $value_heso["heso_thi_2"];
		$this->heso_tbhk_2  = $value_heso["heso_tbhk_2"];
		$this->heso_lamtron = $value_heso["heso_lamtron"];
	}
	public function get_value_heso(){
		$query=$this->db->query("SELECT * FROM cauhinh WHERE SUBSTRING(tencauhinh,1,4)='heso'");
        $result=$query->result_array();
        foreach ($result as $value){
            $value_heso[$value["tencauhinh"]]=$value["giatri"];
        }
        return $value_heso;
	}
	public function sua_heso(){
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_mieng_1' WHERE tencauhinh='heso_mieng_1'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_15p_1' WHERE tencauhinh='heso_15p_1'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_45p_1' WHERE tencauhinh='heso_45p_1'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_thi_1' WHERE tencauhinh='heso_thi_1'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_tbhk_1' WHERE tencauhinh='heso_tbhk_1'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_mieng_2' WHERE tencauhinh='heso_mieng_2'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_15p_2' WHERE tencauhinh='heso_15p_2'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_45p_2' WHERE tencauhinh='heso_45p_2'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_thi_2' WHERE tencauhinh='heso_thi_2'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_tbhk_2' WHERE tencauhinh='heso_tbhk_2'");
		$this->db->query("UPDATE cauhinh SET giatri='$this->heso_lamtron' WHERE tencauhinh='heso_lamtron'");
	}
	public function set_value_namhochientai($value_namhochientai){
		$this->namhochientai = $value_namhochientai;
	}
	public function get_value_namhochientai(){
		$query=$this->db->query("SELECT * FROM cauhinh WHERE tencauhinh='namhochientai'");
		$result=$query->row_array();
		return $result["giatri"];
	}
	public function sua_namhochientai(){
		$this->db->query("UPDATE cauhinh SET giatri='$this->namhochientai' WHERE tencauhinh='namhochientai'");
	}
}
?>