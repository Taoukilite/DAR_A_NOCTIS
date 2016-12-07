<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 01/12/16
 * Time: 16:00
 */

session_start();

if(!isset($_SESSION["type"]) || is_null($_SESSION["type"]))
{
    header("Location: index.php");
}

require_once '../model/_service.php';
require_once '../model/_professionnal.php';
require_once '../controller/professionnalController.php';
require_once '../controller/serviceController.php';
require_once '../controller/userController.php';

$user = getUserById($_SESSION['UID']);

if(get_class($user) == "Professionnal"){
    setSuppliedServices($user);
}

include("includes/menubar_new.php");
?>


<div class="container">
    <div class="page-header">
        <h1>Editer mon profil</h1>
    </div>

    <div class="row">
        <div class="col-md-9 personal-info ">
            <!--                    <div class="alert alert-info alert-dismissable">-->
            <!--                        <a class="panel-close close" data-dismiss="alert">×</a>-->
            <!--                        <i class="fa fa-coffee"></i>-->
            <!--                        This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
            <!--                    </div>-->

            <form class="form-horizontal" method="POST" action="../controller/modifyProfile.php" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Adresse :</label>
                    <div class="col-lg-8">
                        <input name="address" class="form-control" value="
<?php
                        if (is_null($user->getAddress() || empty($user->getAddress())))
                            echo  "N/A" ;
                        else
                            echo $user->getAddress();
                        ?>
" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Ville :</label>
                    <div class="col-lg-8">
                        <input name="town" class="form-control" value="
<?php
                        if (is_null($user->getTown() || empty($user->getTown())))
                            echo  "N/A" ;
                        else
                            echo $user->getTown();
                        ?>
" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Code postal :</label>
                    <div class="col-lg-8">
                        <input name="postal" title="ex:75012" pattern="[0-9]{5,5}" class="form-control" value="
<?php
                        if (is_null($user->getPostalCode() || empty($user->getPostalCode())))
                            echo  "N/A" ;
                        else
                            echo $user->getPostalCode();
                        ?>
" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Mail :</label>
                    <div class="col-lg-8">
                        <input name="mail" title="ex: exemple@exemple.fr" pattern="[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}" class="form-control" value="
<?php
    if (is_null($user->getMail()) || empty($user->getMail()))
        echo  "N/A" ;
    else
        echo $user->getMail();
?>
" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Valider les changements" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Cancel" type="reset" onclick="window.location.href = 'showProfile.php';" />
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</html>