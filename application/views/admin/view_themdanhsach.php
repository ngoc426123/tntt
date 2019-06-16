<div class="content-wrapper">
    <section class="content-header"><h1>thêm danh sách</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-8 col-xs-12">
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
                    <div class="box-header with-border"><h3 class="box-title">Danh sách thiếu nhi</h3></div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="chonthieunhi">Điền mã thiếu nhi</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="chonthieunhi" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn-timtim btn btn-success">Tìm</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="chonthieunhi_result"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
