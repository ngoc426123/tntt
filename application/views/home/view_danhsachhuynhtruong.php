<div class="wrapper">
	<div class="box">
		<div class="box-title">Danh sách huynh trưởng</div>
		<div class="box-content table-responsive">
			<table class="table table-bordered">
            	<tr>
	                <th>STT</th>
	                <th>Tên thánh & Họ tên</th>
	                <th>SĐT</th>
	                <th>Email</th>
             	</tr>
	            <?php
	            foreach ($result as $key => $value) {
		        ?>
	            <tr>
	                <td><?php echo $key+1 ?></td>
	                <td><?php echo $value['tenthanh']." ".$value['hoten'] ?></td>
	                <td><?php echo $value['sdt'] ?></td>
	                <td><?php echo $value['email'] ?></td>
	              </tr>
	            <?php
	            } 
	            ?>
        	</table>
        </div>
	</div>
</div>