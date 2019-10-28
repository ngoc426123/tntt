<?php
class Tailieu extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function index(){
		$data["view_page"]="view_tailieu";
		$data["page_title"]="Tài liệu nội bộ";
		$this->load->view("admin/index",$data);
	}
	public function upload(){
        $config['upload_path']          = './document/';
        $config['allowed_types']        = 'docx|doc|xls|xlsx|ppt|pptx|pdf';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')){
            $data["alert"]=array(
				"stt"     => "danger",
				"title"   => "Upload File",
				"content" => "File của bạn không đúng các định dạng như docx, doc, xls, xlsx, ppt, pptx, pdf ..vv..vv.. nên có thể gây nguy hiểm cho hệ thống, vui lòng xem lại file hoặc liên hệ với admin đẹp trai."	
			);
        }
        else{
            $data["alert"]=array(
				"stt"     => "success",
				"title"   => "Upload File",
				"content" => "File của bạn đã được up lên thành công."	
			);
        }
        $data["view_page"]="view_tailieu";
		$data["page_title"]="Tài liệu nội bộ";
		$this->load->view("admin/index",$data);
	}
}
?>