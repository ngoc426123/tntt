<div class="content-wrapper">
    <section class="content-header"><h1>Thêm danh sách</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <form class="form-horizontal" action="<?php echo base_url("quanlylophoc/hieuchinh") ?>" method="post">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Danh sách lớp học</h3></div>
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên lớp học</th>
                                        <th>Độ ưu tiên sắp xếp</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien");
                                    $query=$sql->result_array();
                                    foreach ($query as $key => $result){
                                        $stt=$key++;
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><input type="hidden" name="id_lopgiaoly[]" value="<?php echo $result["id_lopgiaoly"]; ?>"><input class="form-control" type="text" name="tenlopgiaoly[]" value="<?php echo $result["tenlopgiaoly"]; ?>"></td>
                                            <td><input class="form-control" type="text" name="douutien[]" size="5" value="<?php echo $result["douutien"]; ?>"></td>
                                            <td><a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>quanlylophoc/xoa/<?php echo $result["id_lopgiaoly"] ?>"><i class="fa fa-times"></i></a> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer text-right">
                            <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                            <input type="reset" class="btn btn-info" value="Nhập lại">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Thêm lớp học</h3></div>
                    <div class="box-body">
                        <form action="<?php echo base_url() ?>quanlylophoc/them" method="post">
                            <div class="form-group">
                                <label for="tenlopgiaoly" class="control-label">Tên lớp giáo lý</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenlopgiaoly">
                                    <span class="input-group-btn"><input type="submit" class="btn btn-success" value="Đồng ý"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
