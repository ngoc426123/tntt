<div class="content-wrapper">
    <section class="content-header"><h1>Danh sách thiếu nhi</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table class="table table-striped" id="datatable">
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
                            foreach ($res as $key => $result) {
                                $id_thieunhi = $result["id_thieunhi"];
                                $names=$result["hoten"];
                                $name_shift=explode(" ",$names);
                                $count_array=count($name_shift)-1;
                                $name=$name_shift[$count_array];
                                array_pop($name_shift);
                                $ho=implode(" ", $name_shift);
                                ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $result['mathieunhi'] ?></td>
                                    <td><?php echo $result['tenthanh']." ".$ho; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $result['ngaysinh'] ?></td>
                                    <td><?php echo $result['gioitinh']==1 ? "nam" : "nữ"; ?></td>
                                    <td><?php echo $result['khugiao'] ?></td>
                                    <td><?php echo $result['tinhtrang']==1 ? "Còn sinh hoạt" : "Nghỉ sinh hoạt"; ?></td>
                                    <td>
                                        <a class="pull-left mr btn btn-xs btn-primary" href="<?php echo base_url("thieunhi/hieuchinh/{$result['id_thieunhi']}");?>"><i class="fa fa-cog"></i></a>
                                        <a class="pull-left mr btn btn-xs btn-danger btnDelTnHethong" data-id-thieunhi="<?php echo $result['id_thieunhi'] ?>" data-toggle="modal" data-target="#modal-del-tn"><i class="fa fa-times"></i></a>
                                        <button class="btn btn btn-xs btn-default pull-left btn-info-thieunhi" data-id="<?php echo $id_thieunhi; ?>"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>
                                <?php 
                            } 
                            ?>
                            </tbody>
                        </table>
                        <div class="modal modal-danger fade" id="modal-del-tn" style="display: none;"></div>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</div>
