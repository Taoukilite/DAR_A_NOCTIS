$(document).ready(function(){
	$(".service").click(function(){
		var thisService = $(this);
		if( $(this).text() == "Tous"){
			$(".professionnal").show();
		}else{
			$(".professionnal").each(function(){
				if($(this).hasClass(thisService.text())){
					$(this).show();
				}else{
					$(this).hide();
				}
			});
		}
	});
});