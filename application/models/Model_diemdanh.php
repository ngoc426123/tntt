<?php
class Model_diemdanh extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function add($id_phanlop,$ngaythang){
		$this->db->query("INSERT INTO chuyencan VALUES(NULL,'$id_phanlop','$ngaythang','1','')");
	}
	public function del($id_phanlop,$ngaythang){
		$this->db->query("DELETE FROM chuyencan WHERE id_phanlop='$id_phanlop' AND ngaynghi='$ngaythang'");
	}
	public function get($id_phanlop,$ngaythang){
		$query = $this->db->query("SELECT * FROM chuyencan WHERE id_phanlop='$id_phanlop' AND ngaynghi='$ngaythang'");
		if($query->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
	}
	public function get_value($id_namhoc,$id_thieunhi){
		$this->load->model("model_thieunhi");
		$result_tn = $this->model_thieunhi->get_value($id_thieunhi);
		$sql_cc = $this->db->query("SELECT chuyencan.ngaynghi
			FROM
				phanlop 
			    	INNER JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi
			    	INNER JOIN chuyencan ON phanlop.id_phanlop = chuyencan.id_phanlop 
			WHERE 
				phanlop.id_namhoc='$id_namhoc' AND 
				thieunhi.id_thieunhi='$id_thieunhi'");
		$result_cc = $sql_cc->result_array();
		$arr_cc = array();
		foreach ($result_cc as $ccrr) {
			foreach ($ccrr as $cc) {
				$arr_cc[]=$cc;
			}
		}
		$result_tn["chuyencan"] = $arr_cc;
		return $result_tn;
	}
}
?>