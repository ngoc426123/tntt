$(document).ready(function(){
    $(".formSearch button").click(function(){
        var query = $("#goSearch").val();
        $(".formSearch").addClass("rtd");
        $(".searchResult").addClass("rtd");
        $.ajax({
            url:ajax_url+'timkiem',
            type:'POST',
            async:true,
            data:{
                "query":query
            },
            success:function(r){
                $(".searchResult .boxChild .boxContent").html(r);
            }
        });
    });
    $(window).on("keyup",function(event){
        if(event.keyCode==13){
            var query = $("#goSearch").val();
            $(".formSearch").addClass("rtd");
            $(".searchResult").addClass("rtd");
            $.ajax({
                url:ajax_url+'timkiem',
                type:'POST',
                async:true,
                data:{
                    "query":query
                },
                success:function(r){
                    $(".searchResult .boxChild .boxContent").html(r);
                }
            });
        }
    });
    $(".myCheckbox").click(function(){
        $(this).siblings().removeClass("check");
        if(!$(this).hasClass("check")){
            $(this).addClass("check");
        }
        else{
            $(this).removeClass("check");
        }
        var query=$(this).find("meta").attr("content");
        $.ajax({
            url:ajax_url+'timkiem/xemdiem',
            data:{'query':query},
            type:'POST',
            async:false,
            success:function(r){
                var rs = JSON.parse(r);
                $("#dunglop")       .text(rs.dunglop);
                $("#namhoc")        .text(rs.namhoc);
                $("#chude")         .text(rs.chude);
                $("#lop")           .text(rs.tenlop);
                $("#mieng_1")       .text(rs.dmieng_1);
                $("#15phut_1")      .text(rs.d15phut_1);
                $("#45phut_1")      .text(rs.d45phut_1);
                $("#thi_1")         .text(rs.dthi_1);
                $("#trungbinh_1")   .text(rs.dtrungbinh_1);
                $("#mieng_2")       .text(rs.dmieng_2);
                $("#15phut_2")      .text(rs.d15phut_2);
                $("#45phut_2")      .text(rs.d45phut_2);
                $("#thi_2")         .text(rs.dthi_2);
                $("#trungbinh_2")   .text(rs.dtrungbinh_2);
                $("#trungbinh_nam") .text(rs.dtrungbinh_nam);
            }
        });
    });
});