<div class="content-wrapper">
    <section class="content-header"><h1>Thay đổi mật khẩu</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border"><h3 class="box-title">Thay đổi mật khẩu</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="<?php echo base_url("hethong/thaydoimatkhau"); ?>">
                            <div class="form-group">
                                <label for="matkhaucu" class="col-sm-3 control-label">Mật khẩu cũ</label>
                                <div class="col-sm-9"><input type="password" class="form-control" id="matkhaucu" name="matkhaucu" required></div>
                            </div>
                            <div class="form-group">
                                <label for="matkhaumoi" class="col-sm-3 control-label">Mật khẩu mới</label>
                                <div class="col-sm-9"><input type="password" class="form-control" id="matkhaumoi" name="matkhaumoi" required></div>
                            </div>
                            <div class="form-group">
                                <label for="nhaplai" class="col-sm-3 control-label">Nhập lại</label>
                                <div class="col-sm-9"><input type="password" class="form-control" id="nhaplai" name="nhaplai" required></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-block btn-success" value="Đồng ý" name="ok">
                                </div>
                                <div class="col-md-6">
                                    <input type="reset" class="btn btn-block btn-info" value="Nhập lại">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-info box-solid">
                    <div class="box-header with-border"><h3 class="box-title">Hướng dẫn</h3></div>
                    <div class="box-body">
                        <h4 class="text-blue">Hướng dẫn thay đổi mật khẩu</h5>
                            <ol>
                                <li>Mật khẩu vui lòng từ 8-32 ký tự bao gồm cả số và ký tự. Có thể sử dụng các ký tự đặc biệt như @,!,$,^ ..vv..vv.. nhưng sẽ khó khăn trong việc thay đổi mật khẩu</li>
                                <li>Không chia sẽ mật khẩu của mình cho bất cứ ai (có thể loại trừ các tông đồ hoặc dự trưởng chung lớp để chia sẽ việc quản lý)</li>
                                <li>Điền đầy đủ thông tin để thay đổi mật khẩu, phần nhập lại phải giống với phần mật khẩu mới</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
