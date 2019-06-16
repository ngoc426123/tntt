<?php
class Model_huynhtruong extends CI_Model{
	private $tenthanh;
	private $hoten;
	private $gioitinh;
	private $ngaysinh;
	private $ngaybonmang;
	private $diachi;
	private $sdt;
	private $email;		
	private $caphuynhtruong;	
	private $chucvu;
	private $tinhtrang=1;
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function set_value($value_huynhtruong){
		$this->tenthanh       =	$value_huynhtruong["tenthanh"];
		$this->hoten          =	trim($value_huynhtruong["hoten"]);
		$this->gioitinh       =	$value_huynhtruong["gioitinh"];
		$this->ngaysinh       =	$value_huynhtruong["ngaysinh"];
		$this->ngaybonmang    =	$value_huynhtruong["ngaybonmang"];
		$this->diachi         =	$value_huynhtruong["diachi"];
		$this->sdt            =	$value_huynhtruong["sdt"];
		$this->email          =	$value_huynhtruong["email"];
		$this->caphuynhtruong =	$value_huynhtruong["caphuynhtruong"];
		$this->chucvu         =	$value_huynhtruong["chucvu"];
	}
	public function get_value($id_huynhtruong){
		$query=$this->db->query("SELECT * FROM huynhtruong WHERE id_huynhtruong='$id_huynhtruong'");
		$result=$query->row_array();
		$value_huynhtruong["id"]             = $result["id_huynhtruong"];
		$value_huynhtruong["tenthanh"]       = $result["tenthanh"];
		$value_huynhtruong["hoten"]          = $result["hoten"];
		$value_huynhtruong["gioitinh"]       = $result["gioitinh"];
		$value_huynhtruong["ngaysinh"]       = $result["ngaysinh"];
		$value_huynhtruong["ngaybonmang"]    = $result["ngaybonmang"];
		$value_huynhtruong["diachi"]         = $result["diachi"];
		$value_huynhtruong["sdt"]            = $result["sdt"];
		$value_huynhtruong["email"]          = $result["email"];
		$value_huynhtruong["caphuynhtruong"] = $result["caphuynhtruong"];
		$value_huynhtruong["chucvu"]         = $result["chucvu"];
		$value_huynhtruong["tinhtrang"]      = $result["tinhtrang"];
		return $value_huynhtruong;
	}
	public function them(){
		$now=getdate();
		$year=$now["year"];
		$year=substr($year,-2);
		$gioitinh=$this->gioitinh;
		$query=$this->db->query("SELECT * FROM huynhtruong ORDER BY RIGHT(mahuynhtruong,3) DESC");
		$result=$query->row_array();
		$ma=$result["mahuynhtruong"];
		$ma=substr($ma,-3);
		$mamoi=$ma+1;
		if(strlen($mamoi)==1){
			$mamoi="00".$mamoi;
		}
		else if(strlen($mamoi)==2){
			$mamoi="0".$mamoi;
		}
		else if(strlen($mamoi)==3){
			$mamoi=$mamoi;
		}
		$mamoi="HT".$year.$gioitinh.$mamoi;
		$this->db->query("INSERT INTO huynhtruong VALUES(
			NULL,
			'$mamoi',
			'$this->tenthanh',
			'$this->hoten',
			'$this->gioitinh',
			'$this->ngaysinh',
			'$this->ngaybonmang',
			'$this->diachi',
			'$this->sdt',
			'$this->email',
			'$this->caphuynhtruong',
			'$this->chucvu',
			'',
			'$this->tinhtrang')");
		$sql_chk=$this->db->query("SELECT * FROM huynhtruong WHERE email='$this->email'");
		$result_chk=$sql_chk->row_array();
		$id_ht=$result_chk['id_huynhtruong'];
		$pass=md5("12345678");
		$this->db->query("INSERT INTO user
			VALUES('',
			'$this->email',
			'$pass',
			'',
			'$id_ht',
			'0')");
	}
	public function sua($id_huynhtruong){
		$this->db->query("UPDATE huynhtruong SET
				tenthanh       ='$this->tenthanh', 
				hoten          ='$this->hoten', 
				gioitinh       ='$this->gioitinh', 
				ngaysinh       ='$this->ngaysinh', 
				ngaybonmang    ='$this->ngaybonmang', 
				diachi         ='$this->diachi', 
				sdt            ='$this->sdt', 
				email          ='$this->email',
				caphuynhtruong ='$this->caphuynhtruong',
				chucvu         ='$this->chucvu'
				where id_huynhtruong='$id_huynhtruong'");
		$this->db->query("UPDATE user SET username='$this->email' WHERE id_huynhtruong='$id_huynhtruong'");
	}
	public function tinhtrang($id,$tinhtrang){
		$this->db->query("UPDATE huynhtruong SET tinhtrang='$tinhtrang' WHERE id_huynhtruong='$id'");
	}
}
?>