$(document).ready(function(){

    $(".panel-view").click(function(){
        $(".panel-body-view").toggle();

        if($("#glyphicon-view").hasClass("glyphicon-plus")){
            $("#glyphicon-view").removeClass("glyphicon-plus");
            $("#glyphicon-view").addClass("glyphicon-minus");
        }else{
            $("#glyphicon-view").removeClass("glyphicon-minus");
            $("#glyphicon-view").addClass("glyphicon-plus");
        }
    });

    $(".dismissible").click(function(){
        $(this).hide(100);
    });
})
