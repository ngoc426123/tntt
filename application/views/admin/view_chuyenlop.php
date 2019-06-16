<div class="content-wrapper">
    <section class="content-header"><h1>Chuyển lớp</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <?php 
                if($_SESSION["thongtinhuynhtruong"]["loaithanhvien"] == 1){
                    ?>
                    <div class="callout callout-warning">
                        <h4>Nhắc nhở</h4>
                        <p>Bạn đang đăng nhập bằng tài khoản quản lý hệ thống, xin đừng quan tâm đến bảng này</p>
                    </div>
                    <?php
                }
                ?>
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách lớp</h3></div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
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
                                        <td><?php echo $key_tn+1; ?></td>
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
                    <div class="box-header with-border"><h3 class="box-title">Thông tin chuyển lớp</h3></div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>Mã Thiếu Nhi</dt><dd class ="text-red"><?php echo $result["mathieunhi"]; ?></dd>
                            <dt>Họ tên</dt><dd><?php echo $result["tenthanh"]." ".$result["hoten"]; ?></dd>
                            <dt>Ngày sinh</dt><dd><?php echo $result["ngaysinh"]; ?></dd>
                        </dl>
                        <form method="POST" action="<?php echo base_url("thieunhi/chuyenlop"); ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="hidden" name="id_thieunhi" value="<?php echo $result['id_thieunhi'] ?>">
                                    <input type="hidden" name="id_phanlop" value="<?php echo $id_phanlop ?>">
                                    <select name="lopgiaoly" class="form-control">
                                        <option value="0">Xóa khỏi danh sách</option>
                                        <?php
                                        $sql_lop=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien");
                                        $result_lop=$sql_lop->result_array();
                                        foreach ($result_lop as $value_lop) {
                                            ?>
                                            <option value="<?php echo $value_lop["id_lopgiaoly"]; ?>"><?php echo $value_lop["tenlopgiaoly"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <span class="input-group-btn"><button type="submit" class="btn btn-success" name="ok">Đồng ý</button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>