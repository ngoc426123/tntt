<div class="content-wrapper">
    <section class="content-header"><h1>Quản lý hình đại diện</h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Quản lý hình</h3></div>
                    <div class="box-body">
                        <form method="post" action="<?php echo base_url("hethong/upload"); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="hinhdaidien" accept="image/*">
                            </div>
                            <input type="submit" class="btn btn-block btn-success" value="Upload" name="ok">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-info box-solid">
                    <div class="box-header with-border"><h3 class="box-title">Xin lưu ý</h3></div>
                    <div class="box-body">
                        <h4 class="text-blue">Lưu ý</h5>
                            <ol>
                                <li>Hình đại diện không quá kích cỡ 1000x1000 px</li>
                                <li>Hình đại diện không quá 1024Kb ~ 1Mb</li>
                                <li>Khi cập nhật hình đại diện, hình đại diện cũ sẽ mất, vì thế vui lòng đăng nhập lại để hệ thống cập nhật lại.</li>
                                <li>Phần hình đại diện mới chỉ là bước demo, xin nhận góp ý từ người dùng.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
