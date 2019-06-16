<div class="content-wrapper">
    <section class="content-header">
        <h1>Hiệu chỉnh thiếu nhi</h1>
    </section>
    <section class="content">
         <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <form class="form-horizontal" method="POST" action="<?php echo base_url("thieunhi/edit/{$result["id_thieunhi"]}"); ?>">
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border"><h3 class="box-title">Thông tin gia đình</h3></div>
                        <div class="box-body">
                            <h4 class="text-red">Thông tin cá nhân</h4>
                            <div class="form-group">
                                <label for="tenthanh" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanh" name="tenthanh" value="<?php echo $result['tenthanh']; ?>" required <?php echo ($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]!=1) ? "readonly" : "" ?>></div>
                            </div>
                            <div class="form-group">
                                <label for="hovaten" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovaten" name="hoten" value="<?php echo $result['hoten']; ?>" required <?php echo ($_SESSION["thongtinhuynhtruong"]["loaithanhvien"]!=1) ? "readonly" : "" ?>></div>
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
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaysinh" name="ngaysinh" value="<?php echo $result['ngaysinh']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="ngaybonmang" class="col-sm-3 control-label">Ngày bổn mạng</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaybonmang" name="ngaybonmang" value="<?php echo $result['ngaybonmang']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $result['diachi']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="sdt" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="sdt" name="sodienthoai" value="<?php echo $result['sdt']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="khugiao" class="col-sm-3 control-label">Khu giáo</label>
                                <div class="col-sm-9"><input type="number" class="form-control" id="khugiao" name="khugiao" value="<?php echo $result['khugiao']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="tinhtrang" class="col-sm-3 control-label">Tình trạng</label>
                                <div class="col-sm-9">
                                    <select name="tinhtrang" class="form-control" id="tinhtrang">
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
                            <h4 class="text-red">Thông tin cha</h4>
                            <div class="form-group">
                                <label for="tenthanhcha" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanhcha" name="tenthanhcha" value="<?php echo $result['tenthanhcha']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="hovatencha" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovatencha" name="hotencha" value="<?php echo $result['hotencha']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="nghenghiepcha" class="col-sm-3 control-label">Nghề nghiệp</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nghenghiepcha" name="nghenghiepcha" value="<?php echo $result['nghenghiepcha']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="dienthoaicha" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="dienthoaicha" name="dienthoaicha" value="<?php echo $result['dienthoaicha']; ?>"></div>
                            </div>
                            <h4 class="text-red">Thông tin mẹ</h4>
                            <div class="form-group">
                                <label for="tenthanhme" class="col-sm-3 control-label">Tên Thánh</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="tenthanhme" name="tenthanhme" value="<?php echo $result['tenthanhme']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="hovatenme" class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="hovatenme" name="hotenme" value="<?php echo $result['hotenme']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="nghenghiepme" class="col-sm-3 control-label">Nghề nghiệp</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nghenghiepme" name="nghenghiepme" value="<?php echo $result['nghenghiepme']; ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="dienthoaime" class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="dienthoaime" name="dienthoaime" value="<?php echo $result['dienthoaime']; ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border"><h3 class="box-title">Thông tin giáo xứ</h3></div>
                        <div class="box-body">
                            <h4 class="text-red">Rửa tội</h4>
                            <div class="form-group">
                                <label for="daruatoi" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="daruatoi" name="daruatoi">
                                        <?php
                                        if($result["daruatoi"]==1)
                                        {
                                            ?>
                                            <option value="1" selected="selected">Đã rửa tội</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="1">Đã rửa tội</option>
                                            <?php 
                                        }
                                        if($result["daruatoi"]==0)
                                        {
                                            ?>
                                            <option value="0" selected="selected">Chưa rửa tội</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Chưa rửa tội</option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngayruatoi" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngayruatoi" name="ngayruatoi" value="<?php echo $result["ngayruatoi"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucruatoi" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucruatoi" name="linhmucruatoi" value="<?php echo $result["linhmucruatoi"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathoruatoi" class="col-sm-3 control-label">Nhà thờ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathoruatoi" name="nhathoruatoi" value="<?php echo $result["nhathoruatoi"] ?>"></div>
                            </div>
                            <h4 class="text-red">Rước lễ</h4>
                            <div class="form-group">
                                <label for="daruocle" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="daruocle" name="daruocle">
                                        <?php
                                        if($result["daruocle"]==1)
                                        {
                                            ?>
                                            <option value="1" selected="selected">Đã rước lễ</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="1">Đã rước lễ</option>
                                            <?php 
                                        }
                                        if($result["daruocle"]==0)
                                        {
                                            ?>
                                            <option value="0" selected="selected">Chưa rước lễ</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Chưa rước lễ</option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngayruocle" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngayruocle" name="ngayruocle" value="<?php echo $result["ngayruocle"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucruocle" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucruocle" name="linhmucruocle" value="<?php echo $result["linhmucruocle"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathoruocle" class="col-sm-3 control-label">Nhà thờ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathoruocle" name="nhathoruocle" value="<?php echo $result["nhathoruocle"] ?>"></div>
                            </div>
                            <h4 class="text-red">Thêm sức</h4>
                            <div class="form-group">
                                <label for="dathemsuc" class="col-sm-3 control-label">Xác nhận</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="dathemsuc" name="dathemsuc">
                                        <?php
                                        if($result["dathemsuc"]==1)
                                        {
                                            ?>
                                            <option value="1" selected="selected">Đã thêm sức</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="1">Đã thêm sức</option>
                                            <?php 
                                        }
                                        if($result["dathemsuc"]==0)
                                        {
                                            ?>
                                            <option value="0" selected="selected">Chưa thêm sức</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Chưa thêm sức</option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ngaythemsuc" class="col-sm-3 control-label">Ngày</label>
                                <div class="col-sm-9"><input type="text" class="form-control date" id="ngaythemsuc" name="ngaythemsuc" value="<?php echo $result["ngaythemsuc"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="linhmucthemsuc" class="col-sm-3 control-label">Linh mục</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="linhmucthemsuc" name="linhmucthemsuc" value="<?php echo $result["linhmucthemsuc"] ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="nhathothemsuc" class="col-sm-3 control-label">Nhà thờ</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="nhathothemsuc" name="nhathothemsuc" value="<?php echo $result["nhathothemsuc"] ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border"><h3 class="box-title">Khung điều hướng</h3></div>
                        <div class="box-body text-right">
                            <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                            <input type="reset" class="btn btn-info" value="Nhập lại">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
