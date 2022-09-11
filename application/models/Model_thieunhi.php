<?php
class Model_thieunhi extends CI_Model{
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
	public function them($value_thieunhi){
		$mamoi=$this->model_function->get_ma($value_thieunhi['gioitinh']);
		$this->db->query("INSERT INTO thieunhi VALUES(
			NULL,
			'{$mamoi}',
			'{$value_thieunhi['tenthanh']}',
			'{$value_thieunhi['hoten']}',
			'{$value_thieunhi['gioitinh']}',
			'{$value_thieunhi['ngaysinh']}',
			'{$value_thieunhi['ngaybonmang']}',
			'{$value_thieunhi['diachi']}',
			'{$value_thieunhi['sdt']}',
			'{$value_thieunhi['khugiao']}',
			'{$value_thieunhi['tenthanhcha']}',
			'{$value_thieunhi['hotencha']}',
			'{$value_thieunhi['nghenghiepcha']}',
			'{$value_thieunhi['dienthoaicha']}',
			'{$value_thieunhi['tenthanhme']}',
			'{$value_thieunhi['hotenme']}',
			'{$value_thieunhi['nghenghiepme']}',
			'{$value_thieunhi['dienthoaime']}',
			'{$value_thieunhi['daruatoi']}',
			'{$value_thieunhi['ngayruatoi']}',
			'{$value_thieunhi['linhmucruatoi']}',
			'{$value_thieunhi['nhathoruatoi']}',
			'{$value_thieunhi['daruocle']}',
			'{$value_thieunhi['ngayruocle']}',
			'{$value_thieunhi['linhmucruocle']}',
			'{$value_thieunhi['nhathoruocle']}',
			'{$value_thieunhi['dathemsuc']}',
			'{$value_thieunhi['ngaythemsuc']}',
			'{$value_thieunhi['linhmucthemsuc']}',
			'{$value_thieunhi['nhathothemsuc']}',
			'{$value_thieunhi['tinhtrang']}',
			'{$value_thieunhi['ngaythem']}',
			'{$value_thieunhi['ghichu']}')");
	}
	public function sua($value_thieunhi){
		$this->db->query("UPDATE thieunhi SET
			tenthanh       =   '{$value_thieunhi['tenthanh']}',
			hoten          =   '{$value_thieunhi['hoten']}',
			gioitinh       =   '{$value_thieunhi['gioitinh']}',
			ngaysinh       =   '{$value_thieunhi['ngaysinh']}',
			ngaybonmang    =   '{$value_thieunhi['ngaybonmang']}',
			diachi         =   '{$value_thieunhi['diachi']}',
			sdt            =   '{$value_thieunhi['sdt']}',
			khugiao        =   '{$value_thieunhi['khugiao']}',
			tenthanhcha    =   '{$value_thieunhi['tenthanhcha']}',
			hotencha       =   '{$value_thieunhi['hotencha']}',
			nghenghiepcha  =   '{$value_thieunhi['nghenghiepcha']}',
			dienthoaicha   =   '{$value_thieunhi['dienthoaicha']}',
			tenthanhme     =   '{$value_thieunhi['tenthanhme']}',
			hotenme        =   '{$value_thieunhi['hotenme']}',
			nghenghiepme   =   '{$value_thieunhi['nghenghiepme']}',
			dienthoaime    =   '{$value_thieunhi['dienthoaime']}',
			daruatoi       =   '{$value_thieunhi['daruatoi']}',
			ngayruatoi     =   '{$value_thieunhi['ngayruatoi']}',
			linhmucruatoi  =   '{$value_thieunhi['linhmucruatoi']}',
			nhathoruatoi   =   '{$value_thieunhi['nhathoruatoi']}',
			daruocle       =   '{$value_thieunhi['daruocle']}',
			ngayruocle     =   '{$value_thieunhi['ngayruocle']}',
			linhmucruocle  =   '{$value_thieunhi['linhmucruocle']}',
			nhathoruocle   =   '{$value_thieunhi['nhathoruocle']}',
			dathemsuc      =   '{$value_thieunhi['dathemsuc']}',
			ngaythemsuc    =   '{$value_thieunhi['ngaythemsuc']}',
			linhmucthemsuc =   '{$value_thieunhi['linhmucthemsuc']}',
			nhathothemsuc  =   '{$value_thieunhi['nhathothemsuc']}',
			ghichu         =   '{$value_thieunhi['ghichu']}'
			WHERE id_thieunhi  =   '{$value_thieunhi['id_thieunhi']}'");
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