<?php 
class Adminlogin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
	}
	public function index(){
		$this->load->view("admin/login");
	}
	public function check(){
		if(!empty($_POST["username"]) OR !empty($_POST["password"])){
			$username=$_POST["username"];
			$password=$_POST["password"];
			$this->load->model("model_checklogin");
			$result=$this->model_checklogin->loginadmin($username,$password);
			echo $result;
		}
	}
	public function logout(){
		session_start();
		session_destroy();
		$this->load->model("model_function");
		$this->model_function->location(base_url()."adminlogin");
	}
} 
?>