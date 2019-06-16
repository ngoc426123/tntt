<?php
class Model_thieunhi extends CI_Model{
	private $tenthanh;
	private $hoten;
	private $gioitinh;
	private $ngaysinh;
	private $ngaybonmang;
	private $diachi;
	private $sdt;
	private $khugiao;
	private $tenthanhcha;
	private $hotencha;
	private $nghenghiepcha;
	private $dienthoaicha;
	private $tenthanhme;
	private $hotenme;
	private $nghenghiepme;
	private $dienthoaime;
	private $daruatoi;
	private $ngayruatoi;
	private $linhmucruatoi;
	private $nhathoruatoi;
	private $daruocle;
	private $ngayruocle;
	private $linhmucruocle;
	private $nhathoruocle;
	private $dathemsuc;
	private $ngaythemsuc;
	private $linhmucthemsuc;
	private $nhathothemsuc;
	private $tinhtrang=1;
	private $ngaythem;
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function set_value($value_thieunhi){
		$this->tenthanh       =	$value_thieunhi["tenthanh"];
		$this->hoten          =	$value_thieunhi["hoten"];
		$this->gioitinh       =	$value_thieunhi["gioitinh"];
		$this->ngaysinh       =	$value_thieunhi["ngaysinh"];
		$this->ngaybonmang    =	$value_thieunhi["ngaybonmang"];
		$this->diachi         =	$value_thieunhi["diachi"];
		$this->sdt            =	$value_thieunhi["sdt"];
		$this->khugiao        =	$value_thieunhi["khugiao"];
		$this->tenthanhcha    =	$value_thieunhi["tenthanhcha"];
		$this->hotencha       =	$value_thieunhi["hotencha"];
		$this->nghenghiepcha  =	$value_thieunhi["nghenghiepcha"];
		$this->dienthoaicha   =	$value_thieunhi["dienthoaicha"];
		$this->tenthanhme     =	$value_thieunhi["tenthanhme"];
		$this->hotenme        =	$value_thieunhi["hotenme"];
		$this->nghenghiepme   =	$value_thieunhi["nghenghiepme"];
		$this->dienthoaime    =	$value_thieunhi["dienthoaime"];
		$this->daruatoi       =	$value_thieunhi["daruatoi"];
		$this->ngayruatoi     =	$value_thieunhi["ngayruatoi"];
		$this->linhmucruatoi  =	$value_thieunhi["linhmucruatoi"];
		$this->nhathoruatoi   =	$value_thieunhi["nhathoruatoi"];
		$this->daruocle       =	$value_thieunhi["daruocle"];
		$this->ngayruocle     =	$value_thieunhi["ngayruocle"];
		$this->linhmucruocle  =	$value_thieunhi["linhmucruocle"];
		$this->nhathoruocle   =	$value_thieunhi["nhathoruocle"];
		$this->dathemsuc      =	$value_thieunhi["dathemsuc"];
		$this->ngaythemsuc    =	$value_thieunhi["ngaythemsuc"];
		$this->linhmucthemsuc =	$value_thieunhi["linhmucthemsuc"];
		$this->nhathothemsuc  =	$value_thieunhi["nhathothemsuc"];
		$this->ngaythem       =	$value_thieunhi["ngaythem"];
	}
	public function get_value($id_thieunhi){
		$query=$this->db->query("SELECT * FROM thieunhi WHERE id_thieunhi='$id_thieunhi'");
		$result=$query->row_array();
		return $result;
	}
	public function get_danhsachlop($id_namhoc,$id_lopgiaoly){
		$sql=$this->db->query("SELECT * 
			FROM phanlop JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi 
			WHERE phanlop.id_namhoc='$id_namhoc' AND phanlop.id_lopgiaoly='$id_lopgiaoly' 
			ORDER BY SUBSTRING(thieunhi.hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))");
		$res = $sql->result_array();
		return $res;
	}
	public function get_danhsachthieunhi($id_namhoc){
		if(isset($id_namhoc)){
			$query = "SELECT * 
				FROM thieunhi JOIN phanlop ON thieunhi.id_thieunhi=phanlop.id_thieunhi 
				WHERE phanlop.id_namhoc={$id_namhoc} 
				ORDER BY SUBSTRING(hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))";
		}
		else{
			$query = "SELECT * 
				FROM thieunhi 
				ORDER BY SUBSTRING(hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))";
		}
		$sql=$this->db->query($query);
		$res = $sql->result_array();
		return $res;
	}
	public function them(){
		$mamoi=$this->model_function->get_ma($this->gioitinh);
		$this->db->query("INSERT INTO thieunhi VALUES(
			NULL,
			'$mamoi',
			'$this->tenthanh',
			'$this->hoten',
			'$this->gioitinh',
			'$this->ngaysinh',
			'$this->ngaybonmang',
			'$this->diachi',
			'$this->sdt',
			'$this->khugiao',
			'$this->tenthanhcha',
			'$this->hotencha',
			'$this->nghenghiepcha',
			'$this->dienthoaicha',
			'$this->tenthanhme',
			'$this->hotenme',
			'$this->nghenghiepme',
			'$this->dienthoaime',
			'$this->daruatoi',
			'$this->ngayruatoi',
			'$this->linhmucruatoi',
			'$this->nhathoruatoi',
			'$this->daruocle',
			'$this->ngayruocle',
			'$this->linhmucruocle',
			'$this->nhathoruocle',
			'$this->dathemsuc',
			'$this->ngaythemsuc',
			'$this->linhmucthemsuc',
			'$this->nhathothemsuc',
			'$this->tinhtrang',
			'$this->ngaythem')");
	}
	public function sua($id_thieunhi){
		$this->db->query("UPDATE thieunhi SET
			tenthanh       ='$this->tenthanh',
			hoten          ='$this->hoten',
			gioitinh       ='$this->gioitinh',
			ngaysinh       ='$this->ngaysinh',
			ngaybonmang    ='$this->ngaybonmang',
			diachi         ='$this->diachi',
			sdt            ='$this->sdt',
			khugiao        ='$this->khugiao',
			tenthanhcha    ='$this->tenthanhcha',
			hotencha       ='$this->hotencha',
			nghenghiepcha  ='$this->nghenghiepcha',
			dienthoaicha   ='$this->dienthoaicha',
			tenthanhme     ='$this->tenthanhme',
			hotenme        ='$this->hotenme',
			nghenghiepme   ='$this->nghenghiepme',
			dienthoaime    ='$this->dienthoaime',
			daruatoi       ='$this->daruatoi',
			ngayruatoi     ='$this->ngayruatoi',
			linhmucruatoi  ='$this->linhmucruatoi',
			nhathoruatoi   ='$this->nhathoruatoi',
			daruocle       ='$this->daruocle',
			ngayruocle     ='$this->ngayruocle',
			linhmucruocle  ='$this->linhmucruocle',
			nhathoruocle   ='$this->nhathoruocle',
			dathemsuc      ='$this->dathemsuc',
			ngaythemsuc    ='$this->ngaythemsuc',
			linhmucthemsuc ='$this->linhmucthemsuc',
			nhathothemsuc  ='$this->nhathothemsuc'
			where id_thieunhi='$id_thieunhi'");
	}
	public function tinhtrang($id,$tinhtrang){
		$this->db->query("UPDATE thieunhi SET tinhtrang='$tinhtrang' WHERE id_thieunhi='$id'");
	}
	public function themlop($id_thieunhi,$id_lopgiaoly,$id_namhoc){
		$query=$this->db->query("SELECT * FROM phanlop WHERE id_namhoc='$id_namhoc' AND id_thieunhi='$id_thieunhi'");
	    if($query->num_rows()==0){
			$return = $this->db->query("INSERT INTO phanlop VALUES(
				NULL,
				'$id_thieunhi',
				'$id_lopgiaoly',
				'$id_namhoc',
				'')");
			return $this->db->insert_id();
		}
		else{
			$this->db->query("UPDATE phanlop SET id_lopgiaoly={$id_lopgiaoly} WHERE id_namhoc={$id_namhoc} AND id_thieunhi={$id_thieunhi}");
			return 0;
		}
	}
	public function chuyenlop($id_phanlop,$id_lopgiaoly){
		if($id_lopgiaoly==0){
			$this->db->query("UPDATE phanlop SET id_lopgiaoly='0' WHERE id_phanlop='$id_phanlop'");
			return 1;
		}
		else{
			$this->db->query("UPDATE phanlop SET id_lopgiaoly='$id_lopgiaoly' WHERE id_phanlop='$id_phanlop'");
			return 2;
		}
	}
	public function del($id_thieunhi){
		// GET ID PHANLOP
		$sql = $this->db->query("SELECT id_phanlop FROM phanlop WHERE id_thieunhi={$id_thieunhi}");
		$res = $sql->result_array();
		foreach ($res as $value) {
			$array_id_pl[]=$value["id_phanlop"];
		}
		// DELL SUPPORT
		$this->db->query("DELETE FROM thieunhi WHERE id_thieunhi={$id_thieunhi}");
		$this->db->query("DELETE FROM phanlop WHERE id_thieunhi={$id_thieunhi}");
		foreach ($array_id_pl as $value) {
			$this->db->query("DELETE FROM hoctap WHERE id_phanlop={$value}");
			$this->db->query("DELETE FROM chuyencan WHERE id_phanlop={$value}");
		}
	}
}
?>