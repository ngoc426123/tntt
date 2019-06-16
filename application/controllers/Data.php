<?php
class Data extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}
	public function index(){
		$this->load->model("Model_lichsu");
		$lichsu=$this->Model_lichsu->get_value(5);
		echo "<pre>";
		print_r($lichsu);
		echo "</pre>";
	}
	public function convert($str){
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
		$str = preg_replace("/(đ)/", "d", $str);
	 	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
		$str = preg_replace("/(Đ)/", "D", $str);
		$str = preg_replace("/ /", "-", $str);
		//$str = str_replace(" “, “-", str_replace(“&*#39;","",$str));
		return $str;
	}
	public function get_json(){
		$sql=$this->db->query("SELECT id_thieunhi,mathieunhi,tenthanh,hoten FROM thieunhi ORDER BY id_thieunhi");
		$result=$sql->result_array();
		$array_to_json=array();
		foreach ($result as $key => $value) {
			$array_result["id_thieunhi"]=$value["id_thieunhi"];
			$array_result["mathieunhi"]=$value["mathieunhi"];
			$array_result["tenthanh"]=$value["tenthanh"];
			$array_result["hoten"]=$value["hoten"];
			$array_to_json[]=$array_result;
		}
		echo json_encode($array_to_json);
	}
	public function phuc(){
		$sql=$this->db->query("SELECT hoten FROM thieunhi ORDER BY SUBSTRING(thieunhi.hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))");
		$result=$sql->result_array();
		echo "<pre>";
		print_r($result);
		echo "</per>";
	}
	// public function set_diem(){
	// 	$this->load->model("Model_option");
	// 	$heso = $this->Model_option->get_heso();
		
	// 	$sql = $this->db->query("SELECT * FROM hoctap");
	// 	$res = $sql->result_array();
	// 	foreach ($res as $key => $value) {
	// 		$id_hoctap = $value["id_hoctap"];
	// 		// HK1
	// 		$trungbinh_hk1 = round(($value["diemmieng_hk1"]*$heso["heso_mieng_1"] + $value["diem15p_hk1"]*$heso["heso_15p_1"] + $value["diem45p_hk1"]*$heso["heso_45p_1"] + $value["diemthi_hk1"]*$heso["heso_thi_1"]) / ($heso["heso_mieng_1"] + $heso["heso_15p_1"] + $heso["heso_45p_1"] + $heso["heso_thi_1"]),$heso["heso_lamtron"]);
	// 		// HK2
	// 		$trungbinh_hk2 = round(($value["diemmieng_hk2"]*$heso["heso_mieng_2"] + $value["diem15p_hk2"]*$heso["heso_15p_2"] + $value["diem45p_hk2"]*$heso["heso_45p_2"] + $value["diemthi_hk2"]*$heso["heso_thi_2"]) / ($heso["heso_mieng_2"] + $heso["heso_15p_2"] + $heso["heso_45p_2"] + $heso["heso_thi_2"]),$heso["heso_lamtron"]);
	// 		// CA NAM
	// 		$trungbinh_canam = round(($trungbinh_hk1*$heso["heso_tbhk_1"] + $trungbinh_hk2*$heso["heso_tbhk_2"]) / ($heso["heso_tbhk_1"] + $heso["heso_tbhk_2"]),$heso["heso_lamtron"]);
			
	// 		// CAPNHAT
	// 		$this->db->query("UPDATE hoctap 
	// 						SET trungbinh_hk1={$trungbinh_hk1}, trungbinh_hk2={$trungbinh_hk2}, trungbinh_canam={$trungbinh_canam}
	// 						WHERE id_hoctap={$id_hoctap}");
	// 	}
	// 	echo "mọi sự đã hoàn tất !!!"
	// }
}
?>