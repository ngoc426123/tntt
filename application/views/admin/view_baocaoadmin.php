<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $page_title; ?></h1></section>
    <section class="content">
        <form action="" method="post">
        <div class="box box-primary">
            <div class="box-header with-border"><h3 class="box-title">Bộ lọc</h3></div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tên thánh" name="z_tenthanh">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ tên" name="z_hoten">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Năm sinh" name="z_namsinh">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Đường" name="z_duong">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="" name="z_gioitinh">
                                <option value="-1">--Chọn giới tính</option>
                                <option value="0">--Nữ</option>
                                <option value="1">--Nam</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="checkbox"><label for="c1"><input type="checkbox" value="1" name="z_khugiao[]" id="c1">Khu 1</label></div>
                                <div class="checkbox"><label for="c2"><input type="checkbox" value="2" name="z_khugiao[]" id="c2">Khu 2</label></div>
                                <div class="checkbox"><label for="c3"><input type="checkbox" value="3" name="z_khugiao[]" id="c3">Khu 3</label></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="checkbox"><label for="c4"><input type="checkbox" value="4" name="z_khugiao[]" id="c4">Khu 4</label></div>
                                <div class="checkbox"><label for="c5"><input type="checkbox" value="5" name="z_khugiao[]" id="c5">Khu 5</label></div>
                                <div class="checkbox"><label for="c6"><input type="checkbox" value="6" name="z_khugiao[]" id="c6">Khu 6</label></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="checkbox"><label for="c0"><input type="checkbox" value="0" name="z_khugiao[]" id="c0">Ngoài xứ</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <select class="form-control" id="znamhoc" name="zid_namhoc">
                                <option value="0">--Chọn năm học</option>
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
                        <div class="form-group">
                            <select class="form-control" id="zlopgiaoly" name="zid_lopgiaoly">
                                <option value="-1">--Chọn lớp học</option>
                                <?php 
                                $sql_lgl=$this->db->query("SELECT * FROM lopgiaoly ORDER BY douutien");
                                $result_lgl=$sql_lgl->result_array();
                                foreach ($result_lgl as $value_lgl) 
                                {
                                    ?>
                                    <option value="<?php echo $value_lgl["id_lopgiaoly"] ?>"><?php echo $value_lgl["tenlopgiaoly"] ?></option>  
                                    <?php
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Trung bình học kỳ 1 (Chọn lớn hơn bao nhiêu điểm)" name="z_trungbinh1">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Trung bình học kỳ 2 (Chọn lớn hơn bao nhiêu điểm)" name="z_trungbinh2">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Trung bình cả năm (Chọn lớn hơn bao nhiêu điểm)" name="z_trungbinhnam">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label class="control-label">Chọn sắp xếp</label>
                        <div class="radio"><label for="s1"><input checked id="s1" type="radio" name="z_sapxep" value="1">Sắp xếp theo ID</label></div>
                        <div class="radio"><label for="s2"><input id="s2" type="radio" name="z_sapxep" value="2">Sắp xếp theo mã thiếu nhi</label></div>
                        <div class="radio"><label for="s3"><input id="s3" type="radio" name="z_sapxep" value="3">Sắp xếp theo tên</label></div>
                        <div class="radio"><label for="s4"><input id="s4" type="radio" name="z_sapxep" value="4">Sắp xếp theo năm sinh</label></div>
                        <label class="control-label">Chọn thứ tự</label>
                        <div class="radio"><label for="s5"><input checked id="s5" type="radio" name="z_thutu" value="1">Nhỏ đến lớp</label></div>
                        <div class="radio"><label for="s6"><input id="s6" type="radio" name="z_thutu" value="2">Lớn đến nhỏ</label></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Lưu ý : </strong></p>
                        <p>1. Các bộ lọc yêu cầu ghi tiếng việt có dấu</p>
                        <p>2. Lọc nhiều bằng cách ghi các tên và cách nhau bằng dấu phẩu</br>
                        Ví dụ : "Cosma, Lucia, Gioan"</p>
                        <p>3. Mặc định sẽ chọn <strong>năm học hiện tại</strong> để lọc và chỉ lọc các em thiếu nhi <strong>có trong năm học đó</strong></p>
                    </div>
                </div>
            </div>
            <div class="box-footer text-right">
                <button class="btn btn-success" name="loc">Lọc</button>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Danh sách lớp học</h3></div>
                    <div class="box-body table-responsive">
                        <?php
                        if(isset($text_query[0])){
                            echo "<p>Bạn đang lọc</p>";
                            foreach ($text_query as $key => $value) {
                                echo "<span class='badge'>{$value}</span> ";
                            }
                        }
                        ?>
                        <?php
                        if(isset($result_tn)){
                        ?>
                            <input type="hidden" id="id_lopgiaoly" value="<?php echo $id_lopgiaoly ?>">
                            <input type="hidden" id="lopgiaoly" value="<?php echo $lopgiaoly ?>">
                            <input type="hidden" id="id_namhoc" value="<?php echo $id_namhoc ?>">
                            <input type="hidden" id="namhoc" value="<?php echo $namhoc ?>">
                            <input type="hidden" id="tenhuynhtruong" value="<?php echo $tenhuynhtruong ?>">
                        <?php
                        } 
                        ?>
                        <table class="table table-striped" id="table_thieunhi">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="checkall"></th>
                                    <th>Stt</th>
                                    <th>Mã</th>
                                    <th>Tên thánh + họ</th>
                                    <th>Tên</th>
                                    <th>Ngày sinh</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($result_tn)){
                                ?>
                                <tbody>
                                    <?php
                                    foreach ($result_tn as $key_tn => $value_tn) {
                                        $stt = $key_tn + 1;
                                        $id_thieunhi=$value_tn["id_thieunhi"];
                                        $names=$value_tn["hoten"];
                                        $name_shift=explode(" ",$names);
                                        $count_array=count($name_shift)-1;
                                        $name=$name_shift[$count_array];
                                        array_pop($name_shift);
                                        $ho=implode(" ", $name_shift);
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checktn" value="<?php echo $id_thieunhi ?>"></td>
                                            <td><?php echo $stt ?></td>
                                            <td><?php echo $value_tn['mathieunhi'] ?></td>
                                            <td><?php echo $value_tn['tenthanh']." ".$ho; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $value_tn['ngaysinh'] ?></td>
                                        </tr>
                                        <?php 
                                    } 
                                    ?>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">In cái gì giờ ?</h3></div>
                    <div class="box-body">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-danger btn-indanhsach">In danh sách lớp</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-danger btn-indiemso">In danh sách điểm</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-danger btn-xuatphieudiem">Xuất phiếu liên lạc</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>