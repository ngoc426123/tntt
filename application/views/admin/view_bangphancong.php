<table class="table table-striped" id="box-table-a">
	<thead>
		<tr>
			<th width="20">STT</th>
			<th width="60">Lớp</th>
			<th width="210">Tên thánh +Họ tên</th>
			<th width="70">Hiệu chỉnh</th>
		</tr>
	</thead>
<?php
$this->load->database();
$sql_pc=$this->db->query("SELECT * 
	FROM phancong JOIN lopgiaoly ON phancong.id_lopgiaoly = lopgiaoly.id_lopgiaoly
	WHERE phancong.id_namhoc='$id_namhoc' ORDER BY lopgiaoly.douutien");
$result_pc=$sql_pc->result_array();
foreach ($result_pc as $key_pc => $value_pc) 
{
	$id_huynhtruong=$value_pc["id_huynhtruong"];
	$id_lopgiaoly=$value_pc["id_lopgiaoly"];
	$sql_ht=$this->db->query("SELECT * FROM huynhtruong WHERE id_huynhtruong='$id_huynhtruong'");
	$result_ht=$sql_ht->row_array();
	$hoten=$result_ht["tenthanh"]." ".$result_ht["hoten"];
	$sql_lgl=$this->db->query("SELECT * FROM lopgiaoly WHERE id_lopgiaoly='$id_lopgiaoly'");
	$result_lgl=$sql_lgl->row_array();
	$lopgiaoly=$result_lgl["tenlopgiaoly"];
?>
	<tr>
		<td><?php echo $key_pc+1 ?></td>
		<td><?php echo $lopgiaoly ?></td>
		<td><?php echo $hoten ?></td>
		<td><a href="<?php echo base_url("phancong/suaphancong/{$value_pc["id_phancong"]}") ?>" class="btn btn-xs btn-block btn-primary">Edit</a></td>
	</tr>
<?php
}
?>
</table>