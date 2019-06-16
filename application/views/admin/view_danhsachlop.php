<?php
$array_class_info=array(
    "tongso"   => 0,
    "nam"      => 0,
    "nu"       => 0,
    "giaokhu1" => 0,
    "giaokhu2" => 0,
    "giaokhu3" => 0,
    "giaokhu4" => 0,
    "giaokhu5" => 0,
    "giaokhu6" => 0,
);
foreach ($result_tn as $key => $value) {
    $array_class_info["tongso"]++;
    if($value["gioitinh"]==1){
        $array_class_info["nam"]++;
    }
    if($value["gioitinh"]==0){
        $array_class_info["nu"]++;
    }
    if($value["khugiao"]==1){
        $array_class_info["giaokhu1"]++;
    }
    if($value["khugiao"]==2){
        $array_class_info["giaokhu2"]++;
    }
    if($value["khugiao"]==3){
        $array_class_info["giaokhu3"]++;
    }
    if($value["khugiao"]==4){
        $array_class_info["giaokhu4"]++;
    }
    if($value["khugiao"]==5){
        $array_class_info["giaokhu5"]++;
    }
    if($value["khugiao"]==6){
        $array_class_info["giaokhu6"]++;
    }
}
?>
<div class="content-wrapper">
    <section class="content-header"><h1>Danh sách lớp học</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <a href="<?php echo base_url("thieunhi/themdanhsach"); ?>" class="btn btn-primary margin-bottom">Thêm danh sách</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-red">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số</span>
                        <span class="info-box-number"><?php echo $array_class_info["tongso"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-light-blue">
                        <i class="fa fa-mars"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Nam</span>
                        <span class="info-box-number"><?php echo $array_class_info["nam"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-maroon">
                        <i class="fa fa-venus"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Nữ</span>
                        <span class="info-box-number"><?php echo $array_class_info["nu"] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu I</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu1"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu II</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu2"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu III</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu3"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu IV</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu4"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu V</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu5"] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="info-box-icon bg-black-active">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-box-content">Giáo khu VI</span>
                        <span class="info-box-number"><?php echo $array_class_info["giaokhu6"] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách lớp học</h3></div>
                    <div class="box-body table-responsive">         
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã</th>
                                    <th>Tên thánh + họ</th>
                                    <th>Tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Khu giáo</th>
                                    <th>Tình trạng</th>
                                    <th>Hiệu chỉnh</th>
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
                                    <td><?php echo $key_tn+1; ?></td>
                                    <td><?php echo $value_tn['mathieunhi'] ?></td>
                                    <td><?php echo $value_tn['tenthanh']." ".$ho; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $value_tn['ngaysinh'] ?></td>
                                    <td><?php echo $value_tn['gioitinh']==1 ? "nam" : "nữ"; ?></td>
                                    <td><?php echo $value_tn['khugiao'] ?></td>
                                    <td><?php echo $value_tn['tinhtrang']==1 ? "<span class='label label-success'>Còn sinh hoạt</span>" : "<span class='label label-danger'>Nghỉ sinh hoạt<span>"; ?></td>
                                    <td>
                                        <a class="mr pull-left btn btn-xs btn-primary" href="<?php echo base_url("thieunhi/hieuchinh/{$value_tn['id_thieunhi']}");?>"><i class="fa fa-cog"></i></a>
                                        <form action="<?php echo base_url("thieunhi/chuyenlop")?>" method="post">
                                            <input type="hidden" name="id_thieunhi" value="<?php echo $value_tn['id_thieunhi'] ?>">
                                            <input type="hidden" name="id_phanlop" value="<?php echo $value_tn['id_phanlop'] ?>">
                                            <button type="submit" class="mr pull-left btn btn-xs btn-info"><i class="fa fa-refresh"></i></button>
                                        </form>
                                        <button class="btn btn btn-xs btn-default pull-left btn-info-thieunhi" data-id="<?php echo $id_thieunhi; ?>" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade in" id="modal-info">
            <div class="modal-dialog">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username" id="hoten"></h3>
                        <h5 class="widget-user-desc" id="tenthanh"></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="http://newwayjsc.com.vn/themes/web/common/no-avatar.png" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header" id="gioitinh"></h5>
                                    <span class="description-text">Giới tính</span>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header" id="ngaysinh"></h5>
                                    <span class="description-text">Ngày sinh</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header" id="sdt"></h5>
                                    <span class="description-text">SĐT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Mã thiếu nhi</th>
                                <td colspan="4" id="mathieunhi"></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td colspan="4" id="diachi"></td>
                            </tr>
                            <tr>
                                <th>Khu giáo</th>
                                <td colspan="4" id="khugiao">3</td>
                            </tr>
                            <tr>
                                <th>Tình trạng</th>
                                <td colspan="4" id="tinhtrang"></td>
                            </tr>
                            <tr>
                                <th>Rửa tội</th>
                                <td colspan="4" id="ruatoi"></td>
                            </tr>
                            <tr>
                                <th>Rước lễ</th>
                                <td colspan="4" id="ruocle"></td>
                            </tr>
                            <tr>
                                <th>Thêm sức</th>
                                <td colspan="4" id="themsuc"></td>
                            </tr>
                            <tr>
                                <th>Họ tên cha</th>
                                <td colspan="4" id="hotencha"></td>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <td colspan="4" id="dienthoaicha"></td>
                            </tr>
                            <tr>
                                <th>Họ tên mẹ</th>
                                <td colspan="4" id="hotenme"></td>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <td colspan="4" id="dienthoaime"></td>
                            </tr>
                            <!-- <tr class="bg-aqua">
                                <th colspan="5">Học kỳ 1</th>
                            </tr>
                            <tr>
                                <th>Miệng</th>
                                <th>15 phút</th>
                                <th>45 phút</th>
                                <th>Thi</th>
                                <th>Trung bình</th>
                            </tr>
                            <tr>
                                <td id="diemmieng_hk1"></td>
                                <td id="diem15p_hk1"></td>
                                <td id="diem45p_hk1"></td>
                                <td id="diemthi_hk1"></td>
                                <td id="trungbinh_hk1"></td>
                            </tr>
                            <tr class="bg-aqua">
                                <th colspan="5">Học kỳ 2</th>
                            </tr>
                            <tr>
                                <th>Miệng</th>
                                <th>15 phút</th>
                                <th>45 phút</th>
                                <th>Thi</th>
                                <th>Trung bình</th>
                            </tr>
                            <tr>
                                <td id="diemmieng_hk2"></td>
                                <td id="diem15p_hk2"></td>
                                <td id="diem45p_hk2"></td>
                                <td id="diemthi_hk2"></td>
                                <td id="trungbinh_hk2"></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
