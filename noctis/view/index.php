<?php

require_once "../model/accesBdd.php";

?>



<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Noctis</title>
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
                    <a class="navbar-brand page-scroll" href="#page-top">Noctis</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Noctis - Services</h1>
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
                        <p class="content-text">
                            
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
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
            <iframe src="#" class="frame-menu"></iframe>
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
                            <strong>Télephone : </strong>01 02 03 04 05
                            <br>
                            <strong>E-mail : </strong>sample@dummy.com

                        </div>
                        <div class="col-lg-6">
                            <br>
                            <h3>Adresse :</h3>
                            <p> 10 downing Street </p>
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
