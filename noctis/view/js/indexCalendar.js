/**
 * Created by stephane on 05/12/16.
 */
$(document).ready(function() {
    var serviceId = null;
    var serviceName = null;
    var address = null;
    var eventsUsable = null;
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
        serviceName = $("#input-service").val();
        address = $("#input-address").val();

        $.post("ajax/serviceExist.php", {serviceName: serviceName}, function( data ) {
            serviceId = data;
            if (serviceId == false || serviceId == null) {
                alert("service inexistant");
            } else {
                // Ajax get events by service
                $('#calendar').fullCalendar('removeEvents');
                $.post("ajax/getEventsByService.php", {serviceId: serviceId, serviceName: serviceName}, function (data) {
                    data[0].forEach(function (element) {
                        $('#calendar').fullCalendar('renderEvent', element, true);
                    });
                    eventsUsable = data[1];

                    // event dispo
                    // data[1].forEach(function (element) {
                    //     $('#calendar').fullCalendar('renderEvent', element, true);
                    // });

                }, "json");
            }
        }, "json");


    });

    // FULL CALENDAR
    $('#calendar').fullCalendar({
        firstDay: new Date().getDay(),
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
                // front-end
                var timeEvents = $('#calendar').fullCalendar('clientEvents', function (event) {
                    return (event.start <= start && event.end > start) ||
                        (event.start >= start && event.start < end );
                });

                var cpt = 0;
                if (timeEvents.length <= 0) {


                    //back-end
                    eventsUsable.forEach(function (element) {

                        if (cpt == 0) {
                            if (moment(element['start']) <= start && moment(element['end']) >= end) {

                                $.post("ajax/addEvent.php", {
                                    professionnalId: element['professionnalId'],
                                    serviceId: serviceId,
                                    serviceName: serviceName, // Utile si serviceId null
                                    start: moment(start.format()).format('YYYY-MM-DD H:m:s'),
                                    end: moment(end.format()).format('YYYY-MM-DD H:m:s')
                                }, function (data) {
                                    if (data == false)
                                        $(location).attr('href', "login.php");
                                    else {
                                        alert("demande d'intervention envoyé");
                                        // mettre form
                                        var title = serviceName;

                                        var eventData;
                                        if (title) {
                                            eventData = {
                                                title: title,
                                                start: start,
                                                end: end
                                            };
                                            $('#calendar').fullCalendar('removeEvents');
                                            $.post("ajax/getEventsByService.php", {
                                                serviceId: serviceId,
                                                serviceName: serviceName
                                            }, function (data) {

                                                data[0].forEach(function (element) {
                                                    $('#calendar').fullCalendar('renderEvent', element, true);
                                                });
                                                eventsUsable = data[1];

                                            }, "json");
                                            // return false;
                                        }
                                    }
                                }, "json");
                            }
                        }
                    });

                    // Si connecté dans script php

                } else {
                    alert("Plage horaire chevauchant une indisponibilité");
                }
                $('#calendar').fullCalendar('unselect');
            }
        },

    })

});