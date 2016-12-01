<?php

require_once "../model/accesBdd.php";
require_once '../model/_service.php';
require_once '../model/_professionnal.php';
require_once '../controller/serviceController.php';
require_once '../controller/professionnalController.php';
$services = getServices();

$professionnals = getProfessionnals();

foreach($professionnals as $pro){
    setSuppliedServices($pro);
}

?>



<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tyrell</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.css' />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
	</head>

    <body id="page-top" data-spy="scroll" data-target=".navbar">

        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Tyrell</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="login.php">Connexion</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Intro Section -->

        <section id="intro" class="intro-section">
            <div class="overlay-color">
                <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!--<?php
                        foreach($professionnals as $pro) {

                        if ($pro->getSuppliedServices() != NULL) {
                        foreach ($pro->getSuppliedServices() as $service) {
                        echo "".$service->getName() . "";
                        }
                        }
                        }
    ?> -->
                        <form class="form-inline home-form">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-service" id="input-service" type="text" placeholder="Service recherché">
                            </div>
                            <button type="button" class="input-lg home-input-submit btn btn-default" id="service-search">Trouver votre service</button>
                        </form>
                    </div>

                    <div class="col-sm-12" id="form-address">
                        <form class="form-inline home-form">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-address" type="text" placeholder="Entrez votre adresse">
                            </div>
                            <button type="button" class="input-lg home-input-submit btn btn-default" id="valid-address">Valider votre adresse</button>
                        </form>

                    </div>
                </div>
            </div>
                </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services-section">
            <div class="container" style="height:100%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Disponibilité Services</h1>
                        <div id='calendar' ></div>
                    </div>
                </div>
            </div>
            <!-- <iframe src="#" class="frame-services"></iframe> -->
        </section>

        <!-- Contact Section -->
<!--        <section id="contact" class="contact-section">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-12">-->
<!--                        <h1>Contact</h1>-->
<!---->
<!--                        <div class="col-lg-6">-->
<!--                            <br>-->
<!--                            <h3>Contact :</h3>-->
<!--                            <strong>Télephone : </strong>01 02 03 04 05-->
<!--                            <br>-->
<!--                            <strong>E-mail : </strong>sample@dummy.com-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <br>-->
<!--                            <h3>Adresse :</h3>-->
<!--                            <p> 10 downing Street </p>-->
<!--                            <div id="googleMap"></div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src='js/jquery.js'></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src='js/moment-with-locales.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function() {

                var availableTags = [
                    "ActionScript",
                    "AppleScript",
                    "Asp",
                    "BASIC",
                    "C",
                    "C++",
                    "Clojure",
                    "COBOL",
                    "ColdFusion",
                    "Erlang",
                    "Fortran",
                    "Groovy",
                    "Haskell",
                    "Java",
                    "JavaScript",
                    "Lisp",
                    "Perl",
                    "PHP",
                    "Python",
                    "Ruby",
                    "Scala",
                    "Scheme"
                ];
                $( "#input-service" ).autocomplete({
                    source: availableTags,
                });

                $('#service-search').click(function () {
                    $('#form-address').css("visibility", "visible");
                });

                $('#valid-address').click(function () {
                    $('#calendar').css("visibility", "visible");
                });

                // FULL CALENDAR
                $('#calendar').fullCalendar({
                    defaultView: 'agendaWeek',
                    height: 500,
                    header: { left: 'prev,next today month,agendaWeek', right: '' }
                    // put your options and callbacks here
                })

            });
        </script>
    </body>
</html>