<div class="content-wrapper">
    <section class="content-header"><h1>Hiệu chỉnh năm học</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border"><h3 class="box-title">Quản lý năm học</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="<?php echo base_url("namhoc/hieuchinh/{$result_nhl["id_namhoc"]}"); ?>">
                            <div class="form-group">
                                <label for="namhoc" class="col-sm-3 control-label">Năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="namhoc" name="tennamhoc">
                                        <?php
                                        for ($i=2000; $i<=2099 ; $i++) {
                                            $nh_next=$i+1;
                                            $namhoc=$i." - ".$nh_next;
                                            if($namhoc==$result_nhl["tennamhoc"]){
                                                ?>
                                                <option value="<?php echo $namhoc ?>" selected="selected"><?php echo $namhoc ?></option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="<?php echo $namhoc ?>"><?php echo $namhoc ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="chudenamhoc" class="col-sm-3 control-label">Chủ đề năm học</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="chudenamhoc" name="chude" required value="<?php echo $result_nhl["chude"] ?>"></div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border"><h3 class="box-title">Thông tin chung</h3></div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Stt</th>
                                <th>Năm học</th>
                                <th>Chủ đề năm học</th>
                                <th>Hiệu chỉnh</th>
                            </tr>
                            <?php 
                            $this->load->database();
                            $query=$this->db->query("SELECT * FROM namhoc");
                            $result=$query->result_array();
                            foreach ($result as $key => $value) 
                            {
                                ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value["tennamhoc"] ?></td>
                                    <td><?php echo $value["chude"] ?></td>
                                    <td><a class="btn btn-xs btn-block btn-primary" href="<?php echo base_url() ?>namhoc/hieuchinh/<?php echo $value["id_namhoc"]; ?>">Edit</a></td>
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
