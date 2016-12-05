$(document).ready(function(){

    $("#appointmentPanel").hide();
    $('#calendar').fullCalendar({
        locale: 'fr',
        slotLabelFormat:"HH:mm",
        defaultView: 'agendaWeek',
        height: 500,
        header: { left: 'prev,next today month,agendaWeek', right: '' },
        events: 'ajax/getProfessionnalAppointements.php',
        eventClick: function (event) {
            //alert(event);
            console.log(event);
            $("#appointmentPanel").show();
            var title = "Intervention du " + event.start;
            $("#title").text(title);
            $("#serviceName").text(event.name);
            $("#location").text(event.address + " " + event.town + " [" + event.postal + "]");



        },
        drop: function(date) {
            alert("Dropped on " + date.format());
        },

        droppable: true,
        editable: true

    })


    $("#btnConfirm").click(function(){
        console.log("Clicked confirm");
        // Todo $.post update de l'appointment :
        //      - prix
        //      - durée d'interv
        //      - etat += 1
    })

    $("#btnCancel").click(function(){
        console.log("Clicked cancel");
        // Todo $.post update de l'appointment :
        //      - recherche d'un nouveau pro
        //      - etat -= 1
    })




});