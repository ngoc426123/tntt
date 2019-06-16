<?php
// echo "<pre>";
// print_r($_SESSION["thongtinhuynhtruong"]);
// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TNTT [ <?php echo $page_title; ?> ]</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url(); ?>tmp/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>tmp/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>tmp/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>tmp/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>tmp/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>tmp/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tmp/dist/css/cssaddon.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body class="skin-blue sidebar-mini">   
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url(""); ?>admin" class="logo"><span class="logo-lg">TNTT Gx.Phú Hòa</span></a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-history"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <?php
                                        $query=$this->db->query("SELECT * FROM lichsu ORDER BY id_lichsu DESC LIMIT 0,5");
                                        $result=$query->result_array();
                                        foreach ($result as $key => $value) {
                                            ?>
                                            <li><a>
                                                    <?php
                                                    switch ($value["loai"]) {
                                                        case 1:
                                                        echo "<i class='fa fa-users text-green'></i>";
                                                        break;
                                                        case 2:
                                                        echo "<i class='fa fa-street-view text-red'></i>";
                                                        break;
                                                        case 3:
                                                        echo "<i class='fa fa-table text-red'></i>";
                                                        break;
                                                        case 4:
                                                        echo "<i class='fa fa-university text-yellow'></i>";
                                                        break;
                                                        case 5:
                                                        echo "<i class='fa fa-file-text text-aqua'></i>";
                                                        break;
                                                        case 6:
                                                        echo "<i class='fa fa-home text-light-blue'></i>";
                                                        break;
                                                        case 7:
                                                        echo "<i class='fa fa-calculator text-red'></i>";
                                                        break;
                                                        case 8:
                                                        echo "<i class='fa fa fa-university text-green'></i>";
                                                        break;
                                                    }
                                                    echo $value["lichsu"];
                                                    ?>
                                            </a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?php echo base_url("lichsu"); ?>">Xem tất cả</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $_SESSION["thongtinhuynhtruong"]["avatar"]!=NULL?base_url()."tmp/upload/".$_SESSION["thongtinhuynhtruong"]["avatar"]:base_url()."tmp/upload/noavatar.png" ?>" class="user-image" alt="User Image" />
                                <span class="hidden-xs"><?php echo $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo $_SESSION["thongtinhuynhtruong"]["avatar"]!=NULL?base_url()."tmp/upload/".$_SESSION["thongtinhuynhtruong"]["avatar"]:base_url()."tmp/upload/noavatar.png" ?>" class="img-circle" alt="User Image" />
                                    <p><?php echo $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"] ?>
                                    <?php 
                                    if($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]==0){
                                        ?>
                                        <small>Đang đứng lớp <?php echo $_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"] ?></small>
                                        <?php
                                    }
                                    ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url("hethong/thaydoimatkhau"); ?>" class="btn btn-default btn-flat">Thay đổi mật khẩu</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url("adminlogin/logout"); ?>" class="btn btn-default btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $_SESSION["thongtinhuynhtruong"]["avatar"]!=NULL?base_url()."tmp/upload/".$_SESSION["thongtinhuynhtruong"]["avatar"]:base_url()."tmp/upload/noavatar.png" ?>" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"] ?></p>
                        <a>Đang đứng lớp <?php echo $_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"] ?></a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header">BẢNG ĐIỀU KHIỂN</li>
                    <?php 
                    if($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]==0){
                    ?>
                        <li><a href="<?php echo base_url("thieunhi/danhsachlop"); ?>">
                            <i class="fa fa-mortar-board"></i> <span>Danh sách lớp</span>
                        </a></li>
                        <li><a href="<?php echo base_url("diemso"); ?>">
                            <i class="fa fa-leanpub"></i> <span>Quản lý điểm số</span>
                        </a></li>
                        <li><a href="<?php echo base_url("diemdanh"); ?>">
                            <i class="fa fa-table"></i> <span>Quản lý điểm danh</span>
                        </a></li>
                        <li><a href="<?php echo base_url("baocao"); ?>">
                            <i class="fa fa-files-o"> </i><span>Báo cáo</span>
                        </a></li>
                    <?php
                    }
                    if($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]==1){
                    ?>
                        <li><a href="<?php echo base_url("quanlylophoc"); ?>">
                            <i class="fa fa-home"></i><span>Quản lý lớp học</span>
                        </a></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Quản lý thiếu nhi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url("thieunhi/themthieunhi"); ?>"><i class="fa fa-circle-o"></i> Thêm thiếu nhi</a></li>
                                <li><a href="<?php echo base_url("quanlythieunhi/danhsachthieunhi"); ?>"><i class="fa fa-circle-o"></i> Danh sách thiếu nhi</a></li>
                                <li><a href="<?php echo base_url("quanlythieunhi/danhsachdiem"); ?>"><i class="fa fa-circle-o"></i> Danh sách điểm</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url("namhoc"); ?>">
                            <i class="fa fa-university"></i><span>Quản lý năm học</span>
                        </a></li>
                        <li><a href="<?php echo base_url("phancong"); ?>">
                            <i class="fa fa-file-text"></i><span>Phân công năm học</span>
                        </a></li>
                        <li><a href="<?php echo base_url("baocaoadmin"); ?>">
                            <i class="fa fa-database"></i> <span>Báo cáo</span>
                        </a></li>
                        <li><a href="<?php echo base_url("huynhtruong"); ?>">
                            <i class="fa fa-street-view"></i><span>Huynh trưởng</span>
                        </a></li>
                    <?php
                    }
                    ?>
                    <li><a href="<?php echo base_url("tailieu"); ?>">
                            <i class="fa fa-file"></i> <span>Tài liệu</span>
                    </a></li>
                    <li>
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>Hệ thống</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url("hethong/thaydoimatkhau"); ?>"><i class="fa fa-circle-o"></i> Thay đổi mật khẩu</a></li>
                            <li><a href="<?php echo base_url("hethong/hinhdaidien"); ?>"><i class="fa fa-circle-o"></i> Hình đại diện</a></li>
                            <?php 
                            if($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]==1){
                                ?>
                                <li><a href="<?php echo base_url("hethong/cauhinhhethong"); ?>"><i class="fa fa-circle-o"></i> Cấu hình hệ thống</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <?php
        $this->load->view('admin/'.$view_page);
        ?>
    </div>
</body>
<script src="<?php echo base_url(); ?>tmp/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>tmp/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>tmp/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>tmp/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>tmp/dist/js/app.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var link_ajax={"home_url":"<?php echo base_url(); ?>"}
</script>
<script src="<?php echo base_url(); ?>tmp/script.js" type="text/javascript"></script>
</html>
