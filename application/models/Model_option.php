<?php
class Model_option extends CI_Model{
	public function __construct(){
		parent::__construct();
        $this->load->database();
	}
    public function get_heso(){
        $sql = $this->db->query("SELECT * FROM cauhinh WHERE tencauhinh LIKE 'heso%'");
        $res = $sql->result_array();
        $return=array();
        foreach ($res as $key => $value) {
            $return = array_merge($return,array($value["tencauhinh"] => $value["giatri"]));
        }
        return $return;
    }
}
?>