<?php 
$base_url=base_url();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TNTT->Đăng nhập</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo $base_url; ?>tmp/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $base_url; ?>tmp/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="login-page">
    <div class="loading"></div>
    <div class="login-box">
        <div class="login-logo">
            <b>TNTT</b>Gx.Phuhoa
        </div>
        <div class="login-box-body">
            <div class="alerts"></div>
            <p class="login-box-msg">Đăng nhập để bắt đầu</p>
            <form action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control txt-user" placeholder="Email" />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control txt-pass" placeholder="Password" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" id="btn-login" class="btn btn-primary btn-flat pull-right">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<style type="text/css">
.loadd {
    position: fixed;
    width: 100%;
    background: rgba(0, 0, 0, 0.3);
    height: 100%;
    z-index: 9;
}
.loadd .load {
    position: relative;
    width: 100%;
    height: 100vh;
}
.loadd .load img {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    -oz-transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
}
</style>
<script src="<?php echo $base_url; ?>tmp/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function loading(){
        $("<div class='loadd'><div class='load'><img src='<?php echo base_url(); ?>/tmp/images/loading.gif'></div></div>").appendTo(".loading");
    }
    function loading_end(){
        $(".loading").html("");
    }
    $(document).ready(function(){
        $("#btn-login").click(function(){
            var user=$(".txt-user").val();
            var pass=$(".txt-pass").val();
            $.ajax({
                url:'<?php echo base_url("adminlogin/check"); ?>',
                data:{
                    'username':user,
                    'password':pass
                },
                type:'POST',
                async:true,
                beforeSend:function(){
                    loading();
                },
                success:function(result){
                    $(".alerts").html("");
                    loading_end();
                    if(result==0){
                        console.log("đăng nhập thất bại");
                        var alert="<div class='alerts'>"+
                        "<div class='alert alert-danger alert-dismissable'>"+
                        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
                        "<h4><i class='icon fa fa-ban'></i> Thất bại!</h4>"+
                        "Đăng nhập thất bại, tài khoản hoặc mật khẩu bị sai"+
                        "</div>"+
                        "</div>";
                        $(alert).appendTo(".alerts");
                    }
                    else if(result==2){
                        console.log("bạn đã nghỉ sinh hoạt nên không đăng nhập được");
                        var alert="<div class='alerts'>"+
                        "<div class='alert alert-warning alert-dismissable'>"+
                        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
                        "<h4><i class='icon fa fa-warning'></i> Thất bại!</h4>"+
                        "Bạn được ghi nhận là không còn sinh hoạt nữa nên không đăng nhập hệ thống được"+
                        "</div>"+
                        "</div>";
                        $(alert).appendTo(".alerts");
                    }
                    else if(result==1){
                        console.log("đăng nhập thành công");
                        var alert="<div class='alerts'>"+
                        "<div class='alert alert-success alert-dismissable'>"+
                        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
                        "<h4><i class='icon fa fa-check'></i> Thành công!</h4>"+
                        "Đăng nhập thành công, đợi để chuyển trang."+
                        "</div>"+
                        "</div>";
                        $(alert).appendTo(".alerts");
                        setTimeout(function(){
                            window.location.href='<?php echo base_url("admin"); ?>';
                        },1000);
                    }
                }
            });
        });
    });
</script>
</html>
