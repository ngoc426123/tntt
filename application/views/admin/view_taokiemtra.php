<style type="text/css">
.row{
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
}
.row:after,
.row:before{
    display: none;
}
.mb10{
    margin-bottom: 10px;
}
label{
    display: block;
    pointer-events: none;
}
label .btn{
    pointer-events: auto;
}
textarea{
    resize: none;
}
.demo-line div{
    display: block;
    height: 22px;
    border-bottom: dashed 1px rgba(0,0,0,0.15);
}
</style>
<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $page_title ?></h1></section>
    <section class="content">
        <?php if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);} ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Phần trắc nghiệm</h3>
                <div class="box-tools">
                    <button class="btn btn-box-tool add-question-tracnghiem"><i class="fa fa-plus"></i> Thêm câu hỏi</button>
                </div>
            </div>
            <div class="box-body">
                <div class="row" id="result-tracnghiem-question">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="question-tracnghiem form-group">
                            <label>
                                Câu hỏi
                                <button class="btn btn-box-tool add-answer-tracnghiem"><i class="fa fa-plus"></i></button>
                                <button class="btn btn-box-tool del-question-tracnghiem"><i class="fa fa-times"></i></button>
                            </label>
                            <div class="row result-tracnghiem-answer">
                                <div class="answer col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control mb10 qus" name="" id="" placeholder="Câu hỏi"></textarea>
                                </div>
                                <div class="answer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-group mb10">
                                        <div class="input-group-addon">a</div>
                                        <input type="text" class="form-control ans" placeholder="Câu trả lời">
                                    </div>
                                </div>
                                <div class="answer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-group mb10">
                                        <div class="input-group-addon">b</div>
                                        <input type="text" class="form-control ans" placeholder="Câu trả lời">
                                    </div>
                                </div>
                                <div class="answer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-group mb10">
                                        <div class="input-group-addon">c</div>
                                        <input type="text" class="form-control ans" placeholder="Câu trả lời">
                                    </div>
                                </div>
                                <div class="answer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-group mb10">
                                        <div class="input-group-addon">d</div>
                                        <input type="text" class="form-control ans" placeholder="Câu trả lời">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Phần Tự luận</h3>
                <div class="box-tools">
                    <button class="btn btn-box-tool add-question-tuluan"><i class="fa fa-plus"></i> Thêm câu hỏi</button>
                </div>
            </div>
            <div class="box-body">
                <div id="result-tuluan-question">
                    <div class="question-tuluan form-group">
                        <label>
                            Câu hỏi
                            <button class="btn btn-box-tool del-question-tuluan"><i class="fa fa-times"></i></button>
                        </label>
                        <div class="input-group mb10">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Dòng trả lời <span class="fa fa-caret-down"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="" data-line="1">1 dòng</a></li>
                                    <li><a href="" data-line="2">2 dòng</a></li>
                                    <li><a href="" data-line="3">3 dòng</a></li>
                                    <li><a href="" data-line="41">4 dòng</a></li>
                                    <li><a href="" data-line="5">5 dòng</a></li>
                                    <li><a href="" data-line="6">6 dòng</a></li>
                                    <li><a href="" data-line="7">7 dòng</a></li>
                                    <li><a href="" data-line="8">8 dòng</a></li>
                                    <li><a href="" data-line="9">9 dòng</a></li>
                                    <li><a href="" data-line="10">10 dòng</a></li>
                                </ul>
                            </div>
                            <input type="text" class="form-control qus" placeholder="Câu hỏi">
                            <input type="hidden" class="line" value="3">
                        </div>
                        <div class="demo-line">
                            <div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-footer text-right">
                <button type="submit" class="btn btn-success btn-submit-taokiemtra">Tạo kiểm tra</button>
            </div>
        </div>
    </div>
</section>
</div>