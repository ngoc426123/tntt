<div class="content-wrapper">
    <section class="content-header"><h1>quản lý Phân công</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <?php 
            $sql_pc=$this->db->query("SELECT * FROM phancong WHERE id_phancong='$id'");
            $result_pc=$sql_pc->row_array();
            ?>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Phân công năm học</h3></div>
                    <div class="box-body">
                        <form action="<?php echo base_url("phancong/edit/{$id}")?>" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label for="namhoc" class="col-sm-3 control-label">Năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="namhoc" name="id_namhoc" disabled="disabled">
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
                                        $sql_lgl=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien");
                                        $result_lgl=$sql_lgl->result_array();
                                        foreach ($result_lgl as $value_lgl) 
                                        {
                                            if($result_pc["id_lopgiaoly"]==$value_lgl["id_lopgiaoly"])
                                            {
                                                ?>
                                                <option value="<?php echo $value_lgl["id_lopgiaoly"] ?>" selected="selected"><?php echo $value_lgl["tenlopgiaoly"] ?></option>  
                                                <?php 
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php echo $value_lgl["id_lopgiaoly"] ?>"><?php echo $value_lgl["tenlopgiaoly"] ?></option>  
                                                <?php
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="huynhtruong" class="col-sm-3 control-label">Huynh trưởng</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="huynhtruong" disabled>
                                        <?php 
                                        $sql_ht=$this->db->query("SELECT * FROM huynhtruong ORDER BY hoten");
                                        $result_ht=$sql_ht->result_array();
                                        foreach ($result_ht as $value_ht) 
                                        {
                                            if($result_pc["id_huynhtruong"]==$value_ht["id_huynhtruong"])
                                            {
                                                ?>
                                                <option value="<?php echo $value_ht["id_huynhtruong"] ?>" selected="selected"><?php echo $value_ht["tenthanh"]." ".$value_ht["hoten"] ?></option> 
                                                <?php 
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php echo $value_ht["id_huynhtruong"] ?>"><?php echo $value_ht["tenthanh"]." ".$value_ht["hoten"] ?></option> 
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        }
                                        ?>  
                                    </select>
                                    <input type="hidden" name="id_huynhtruong" value="<?php echo $result_pc["id_huynhtruong"] ?>">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Đồng ý" name="ok">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box  box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Thông tin chung</h3></div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="namhoc" class="col-sm-3 control-label">Chọn năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="chonnamhoc" name="namhoc">
                                        <option value="#">--------Chọn Năm Học--------</option>
                                        <?php 
                                        $this->load->database();
                                        $sql_nh=$this->db->query("SELECT * FROM namhoc ORDER BY tennamhoc");
                                        $result_nh=$sql_nh->result_array();
                                        foreach ($result_nh as $value_nh) 
                                        {
                                            ?>
                                            <option value="<?php echo $value_nh["id_namhoc"] ?>"><?php echo $value_nh["tennamhoc"] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="xemphancong" style="margin-top:10px; display:block;">
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
