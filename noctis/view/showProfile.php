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
$user1 = getUserById($_SESSION['UID']);
if ($_SESSION['type'] == "Professionnal") {
    $user = new Professionnal($user1->id, $user1->name, $user1->firstname, $user1->login, null, $user1->address, $user1->town, $user1->postal, $user1->mail);
    setSuppliedServices($user);
} else {
    $user = new User($user1->id, $user1->name, $user1->firstname, $user1->login, $user1->address, $user1->town, $user1->postal, $user1->mail);
}


include("includes/menubar_new.php");
?>


<div class="container">
    <div class="page-header">
        <h1>Mon profil</h1>
    </div>

    <div class="row">
        <div class="col-lg-9">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $user->getFirstname()." ".$user->getName(); ?></h3>
                </div>
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Login</td>
                        <td><?php echo $user->getLogin(); ?></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><?php echo $user->getAddress(); ?></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td><?php echo $user->getTown(); ?></td>
                    </tr>
                    <tr>
                        <td>Code postal</td>
                        <td><?php
//                            if (is_null($user->getPostalCode()) || empty($user->getPostalCode()))
//                                echo  "N/A" ;
//                            else
                                echo $user->getPostalCode();
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <td>
                            <?php
                            if (is_null($user->getMail()) || empty($user->getMail()))
                                echo  "N/A" ;
                            else
                                echo $user->getMail();
                            ?>
                        </td>
                    </tr>
                            <?php
                            if(isset($_SESSION["type"]) && $_SESSION["type"] == "Professionnal")
                            {
                                echo "<tr><td>Services proposés</td><td>";
                                $services =$user->getSuppliedServices();
                                if (count($services) > 0) {

                                    foreach ($services as $service) {
                                        echo "<li style =' list-style-type: none;'>{$service->getName()}</li>";
                                    }
                                } else
                                    echo "N/A";
                                echo "</td></tr>";
                            }
                            ?>
                    </tbody>
                </table>
                <div class="panel-footer">
                    <a href="editProfile.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                </div>
            </div>
        </div>
    </div>
</div>
    </html>