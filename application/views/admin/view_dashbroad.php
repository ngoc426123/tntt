<?php 
$this->load->database();
// namhoc
$id_huynhtruong=$_SESSION["thongtinhuynhtruong"]["id_huynhtruong"];
$namhoc=$_SESSION["thongtinhuynhtruong"]["namhoc"];
$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
// chu de nam hoc
$chude=$_SESSION["thongtinhuynhtruong"]["chudenamhoc"];
// tong so thieu nhi
$sql=$this->db->query("SELECT COUNT(hoten) FROM thieunhi WHERE tinhtrang=1");
$result=$sql->row_array();
$tongsothieunhi=$result["COUNT(hoten)"];
// tong so thieu nhi dang hoc
$sql=$this->db->query("SELECT COUNT(thieunhi.id_thieunhi) FROM thieunhi JOIN phanlop ON thieunhi.id_thieunhi=phanlop.id_thieunhi WHERE phanlop.id_namhoc={$id_namhoc} ORDER BY SUBSTRING(hoten,-LOCATE(' ',REVERSE(thieunhi.hoten)))");
$result=$sql->row_array();
$tongsothieunhi_ol=$result["COUNT(thieunhi.id_thieunhi)"];
// khu giao
for($i=1;$i<=6;$i++){
    $sql=$this->db->query("SELECT COUNT(khugiao) FROM thieunhi WHERE khugiao='$i'");
    $result=$sql->row_array();
    $khugiao[]=$result["COUNT(khugiao)"];
}
// tong so huynh truong
$sql=$this->db->query("SELECT COUNT(*) FROM huynhtruong");
$result=$sql->row_array();
$tongsohuynhtruong=$result["COUNT(*)"];
// tong so huynh truong dang hoat dong
$sql=$this->db->query("SELECT COUNT(*) FROM huynhtruong WHERE tinhtrang=1");
$result=$sql->row_array();
$tongsohuynhtruong_ol=$result["COUNT(*)"];
// so luong lop hoc
$sql_sllh=$this->db->query("SELECT COUNT(*) FROM lopgiaoly");
$result_sllh=$sql_sllh->row_array();
$sllophoc=$result_sllh["COUNT(*)"];
// so luong huynh truong trong lop hoc
$sql=$this->db->query("SELECT COUNT(*) FROM phancong WHERE id_namhoc={$id_namhoc}");
$result=$sql->row_array();
$htlophoc=$result["COUNT(*)"];
// so luong lich su
$sql=$this->db->query("SELECT COUNT(*) FROM lichsu");
$result=$sql->row_array();
$sllichsu=$result["COUNT(*)"];
// so luong lich su cua ban
$sql=$this->db->query("SELECT COUNT(*) FROM lichsu WHERE nguoicapnhat={$id_huynhtruong}");
$result=$sql->row_array();
$sllichsu_you=$result["COUNT(*)"];
// so luong thieu nhi trong lop hoc
$sql_lop=$this->db->query("SELECT * FROM lopgiaoly WHERE id_lopgiaoly NOT IN(1,11,12,13) ORDER BY douutien");
$result_lop=$sql_lop->result_array();
foreach ($result_lop as $value_lop)
{
    $id_lopgiaoly=$value_lop["id_lopgiaoly"];
    $sql_sl=$this->db->query("SELECT COUNT(*) FROM phanlop WHERE id_lopgiaoly='$id_lopgiaoly' AND id_namhoc='$id_namhoc'");
    $result_sl=$sql_sl->row_array();  
    $sql_tenlop=$this->db->query("SELECT * from lopgiaoly WHERE id_lopgiaoly='$id_lopgiaoly'");
    $result_tenlop=$sql_tenlop->row_array();
    $soluonglophoc[]=array($result_tenlop["tenlopgiaoly"],$result_sl["COUNT(*)"]);
}
// nam
$sql_nam=$this->db->query("SELECT COUNT(*) FROM thieunhi WHERE gioitinh='1'");
$result_nam=$sql_nam->row_array();
$slnam=$result_nam["COUNT(*)"];
// nu
$sql_nu=$this->db->query("SELECT COUNT(*) FROM thieunhi WHERE gioitinh='0'");
$result_nu=$sql_nu->row_array();
$slnu=$result_nu["COUNT(*)"];
// ruatoi
$sql_ruatoi=$this->db->query("SELECT COUNT(*) FROM thieunhi WHERE daruatoi='1'");
$result_ruatoi=$sql_ruatoi->row_array();
$slruatoi=$result_ruatoi["COUNT(*)"];
// ruocle
$sql_ruocle=$this->db->query("SELECT COUNT(*) FROM thieunhi WHERE daruocle='1'");
$result_ruocle=$sql_ruocle->row_array();
$slruocle=$result_ruocle["COUNT(*)"];
// themsuc
$sql_themsuc=$this->db->query("SELECT COUNT(*) FROM thieunhi WHERE dathemsuc='1'");
$result_themsuc=$sql_themsuc->row_array();
$slthemsuc=$result_themsuc["COUNT(*)"];
// HUYNH TRUONG
$value_ht = $this->model_huynhtruong->get_value($id_huynhtruong);
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow disabled"><i class="fa fa-clock-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Năm học hiện tại</span>
                        <span class="info-box-number"><?php echo $_SESSION["thongtinhuynhtruong"]["namhoc"]; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-university"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Chủ đề năm học hiện tại</span>
                        <span class="info-box-number"><?php echo $_SESSION["thongtinhuynhtruong"]["chudenamhoc"]; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $tongsothieunhi ?></h3><p>Tổng số thiếu nhi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-mortar-board"></i>
                    </div>
                </div>
                <div class="small-box bg-blue-active">
                    <div class="inner">
                        <h3><?php echo $tongsothieunhi_ol ?></h3><p>Tổng số thiếu nhi</br>đang theo học</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-mortar-board"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $tongsohuynhtruong ?></h3><p>Tổng số huynh trưởng</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-street-view"></i>
                    </div>
                </div>
                <div class="small-box bg-red-active">
                    <div class="inner">
                        <h3><?php echo $tongsohuynhtruong_ol ?></h3><p>Tổng số huynh trưởng</br>đang hoạt động</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-street-view"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $sllophoc; ?></h3><p>Tổng số lớp học</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
                <div class="small-box bg-green-active">
                    <div class="inner">
                        <h3><?php echo $htlophoc; ?></h3><p>Tổng số huynh trưởng</br>trong lớp học</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo $sllichsu; ?></h3><p>Hoạt động của huynh trưởng</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-history"></i>
                    </div>
                </div>
                <div class="small-box bg-orange-active">
                    <div class="inner">
                        <h3><?php echo $sllichsu_you; ?></h3><p>Hoạt động của bạn</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-history"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-ld-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-info">
                            <div class="box-header with-border"><h3 class="box-title">Số lượng thiếu nhi trong khu giáo</h3></div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="bieudokhugiao"></canvas>
                                    <ul class="khugiao hide">
                                        <?php 
                                        foreach ($khugiao as $key => $value) {
                                            ?>
                                            <li>
                                                <p>Khu <?php echo $key+1; ?></p>
                                                <span><?php echo $value ?></span>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thiếu nhi mới nhất</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã TN</th>
                                            <th>Họ tên</th>
                                            <th>Ngày sinh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query=$this->db->query("SELECT mathieunhi,tenthanh,hoten,ngaysinh FROM thieunhi ORDER BY id_thieunhi DESC LIMIT 0,5");
                                        $result=$query->result_array();
                                        foreach ($result as $key => $value) {
                                            $stt=$key+1;
                                            $mtn=$value["mathieunhi"]; 
                                            $ten=$value["tenthanh"]." ".$value["hoten"];
                                            ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $mtn;?></td>
                                                <td><?php echo $ten; ?></td>
                                                <td><?php echo $value["ngaysinh"]; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border"><h3 class="box-title">Tổng quan năm học</h3></div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="bieudothieunhi"></canvas>
                                    <ul class="thieunhi hide">
                                        <li>
                                            <p><?php echo $slnam; ?></p>
                                        </li>
                                        <li>
                                            <p><?php echo $slnu; ?></p>
                                        </li>
                                        <li>
                                            <p><?php echo $slruatoi; ?></p>
                                        </li>
                                        <li>
                                            <p><?php echo $slruocle; ?></p>
                                        </li>
                                        <li>
                                            <p><?php echo $slthemsuc; ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-success">
                            <div class="box-header with-border"><h3 class="box-title">Số lượng thiếu nhi trong một lớp</h3></div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="bieudolophoc"></canvas>
                                    <ul class="lophoc hide">
                                        <?php
                                        foreach ($soluonglophoc as $value) {
                                            ?>
                                            <li>
                                                <p><?php echo $value[0] ?></p>
                                                <span><?php echo $value[1] ?></span>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-ld-3 col-sm-12 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin của bạn</h3>
                    </div>
                    <div class="box-body">
                        <p><strong>Mã huynh trưởng</strong> : <?php echo $_SESSION["thongtinhuynhtruong"]["mahuynhtruong"] ?></p>
                        <p><strong>Họ tên</strong> : <?php echo $_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"] ?></p>
                        <p><strong>Địa chỉ</strong> : <?php echo $value_ht["diachi"] ?></p>
                        <p><strong>Email</strong> : <?php echo $value_ht["email"] ?></p>
                        <p><strong>Số điện thoại</strong> : <?php echo $value_ht["sdt"] ?></p>
                        <p><strong>Thành viên</strong> : <?php echo $_SESSION["thongtinhuynhtruong"]["loaithanhvien_gra"] ?></p>
                        <p><strong>Tình trạng</strong> : <?php echo $_SESSION["thongtinhuynhtruong"]["tinhtrang_gra"] ?></p>
                        <p><strong>Lớp giáo lý</strong> : <?php echo $_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"] ?></p>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Bạn đăng nhập lúc</span>
                        <span class="info-box-number"><?php echo $_SESSION["thongtinhuynhtruong"]["time"] ?></span>
                        <span class="info-box-number"><?php echo $_SESSION["thongtinhuynhtruong"]["day"] ?></span>
                    </div>
                </div>
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Địa chỉ IP của bạn</span>
                        <span class="info-box-number"><?php echo $_SESSION["thongtinhuynhtruong"]["ip"]; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>tmp/plugins/chartjs/Chart.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
// lop hoc
var lophoc_lop = new Array();
var lophoc_soluong = new Array();
$(".lophoc li").each(function(index){
    var lop=$(this).find("p").html();
    var soluong=$(this).find("span").html();
    lophoc_lop.push(lop);
    lophoc_soluong.push(soluong);
});
var lophocData = {
    labels : lophoc_lop, 
    datasets : [
    {
        fillColor : "rgba(31,165,0,1)",
        strokeColor : "rgba(2,85,0,1)",
        highlightFill: "rgba(31,165,0,0.5)",
        highlightStroke: "rgba(2,85,0,0.5)",
        data : lophoc_soluong,
// data : ["10","10","10","10","10","10","10","10","10","10","10","10"],
}
]
}

// khugiao
var khugiao_soluong = new Array();
$(".khugiao li").each(function(index){
    var lop=$(this).find("p").html();
    var soluong=$(this).find("span").html();
    khugiao_soluong.push(soluong);
});
var khugiaoData = [
{
    value: khugiao_soluong[0],
    color: "#f56954",
    highlight: "#f56954",
    label: "Khu I"
},
{
    value: khugiao_soluong[1],
    color: "#00a65a",
    highlight: "#00a65a",
    label: "Khu II"
},
{
    value: khugiao_soluong[2],
    color: "#f39c12",
    highlight: "#f39c12",
    label: "Khu III"
},
{
    value: khugiao_soluong[3],
    color: "#00c0ef",
    highlight: "#00c0ef",
    label: "Khu IV"
},
{
    value: khugiao_soluong[4],
    color: "#3c8dbc",
    highlight: "#3c8dbc",
    label: "Khu V"
},
{
    value: khugiao_soluong[5],
    color: "#d2d6de",
    highlight: "#d2d6de",
    label: "Khu VI"
}
];

// thieu nhi
var thieunhi_soluong = new Array();
$(".thieunhi li").each(function(index){
    var soluong=$(this).find("p").html();
    thieunhi_soluong.push(soluong);
});
var thieunhiData = {
    labels : ["Nam","Nữ","Đã rửa tội","Đã rước lễ","Đã thêm sức"], 
    datasets : [
    {
        fillColor : "rgba(180,0,0,1)",
        strokeColor : "rgba(134,0,0,1)",
        highlightFill: "rgba(180,0,0,0.5)",
        highlightStroke: "rgba(134,0,0,0.5)",
        data : thieunhi_soluong,
    }
    ]
}

var ChartOptions = {
    scaleBeginAtZero: true,
    scaleShowGridLines: true,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    barShowStroke: true,
    barStrokeWidth: 2,
    barValueSpacing: 5,
    barDatasetSpacing: 1,
    responsive: true,
    maintainAspectRatio: false,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
};
ChartOptions.datasetFill = false;

window.onload = function(){
    var khugiao_ctx = document.getElementById("bieudokhugiao").getContext("2d");
    window.myBar = new Chart(khugiao_ctx).Doughnut(khugiaoData, {
        responsive : true,
    });
    var lophoc_ctx = document.getElementById("bieudolophoc").getContext("2d");
    window.myBar = new Chart(lophoc_ctx).Bar(lophocData,ChartOptions);
    var thieunhi_ctx = document.getElementById("bieudothieunhi").getContext("2d");
    window.myBar = new Chart(thieunhi_ctx).Bar(thieunhiData,ChartOptions);
}
});
</script>