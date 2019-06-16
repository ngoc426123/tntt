<div class="content-wrapper">
    <section class="content-header"><h1>thêm huynh trưởng</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <form class="form-horizontal" method="POST" action="<?php echo base_url("huynhtruong/add"); ?>">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Thông tin cá nhân</h3></div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="tenthanh" class="col-sm-3 control-label">Tên Thánh</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="tenthanh" name="tenthanh" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hovaten" class="col-sm-3 control-label">Họ và tên</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="hovaten" name="hoten" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gioitinh" class="col-sm-3 control-label">Giới tính</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="gioitinh" name="gioitinh">
                                                <option value="0">nữ</option>
                                                <option value="1">nam</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ngaysinh" class="col-sm-3 control-label">Ngày sinh</label>
                                        <div class="col-sm-9"><input type="type" class="form-control date" id="ngaysinh" name="ngaysinh"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ngaybonmang" class="col-sm-3 control-label">Ngày bổn mạng</label>
                                        <div class="col-sm-9"><input type="type" class="form-control date" id="ngaybonmang" name="ngaybonmang"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="diachi" name="diachi"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sodienthoai" class="col-sm-3 control-label">Số điện thoại</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="sodienthoai" name="sodienthoai"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9"><input type="email" class="form-control" id="email" name="email" required></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="caphuynhtruong" class="col-sm-3 control-label">Cấp huynh trưởng</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="caphuynhtruong" name="caphuynhtruong"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="chucvu" class="col-sm-3 control-label">Chức vụ</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" id="chucvu" name="chucvu"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                            <input type="reset" class="btn btn-info" value="Nhập lại">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>