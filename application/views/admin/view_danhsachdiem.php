<div class="content-wrapper">
    <section class="content-header"><h1>Danh sách điểm</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-danger">
                    <div class="box-header with-border"><h3 class="box-title">Phân loại</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" action="<?php echo base_url("quanlythieunhi/danhsachdiem") ?>" method="post">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="lopgiaoly">Lọc theo lớp học</label>
                                <div class="col-md-10"><select class="form-control" name="id_lopgiaoly">
                                    <option value="#">Chọn lớp học</option>
                                    <?php
                                    $sql=$this->db->query("SELECT * FROM lopgiaoly ORDER BY id_lopgiaoly");
                                    $query=$sql->result_array();
                                    foreach($query as $value){
                                        ?>
                                        <option value="<?php echo $value["id_lopgiaoly"]; ?>"><?php echo $value["tenlopgiaoly"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select></div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <input type="submit" name="ok" class="btn btn-success" value="Lọc">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title"><?php echo $query_ti ?></h3></div>
                    <div class="box-body table-responsive">
                        <?php 
                        if($result_pl=="0"){
                            echo "NULL";
                        }
                        else{
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã thiếu nhi</th>
                                        <th>Tên Thánh</th>
                                        <th>Họ</th>
                                        <th>Tên</th>
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
                                        <th>TB Năm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result_pl as $key_pl => $value_pl) {
                                        $id_thieunhi=$value_pl["id_thieunhi"];
                                        $tenthanh=$value_pl["tenthanh"];
                                        $names=$value_pl["hoten"];
                                        $name_shift=explode(" ",$names);
                                        $count_array=count($name_shift)-1;
                                        $name=$name_shift[$count_array];
                                        array_pop($name_shift);
                                        $ho=implode(" ", $name_shift);

                                        $id_phanlop=$value_pl["id_phanlop"];
                                        $sql_ht=$this->db->query("SELECT * FROM hoctap WHERE id_phanlop='$id_phanlop'");
                                        if($sql_ht->num_rows()>0)
                                        {
                                            $result_ht=$sql_ht->row_array();
                                            $id_hoctap=$result_ht["id_hoctap"];
                                            $this->load->model("model_function");
                                            ?>
                                            <tr>
                                                <td><?php echo $key_pl+1; ?></td>
                                                <td><?php echo $value_pl['mathieunhi']; ?></td>
                                                <td><?php echo $tenthanh ?></td>
                                                <td><?php echo $ho ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $result_ht["diemmieng_hk1"]; ?></td>
                                                <td><?php echo $result_ht["diem15p_hk1"]; ?></td>
                                                <td><?php echo $result_ht["diem45p_hk1"]; ?></td>
                                                <td><?php echo $result_ht["diemthi_hk1"]; ?></td>
                                                <td><span class="badge bg-green"><?php echo $result_ht["trungbinh_hk1"]; ?></span></td>
                                                <td><?php echo $result_ht["diemmieng_hk2"]; ?></td>
                                                <td><?php echo $result_ht["diem15p_hk2"]; ?></td>
                                                <td><?php echo $result_ht["diem45p_hk2"]; ?></td>
                                                <td><?php echo $result_ht["diemthi_hk2"]; ?></td>
                                                <td><span class="badge bg-green"><?php echo $result_ht["trungbinh_hk2"]; ?></span></td>
                                                <td><span class="badge bg-red"><?php echo $result_ht["trungbinh_canam"]; ?></span></td>
                                            </tr>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $key_pl+1; ?></td>
                                                <td><?php echo $value_pl['mathieunhi']; ?></td>
                                                <td><?php echo $ho ?></td>
                                                <td><?php echo $name ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
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
        </form>
    </div>
</section>
</div>
