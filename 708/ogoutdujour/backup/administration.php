<?php

session_start();

if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}

require_once "controller/accesBdd.php";
require_once "controller/infos.php";





if(isset($_POST["adresse"])){
    setAdresse($_POST["adresse"]);
}

if(isset($_POST["mail"])){
    setMail($_POST["mail"]);
}

if(isset($_POST["telephone"])){
    setTel($_POST["telephone"]);
}

if(isset($_POST["msgAccueil"])){
    setMsgAccueil($_POST["msgAccueil"]);
}

if(isset($_FILES["uploadMenu"])){
    extract($_FILES);

    $path = "menu/". $uploadMenu["name"];

    move_uploaded_file($uploadMenu["tmp_name"], $path);
    rename($path, "menu/menu.pdf");
}

if(isset($_FILES["uploadBanner"])){
    extract($_FILES);

    $path = "img/". $uploadBanner["name"];

    move_uploaded_file($uploadBanner["tmp_name"], $path);
    rename($path, "img/banner.jpg");
}

if(isset($_FILES["gallery1"])){
    extract($_FILES);

    $path = "img/". $gallery1["name"];

    move_uploaded_file($gallery1["tmp_name"], $path);
    rename($path, "img/gallery1.jpg");
}

if(isset($_FILES["gallery2"])){
    extract($_FILES);

    $path = "img/". $gallery2["name"];

    move_uploaded_file($gallery2["tmp_name"], $path);
    rename($path, "img/gallery2.jpg");
}

if(isset($_FILES["gallery3"])){
    extract($_FILES);

    $path = "img/". $gallery3["name"];

    move_uploaded_file($gallery3["tmp_name"], $path);
    rename($path, "img/gallery3.jpg");
}

$infos = getLesInfos();

$accueil = $infos[0]["valeur"];
$adresse = $infos[1]["valeur"];
$mail = $infos[2]["valeur"];
$telephone = $infos[4]["valeur"];


?>

<!doctype html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>O'gout du jour - Administration</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Administration</h1>
            </div>
            <div class="col-md-2">
                <br>
                <a href="index.php">Retour au site</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2>Modifier le menu</h2>
                <br>
                <form name="menu" class="form-horizontal"  action="administration.php" method="post" enctype="multipart/form-data">
                    <label>Envoyer un menu (.pdf)</label>
                    <br>
                    <input type="file" name="uploadMenu"/>
                    <br>
                    <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                </form>

                <br>
                <br>

                <h2>Modifier la bannière</h2>
                <br>
                <form name="menu" class="form-horizontal"  action="administration.php" method="post" enctype="multipart/form-data">
                    <label>Envoyer une image (.jpg, .png)</label>
                    <br>
                    <input type="file" name="uploadBanner"/>
                    <br>
                    <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                </form>

                <br>
                <br>
                <h2>Modifier la gallerie</h2>

                <form name="menu" class="form-horizontal"  action="administration.php" method="post" enctype="multipart/form-data">
                    <label>Image 1 : </label>
                    <input type="file" name="gallery1"/>
                    <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                </form>

                <form name="menu" class="form-horizontal"  action="administration.php" method="post" enctype="multipart/form-data">
                    <label>Image 2 : </label>
                    <input type="file" name="gallery2"/>
                    <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                </form>


                <form name="menu" class="form-horizontal"  action="administration.php" method="post" enctype="multipart/form-data">
                    <label>Image 3 : </label>
                    <input type="file" name="gallery3"/>
                    <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                </form>




                
            </div>


            <div class="col-md-6">
                <h2>Modifier les informations</h2>
                <br>

                <form action="administration.php" method="POST">

                    <h3>Message d'accueil</h3>
                    <br>
                    <textarea name="msgAccueil" class="textAreaMsgAccueil"><?php echo $accueil; ?></textarea>
                    <br/>

                    <button type="submit" class="btn btn-md btn-primary">Valider</button>

                </form>

                <br>

                <h3>Contact : </h3>

                <br>
                <form action="administration.php" method="POST">
                    <label>Telephone : </label>
                    <input type="text" name="telephone" value=<?php echo '"'. $telephone .'"'; ?>/>

                    <br>
                    <br>

                    <label>Mail : </label>
                    <input type="text" name="mail" class="inputMail" value= <?php echo '"'. $mail . '"'; ?>/>
                    

                    <br>
                    <br>

                    <label>Adresse : </label>
                    <input type="text" name="adresse" class="inputAdresse" value= <?php echo '"'. $adresse . '"'; ?>/>
                    <br>
                    <button type="submit" class="btn btn-md btn-primary">Valider</button>




                </form>

            </div>

        </div>                   
    </div>
</section>
