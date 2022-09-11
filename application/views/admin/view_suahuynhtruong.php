<div class="content-wrapper">
    <section class="content-header"><h1>Hiệu chỉnh huynh trưởng</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <form class="form-horizontal" method="POST" action="<?php echo base_url("huynhtruong/edit/{$result['id']}"); ?>">
            <div class="box box-info">
                <div class="box-header with-border"><h3 class="box-title">Thông tin cá nhân</h3></div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="tenthanh" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanh" name="tenthanh" required value="<?php echo $result['tenthanh'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="hovaten" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovaten" name="hoten" required value="<?php echo $result['hoten'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="gioitinh" class="col-sm-3 control-label">Giới tính</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="gioitinh" name="gioitinh">
                                        <?php
                                        if($result["gioitinh"]==1)
                                        {
                                            ?>
                                            <option value="1" selected="selected">Nam</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="1">Nam</option>
                                            <?php 
                                        }
                                        if($result["gioitinh"]==0)
                                        {
                                            ?>
                                            <option value="0" selected="selected">Nữ</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Nữ</option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngaysinh" class="col-sm-3 control-label">Ngày sinh</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaysinh" name="ngaysinh" value="<?php echo $result['ngaysinh'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="ngaybonmang" class="col-sm-3 control-label">Ngày kính</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaybonmang" name="ngaybonmang" value="<?php echo $result['ngaybonmang'] ?>"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $result['diachi'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="sodienthoai" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?php echo $result['sdt'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="email" name="email" value="<?php echo $result['email'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="caphuynhtruong" class="col-sm-3 control-label">Cấp huynh trưởng</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="caphuynhtruong" name="caphuynhtruong" value="<?php echo $result['caphuynhtruong'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="chucvu" class="col-sm-3 control-label">Chức vụ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="chucvu" name="chucvu" value="<?php echo $result['chucvu'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="tinhtrang" class="col-sm-3 control-label">Tình trạng</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="tinhtrang" name="tinhtrang">
                                        <?php
                                        if($result["tinhtrang"]==1)
                                        {
                                            ?>
                                            <option value="1" selected="selected">Còn sinh hoạt</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="1">Còn sinh hoạt</option>
                                            <?php 
                                        }
                                        if($result["tinhtrang"]==0)
                                        {
                                            ?>
                                            <option value="0" selected="selected">Nghỉ sinh hoạt</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Nghỉ sinh hoạt</option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                    <input type="reset" class="btn btn-info" value="Nhập lại">
                </div>
            </div>
        </form>
    </section>
</div>