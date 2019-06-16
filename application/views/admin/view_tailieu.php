<style>
.fa{
    margin-right: 5px;
}
.fa-file-word-o{
    color:#2b5797;
}
.fa-file-excel-o{
    color:#0e733c;
}
.fa-file-powerpoint-o{
    color:#d24625;
}
.fa-file-pdf-o{
    color:#ee4035;
}
.fa-file-text-o{
    color:#333333;
}
</style>
<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $page_title; ?></h1></section>
    <section class="content">
        <div class="box">
            <div class="box-header">Danh sách tài liệu</div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên file</th>
                            <th class="text-right" width="150px">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $files = scandir(FCPATH."document");
                        array_splice($files,0,2);
                        // echo "<pre>";
                        // print_r($files);
                        // echo "</pre>";
                        foreach ($files as $key => $file) {
                            $linkDownload = base_url()."document/".$file;
                            switch (pathinfo($linkDownload)["extension"]) {
                                case 'docx':
                                case 'doc' :
                                    $faVar = "fa-file-word-o";
                                    break;
                                case 'xls' :
                                case 'xlsx' :
                                    $faVar = "fa-file-excel-o";
                                    break;
                                case 'ppt' :
                                case 'pptx' :
                                    $faVar = "fa-file-powerpoint-o";
                                    break;
                                case 'pdf' :
                                    $faVar = "fa-file-pdf-o";
                                    break;
                                default:
                                    $faVar = "fa-file-text-o";
                                    break;
                            }
                        ?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><i class="fa <?php echo $faVar;?>"></i> <?php echo $file; ?></td>
                            <td class="text-right"><a download class="btn btn-danger" href="<?php echo $linkDownload; ?>"><i class="fa fa-download"></i> Download</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
