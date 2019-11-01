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
if(!function_exists("pr")){
	function pr($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}
?>