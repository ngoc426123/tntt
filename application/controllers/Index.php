<?php
class Index extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
	}
	public function index(){
		$data["page_title"]="Trang chủ";
		$data["view_page"]="view_xemdiem";
		$this->load->view("home/index",$data);
	}
	public function danhsachhuynhtruong(){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM huynhtruong WHERE id_huynhtruong !=16 AND tinhtrang = 1 ORDER BY mahuynhtruong");
		$data["result"]=$query->result_array();
		$data["page_title"]="Trang chủ";
		$data["view_page"]="view_danhsachhuynhtruong";
		$this->load->view("home/index",$data);
	}
}
?>