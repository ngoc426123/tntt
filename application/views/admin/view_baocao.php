<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý báo cáo</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách lớp học</h3></div>
                    <div class="box-body table-responsive">
                        <input type="hidden" id="id_lopgiaoly" value="<?php echo $_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"] ?>">
                        <input type="hidden" id="lopgiaoly" value="<?php echo $_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"] ?>">
                        <input type="hidden" id="id_namhoc" value="<?php echo $_SESSION["thongtinhuynhtruong"]["id_namhoc"] ?>">
                        <input type="hidden" id="namhoc" value="<?php echo $_SESSION["thongtinhuynhtruong"]["namhoc"] ?>">
                        <input type="hidden" id="tenhuynhtruong" value="<?php echo $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"] ?>">
                        <table class="table table-striped" id="table_thieunhi">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="checkall"></th>
                                    <th>Mã</th>
                                    <th>Tên thánh + họ</th>
                                    <th>Tên</th>
                                    <th>Ngày sinh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result_tn as $key_tn => $value_tn) {
                                    $id_thieunhi=$value_tn["id_thieunhi"];
                                    $names=$value_tn["hoten"];
                                    $name_shift=explode(" ",$names);
                                    $count_array=count($name_shift)-1;
                                    $name=$name_shift[$count_array];
                                    array_pop($name_shift);
                                    $ho=implode(" ", $name_shift);
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" class="checktn" value="<?php echo $id_thieunhi ?>"></td>
                                        <td><?php echo $value_tn['mathieunhi'] ?></td>
                                        <td><?php echo $value_tn['tenthanh']." ".$ho; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $value_tn['ngaysinh'] ?></td>
                                    </tr>
                                    <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">In danh sách lớp</h3></div>
                    <div class="box-body">
                        <button type="button" class="btn btn-danger btn-indanhsach">Lưu</button>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">In bảng điểm</h3></div>
                    <div class="box-body">
                        <button type="button" class="btn btn-danger btn-indiemso">Lưu</button>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">In bảng điểm danh</h3></div>
                    <div class="box-body">
                        <?php
                        $mon_now=date('m');
                        $year_now=date('Y');
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Từ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Chọn tháng</div>
                                        <select class="form-control thang_from" name="thang_from">
                                            <?php
                                            for ($i=1; $i <= 12; $i++) {
                                            ?>
                                                <option value="<?php echo $i; ?>" <?php echo ($i==$mon_now)?"selected":"" ?>><?php echo $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">Chọn Năm</div>
                                        <select class="form-control nam_from" name="nam_from">
                                            <option value="<?php echo $year_now - 1; ?>"><?php echo $year_now - 1; ?></option>
                                            <option value="<?php echo $year_now; ?>" selected><?php echo $year_now; ?></option>
                                            <option value="<?php echo $year_now + 1; ?>"><?php echo $year_now + 1; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Đến</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Chọn tháng</div>
                                        <select class="form-control thang_to" name="thang_to">
                                            <?php
                                            for ($i=1; $i <= 12; $i++) {
                                            ?>
                                                <option value="<?php echo $i; ?>" <?php echo ($i==$mon_now)?"selected":"" ?>><?php echo $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">Chọn Năm</div>
                                        <select class="form-control nam_to" name="nam_to">
                                            <option value="<?php echo $year_now - 1; ?>"><?php echo $year_now - 1; ?></option>
                                            <option value="<?php echo $year_now; ?>" selected><?php echo $year_now; ?></option>
                                            <option value="<?php echo $year_now + 1; ?>"><?php echo $year_now + 1; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-indiemdanh">Lưu</button>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Xuất phiếu liên lạc</h3></div>
                    <div class="box-body">
                        <button type="button" class="btn btn-danger btn-xuatphieudiem">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
