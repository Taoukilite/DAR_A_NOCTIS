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
    <title>Tyrell - Administration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="js/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
    <link href="js/fullcalendar/lib/cupertino/jquery-ui.min.css" rel="stylesheet" />

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src='js/moment-with-locales.js'></script>
    <script src="js/fullcalendar/fullcalendar.min.js"></script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            if($_SESSION["type"] == "Client"){
                echo "
                                        <a href='clientPanel.php' class='navbar-brand'>Accueil</a>
                                  ";
            }
            if($_SESSION["type"] == "Professionnal"){
                echo "
                                        <a href='professionnalPanel.php' class='navbar-brand'>Accueil</a>
                                    ";
            }
            if($_SESSION["type"] == "Manager"){
                echo "
                                     <a href='managerPanel.php' class='navbar-brand'>Accueil</a>
                                    ";
            }
            ?>
            <a class="navbar-brand page-scroll" href="index.php">Tyrell</a>
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
HTML;
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
