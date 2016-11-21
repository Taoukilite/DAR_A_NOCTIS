$(document).ready(function(){

    $("#panel-banner").click(function(){
        $(".panel-banner").toggle();

        if($("#glyphicon-banner").hasClass("glyphicon-plus")){
            $("#glyphicon-banner").removeClass("glyphicon-plus");
            $("#glyphicon-banner").addClass("glyphicon-minus");
        }else{
            $("#glyphicon-banner").removeClass("glyphicon-minus");
            $("#glyphicon-banner").addClass("glyphicon-plus");
        }
    });

    $("#panel-gallery").click(function(){
        $(".panel-gallery").toggle();

        if($("#glyphicon-gallery").hasClass("glyphicon-plus")){
            $("#glyphicon-gallery").removeClass("glyphicon-plus");
            $("#glyphicon-gallery").addClass("glyphicon-minus");
        }else{
            $("#glyphicon-gallery").removeClass("glyphicon-minus");
            $("#glyphicon-gallery").addClass("glyphicon-plus");
        }
    });

    $(".dismissible").click(function(){
        $(this).hide(100);
    });
})
