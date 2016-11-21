<?php
    include("includes/menubar.php");
    include("controller/infos.php");

    $menu = getMenu();

    $successUpload = false;


    if($menu != NULL){
        $menu = "menu/" . $menu["valeur"];
    }

    if(isset($_FILES["uploadMenu"])){
        extract($_FILES);
        $path = "menu/". $uploadMenu["name"];
        move_uploaded_file($uploadMenu["tmp_name"], $path);
        if(rename($path, "menu/menu.pdf")){
            $successUpload = true;
        }
    }

?>

        <br>
        <div class="container">
            <div class="page-header">
                <h1>Modifier la carte</h1>
            </div>

            <?php
                if($successUpload)
                {
                    echo '<div class="alert alert-success dismissible" role="alert">Le menu à été mis en ligne avec succès !</div>';
                }
            ?>

            <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading panel-view">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-plus" id="glyphicon-view" aria-hidden="true"></span> Carte actuelle</h3>
                    </div>
                    <div class="panel-body panel-body-view" hidden>
                        <div class="pdf-menu">
                            <iframe src= <?php echo '"'.$menu . '"'; ?> class="frame-menu"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" id="glyphicon" aria-hidden="true"></span> Changer de carte</h3>
                    </div>
                    <div class="panel-body">
                        <form name="menu" class="form-horizontal"  action="carte.php" method="post" enctype="multipart/form-data">
                            <label>Envoyer un menu (.pdf)</label>
                            <br>
                            <input type="file" name="uploadMenu"/>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="js/carte.js"></script>
</html>
