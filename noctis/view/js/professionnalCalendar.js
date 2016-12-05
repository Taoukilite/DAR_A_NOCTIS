$(document).ready(function(){

    $("#appointmentPanel").hide();
    $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        height: 800,
        header: { left: 'prev,next today month,agendaWeek', right: '' },
        events: 'ajax/getProfessionnalAppointments.php',
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
            $("#location").text(event.address + " " + event.town + " [" + event.postal + "]");
           
            $("#appointmentId").text(event.appointmentId);
            $("#stateId").text(event.state);
            $("#start").text(dateAppointment);

            if(event.state == 0)
            {
                $("#inputGroupConfirmation").show();
                $("#noConfirmation").hide();
            }else{
                $("#inputGroupConfirmation").hide();
                $("#noConfirmation").show();
            }

        },
       

    })


    $("#btnConfirm").click(function(){
        console.log("Clicked confirm");
        // Todo $.post update de l'appointment :
        //      - prix
        //      - durée d'interv
        //      - etat += 1

        



        if($("#duration").val() != "" && $("#price").val() != "")
        {

            var newEndTime = $("#start").text();
        
            newEndTime = new Date(newEndTime);
            console.log(newEndTime);

            newEndTime.setMinutes(newEndTime.getMinutes() + $("#duration").val());
            console.log(newEndTime) ;

            var resultConfirm = $.post("ajax/professionnalConfirmAppointment.php", {appointmentId:$("#appointmentId").text(), stateId:$("#stateId").text(), duration:newEndTime, price:$("#price").val()}, 'json');
            resultConfirm.done(function(data){
                console.log(data);
                console.log("Requete terminée");
                location.reload();
            });

        }

       

        
    })

    $("#btnCancel").click(function(){
        console.log("Clicked cancel");
        


        if(confirm("Etes vous sur(e) de refuser cette intervention ?") == true)
        {
            console.log("finish me (cf comments)");
            // Todo $.post update de l'appointment :
            //      - recherche d'un nouveau pro
            //      - etat -= 1

        }
    })




});