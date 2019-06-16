<?php 
$days_in_month = date('t',mktime(0,0,0,$thang,1,$nam));
for($i=1;$i<=$days_in_month;$i++){
    if(date('N',mktime(0,0,0,$thang,$i,$nam))==7){
        $sunday[]=$i;
    }
}
?>
<h3>Tháng <?php echo $thang ?> Năm <?php echo $nam ?></h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã thiếu nhi</th>
            <th>Họ</th>
            <th>Tên</th>
            <?php
            foreach ($sunday as $key => $value) {
                ?>
                <th><?php echo $value ?></th>
                <?php
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $this->load->database();
        $id_namhoc=$loged_user["id_namhoc"];
        $id_lopgiaoly=$loged_user["id_lopgiaoly"];
        $sql_tn=$this->db->query("SELECT * FROM phanlop JOIN thieunhi ON phanlop.id_thieunhi = thieunhi.id_thieunhi WHERE phanlop.id_namhoc='$id_namhoc' AND phanlop.id_lopgiaoly='$id_lopgiaoly' ORDER BY SUBSTRING(thieunhi.hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))");
        $result_tn=$sql_tn->result_array();
        if($thang<10){$thang="0".$thang;}
        foreach ($result_tn as $key_tn => $value_tn) 
        {
            $id_thieunhi=$value_tn["id_thieunhi"];
            $names=$value_tn["hoten"];
            $name_shift=explode(" ",$names);
            $count_array=count($name_shift)-1;
            $name=$name_shift[$count_array];
            array_pop($name_shift);
            $ho=implode(" ", $name_shift);
            $id_phanlop=$value_tn["id_phanlop"];
            ?>
            <tr>
                <td><?php echo $key_tn+1; ?></td>
                <td><?php echo $value_tn['mathieunhi']; ?></td>
                <td><?php echo $ho ?></td>
                <td><?php echo $name ?></td>
                <?php
                foreach ($sunday as $key => $value){
                    if($value<10){$value="0".$value;}
                    $ngaythang=$nam."-".$thang."-".$value;
                    $query_chk=$this->db->query("SELECT * FROM chuyencan WHERE id_phanlop='$id_phanlop' AND ngaynghi='$ngaythang'");
                    if($query_chk->num_rows()>0)
                    {
                        ?>
                        <td><input class="checkdiemdanh" type="checkbox" value="<?php echo $id_phanlop."|".$ngaythang ?>" checked></td>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td><input class="checkdiemdanh" type="checkbox" value="<?php echo $id_phanlop."|".$ngaythang ?>" ></td>
                        <?php
                    }
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>