<?php
$this->load->database();
$sql_tn=$this->db->query("SELECT * FROM thieunhi WHERE id_thieunhi='$id_thieunhi'");
$result_tn=$sql_tn->row_array();
$mathieunhi=$result_tn["mathieunhi"];
$hoten=$result_tn["tenthanh"]." ".$result_tn["hoten"];
if($result_tn["gioitinh"]==1)
{
	$gioitinh="nam";
}
else
{
	$gioitinh="nữ";
}
$ngaysinh=$result_tn["ngaysinh"];
$diachi=$result_tn["diachi"];
$sodienthoai=$result_tn["sdt"];
$khugiao=$result_tn["khugiao"];
if($result_tn["hotencha"]==""){
	$hotencha="Chưa có thông tin";
}
else{
	$hotencha=$result_tn["tenthanhcha"]." ".$result_tn["hotencha"];
}
if($result_tn["hotenme"]==""){
	$hotenme="Chưa có thông tin";
}
else{
	$hotenme=$result_tn["tenthanhme"]." ".$result_tn["hotenme"];
}

if($result_tn["daruatoi"]==1){
	$ruatoi="Đã rửa tội ngày ".$result_tn["ngayruatoi"]." do linh mục ".$result_tn["linhmucruatoi"]." tại ".$result_tn["nhathoruatoi"];
}
else{
	$ruatoi="Chưa rửa tội";
}
if($result_tn["daruocle"]==1){
	$ruocle="Đã rước lễ lần đầu ngày ".$result_tn["ngayruocle"]." do linh mục ".$result_tn["linhmucruocle"]." tại ".$result_tn["nhathoruocle"];
}
else{
	$ruocle="Chưa rước lễ lần đầu";
}
if($result_tn["dathemsuc"]==1){
	$themsuc="Đã thêm sức ngày ".$result_tn["ngaythemsuc"]." do linh mục ".$result_tn["linhmucthemsuc"]." tại ".$result_tn["nhathothemsuc"];
}
else{
	$themsuc="Chưa thêm sức";
}
?>
<div class="wrapChild">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="boxChild">
					<div class="boxContent">
						<div class="avatar">
							<img src="http://newwayjsc.com.vn/themes/web/common/no-avatar.png" alt="">
						</div>
						<div class="name"><?php echo $hoten; ?></div>
					</div>
					<div class="gridInfo">
						<div class="col">
							<span class="t">Giới tính</span>
							<span class="n"><?php echo $gioitinh; ?></span>
						</div>
						<div class="col">
							<span class="t">Ngày sinh</span>
							<span class="n"><?php echo $ngaysinh; ?></span>
						</div>
					</div>
				</div>
				<div class="boxChild">
					<div class="boxContent">
						<div class="infoChild">
							<div class="info">
								<div class="a">Mã thiếu nhi :</div>
								<div class="s"><?php echo $mathieunhi; ?></div>
							</div>
							<div class="info">
								<div class="a">Khu giáo :</div>
								<div class="s"><?php echo $khugiao; ?></div>
							</div>
							<div class="info">
								<div class="a">Thông tin rửa tội :</div>
								<div class="s"><?php echo $ruatoi; ?></div>
							</div>
							<div class="info">
								<div class="a">Thông tin rước lễ :</div>
								<div class="s"><?php echo $ruocle; ?></div>
							</div>
							<div class="info">
								<div class="a">Thông tin thêm sức :</div>
								<div class="s"><?php echo $themsuc; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-push-8 col-md-push-8">
						<div class="boxChild">
							<div class="boxContent">
								<div class="titleYear">Danh sách năm học</div>
								<div class="desYear">(Chọn để biết kết quả họp tập của năm đó)</div>
								<div class="listYear">
								<?php
								// CHON NAM HOC MOI NHAT
								$sql_namhoc=$this->db->query("SELECT * FROM namhoc ORDER BY id_namhoc");
								$result_namhoc=$sql_namhoc->result_array();
								foreach ($result_namhoc as $value_namhoc) {
								?>
									<div class="myCheckbox">
										<p class="subject"><?php echo $value_namhoc["tennamhoc"]; ?></p>
										<p><span>Chủ đề: </span><?php echo $value_namhoc["chude"]; ?></p>
										<meta content="<?php echo $value_namhoc["id_namhoc"]."|".$result_tn["id_thieunhi"]; ?>">
									</div>
								<?php
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<!--==NẾU CHƯA LOAD AJAX THÌ GHI TẤT CẢ LÀ "NaN"==-->
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-pull-4 col-md-pull-4">
						<div class="boxChild">
							<div class="boxContent">
								<div class="classInfo">
									<ul>
										<li>
											<div class="a">Năm học</div>
											<div class="s"><span id="namhoc">Nan</span></div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="a">Chủ đề</div>
											<div class="s"><span id="chude">NaN</span></div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="a">Lớp</div>
											<div class="s"><span id="lop">NaN</span></div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="a">Đứng lớp</div>
											<div class="s"><span id="dunglop">NaN</span></div>
											<div class="clear"></div>
										</li>
									</ul>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="classHK">Học kỳ I</div>
										<div class="classTable">
											<table class="table table-bordered">
												<tr>
													<td>Miệng</td>
													<td><span id="mieng_1">NaN</span></td>
												</tr>
												<tr>
													<td>15 Phút</td>
													<td><span id="15phut_1">NaN</span></td>
												</tr>
												<tr>
													<td>45 Phút</td>
													<td><span id="45phut_1">NaN</span></td>
												</tr>
												<tr>
													<td>Thi</td>
													<td><span id="thi_1">NaN</span></td>
												</tr>
												<tr>
													<td>Trung bình</td>
													<td><span id="trungbinh_1">NaN</span></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="classHK">Học kỳ II</div>
										<div class="classTable">
											<table class="table table-bordered">
												<tr>
													<td>Miệng</td>
													<td><span id="mieng_2">NaN</span></td>
												</tr>
												<tr>
													<td>15 Phút</td>
													<td><span id="15phut_2">NaN</span></td>
												</tr>
												<tr>
													<td>45 Phút</td>
													<td><span id="45phut_2">NaN</span></td>
												</tr>
												<tr>
													<td>Thi</td>
													<td><span id="thi_2">NaN</span></td>
												</tr>
												<tr>
													<td>Trung bình</td>
													<td><span id="trungbinh_2">NaN</span></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="classHK">Trung bình cả năm</div>
										<div class="classTable">
											<table class="table table-bordered">
												<tr>
													<td>Trung bình</td>
													<td><span id="trungbinh_nam">NaN</span></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="classHK">Chuyên cần</div>
										<div class="classTable">
											<table class="table table-bordered">
												<tr>
													<td>Ngày nghỉ có phép</td>
													<td>Chưa có thông tin</td>
												</tr>
												<tr>
													<td>Ngày nghỉ không phép</td>
													<td>Chưa có thông tin</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>