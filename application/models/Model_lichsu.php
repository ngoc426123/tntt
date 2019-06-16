<?php
class Model_lichsu extends CI_Model{
	private $lichsu;
	private $noidung;
	private $thoigian;
	private $nguoicapnhat;
	private $loai;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function set_value($value_lichsu){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$now=getdate();
		
		$this->lichsu       = $value_lichsu["lichsu"];
		$this->noidung      = $value_lichsu["noidung"];
		$this->thoigian     = $now["mday"].'/'.$now["mon"].'/'.$now["year"].' '.$now["hours"].':'.$now["minutes"].':'.$now["seconds"];
		$this->nguoicapnhat = $value_lichsu["nguoicapnhat"];
		$this->loai 		= $value_lichsu["loai"];
	}
	public function get_value($limit){
		$query=$this->db->query("SELECT * FROM lichsu ORDER BY id_lichsu DESC LIMIT 0,$limit");
        $result=$query->result_array();
        foreach ($result as $value){
            $value_lichsu[]=array(
            	'lichsu'       => $value["lichsu"],
            	'noidung'      => $value["noidung"],
            	'thoigian'     => $value["thoigian"],
            	'nguoicapnhat' => $value["nguoicapnhat"],
            	'loai'		   => $value["loai"],
            );
        }
        return $value_lichsu;
	}
	public function them(){
		$this->db->query("INSERT INTO lichsu VALUE(
			NULL,
			'$this->lichsu',
			'$this->noidung',
			'$this->thoigian',
			'$this->nguoicapnhat',
			'$this->loai')");
	}
}
?>