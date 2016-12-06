$(document).ready(function(){
	$("#appointmentPanel").hide();
    $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
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
            	$("#price").text(event.price);
            }else{
            	$("#devis").hide();
            }
            
            
            $("#appointmentId").text(event.appointmentId);
            $("#stateId").text(event.state);
            $("#start").text(dateAppointment);

            if(event.state == 0)
            {
            	$("#inputGroupConfirmation").hide();
                $("#noConfirmation").show();
            }else if(event.state == 1){
                $("#inputGroupConfirmation").show();
                $("#noConfirmation").hide();
            }else if(event.state == 2){
                $("#inputGroupConfirmation").hide();
                $("#noConfirmation").show();
                // TODO : afficher le formulaire de paiement
            }

        }
       

    })

    $("#btnConfirm").click(function(){
    	var resultConfirm = $.post("ajax/clientConfirmAppointment.php", {appointmentId:$("#appointmentId").text(), stateId:$("#stateId").text()}, 'json');
    	resultConfirm.done(function(data){
    		console.log(data);
    		console.log("Requete terminée");
    		location.reload();
    	})
    })



});