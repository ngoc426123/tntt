<?php
if(!function_exists("alert")){
	function alert($type="success",$title="Thông báo",$content="Lorem ipsum"){
		switch ($type){
			case "success" : 
				$icon="fa-check";
				break;
			case "info" : 
				$icon="fa-info";
				break;
			case "warning" : 
				$icon="fa-warning";
				break;
			case "danger" : 
				$icon="fa-ban";
				break;
		}
		?>
			<div class="alert alert-<?php echo $type; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            	<h4><i class="icon fa <?php echo $icon; ?>"></i> <?php echo $title; ?></h4>
                <?php echo $content; ?>
             </div>
		<?php
	}
}
if(!function_exists("checklogin")){
	function checklogin(){
		if(!isset($_COOKIE["adminAuthen"])){
			redirect("admin/login");
		}
	}
	function checklogin_login(){
		if(isset($_COOKIE["adminAuthen"])){
			redirect("admin/dashbroad");
		}
	}
}
if(!function_exists("pr")){
	function pr($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}
if(!function_exists("vnstr")){
    function vnstr($str){
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "a", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "e", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "i", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "o", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "u", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "y", $str);
        $str = preg_replace("/(Đ)/", "d", $str);
        $str = preg_replace("/( |_|,)/", "-", $str);
        $str = preg_replace("/(')/", "", $str);
		return $str;
	}
}
if(!function_exists("checklogin")){
	function checklogin(){
		if(!isset($_COOKIE["adminAuthen"])){
			redirect("admin/login");
		}
	}
	function checklogin_login(){
		if(isset($_COOKIE["adminAuthen"])){
			redirect("admin/dashbroad");
		}
	}
}
if(!function_exists("cutstring")){
	function cutstring($noidung,$num){
	$limit = $num - 1 ;
	    $str_tmp = '';
	    $arrstr = explode(" ", $noidung);
	    if ( count($arrstr) <= $num ) { return $noidung; }
	    if (!empty($arrstr))
	    {
	        for ( $j=0; $j< count($arrstr) ; $j++)
	        {
	            $str_tmp .= " " . $arrstr[$j];
	            if ($j == $limit)
	            {  break; }
	        }
	    }
	    return $str_tmp.'...';
	}  
}
if(!function_exists("cmoney")){
	function cmoney($number){
		$CI = get_instance();
		$cc = $CI->model_option->get_by_item("perfix_money");
		return number_format($number,0,'','.').' '.$cc;
	}
}
?>