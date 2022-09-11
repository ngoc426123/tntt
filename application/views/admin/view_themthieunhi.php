<div class="content-wrapper">
    <section class="content-header">
        <h1>Thêm thiếu nhi</h1>
        <small>Lưu ý: Phần này sử dụng để thêm các em chưa có trong CSDL, anh chị huynh trưởng cân nhắc khi sử dụng để khi thêm không bị trùng thiếu nhi.</small>
    </section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <form class="form-horizontal" method="POST" action="<?php echo base_url("thieunhi/add"); ?>">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Thông tin thiếu nhi</h3></div>
                    <div class="box-body">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4 class="text-red">Thông tin cá nhân</h4>
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
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaysinh" name="ngaysinh"></div>
                            </div>
                            <div class="form-group">
                                <label for="ngaybonmang" class="col-sm-3 control-label">Ngày kính</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaybonmang" name="ngaybonmang"></div>
                            </div>
                            <div class="form-group">
                                <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="diachi" name="diachi"></div>
                            </div>
                            <div class="form-group">
                                <label for="sdt" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="sdt" name="sodienthoai"></div>
                            </div>
                            <div class="form-group">
                                <label for="khugiao" class="col-sm-3 control-label">Khu giáo</label>
                                <div class="col-sm-9">
                                    <select  class="form-control" id="khugiao" name="khugiao">
                                    <?php
                                    for ($i=0; $i <= 6; $i++) { 
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="khugiao" class="col-sm-3 control-label">Ghi chú</label>
                                <div class="col-sm-9"><textarea name="ghichu" id="ghichu" class="form-control"></textarea></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <h4 class="text-red">Thông tin cha</h4>
                            <div class="form-group">
                                <label for="tenthanhcha" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanhcha" name="tenthanhcha"></div>
                            </div>
                            <div class="form-group">
                                <label for="hovatencha" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovatencha" name="hotencha"></div>
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="nghenghiepcha" class="col-sm-3 control-label">Nghề nghiệp</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nghenghiepcha" name="nghenghiepcha"></div>
                            </div>
                            <div class="form-group">
                                <label for="dienthoaicha" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="dienthoaicha" name="dienthoaicha"></div>
                            </div>
                            <h4 class="text-red">Thông tin mẹ</h4>
                            <div class="form-group">
                                <label for="tenthanhme" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanhme" name="tenthanhme"></div>
                            </div>
                            <div class="form-group">
                                <label for="hovatenme" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovatenme" name="hotenme"></div>
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="nghenghiepme" class="col-sm-3 control-label">Nghề nghiệp</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nghenghiepme" name="nghenghiepme"></div>
                            </div>
                            <div class="form-group">
                                <label for="dienthoaime" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="dienthoaime" name="dienthoaime"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Thông tin giáo xứ</h3></div>
                    <div class="box-body">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="text-red">Rửa tội</h4>
                            <div class="form-group">
                                <label for="daruatoi" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="daruatoi" name="daruatoi">
                                        <option value="0">Chưa rửa tội</option>
                                        <option value="1">Đã rửa tội</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngayruatoi" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngayruatoi" name="ngayruatoi"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucruatoi" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucruatoi" name="linhmucruatoi"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathoruatoi" class="col-sm-3 control-label">Giáo xứ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathoruatoi" name="nhathoruatoi"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="text-red">Rước lễ</h4>
                            <div class="form-group">
                                <label for="daruocle" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="daruocle" name="daruocle">
                                        <option value="0">Chưa rước lễ</option>
                                        <option value="1">Đã rước lễ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngayruocle" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngayruocle" name="ngayruocle"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucruocle" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucruocle" name="linhmucruocle"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathoruocle" class="col-sm-3 control-label">Giáo xứ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathoruocle" name="nhathoruocle"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="text-red">Thêm sức</h4>
                            <div class="form-group">
                                <label for="dathemsuc" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="dathemsuc" name="dathemsuc">
                                        <option value="0">Chưa thêm sức</option>
                                        <option value="1">Đã thêm sức</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngaythemsuc" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaythemsuc" name="ngaythemsuc"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucthemsuc" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucthemsuc" name="linhmucthemsuc"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathothemsuc" class="col-sm-3 control-label">Giáo xứ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathothemsuc" name="nhathothemsuc"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Khung điều hướng</h3></div>
                    <div class="box-body text-right">
                        <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                        <input type="reset" class="btn btn-info" value="Nhập lại">
                    </div>
                </div>
        </form>
    </section>
</div>
