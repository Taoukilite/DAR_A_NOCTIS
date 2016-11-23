<?php

require_once "controller/accesBdd.php";
require_once "controller/infos.php";

$infos = getLesInfos();

$menu = "menu/";
$accueil = $infos[0]["valeur"];
$adresse = $infos[1]["valeur"];
$mail = $infos[2]["valeur"];
$menu .= $infos[3]["valeur"];
$telephone = $infos[4]["valeur"];




?>



<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>O'gout du jour</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">O'Goût du Jour</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Bienvenue</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#menu">Menu</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Intro Section -->
        <section id="intro" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>O'Goût du Jour</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Bienvenue !</h1>

                        <br>
                        <p class="content-text"><?php echo $accueil; ?></p>
                        <p>toto est arrivé ici</p>
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <img class="img_gallery" src="img/gallery1.jpg">
                    </div>
                    <div class="col-md-4">
                        <img class="img_gallery" src="img/gallery2.jpg">
                    </div>
                    <div class="col-md-4">
                        <img class="img_gallery" src="img/gallery3.jpg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="menu" class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Menu</h1>
                        
                    </div>
                </div>
            </div>
            <iframe src= <?php echo '"'.$menu . '"'; ?> class="frame-menu"></iframe>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact</h1>

                        <div class="col-lg-6">
                            <br>
                            <h3>Contact :</h3>
                            <strong>Télephone : </strong><?php echo $telephone; ?>
                            <br>
                            <strong>E-mail : </strong><?php echo $mail; ?>

                        </div>
                        <div class="col-lg-6">
                            <br>
                            <h3>Adresse :</h3>
                            <p> <?php echo $adresse; ?> </p>
                            <div id="googleMap"></div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
        <script src="js/jquery.easing.min.js"></script>

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD3xnAzto0zBmLwke0_3cBtlnMsTYK5yD8"></script>
    </body>
</html>
