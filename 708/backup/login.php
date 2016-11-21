<?php
require_once 'controller/accesBdd.php';
require_once 'controller/infos.php';

if(isset($_POST["login"]) && isset($_POST["mdp"])){
    $idUser = login($_POST["login"], $_POST["mdp"]);
    
    if($idUser["id"] != NULL)
    {
        session_start();
        $_SESSION["admin"] = $idUser["id"];

        header("Location: administration.php");
    }
    
}

?>



<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="fr"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Connexion</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login.css" />

</head>
    <body>    
        <div id="form1" class="container">
          <div class="row" id="pwd-container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <section class="login-form">
                <form method="post" action="login.php" role="login">
                  <center><h1><strong>O'Gout du Jour</strong></h1></center>
                  <input type="text" name="login" placeholder="Identifiant" required class="form-control input-lg" value="" focused />
                  <input type="password" name ="mdp" class="form-control input-lg" id="password" placeholder="Mot de passe" required="" />
                  <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Se connecter</button>
                  <div>
                    <a id="pwForgotten" href="index.php">Retour au site.</a>
                  </div>
                </form>
              </section>  
              </div>
              <div class="col-md-4"></div>
          </div>
        </div>
    </body>
</html>