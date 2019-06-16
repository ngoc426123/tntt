<style>
.th-cauhinh p {
    margin: 0;
}
.th-cauhinh .phansos {
    display: inline-block;
}
.th-cauhinh .phanso {
    text-align: center;
    padding: 0 7px;
}
.th-cauhinh .tuso {
    border-bottom: solid 1px #000;
}
</style>
<div class="content-wrapper">
    <section class="content-header"><h1>Cấu hình hệ thống</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-s-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#cauhinhhesodiem" data-toggle="tab">Cấu hình hệ số điểm</a></li>
                        <li><a href="#capnhatnamhoc" data-toggle="tab">Cập nhật năm học</a></li>
                        <li><a href="#saoluu" data-toggle="tab">Sao lưu sơ sở dữ liệu</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="cauhinhhesodiem">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-sm-12">
                                    <form method="POST" class="form-horizontal" action="<?php echo base_url("hethong/capnhatheso") ?>">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="title-cauhinh">
                                                    <h4 class="text-red">Hệ số điểm HKI</h4>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm miệng</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_mieng_1" class="form-control" value="<?php echo $heso["heso_mieng_1"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm 15 phút</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_15p_1" class="form-control" value="<?php echo $heso["heso_15p_1"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm 45 phút</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_45p_1" class="form-control" value="<?php echo $heso["heso_45p_1"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm thi</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_thi_1" class="form-control" value="<?php echo $heso["heso_thi_1"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm trung bình</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_tbhk_1" class="form-control" value="<?php echo $heso["heso_tbhk_1"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="title-cauhinh">
                                                    <h4 class="text-red">Hệ số điểm HKII</h4>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm miệng</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_mieng_2" class="form-control" value="<?php echo $heso["heso_mieng_2"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm 15 phút</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_15p_2" class="form-control" value="<?php echo $heso["heso_15p_2"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm 45 phút</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_45p_2" class="form-control" value="<?php echo $heso["heso_45p_2"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm thi</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_thi_2" class="form-control" value="<?php echo $heso["heso_thi_2"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Điểm trung bình</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_tbhk_2" class="form-control" value="<?php echo $heso["heso_tbhk_2"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="title-cauhinh">
                                                    <h4 class="text-red">Hệ số làm tròn</h4>
                                                    <div class="form-group">
                                                        <label class="col-sm-4">Làm tròn</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="heso_lamtron" class="form-control" value="<?php echo $heso["heso_lamtron"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success pull-right">Đồng ý</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="col-md-12 col-sm-12 col-sm-12">
                                    <div class="title-cauhinh">
                                        <h4 class="text-aqua">Hướng dẫn</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-s-12 tt-cauhinh">
                                            <b>a1</b>: hệ số điểm miệng học kỳ I</br>
                                            <b>b1</b>: hệ số điểm kiểm tra 15 phút học kỳ I</br>
                                            <b>c1</b>: hệ số điểm kiểm tra 45 phút học kỳ I</br>
                                            <b>d1</b>: hệ số điểm thi học kỳ I</br>
                                            <b>z1</b>: hệ số điểm trung bình học kỳ I</br>
                                            <b>a2</b>: hệ số điểm miệng học kỳ II</br>
                                            <b>b2</b>: hệ số điểm kiểm tra 15 phút học kỳ II</br>
                                            <b>c2</b>: hệ số điểm kiểm tra 45 phút học kỳ II</br>
                                            <b>d2</b>: hệ số điểm thi học kỳ II</br>
                                            <b>z2</b>: hệ số điểm trung bình học kỳ II</br>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-s-12 th-cauhinh">
                                            <dl>
                                                <dt>Trung bình HKI</dt>
                                                <dd>
                                                    <div class="phansos">
                                                        <p class="phanso tuso">(điểm miệng x <b>a1</b> + điểm 15 phút x <b>b1</b> + điểm 45 phút x <b>c1</b> + điểm thi x <b>d1</b>)</p>
                                                        <p class="phanso mauso">(<b>a1</b>+<b>b1</b>+<b>c1</b>+<b>d1</b>)</p>
                                                    </div>
                                                </dd>
                                            </dl> 
                                            <dl>
                                                <dt>Trung bình HKII</dt>
                                                <dd>
                                                    <div class="phansos">
                                                        <p class="phanso tuso">(điểm miệng x <b>a2</b> + điểm 15 phút x <b>b2</b> + điểm 45 phút x <b>c2</b> + điểm thi x <b>d2</b>)</p>
                                                        <p class="phanso mauso">(<b>a2</b>+<b>b2</b>+<b>c2</b>+<b>d2</b>)</p>
                                                    </div>
                                                </dd>
                                            </dl> 
                                            <dl>
                                                <dt>Trung bình cả năm</dt>
                                                <dd>
                                                    <div class="phansos">
                                                        <p class="phanso tuso">(trung bình học kỳ I x <b>z1</b> + trung bình học kỳ II x <b>z2</b>)</p>
                                                        <p class="phanso mauso">(<b>z1</b>+<b>z2</b>)</p>
                                                    </div>
                                                </dd>
                                            </dl> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="capnhatnamhoc">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Chọn năm học hiện tại, hệ thống sẽ dựa vào lựa chọn này của bạn để cấu hình phân lớp nhiếu nhi (nên chọn năm học tương ứng với năm hiện tại)</p>
                                    <form method="POST" action="<?php echo base_url("hethong/capnhatnamhoc"); ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="" class="col-md-2">Chọn năm học</label>
                                            <div class="col-md-8">
                                                <select class="form-control" id="namhoc" name="id_namhoc">
                                                    <?php 
                                                    $this->load->database();
                                                    $sql_nh=$this->db->query("SELECT * FROM namhoc ORDER BY tennamhoc");
                                                    $result_nh=$sql_nh->result_array();
                                                    foreach ($result_nh as $value_nh){
                                                        if($value_nh["id_namhoc"]==$namhochientai){
                                                            ?>
                                                            <option value="<?php echo $value_nh["id_namhoc"] ?>" selected="selected"><?php echo $value_nh["tennamhoc"]." [".$value_nh["chude"]."]" ?></option>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <option value="<?php echo $value_nh["id_namhoc"] ?>"><?php echo $value_nh["tennamhoc"]." [".$value_nh["chude"]."]" ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success">Đồng ý</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="saoluu">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success" href="<?php echo base_url("hethong/backup"); ?>">sao lưu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>