<?php
    include("includes/menubar.php");
    include("controller/infos.php");




    $successModifMdp = false;

    if(isset($_POST["newMdp"]) && isset($_POST["confirmMdp"]))
    {
    	extract($_POST);
    	if($newMdp == $confirmMdp)
    	{
    		setMdp($newMdp);
            $successModifMdp = true;
    	}
    }



?>

        <br>
        <div class="container">
            <div class="page-header">
                <h1>Modifier le mot de passe</h1>
            </div>

            <?php
                if($successModifMdp)
                {
                    echo '<div class="alert alert-success dismissible" role="alert">Le mot de passe a été modifié avec succès !</div>';
                }
            ?>

            <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Modifier le mot de passe</h3>
                    </div>
                    <div class="panel-body">
                        <form action="modifmdp.php" method="POST">

                            <div class="row">
    	                        <div class="col-md-3">
    	                            <label>Nouveau mot de passe :</label>
    	                            <br>
    	                            <label>Confirmer le mot de passe :</label>
    	                        </div>
    	                        <div class="col-md-6">
    	                            <input type="password" class="compareMdp" name="newMdp" id="newMdp"/>
    	                            <br>
    	                            <input type="password" class="compareMdp" name="confirmMdp" id="confirmMdp"/>
    	                        </div>
    	                        <div class="col-md-10" id="noMatch">Les mots de passe ne coïncident pas.</div>
    						</div>

                            <button type="submit" id="submitNewMdp" class="btn btn-md btn-primary">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="js/modifmdp.js"></script>
</html>
