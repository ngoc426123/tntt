<?php
class Model_function extends CI_Model{
	public function checklogin($path){
		if (!isset($_SESSION['thongtinhuynhtruong'])){
			 redirect($path);
		}
	}
	public function checkadmin($path){
		$loged_user=$_SESSION['thongtinhuynhtruong'];
		if($loged_user["loaithanhvien"]==0){
			 redirect($path);
		}
	}
	public function location($path){
		//header("Location: $path");  
		echo "<script>window.location.href='$path';</script>";
	}
	public function vn_str($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
       	foreach($unicode as $nonUnicode=>$uni){
        	$str = preg_replace("/($uni)/i", $nonUnicode, $str);
        	$str = preg_replace("/ /i","",$str);
       	}
		return $str;
    }
    public function get_ma($gioitinh){
        $this->load->database();
        $now=getdate();
        $year=$now["year"];
        $year=substr($year,-2);
        $sql=$this->db->query("SELECT * FROM thieunhi ORDER BY id_thieunhi DESC");
        $result=$sql->row_array();
        $ma=$result["mathieunhi"];
        $suren = substr($ma, 2,2);
        if($suren == $year){
            $ma=substr($ma,-3);
            $mamoi=$ma+1;
            $mamoi = str_pad($mamoi, 3,0,STR_PAD_LEFT);
        }
        else{
            $mamoi="001";
        }
        $mamoi="TN".$year.$gioitinh.$mamoi;
        return $mamoi;
    }
}
?>