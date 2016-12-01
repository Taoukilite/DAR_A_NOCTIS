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

<!--    <link href="css/gsb_styles.css" rel="stylesheet">-->
<!--    <link href="css/administration.css" rel="stylesheet">-->
    <link href="css/datatables.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

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

<!--            <div class="navbar navbar-inverse navbar-fixed-top">-->
<!--                <div class="navbar-header" role="navigation">-->
<!--                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                    </button>-->
<!--                    <!-- <a href="administration.php" class="navbar-brand">-->
<!--                        Administration-->
<!--                    </a> -->
<!--                </div> <!-- navbar-header
<!--                <nav class="collapse navbar-collapse navbar-responsive-collapse" role="navigation">-->
<!--                    <ul class="nav navbar-nav">    <?php
                            if($_SESSION["type"] == "Client"){
                                echo "<li>
                                        <a href='clientPanel.php' class='navbar-brand'>Accueil</a>
                                    </li>";
                            }
                            if($_SESSION["type"] == "Professionnal"){
                                echo "<li>
                                        <a href='professionnalPanel.php' class='navbar-brand'>Accueil</a>
                                    </li>";
                            }
                            if($_SESSION["type"] == "Manager"){
                                echo "<li>
                                        <a href='managerPanel.php' class='navbar-brand'>Accueil</a>
                                    </li>";
                            }
                        ?>
<!--                    </ul>-->
<!---->
<!--                    <ul class="nav navbar-nav navbar-right">-->
<!--                        <li>-->
<!--                            <a href="deconnexion.php">-->
<!--                                Déconnexion-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>;-->
<!--                </nav>-->
<!--            </div> <!-- navbar -->
