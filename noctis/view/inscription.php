<?php
require_once '../model/accesBdd.php';
require_once '../model/_user.php';
require_once '../controller/userController.php';


if(isset($_POST["create"])){
	extract($_POST);

	if(createUser($name, $firstname, $login, $pwd, $town, $postal, $address, $mail, 3)){
		echo "<script type='text/javascript'>alert('Votre compte à bien été créé, vous pouvez désormais vous connecter');</script>";
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
<title>Inscription</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script src="js/jquery.js"></script>

</head>
    <body>
		<div id="form1" class="container">
			<div class="row" id="pwd-container">
				<div class="col-md-4"></div>
					<div class="col-md-4">
						<section class="login-form">
							<?php  
							/*if (isset($_POST['Creer'])){
								$Client = new Client($_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["login"],$_POST["pwd"],3);
								echo "<center><h1><strong>votre inscription est validée</strong></h1></center>";
							}*/  
							?>
							<form method="post" action="inscription.php" role="login">
								<center><h1><strong>Inscription</strong></h1></center>

								<input type="text" name="name" placeholder="Nom" required class="form-control input-lg" focused/>
								<input type="text" name="firstname" placeholder="Prenom" required class="form-control input-lg" />

								<input type="text" name="address" placeholder="Adresse" required class="form-control input-lg" />
								<input type="text" name="town" placeholder="Ville" required class="form-control input-lg" />
								<input type="text" name="postal" placeholder="Code Postal" required class="form-control input-lg" >

								<input type="text" name="mail" placeholder="Adresse e-mail" required class="form-control input-lg"/>

								<input type="text" name="login" placeholder="Login" required class="form-control input-lg"  />


								<input type="password" name ="pwd" class="form-control input-lg comparePwd" id="password" placeholder="Mot de passe" required="" />
								<input type="password" name ="pwd2" class="form-control input-lg comparePwd" id="condirmPassword" placeholder="Confirmation mot de passe" required />
								<div id="noMatch">Les mots de passe ne coïncident pas.</div>


								<button type="submit" id="submitUser" name="create" class="btn btn-lg btn-primary btn-block">Creer </button>
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
    <script src="js/modifmdp.js"></script>
</html>
