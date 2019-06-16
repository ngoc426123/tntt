<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- JQUERY -->
	<script src="<?php echo base_url(); ?>tmp/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>tmp/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>tmp/bootstrap/js/bootstrap.min.js"></script>
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>tmp/plugins/fontawesome/css/font-awesome.min.css"> 
	<!-- STYLE -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>tmp/css/style.css">
	<script type="text/javascript">var ajax_url="<?php echo base_url(); ?>";</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>tmp/script_home.js"></script>
	<title><?php echo $page_title; ?></title>
</head>
<body>
	<?php
	$this->load->view("home/".$view_page);
	?>
	<div class="menuHome">
		<ul>
			<li><a href="<?php echo base_url("index/danhsachhuynhtruong") ?>">Danh sách huynh trưởng</a></li>
			<li><a href="">Diễn đàn thiếu nhi</a></li>
			<li><a href="http://gxphuhoa.org">Trang web giáo xứ</a></li>
		</ul>
	</div>
</body>
</html>