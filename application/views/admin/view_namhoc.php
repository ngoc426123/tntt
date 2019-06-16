<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý năm học</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Quản lý năm học</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="<?php echo base_url("namhoc/add"); ?>">
                            <div class="form-group">
                                <label for="namhoc" class="col-sm-3 control-label">Năm học</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="namhoc" name="tennamhoc">
                                        <?php
                                        for($i=2000;$i<=2099;$i++){
                                            $nam_=$i+1;
                                            $nam=$i." - ".$nam_;
                                            ?>
                                            <option value="<?php echo $nam; ?>"><?php echo $nam; ?></option>
                                            <?php
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="chudenamhoc" class="col-sm-3 control-label">Chủ đề năm học</label>
                                <div class="col-sm-9"><input type="text" class="form-control" id="chudenamhoc" name="chude" required></div>
                            </div>
                            <div class="form-group">
                                <label for="chudenamhoc" class="col-sm-3 control-label"></label>
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
                        <table class="table table-striped">
                            <tr>
                                <th>Stt</th>
                                <th>Năm học</th>
                                <th>Chủ đề năm học</th>
                                <th class="text-right">Hiệu chỉnh</th>
                            </tr>
                            <?php 
                            foreach ($result as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value["tennamhoc"] ?></td>
                                    <td><?php echo $value["chude"] ?></td>
                                    <td class="text-right"><a class=" btn btn-sm btn-primary" href="<?php echo base_url("namhoc/hieuchinh/{$value["id_namhoc"]}") ?>">Edit</a></td>
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
