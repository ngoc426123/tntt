<div class="content-wrapper">
    <section class="content-header"><h1>Lịch sử sử dụng hệ thống</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <?php
                    foreach ($lichsu as $key => $value) {
                        ?>
                        <li>
                            <?php
                            switch ($value["loai"]) {
                                case 1:
                                echo "<i class='fa fa-users bg-green'></i>";
                                break;
                                case 2:
                                echo "<i class='fa fa-street-view bg-red'></i>";
                                break;
                                case 3:
                                echo "<i class='fa fa-table bg-red'></i>";
                                break;
                                case 4:
                                echo "<i class='fa fa-university bg-yellow'></i>";
                                break;
                                case 5:
                                echo "<i class='fa fa-file-text bg-aqua'></i>";
                                break;
                                case 6:
                                echo "<i class='fa fa-home bg-light-blue'></i>";
                                break;
                                case 7:
                                echo "<i class='fa fa-calculator bg-maroon'></i>";
                                break;
                                case 8:
                                echo "<i class='fa fa fa-university bg-green'></i>";
                                break;
                            }
                            ?>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $value["thoigian"]; ?></span>
                                <h3 class="timeline-header"><a><?php echo $value["lichsu"] ?></a></h3>
                                <div class="timeline-body">
                                    <?php echo $value["noidung"]; ?>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
</div>
