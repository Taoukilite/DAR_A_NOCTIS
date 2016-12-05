$(document).ready(function(){

    $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        height: 800,
        header: { left: 'prev,next today month,agendaWeek', right: '' },
        events: 'ajax/getClientAppointments.php',
       

    })



});