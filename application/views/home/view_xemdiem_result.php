<div class="wrapper">
	<div class="searchResult">
		<div class="boxChild">
			<div class="boxContent table-responsive">
				<table>
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã thiếu nhi</th>
							<th>Tên Thánh & Họ tên</th>
							<th>Ngày sinh</th>
							<th width="10%">Xem TN</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if(isset($query) OR $thieunhi=="null"){
					?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php
					}
					else{
						foreach ($thieunhi as $key => $value) {
							$stt=$key+1;
						?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td><?php echo $value['mathieunhi']; ?></td>
								<td><?php echo $value['tenthanh']." ".$value['hoten']; ?></td>
								<td><?php echo $value["ngaysinh"]!=NULL?$value['ngaysinh']:"chưa có thông tin"; ?></td>
								<td><a class="linkView" href="<?php echo base_url(); ?>timkiem/ketqua/<?php echo $value['id_thieunhi'] ?>"><span>Xem</span></a></td>
							</tr>
						<?php
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>