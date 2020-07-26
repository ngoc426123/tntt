<?php 
class Model_diemso extends CI_Model{
	private $id_phanlop;
	private $dmieng_1;
	private $d15phut_1;	
	private $d45phut_1;	
	private $dthi_1;
	private $trungbinh_1;	
	private $dmieng_2;	
	private $d15phut_2;	
	private $d45phut_2;	
	private $dthi_2;
	private $dtrungbinh_2;
	private $dtrungbinh_canam;
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function set_value($value_diemso){
		$this->id_phanlop =$value_diemso['id_phanlop'];
		$this->dmieng_1   =$value_diemso['dmieng_1'];
		$this->d15phut_1  =$value_diemso['d15phut_1'];
		$this->d45phut_1  =$value_diemso['d45phut_1'];
		$this->dthi_1     =$value_diemso['dthi_1'];
		$this->dmieng_2   =$value_diemso['dmieng_2'];
		$this->d15phut_2  =$value_diemso['d15phut_2'];
		$this->d45phut_2  =$value_diemso['d45phut_2'];
		$this->dthi_2     =$value_diemso['dthi_2'];
	}
	public function get_value($id_namhoc,$id_thieunhi){
		$sql=$this->db->query("SELECT * 
			FROM
				phanlop 
			    	INNER JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi
			    	INNER JOIN hoctap ON phanlop.id_phanlop = hoctap.id_phanlop 
			WHERE 
				phanlop.id_namhoc='$id_namhoc' AND 
				thieunhi.id_thieunhi='$id_thieunhi'");
		$res = $sql->row_array();
		return $res;
	}
	public function get_danhsachlop($id_namhoc,$id_lopgiaoly){
		$this->load->model("model_thieunhi");
		$result_tn = $this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		foreach ($result_tn as $key_tn => $value_tn) {
			$sql_ht=$this->db->query("SELECT * FROM hoctap WHERE id_phanlop={$value_tn["id_phanlop"]}");
			if($sql_ht->num_rows()>0){
				$res_ht = $sql_ht->row_array();
				$array_term=array(
					'id_hoctap'       => $res_ht["id_hoctap"],
					'diemmieng_hk1'   => $res_ht["diemmieng_hk1"],
					'diem15p_hk1'     => $res_ht["diem15p_hk1"],
					'diem45p_hk1'     => $res_ht["diem45p_hk1"],
					'diemthi_hk1'     => $res_ht["diemthi_hk1"],
					'trungbinh_hk1'   => $res_ht["trungbinh_hk1"],
					'diemmieng_hk2'   => $res_ht["diemmieng_hk2"],
					'diem15p_hk2'     => $res_ht["diem15p_hk2"],
					'diem45p_hk2'     => $res_ht["diem45p_hk2"],
					'diemthi_hk2'     => $res_ht["diemthi_hk2"],
					'trungbinh_hk2'   => $res_ht["trungbinh_hk2"],
					'trungbinh_canam' => $res_ht["trungbinh_canam"],
					'flag'			  => 1,
				);
			}
			else{
				$array_term = array(
					'id_hoctap'       => 0,
					'diemmieng_hk1'   => 0,
					'diem15p_hk1'     => 0,
					'diem45p_hk1'     => 0,
					'diemthi_hk1'     => 0,
					'trungbinh_hk1'   => 0,
					'diemmieng_hk2'   => 0,
					'diem15p_hk2'     => 0,
					'diem45p_hk2'     => 0,
					'diemthi_hk2'     => 0,
					'trungbinh_hk2'   => 0,
					'trungbinh_canam' => 0,
					'flag'			  => 0,
				);
			}
			$result_tn[$key_tn]["hoctap"] = $array_term;
		}
		return $result_tn;
	}
	public function them(){
		$this->db->query("INSERT INTO hoctap VALUES (
			NULL,
			'$this->id_phanlop',
			'$this->dmieng_1',
			'$this->d15phut_1',
			'$this->d45phut_1',
			'$this->dthi_1',
			'0',
			'$this->dmieng_2',
			'$this->d15phut_2',
			'$this->d45phut_2',
			'$this->dthi_2',
			'0',
			'0')");
	}
	public function sua(){
		$this->load->model("Model_option");
		$heso = $this->Model_option->get_heso();
		// HK1
		$this->dtrungbinh_1 = round(($this->dmieng_1*$heso["heso_mieng_1"] + $this->d15phut_1*$heso["heso_15p_1"] + $this->d45phut_1*$heso["heso_45p_1"] + $this->dthi_1*$heso["heso_thi_1"]) / ($heso["heso_mieng_1"] + $heso["heso_15p_1"] + $heso["heso_45p_1"] + $heso["heso_thi_1"]),$heso["heso_lamtron"]);
		// HK2
		$this->dtrungbinh_2 = round(($this->dmieng_2*$heso["heso_mieng_2"] + $this->d15phut_2*$heso["heso_15p_2"] + $this->d45phut_2*$heso["heso_45p_2"] + $this->dthi_2*$heso["heso_thi_2"]) / ($heso["heso_mieng_2"] + $heso["heso_15p_2"] + $heso["heso_45p_2"] + $heso["heso_thi_2"]),$heso["heso_lamtron"]);
		// CA NAM
		$this->dtrungbinh_canam = round(($this->dtrungbinh_1*$heso["heso_tbhk_1"] + $this->dtrungbinh_2*$heso["heso_tbhk_2"]) / ($heso["heso_tbhk_1"] + $heso["heso_tbhk_2"]),$heso["heso_lamtron"]);
		$this->db->query("UPDATE hoctap SET 
			diemmieng_hk1='$this->dmieng_1',
			diem15p_hk1='$this->d15phut_1',
			diem45p_hk1='$this->d45phut_1',
			diemthi_hk1='$this->dthi_1',
			trungbinh_hk1='$this->dtrungbinh_1',
			diemmieng_hk2='$this->dmieng_2',
			diem15p_hk2='$this->d15phut_2',
			diem45p_hk2='$this->d45phut_2',
			diemthi_hk2='$this->dthi_2',
			trungbinh_hk2='$this->dtrungbinh_2',
			trungbinh_canam='$this->dtrungbinh_canam' WHERE id_phanlop='$this->id_phanlop'");
	}
}
?>