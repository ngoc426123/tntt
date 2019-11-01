<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý phân công</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Phân công năm học</h3></div>
                    <div class="box-body">
                        <form action="<?php echo base_url("phancong/add") ?>" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label for="namhoc" class="col-sm-3 control-label">Năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="namhoc" name="id_namhoc">
                                        <?php 
                                        $this->load->database();
                                        $sql_nh=$this->db->query("SELECT * FROM namhoc ORDER BY tennamhoc");
                                        $result_nh=$sql_nh->result_array();
                                        foreach ($result_nh as $value_nh) {
                                            if($value_nh["id_namhoc"]==$_SESSION["thongtinhuynhtruong"]["id_namhoc"]){
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
                            </div>
                            <div class="form-group">
                                <label for="lopgiaoly" class="col-sm-3 control-label">Lớp giáo lý</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="lopgiaoly" name="id_lopgiaoly">
                                        <?php
                                        foreach ($lopgiaoly as $value_lgl){
                                            ?>
                                            <option value="<?php echo $value_lgl["id_lopgiaoly"] ?>"><?php echo $value_lgl["tenlopgiaoly"] ?></option>  
                                            <?php
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="huynhtruong" class="col-sm-3 control-label">Huynh trưởng</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="huynhtruong" name="id_huynhtruong">
                                        <?php 
                                        foreach ($huynhtruong as $value_ht){
                                            ?>
                                            <option value="<?php echo $value_ht["id_huynhtruong"] ?>"><?php echo $value_ht["tenthanh"]." ".$value_ht["hoten"] ?></option> 
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="huynhtruong" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9"><input type="submit" class="btn btn-success" value="Đồng ý" name="ok"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Thông tin chung</h3></div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="namhoc" class="col-sm-3 control-label">Chọn năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="chonnamhoc" name="namhoc">
                                        <option value="#">--------Chọn Năm Học--------</option>
                                        <?php 
                                        foreach ($namhoc as $value_nh){
                                            ?>
                                            <option value="<?php echo $value_nh["id_namhoc"] ?>"><?php echo $value_nh["tennamhoc"] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="xemphancong">
                            <table class="table table-striped" id="box-table-a">
                                <tr>
                                    <th>Stt</th>
                                    <th>Lớp</th>
                                    <th>Tên Thánh + Họ tên</th>
                                    <th>Hiệu chỉnh</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
