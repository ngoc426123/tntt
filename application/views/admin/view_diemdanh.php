<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý điểm danh</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12" id="alert">
                <div class="callout callout-warning">
                    <h4>Lưu ý</h4>
                    Chỉ điểm danh những thiếu nhi đi vắng ngày hôm đó.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-push-9 col-md-push-9">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Chọn tuần điểm danh</h3></div>
                    <div class="box-body">
                        <form action="<?php echo base_url("diemdanh"); ?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Chọn tháng</div>
                                    <?php
                                    $mon_now=date('m');
                                    $year_now=date('Y');
                                    ?>
                                    <select class="form-control" name="chonthang">
                                        <?php
                                        for ($i=1; $i <= 12; $i++) {
                                            if($mon_now==$i){
                                                ?>
                                                <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Chọn năm</div>
                                    <select class="form-control" name="chonnam">
                                        <?php
                                        for ($i=1970; $i <= 2099; $i++) {
                                            if($year_now==$i){
                                                ?>
                                                <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="ok" type="submit" class="btn btn-success">Chọn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-pull-3 col-md-pull-3">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách điểm danh</h3></div>
                    <div class="box-body table-responsive" id="result_diemso">
                        <?php
                        if(isset($result_tn)){
                            ?>
                            <h3>Tháng <?php echo $thang ?> Năm <?php echo $nam ?></h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã thiếu nhi</th>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <?php
                                        foreach ($sunday as $key => $value) {
                                            ?>
                                            <th><?php echo $value ?></th>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($thang<10){$thang="0".$thang;}
                                    foreach ($result_tn as $key_tn => $value_tn) {
                                        $id_thieunhi=$value_tn["id_thieunhi"];
                                        $names=$value_tn["hoten"];
                                        $name_shift=explode(" ",$names);
                                        $count_array=count($name_shift)-1;
                                        $name=$name_shift[$count_array];
                                        array_pop($name_shift);
                                        $ho=implode(" ", $name_shift);
                                        $id_phanlop=$value_tn["id_phanlop"];
                                        ?>
                                        <tr>
                                            <td><?php echo $key_tn+1; ?></td>
                                            <td><?php echo $value_tn['mathieunhi']; ?></td>
                                            <td><?php echo $ho ?></td>
                                            <td><?php echo $name ?></td>
                                            <?php
                                            foreach ($sunday as $key => $value){
                                                if($value<10){$value="0".$value;}
                                                $ngaythang=$nam."-".$thang."-".$value;
                                                $query_chk=$this->model_diemdanh->get($id_phanlop,$ngaythang);
                                                ?>
                                                <td><input class="checkdiemdanh" type="checkbox" value="<?php echo $id_phanlop."|".$ngaythang ?>" <?php echo ($query_chk==true)?"checked":"" ?>></td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>