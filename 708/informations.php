<?php
    include("includes/menubar.php");
    include("controller/infos.php");




    $successModifInfos = false;


    if(isset($_POST["adresse"])){
        setAdresse($_POST["adresse"]);
        $successModifInfos = true;
    }

    if(isset($_POST["mail"])){
        setMail($_POST["mail"]);
        $successModifInfos = true;
    }

    if(isset($_POST["telephone"])){
        setTel($_POST["telephone"]);
        $successModifInfos = true;
    }

    if(isset($_POST["msgAccueil"])){
        setMsgAccueil($_POST["msgAccueil"]);
        $successModifInfos = true;
    }

    $infos = getLesInfos();

    $accueil = $infos[0]["valeur"];
    $adresse = $infos[1]["valeur"];
    $mail = $infos[2]["valeur"];
    $telephone = $infos[4]["valeur"];




?>

        <br>
        <div class="container">
            <div class="page-header">
                <h1>Modifier les informations</h1>
            </div>

            <?php
                if($successModifInfos)
                {
                    echo '<div class="alert alert-success dismissible" role="alert">Les informations ont étée mises en ligne avec succès !</div>';
                }
            ?>

            <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Informations</h3>
                    </div>
                    <div class="panel-body">
                        <form action="informations.php" method="POST">

                            <h3>Message d'accueil</h3>
                            <br>
                            <textarea name="msgAccueil" class="textAreaMsgAccueil"><?php echo $accueil; ?></textarea>
                            <br/>
                            <button type="submit" class="btn btn-md btn-primary">Valider</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" id="glyphicon" aria-hidden="true"></span> Coordonées</h3>
                    </div>
                    <div class="panel-body">
                        <form name="coord" class="form-horizontal"  action="informations.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-2">
                                    <label>Telephone : </label>
                                    <br>
                                    <label>Mail : </label>
                                    <br>
                                    <label>Adresse : </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="telephone"class="inputCoord" value=<?php echo '"'. $telephone .'"'; ?>/>
                                    <br>
                                    <input type="text" name="mail" class="inputCoord" value= <?php echo '"'. $mail . '"'; ?>/>
                                    <br>
                                    <input type="text" name="adresse" class="inputCoord" value= <?php echo '"'. $adresse . '"'; ?>/>
                                    <br>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Valider</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
