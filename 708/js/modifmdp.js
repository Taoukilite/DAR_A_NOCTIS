$(document).ready(function(){
	$("#noMatch").hide();

	$('.compareMdp').blur(function(){
		var confirmMdp = $("#confirmMdp").val();
		var newMdp = $("#newMdp").val();

		compareMdp(newMdp, confirmMdp);

	});

	$('.dismissible').click(function(){
		$(this).hide(100);
	});


})
function compareMdp(newMdp, confirmMdp){

	if(newMdp != confirmMdp)
	{
		$("#noMatch").show();
        $("#submitNewMdp").prop("disabled", true);
	}
	else{
		$("#noMatch").hide();
        $("#submitNewMdp").prop("disabled", false);
	}
}
