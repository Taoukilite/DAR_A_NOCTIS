/**
 * Created by stephane on 05/12/16.
 */
$(document).ready(function() {
    serviceId = null;
    $('#calendar').css("visibility", "hidden");
    $( "#input-service" ).autocomplete({
        source: '../controller/ajax_get_services.php',
        minLength: 1,
        select: function( event, ui ) {
            $('#form-address').css("visibility", "visible");
        }
    });

    $('#service-search').click(function () {
        $('#form-address').css("visibility", "visible");
    });

    $('#valid-address').click(function () {
        $('#calendar').css("visibility", "visible");
        service = $("#input-service").val();
        address = $("#input-address").val();

        // Ajax get events by service
        $('#calendar').fullCalendar( 'removeEvents' );
        $.post( "ajax/getEventsByService.php", { service: service }, function( data ) {
            data.forEach(function(element) {
                element.title = service;
                serviceId = element.serviceId;
                $('#calendar').fullCalendar( 'renderEvent', element, true);
            });
        }, "json");
    });

    // FULL CALENDAR
    $('#calendar').fullCalendar({
        eventColor: "#d9534f",
        locale: 'fr',
        timeFormat: 'HH:mm', // with no am / pm in event date
        eventOverlap: false,
        slotEventOverlap: false,
        slotLabelFormat:"HH:mm",
        defaultView: 'agendaWeek',
        height: 500,
        header: { left: 'prev,next today month,agendaWeek', right: '' },
        selectable: true,



    select: function(start, end) {
            if (moment() > start) {
                alert("La doloréane n'existe pas encore. \nUn intervention ne peut pas se faire dans le passer")
            } else {
                end.add(1, 'hours').add(30, "m");

                // Test event existent déja ?
                var timeEvents = $('#calendar').fullCalendar('clientEvents', function (event) {
                    return (event.start <= start && event.end > start) ||
                        (event.start >= start && event.start <= end );
                });


                if (timeEvents.length <= 0) {

                    // Si connecté dans script php
                    $.post("ajax/addEvent.php", {
                        serviceId: serviceId,
                        serviceName: service, // Utile si serviceId null
                        start: moment(start.format()).format('YYYY-MM-DD H:m:s'),
                        end: moment(end.format()).format('YYYY-MM-DD H:m:s')
                    }, function (data) {
                        if (data == false)
                            $(location).attr('href', "login.php");
                        else {
                            alert("demande d'intervention envoyé");
                            var title = service;
                            var eventData;
                            if (title) {
                                eventData = {
                                    title: title,
                                    start: start,
                                    end: end
                                };
                                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                            }
                        }
                    }, "json");
                } else {
                    alert("Plage horaire chevauchant une indisponibilité");
                }
                $('#calendar').fullCalendar('unselect');
            }
        },

    })

});