<div class="content-wrapper">
    <section class="content-header"><h1>Danh sách huynh trưởng</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <a href="<?php echo base_url("huynhtruong/themhuynhtruong"); ?>" class="btn btn-success margin-bottom">Thêm huynh trưởng</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách huynh trưởng</h3></div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Tên thánh + Hệ tên</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Tình trạng</th>
                                <th>Hiệu chỉnh</th>
                            </tr>
                            <?php
                            $query=$this->db->query("SELECT * FROM huynhtruong ORDER BY mahuynhtruong");
                            $result=$query->result_array();
                            foreach ($result as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo $value['mahuynhtruong'] ?></td>
                                    <td><?php echo $value['tenthanh']." ".$value['hoten'] ?></td>
                                    <td><?php echo $value['ngaysinh'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['tinhtrang']==1 ? "Còn sinh hoạt" : "Nghỉ sinh hoạt"; ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>huynhtruong/hieuchinh/<?php echo $value['id_huynhtruong'] ?>">Edit</a>
                                        <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>hethong/resetpass/<?php echo $value['id_huynhtruong'] ?>">Reset Pass</a>
                                    </td>
                                </tr>
                                <?php
                            } 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
