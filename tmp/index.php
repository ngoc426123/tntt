<?php 
include("module/header.php");
?>
      <div class="content-wrapper">
        <section class="content-header"><h1>trang tổng quan</h1></section>
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>13</h3><p>tổng số huynh trưởng</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-street-view"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3>108</h3><p>tổng số thiếu nhi</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-mortar-board"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>11</h3><p>tổng số lớp học</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>2014-2015</h3><p>yêu thương như giêsu</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-gittip"></i>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border"><h3 class="box-title">Số lượng thiếu nhi trong khu giáo</h3></div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="pieChart" height="230"></canvas>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border"><h3 class="box-title">Tổng quan thiếu nhi</h3></div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart2" height="230"></canvas>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border"><h3 class="box-title">Số lượng thiếu nhi trong một lớp</h3></div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" height="230"></canvas>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </section>
      </div>
<?php
include("module/footer.php");
?>
