<?php

session_start();

require_once "../model/accesBdd.php";
require_once '../model/_service.php';
require_once '../model/_professionnal.php';
require_once '../controller/serviceController.php';
require_once '../controller/professionnalController.php';
require_once '../controller/userController.php';
$services = getServices();

$professionnals = getProfessionnals();

foreach($professionnals as $pro){
    setSuppliedServices($pro);
}
//$date1 = new DateTime();
//$date1->setTime(0, 0);
//
//
//$date2 = new DateTime();
//$date2->setTime(0, 0);
//$date2->add(new DateInterval('PT6H'));
////
//$diff=$date1->diff($date2);
//print_r( $diff->d ) ;
//echo "<br/>";
//print_r( $diff->h ) ;

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
        <link rel="stylesheet" href="css/jquery-ui.min.css">

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
                        <?php
                            if(isset($_SESSION["type"]) && !is_null($_SESSION["type"])) {
echo <<<HTML
                <li>
                    <a class ="page-scroll" href="showProfile.php">Bonjour {$_SESSION['firstname']} {$_SESSION['name']}</a>
            </li> 

                        <li>
                                <a class="page-scroll" href="deconnexion.php">Déconnexion</a>
                            </li> 
HTML;
                            } else {
                                echo <<<HTML

                        <li>
                                <a class="page-scroll" href="login.php">Connexion</a>
                            </li> 
<li>
                                <a class="page-scroll" href="inscription.php">S'inscrire</a></li>
HTML;
                            }
                        ?>
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
                        <form class="form-inline home-form" method="post">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-service" name="input-search"
                                       id="input-service" type="text" placeholder="Service recherché" />
                            </div>
                            <button type="button" class="input-lg home-input-submit btn btn-default controls" id="service-search">Trouver votre service</button>
                        </form>
                    </div>

                    <div class="col-sm-12" id="form-address">
                        <form class="form-inline home-form" method="post">
                            <div class="form-group">
                                <input class="form-control input-lg home-input-address" name="input-address"
                                       id="input-address" type="text" placeholder="Entrez votre adresse" />
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
                        <h2>Indisponibilité affichées</h2>

                        <div id='calendar' ></div>
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascript">
        var autocomplete;
        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('input-address')),
                {types: ['geocode']});


        }   
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3xnAzto0zBmLwke0_3cBtlnMsTYK5yD8&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
        


        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src='js/jquery.js'></script>
        <script src="js/fullcalendar/lib/jquery-ui.min.js"></script>
        <script src='js/moment-with-locales.js'></script>
        <script src='js/fullcalendar/fullcalendar.min.js'></script>
        <script src="js/indexCalendar.js"></script>
        
    </body>
</html>