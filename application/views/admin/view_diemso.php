<style type="text/css">
#result_diemso input{
    width: 50px;
    text-align: center;
    padding-right: 0;
}
</style>
<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý điểm số</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <form class="form-horizontal" method="POST" action="<?php echo base_url("diemso/capnhat"); ?>">
                <div class="col-lg-12 col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border"><h3 class="box-title">Danh sách lớp học</h3></div>
                        <div class="box-body table-responsive" id="result_diemso">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4">Thông tin</th>
                                        <th colspan="5" class="text-center">Học kỳ I</th>
                                        <th colspan="5" class="text-center">Học kỳ II</th>
                                        <th rowspan="2">TB Năm</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">STT</th>
                                        <th rowspan="2">Mã thiếu nhi</th>
                                        <th rowspan="2">Họ</th>
                                        <th rowspan="2">Tên</th>
                                        <th>Miệng</th>
                                        <th>15 Phút</th>
                                        <th>45 Phút</th>
                                        <th>Thi</th>
                                        <th>TB</th>
                                        <th>Miệng</th>
                                        <th>15 Phút</th>
                                        <th>45 Phút</th>
                                        <th>Thi</th>
                                        <th>TB</th>
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
                                        $id_phanlop=$value_tn["id_phanlop"];
                                        $id_hoctap=$value_tn["hoctap"]["id_hoctap"];
                                        $this->load->model("model_function");
                                        ?>
                                        <tr>
                                            <td data-cont="stt"><?php echo $key_tn+1; ?>
                                            <input type="hidden" name="flag[]" value="<?php echo $value_tn["hoctap"]["flag"]; ?>">
                                            <input type="hidden" name="id_phanlop[]" value="<?php echo $value_tn["id_phanlop"]; ?>">
                                        </td>
                                        <td data-cont="Mã TN"><?php echo $value_tn['mathieunhi']; ?></td>
                                        <td><?php echo $ho ?></td>
                                        <td><?php echo $name ?></td>
                                        <td data-cont="Miệng_KHI"><input class="form-control" type="number" step="0.01" max="10" size="1" name="dmieng_1[]" value="<?php echo $value_tn["hoctap"]["diemmieng_hk1"]; ?>"></td>
                                        <td data-cont="15 phút_KHI"><input class="form-control" type="number" step="0.01" max="10" size="1" name="d15phut_1[]" value="<?php echo $value_tn["hoctap"]["diem15p_hk1"]; ?>"></td>
                                        <td data-cont="45 phút_KHI"><input class="form-control" type="number" step="0.01" max="10" size="1" name="d45phut_1[]" value="<?php echo $value_tn["hoctap"]["diem45p_hk1"]; ?>"></td>
                                        <td data-cont="Thi_KHI"><input class="form-control" type="number" step="0.01" max="10" size="1" name="dthi_1[]" value="<?php echo $value_tn["hoctap"]["diemthi_hk1"]; ?>"></td>
                                        <td data-cont="TB_HKI"><span class="badge bg-green"><?php echo $value_tn["hoctap"]["trungbinh_hk1"]; ?></span></td>
                                        <td data-cont="Miệng_KHII"><input class="form-control" type="number" step="0.01" max="10" size="1" name="dmieng_2[]" value="<?php echo $value_tn["hoctap"]["diemmieng_hk2"]; ?>"></td>
                                        <td data-cont="15 phút_KHII"><input class="form-control" type="number" step="0.01" max="10" size="1" name="d15phut_2[]" value="<?php echo $value_tn["hoctap"]["diem15p_hk2"]; ?>"></td>
                                        <td data-cont="45 phút_KHII"><input class="form-control" type="number" step="0.01" max="10" size="1" name="d45phut_2[]" value="<?php echo $value_tn["hoctap"]["diem45p_hk2"]; ?>"></td>
                                        <td data-cont="Thi_KHII"><input class="form-control" type="number" step="0.01" max="10" size="1" name="dthi_2[]" value="<?php echo $value_tn["hoctap"]["diemthi_hk2"]; ?>"></td>
                                        <td data-cont="TB_HKII"><span class="badge bg-green"><?php echo $value_tn["hoctap"]["trungbinh_hk2"]; ?></span></td>
                                        <td data-cont="TB_cả năm"><span class="badge bg-red"><?php echo $value_tn["hoctap"]["trungbinh_canam"]; ?></span></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <button type="reset" class="btn btn-info">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</div>