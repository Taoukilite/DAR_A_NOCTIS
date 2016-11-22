<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["UID"])){
	header("Location: index.php");
}

 ?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Noctis - Administration</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/gsb_styles.css" rel="stylesheet">
        <link href="css/administration.css" rel="stylesheet">
        <script src="js/jquery.js">
        </script>

    </head>
        <body>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header" role="navigation">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="administration.php" class="navbar-brand">
                        Administration
                    </a>
                </div> <!-- navbar-header -->

                <nav class="collapse navbar-collapse navbar-responsive-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="carte.php">
                                Carte
                            </a>
                        </li>

                        <li>
                            <a href="gallerie.php">
                                Gallerie
                            </a>
                        </li>

                        <li>
                            <a href="informations.php">
                                Informations
                            </a>
                        </li>

                        <li>
                            <a href="modifmdp.php">
                                Changer le mot de passe
                            </a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="deconnexion.php">
                                Déconnexion
                            </a>
                        </li>
                    </ul>;
                </nav>
            </div> <!-- navbar -->
