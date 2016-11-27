$(document).ready(function(){
	$("#noMatch").hide();

	$('.comparePwd').blur(function(){
		var password = $("#password").val();
		var condirmPassword = $("#condirmPassword").val();

		comparePwd(condirmPassword, password);

	});

	$('.dismissible').click(function(){
		$(this).hide(100);
	});


})
function comparePwd(condirmPassword, password){

	if(condirmPassword != password)
	{
		$("#noMatch").show();
        $("#submitUser").prop("disabled", true);
	}
	else{
		$("#noMatch").hide();
        $("#submitUser").prop("disabled", false);
	}
}
