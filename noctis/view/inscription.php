<?php
require_once '../model/accesBdd.php';
require_once '../model/_user.php';
require_once '../controller/userController.php';
$wrongPwd = "";
/*
if(isset($_POST["login"]) && isset($_POST["pwd"])){
    extract($_POST);
    //authenticate($login, $pwd);
}
*/

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="fr"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Inscription</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login.css" />

</head>
    <body>
        <div id="form1" class="container">
          <div class="row" id="pwd-container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <section class="login-form">
               <?php  
                    if (isset($_POST['Creer'])) 
                    {
                      $Client = new Client($_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["login"],$_POST["pwd"],3);
                      echo "<center><h1><strong>votre inscription est validée</strong></h1></center>";
                    }  
                  ?>
                <form method="post" action="inscription.php" role="login">
                  <center><h1><strong>Inscription</strong></h1></center>
                  <input type="text" name="nom" placeholder="Nom" required class="form-control input-lg" value="" focused />
                  <input type="text" name="prenom" placeholder="Prenom" required class="form-control input-lg" value="" focused />
                  <input type="text" name="adresse" placeholder="Adresse" required class="form-control input-lg" value="" focused />
                  <input type="text" name="login" placeholder="Login" required class="form-control input-lg" value="" focused />
                  <input type="password" name ="pwd" class="form-control input-lg" id="password" placeholder="Mot de passe" required="" />
                  <input type="password" name ="pwd2" class="form-control input-lg" id="password2" placeholder="Confirmation mot de passe" required="" />
                  <div id="wrongPwd"><?php echo $wrongPwd; ?></div>
                  <button type="submit" name="Creer" class="btn btn-lg btn-primary btn-block">Creer </button>
                  <div>
                    <a href="index.php">Retour au site.</a>
                  </div>
                </form>
              </section>
              </div>
              <div class="col-md-4"></div>
          </div>
        </div>
    </body>
</html>
<?php
  
?>

