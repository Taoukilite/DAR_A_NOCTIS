/**
 * Created by stephane on 05/12/16.
 */
$(document).ready(function() {
    $('#calendar-alert').hide();
    $('#form-calendar').hide();
    $( "#startHourCalendar" ).timepicker({ 'timeFormat': 'H:i', 'step': 120 });
    $( "#endHourCalendar" ).timepicker({ 'timeFormat': 'H:i' });

    $( "#input-service" ).autocomplete({
        source: '../controller/ajax_get_services.php',
        minLength: 1,
        select: function() {
            $('#form-address').show(500);
        }
    });

    $('#service-search').click(function () {
        $('#form-address').show(500);
    });

    $('#valid-address').click(function () {
        $('#calendar').css("visibility", 'visible');
        serviceName = $("#input-service").val();
        address = $("#input-address").val();

        $.post("ajax/serviceExist.php", {serviceName: serviceName}, function( data ) {
            serviceId = data;
            if (serviceId == false || serviceId == null) {
                $('#input-service-alert').text("Service inexistant");
                $('#input-service-alert').show(250);
            } else {
                // Ajax get events by service
                $('#calendar').fullCalendar('removeEvents');
                $.post("ajax/getEventsByService.php", {serviceId: serviceId, serviceName: serviceName}, function (data) {
                    data[0].forEach(function (element) {
                        $('#calendar').fullCalendar('renderEvent', element, true);
                    });
                    eventsUsable = data[1];

                }, "json");
            }
        }, "json");


    });

    $("#validateDateCalendar"). click(function () {
        $("#calendar-alert").toggle("display");
        var startValide = moment(startGlo).format("YYYY-MM-DD")+" "+$("#startHourCalendar").val()+":00";
        var endValide  = moment(endGLo).format("YYYY-MM-DD")+" "+$("#endHourCalendar").val()+":00";

        if (startValide > endValide) {
            if ($("#calendar-alert").hasClass("alert-success"))
                $("#calendar-alert").removeClass("alert-success")
                    .addClass("alert-warning").show(250).text("L'heure de début doit être inférieur à l'heure de fin");
            else
                $("#calendar-alert").show(250).text("L'heure de début doit être inférieur à l'heure de fin");
        } else {

            //back-end
            var add = false;
            eventsUsable.forEach(function (element) {
                if (add) return false;
                console.log(startValide);
                if (moment(moment(element['start']).format()).format('YYYY-MM-DD HH:mm:ss') <= startValide
                    && moment(moment(element['end']).format()).format('YYYY-MM-DD HH:mm:ss') >= endValide) {
                    $.post("ajax/addEvent.php", {
                        professionnalId: element['professionnalId'],
                        serviceId: serviceId,
                        serviceName: serviceName, // Utile si serviceId null
                        start: startValide,
                        end: endValide
                    }, function (data) {
                        if (data == false)
                            $(location).attr('href', "login.php");
                        else {
                            if ($("#calendar-alert").hasClass("alert-warning"))
                                $("#calendar-alert").addClass("alert-success").removeClass("alert-warning")
                                    .text("Demande d'intervention envoyé").show(250);
                            else
                                $("#calendar-alert").text("Demande d'intervention envoyé").show(250);
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
                        }
                    }, "json");
                    add = true;
                }
            });
            if (!add) {
                if ($("#calendar-alert").hasClass("alert-success"))
                    $("#calendar-alert").addClass("alert-warning").removeClass("alert-success")
                        .html(
                            "<div class='row'>" +
                            "<div class ='col-xs-4'>" +
                            "<h3>Plage horaire non disponible pour planifier une intervention</h3>" +
                            "</div>" +
                            "<div class='col-xs-8'>" +
                            "<ul class='list-group'>" +
                            "<li class='list-group-item'>Planification maximum sur 7 jours</li>" +
                            "<li class='list-group-item'>Heure de début par palier de 2 heures</li>" +
                            "<li class='list-group-item'>Durée maximum d'une intervention 2 heures</li>" +
                            "</ul>" +
                            "</div>" +
                            "</div>").show(250);
                else
                    $("#calendar-alert").html(
                        "<div class='row'>" +
                            "<div class ='col-xs-4'>" +
                            "<h3>Plage horaire non disponible pour planifier une intervention</h3>" +
                            "</div>" +
                            "<div class='col-xs-8'>" +
                                "<ul class='list-group'>" +
                                    "<li class='list-group-item'>Planification maximum sur 7 jours</li>" +
                                    "<li class='list-group-item'>Heure de début par palier de 2 heures</li>" +
                                    "<li class='list-group-item'>Durée maximum d'une intervention 2 heures</li>" +
                                "</ul>" +
                            "</div>" +
                        "</div>").show(250);
            }

        }

    });

    // FULL CALENDAR
    $('#calendar').css("visibility", 'hidden').fullCalendar({
        firstDay: new Date().getDay(),
        locale: 'fr',
        timeFormat: 'HH:mm',
        eventOverlap: false,
        slotEventOverlap: false,
        slotLabelFormat:"HH:mm",
        defaultView: 'agendaWeek',
        height: 800,
        header: { left: 'prev,next today month,agendaWeek', right: '' },
        selectable: true,



        select: function(start, end) {
            $("#calendar-alert").hide(250);
            $("#form-calendar").hide(250);
            startGlo = start; endGLo = end;
            if (moment() > start) {
                $("#calendar-alert").removeClass("alert-success").addClass("alert-warning").show(250).text("La doloréane n'existe pas encore. Un intervention ne peut pas se faire dans le passer");
            } else {
                end.add(1, 'hours').add(30, "m");

                $("#form-calendar").show(250);
                $("#dateClick").text("Vérifiez les horaires de l'intervention du : " + moment(start).format("DD MMMM"));
                $("#startHourCalendar").val(moment(start).format("HH:mm"));
                $("#endHourCalendar").val(moment(end).format("HH:mm"));


            }
        },

    })

});