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
            success:function(){
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
    // $(".btn-info-thieunhi").click(function(){
    //     id_thieunhi = $(this).attr("data-id");
    //     data = JSON.parse($.ajax({
    //         url:link_ajax.home_url+'thieunhi/show_info_thieunhi',
    //         data:{"id_thieunhi":id_thieunhi},
    //         type:'POST',
    //         async:true,
    //     }).responseText);
    //     $("#hoten").text(data.hoten);
    //     $("#tenthanh").text(data.tenthanh);
    //     $("#gioitinh").text((data.gioitinh==1)?"Nam":"Nữ");
    //     $("#ngaysinh").text(data.ngaysinh);
    //     $("#sdt").text(data.sdt);
    //     $("#mathieunhi").text(data.mathieunhi);
    //     $("#diachi").text(data.diachi);
    //     $("#khugiao").text(data.khugiao);
    //     $("#tinhtrang").html((data.tinhtrang==1)?'<span class="label label-success">Còn sinh hoạt</span>':'<span class="label label-danger">Nghỉ sinh hoạt</span>');
    //     $("#ruatoi").text((data.daruatoi==1)?'Ngày '+data.ngayruatoi+' do linh mục '+data.linhmucruatoi+' tại '+data.nhathoruatoi+'':'Chưa rửa tội');
    //     $("#ruocle").text((data.daruocle==1)?'Ngày '+data.ngayruocle+' do linh mục '+data.linhmucruocle+' tại '+data.nhathoruocle+'':'Chưa rước lễ');
    //     $("#themsuc").text((data.dathemsuc==1)?'Ngày '+data.ngaythemsuc+' do linh mục '+data.linhmucthemsuc+' tại '+data.nhathothemsuc+'':'Chưa thêm sức');
    //     $("#hotencha").text(data.tenthanhcha+' '+data.hotencha);
    //     $("#dienthoaicha").text(data.dienthoaicha);
    //     $("#hotenme").text(data.tenthanhme+' '+data.hotenme);
    //     $("#dienthoaime").text(data.dienthoaime);
    //     $("#diemmieng_hk1").text(data.diemmieng_hk1);
    //     $("#diem15p_hk1").text(data.diem15p_hk1);
    //     $("#diem45p_hk1").text(data.diem45p_hk1);
    //     $("#diemthi_hk1").text(data.diethi_hk1);
    //     $("#trungbinh_hk1").text(data.trungbinh_hk1);
    //     $("#diemmieng_hk2").text(data.diemmieng_hk2);
    //     $("#diem15p_hk2").text(data.diem15p_hk2);
    //     $("#diem45p_hk2").text(data.diem45p_hk2);
    //     $("#diemthi_hk2").text(data.diethi_hk2);
    //     $("#trungbinh_hk2").text(data.trungbinh_hk2);
    // });
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
});