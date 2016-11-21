<?php
    include("includes/menubar.php");
    include("controller/infos.php");

    $successUploadBanner = false;
    $successUploadGallery = false;

    if(isset($_FILES["uploadBanner"])){
        extract($_FILES);
        $path = "img/". $uploadBanner["name"];
        move_uploaded_file($uploadBanner["tmp_name"], $path);
        if(rename($path, "img/banner.jpg")){
            $successUploadBanner = true;
        }
    }


    if(isset($_FILES["gallery1"])){
        extract($_FILES);
        if($gallery1["name"] != ""){
            $path = "img/". $gallery1["name"];
            move_uploaded_file($gallery1["tmp_name"], $path);
            rename($path, "img/gallery1.jpg");
            $successUploadGallery = true;
        }

    }

    if(isset($_FILES["gallery2"])){
        extract($_FILES);

        if($gallery2["name"] != ""){
            $path = "img/". $gallery2["name"];
            move_uploaded_file($gallery2["tmp_name"], $path);
            rename($path, "img/gallery2.jpg");
            $successUploadGallery = true;
        }


    }

    if(isset($_FILES["gallery3"])){
        extract($_FILES);
        if($gallery3["name"] != ""){
            $path = "img/". $gallery3["name"];

            move_uploaded_file($gallery3["tmp_name"], $path);
            rename($path, "img/gallery3.jpg");
            $successUploadGallery = true;
        }

    }


?>

        <br>
        <div class="container">
            <div class="page-header">
                <h1>Modifier la gallerie</h1>
            </div>

            <?php
                if($successUploadBanner)
                {
                    echo '<div class="alert alert-success dismissible" role="alert">L\'image à été mise en ligne avec succès !</div>';
                }
                if($successUploadGallery)
                {
                    echo '<div class="alert alert-success dismissible" role="alert">La gallerie à été mise en ligne avec succès !</div>';
                }
            ?>


            <!-- Panel visualisation bannière -->
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" id="panel-banner">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-plus" id="glyphicon-banner" aria-hidden="true"></span> Bannière actuelle</h3>
                    </div>
                    <div class="panel-body panel-banner" hidden>
                        <img src="img/banner.jpg" class="img-banner"></img>
                    </div>
                </div>
            </div>
            <!-- Fin panel visualisation bannière -->


            <!-- Panel upload bannière -->
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-edit" id="glyphicon" aria-hidden="true"></span> Changer de bannière</h3>
                    </div>
                    <div class="panel-body">
                        <form name="banniere" class="form-horizontal"  action="gallerie.php" method="post" enctype="multipart/form-data">
                            <label>Envoyer une bannière (.jpg .png)</label>
                            <br>
                            <input type="file" name="unploadBanner"/>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin panel upload bannière -->


            <!-- Panel visualisation gallerie -->
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" id="panel-gallery">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-plus" id="glyphicon-gallery" aria-hidden="true"></span> Gallerie actuelle</h3>
                    </div>
                    <div class="panel-body panel-gallery" hidden>

                        <div class="row">

                            <form name="gallerie" action="gallerie.php" method="post" enctype="multipart/form-data">
                                <!-- Thumbnail 1 -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img_gallery" src="img/gallery1.jpg">
                                        <div class="caption">
                                            <h3>Image 1</h3>
                                            <p>Modifier l'image :</p>
                                            <input type="file" name="gallery1"/>

                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Thumbnail -->

                                <!-- Thumbnail 2 -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img_gallery" src="img/gallery2.jpg">
                                        <div class="caption">
                                            <h3>Image 2</h3>
                                            <p>Modifier l'image :</p>
                                            <input type="file" name="gallery2"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Thumbnail -->

                                <!-- Thumbnail 3 -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img_gallery" src="img/gallery3.jpg">
                                        <div class="caption">
                                            <h3>Image 3</h3>
                                            <p>Modifier l'image :</p>
                                            <input type="file" name="gallery3"/>

                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Thumbnail -->

                                <div style="text-align: center;">
                                    <button name="form-banner" type="submit" class="btn btn-md btn-primary">Sauvegarder les modifications</button>
                                </div>

                            </form>



                        </div>
                    </div>
                </div>
            </div>

            <!-- Fin panel visualisation gallerie -->

        </div>

    </body>
    <script src="js/gallerie.js"></script>
</html>
