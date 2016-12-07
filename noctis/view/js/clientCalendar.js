$(document).ready(function(){
	$("#appointmentPanel").hide();
	$('#calendar').fullCalendar({
        firstDay: new Date().getDay(),
        locale: 'fr',
		defaultView: 'agendaWeek',
        timeFormat: 'HH:mm',
        eventOverlap: false,
        slotEventOverlap: false,
        slotLabelFormat:"HH:mm",
		height: 800,
		header: { left: 'prev,next today month,agendaWeek', right: '' },
		events: 'ajax/getClientAppointments.php',

		eventClick: function (event) {
			console.log(event);
			$("#appointmentPanel").show();

			var dateAppointment = new Date(event.start);
			console.log(dateAppointment.getDate());
		   
			var title = "Intervention du " + dateAppointment.getDate() + "/" + (dateAppointment.getMonth()+1) + "/" + dateAppointment.getFullYear();
			title += " à " + (dateAppointment.getHours()-1) + "h" + dateAppointment.getMinutes();
			if(dateAppointment.getMinutes() < 10)
			{
				title += "0";
			}
			$("#title").text(title);
			$("#serviceName").text(event.name);

			if(event.state > 0){
				$("#devis").show();
				$("#price").html(event.price);
				localStorage.setItem("price", event.price);
			}
			
			
			$("#appointmentId").text(event.appointmentId);
			$("#stateId").text(event.state);
			$("#start").text(dateAppointment);

			switch(event.state){
				case '0' : //waiting for confirmation from pro
					$("#noConfirmation").show();
					$("#inputGroupConfirmation").hide();
					$("#buybutton").hide();
				break;
				
				case '1' : //client confirmation needed
					$("#inputGroupConfirmation").show();
					$("#noConfirmation").hide();
					$("#buybutton").hide();
				break;
				
				case '2' : //client payment needed
					$("#buybutton").show();
					$("#inputGroupConfirmation").hide();
					$("#noConfirmation").hide();
				break;

				case '3' : //client payment done
					$("#buybutton").hide();
					$("#inputGroupConfirmation").hide();
					$("#noConfirmation").show();
				break;
				
				default :
					console.log(event.state);
				break;
			}

		}
	   

	});

	$("#btnConfirm").click(function(){
		var resultConfirm = $.post("ajax/clientConfirmAppointment.php", {appointmentId:$("#appointmentId").text(), stateId:$("#stateId").text()}, 'json');
		resultConfirm.done(function(data){
			console.log(data);
			console.log("Requete terminée");
			location.reload();
		})
	});

	/*$("#buybutton").click(function(){
		var resultConfirm = $.post("ajax/clientConfirmAppointment.php", {appointmentId:$("#appointmentId").text(), stateId:$("#stateId").text()}, 'json');
		resultConfirm.done(function(data){
			console.log(data);
			console.log("Requete terminée");
			location.reload();
		})
	});*/



});