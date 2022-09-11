$(document).ready(function(){
    $(".date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd/mm/yy',
        yearRange: 'c-50:c+50',
        monthNamesShort: ['1', '2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12'],
        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
    });
    $("#chonnamhoc").change(function(){
        var id_namhoc = $(this).val();
        $.ajax({
            url:link_ajax.home_url+'phancong/bangphancong',
            data:{
                'id_namhoc':id_namhoc
            },
            async:false,
            type:'POST',
            success:function(result){
                $("#xemphancong").html(result);
            }
        }); 
    });
    $(".btn-timtim").on("click",function(){
        var mathieunhi=$(this).parents(".input-group").find("input").val();
        $.ajax({
            url:link_ajax.home_url+'thieunhi/show',
            data:{'mathieunhi':mathieunhi},
            async:false,
            type:'POST',
            beforeSend:function(){
                $(".chonthieunhi_result").html("Đang tìm kiếm ...");
            },
            success:function(result){
                if(result==0){
                    $(".chonthieunhi_result").html("Không có em này trong CSDL");
                }
                else{
                    $(".chonthieunhi_result").html(result);
                }
            }
        });
    });
    $('html').on("click",".checkdiemdanh",function(){
        var self=$(this);
        var query=$(self).val();
        if($(this).is(':checked')){
            var link_s=link_ajax.home_url+'diemdanh/add';
        }
        else{
            var link_s=link_ajax.home_url+'diemdanh/del';
        }
        $.ajax({
            url:link_s,
            data:{'query':query},
            type:'POST',
            async:true,
            beforeSend:function(){
                $(self).hide();
            },
            success:function(r){
                $(self).show();
            },
        });
    });
    $("#datatable").DataTable({
        "paging": false,
        "aoColumnDefs": [ { "bSortable": false, "aTargets": [0] } ]
    });
    // BAO CAO
    $(".checkall").click(function(){
        if($(this).is(':checked')){
            $(".checktn").prop("checked",true);
        }
        else{
            $(".checktn").prop("checked",false);
        }
    });
    $(".checktn").click(function(){
        $(".checkall").prop("checked",false);
    });
    $(".btn-indanhsach").click(function(){
        var array_id_thieunhi="";
        $("#table_thieunhi>tbody>tr").each(function(){
            if($(this).find("td:first>input").is(':checked')){
                array_id_thieunhi=array_id_thieunhi+$(this).find("td:first>input").val()+"|";
            }
        });
        if(array_id_thieunhi==""){
            alert("Bạn chưa chọn thiếu nhi nào cả !!!");
        }
        else{
            array_id_thieunhi=array_id_thieunhi.substring(0, array_id_thieunhi.length - 1 );
            $.ajax({
                url:link_ajax.home_url+'baocaoxuat/danhsachlop',
                data:{
                    "array_id_thieunhi" : array_id_thieunhi,
                    "id_lopgiaoly"      : $("#id_lopgiaoly").val(),
                    "lopgiaoly"         : $("#lopgiaoly").val(),
                    "id_namhoc"         : $("#id_namhoc").val(),
                    "namhoc"            : $("#namhoc").val(),
                    "tenhuynhtruong"    : $("#tenhuynhtruong").val(),
                },
                type:"POST",
                async:true,
                beforeSend:function(){
                    $(".btn-indanhsach").addClass("disabled");
                },
                success:function(r){
                    $(".btn-indanhsach").removeClass("disabled");
                    window.location = r;
                },
            });
        }
    });
    $(".btn-indiemso").click(function(){
        var array_id_thieunhi="";
        $("#table_thieunhi>tbody>tr").each(function(){
            if($(this).find("td:first>input").is(':checked')){
                array_id_thieunhi=array_id_thieunhi+$(this).find("td:first>input").val()+"|";
            }
        });
        if(array_id_thieunhi==""){
            alert("Bạn chưa chọn thiếu nhi nào cả !!!");
        }
        else{
            array_id_thieunhi=array_id_thieunhi.substring(0, array_id_thieunhi.length - 1 );
            $.ajax({
                url:link_ajax.home_url+'baocaoxuat/diemso',
                data:{
                    "array_id_thieunhi" : array_id_thieunhi,
                    "id_lopgiaoly"      : $("#id_lopgiaoly").val(),
                    "lopgiaoly"         : $("#lopgiaoly").val(),
                    "id_namhoc"         : $("#id_namhoc").val(),
                    "namhoc"            : $("#namhoc").val(),
                    "tenhuynhtruong"    : $("#tenhuynhtruong").val(),
                },
                type:"POST",
                async:true,
                beforeSend:function(){
                    $(".btn-indiemso").addClass("disabled");
                },
                success:function(r){
                    $(".btn-indiemso").removeClass("disabled");
                    window.location = r;
                },
            });
        }
    });
    $(".btn-indiemdanh").click(function(){
        var array_id_thieunhi="";
        $("#table_thieunhi>tbody>tr").each(function(){
            if($(this).find("td:first>input").is(':checked')){
                array_id_thieunhi=array_id_thieunhi+$(this).find("td:first>input").val()+"|";
            }
        });
        if(array_id_thieunhi==""){
            alert("Bạn chưa chọn thiếu nhi nào cả !!!");
        }
        else{
            array_id_thieunhi=array_id_thieunhi.substring(0, array_id_thieunhi.length - 1 );
            $.ajax({
                url:link_ajax.home_url+'baocaoxuat/diemdanh',
                data:{
                    "array_id_thieunhi" : array_id_thieunhi,
                    "id_lopgiaoly"      : $("#id_lopgiaoly").val(),
                    "lopgiaoly"         : $("#lopgiaoly").val(),
                    "id_namhoc"         : $("#id_namhoc").val(),
                    "namhoc"            : $("#namhoc").val(),
                    "tenhuynhtruong"    : $("#tenhuynhtruong").val(),
                    "thang_from"        : $(".thang_from").val(),
                    "nam_from"          : $(".nam_from").val(),
                    "thang_to"          : $(".thang_to").val(),
                    "nam_to"            : $(".nam_to").val(),
                },
                type:"POST",
                async:true,
                beforeSend:function(){
                    $(".btn-indiemdanh").addClass("disabled");
                },
                success:function(r){
                    $(".btn-indiemdanh").removeClass("disabled");
                    // console.log(r);
                    window.location = r;
                },
            });
        }
    });
    $(".btn-xuatphieudiem").click(function(){
        var array_id_thieunhi="";
        $("#table_thieunhi>tbody>tr").each(function(){
            if($(this).find("td:first>input").is(':checked')){
                array_id_thieunhi=array_id_thieunhi+$(this).find("td:first>input").val()+"|";
            }
        });
        if(array_id_thieunhi==""){
            alert("Bạn chưa chọn thiếu nhi nào cả !!!");
        }
        else{
            array_id_thieunhi=array_id_thieunhi.substring(0, array_id_thieunhi.length - 1 );
            $.ajax({
                url:link_ajax.home_url+'baocaoxuat/xuatphieudiem',
                data:{
                    "array_id_thieunhi" : array_id_thieunhi,
                    "id_lopgiaoly"      : $("#id_lopgiaoly").val(),
                    "lopgiaoly"         : $("#lopgiaoly").val(),
                    "id_namhoc"         : $("#id_namhoc").val(),
                    "namhoc"            : $("#namhoc").val(),
                    "tenhuynhtruong"    : $("#tenhuynhtruong").val(),
                },
                type:"POST",
                async:true,
                beforeSend:function(){
                    $(".btn-xuatphieudiem").addClass("disabled");
                },
                success:function(r){
                    $(".btn-xuatphieudiem").removeClass("disabled");
                    window.location = r;
                },
            });
        }
    });
    $(".btnDelTnHethong").click(function(){
        var id_thieunhi = $(this).attr("data-id-thieunhi");
        $.ajax({
            url:link_ajax.home_url+'thieunhi/showdel',
            data:{"id_thieunhi":id_thieunhi},
            type:'POST',
            success:function(e){
                $("#modal-del-tn").html("");
                $("#modal-del-tn").append(e);
            }
        });
    });
    $(".btn-info-thieunhi").click(function(){
        id_thieunhi = $(this).attr("data-id");
        $.ajax({
            url:link_ajax.home_url+'thieunhi/show_info_thieunhi',
            data:{"id_thieunhi":id_thieunhi},
            type:'POST',
            async:true,
            success:function(e){
                data=JSON.parse(e);
                $("#hoten").text(data.hoten);
                $("#tenthanh").text(data.tenthanh);
                $("#gioitinh").text((data.gioitinh==1)?"Nam":"Nữ");
                $("#ngaysinh").text(data.ngaysinh);
                $("#sdt").text(data.sdt);
                $("#mathieunhi").text(data.mathieunhi);
                $("#diachi").text(data.diachi);
                $("#khugiao").text(data.khugiao);
                $("#tinhtrang").html((data.tinhtrang==1)?'<span class="label label-success">Còn sinh hoạt</span>':'<span class="label label-danger">Nghỉ sinh hoạt</span>');
                $("#ruatoi").text((data.daruatoi==1)?'Ngày '+data.ngayruatoi+' do linh mục '+data.linhmucruatoi+' tại '+data.nhathoruatoi+'':'Chưa rửa tội');
                $("#ruocle").text((data.daruocle==1)?'Ngày '+data.ngayruocle+' do linh mục '+data.linhmucruocle+' tại '+data.nhathoruocle+'':'Chưa rước lễ');
                $("#themsuc").text((data.dathemsuc==1)?'Ngày '+data.ngaythemsuc+' do linh mục '+data.linhmucthemsuc+' tại '+data.nhathothemsuc+'':'Chưa thêm sức');
                $("#hotencha").text(data.tenthanhcha+' '+data.hotencha);
                $("#dienthoaicha").text(data.dienthoaicha);
                $("#hotenme").text(data.tenthanhme+' '+data.hotenme);
                $("#dienthoaime").text(data.dienthoaime);
                // $("#diemmieng_hk1").text(data.diemmieng_hk1);
                // $("#diem15p_hk1").text(data.diem15p_hk1);
                // $("#diem45p_hk1").text(data.diem45p_hk1);
                // $("#diemthi_hk1").text(data.diethi_hk1);
                // $("#trungbinh_hk1").text(data.trungbinh_hk1);
                // $("#diemmieng_hk2").text(data.diemmieng_hk2);
                // $("#diem15p_hk2").text(data.diem15p_hk2);
                // $("#diem45p_hk2").text(data.diem45p_hk2);
                // $("#diemthi_hk2").text(data.diethi_hk2);
                // $("#trungbinh_hk2").text(data.trungbinh_hk2);
                $("#modal-info").modal('show');
            }
        });
    });
    $(".btn-transfer-thieunhi").click(function(){
        id_thieunhi = $(this).attr("data-id-thieunhi");
        id_phanlop = $(this).attr("data-id-phanlop");
        $.ajax({
            url:link_ajax.home_url+'thieunhi/show_info_thieunhi',
            data:{"id_thieunhi":id_thieunhi},
            type:'POST',
            async:true,
            success:function(e){
                data=JSON.parse(e);
                $("#mathieunhi_").text(data.mathieunhi);
                $("#hoten_").text(data.hoten);
                $("#ngaysinh_").text(data.ngaysinh);
                $("#id_thieunhi").val(id_thieunhi);
                $("#id_phanlop").val(id_phanlop);
                $("#modal-transfer").modal('show');
            }
        });
    });
    // TAO KIEM TRA
    // TRAC NGHIEM
    var tmpQuestionTracnghiem = `<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
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
                        </div>`;
    var tmpAnswer = (char) => {
        return `<div class="answer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group mb10">
                            <div class="input-group-addon">`+char+`</div>
                            <input type="text" class="form-control ans" placeholder="Câu trả lời">
                        </div>
                    </div>`
    }
    var get_char_next = (char) => {
        return String.fromCharCode(char.charCodeAt(char.length - 1) + 1);
    }
    $("html").on("click",".add-question-tracnghiem",function(){
        $("#result-tracnghiem-question").append($(tmpQuestionTracnghiem));
    });
    $("html").on("click",".del-question-tracnghiem",function(){
        $(this).parents(".col-lg-4").remove();
    });
    $("html").on("click",".add-answer-tracnghiem",function(){
        let data_answer_text = $(this).parents(".question-tracnghiem").find(".result-tracnghiem-answer  .answer:last-child").find(".input-group-addon").text();
        let next_char = get_char_next(data_answer_text);
        let tmp = tmpAnswer(next_char);
        $(this).parents(".question-tracnghiem").find(".result-tracnghiem-answer").append($(tmp));
    });
    // TU LUAN
    var tmpQuestionTuluan = `<div class="question-tuluan form-group">
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
                            </div>`;
    $("html").on("click",".add-question-tuluan",function(){
        $("#result-tuluan-question").append($(tmpQuestionTuluan));
    });
    $("html").on("click",".del-question-tuluan",function(){
        $(this).parents(".question-tuluan").remove();
    });
    $("html").on("click",".question-tuluan .dropdown-menu li a",function(){
        let count = $(this).attr("data-line");
        $(this).parents(".input-group-btn").removeClass("open");
        $(this).parents(".question-tuluan").find(".line").val(count);
        $(this).parents(".question-tuluan").find(".demo-line").find("div").remove();
        for (var i = count - 1; i >= 0; i--) {
            $(this).parents(".question-tuluan").find(".demo-line").append("<div></div>");
        }
        return false;
    });
    // SUBMIT TAO KIEM TRA
    $("html").on("click",".btn-submit-taokiemtra",function(){
        var data_question = {
            tracnghiem:[],
            tuluan:[]
        };
        let  data_item;
        // GET QUESTION TRAC NGHIEM
        data_item = "";
        $(".question-tracnghiem").each(function(){
            let __ = $(this);
            data_item = {
                cauhoi:"",
                traloi:[],
            }
            data_item.cauhoi = __.find(".qus").val();
            __.find(".ans").each(function(){
                if($(this).val()){
                    data_item.traloi.push($(this).val());
                }
            });
            data_question.tracnghiem.push(data_item);
        });
        //GET QUESTION TU LUAN
        data_item = "";
        $(".question-tuluan").each(function(){
            let __ = $(this);
            data_item = {
                cauhoi:"",
                dong:"",
            }
            data_item.cauhoi = __.find(".qus").val();
            data_item.dong = __.find(".line").val();
            data_question.tuluan.push(data_item);
        });
        // AJAX
        $.ajax({
                url:link_ajax.home_url+'taokiemtra/taofile',
                data:data_question,
                type:"POST",
                async:true,
                beforeSend:function(){
                    $(".btn-submit-taokiemtra").addClass("disabled");
                },
                success:function(r){
                    $(".btn-submit-taokiemtra").removeClass("disabled");
                    console.log(r);
                    // window.location = r;
                },
            });
    });
});