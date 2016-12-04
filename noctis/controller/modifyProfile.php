<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 01/12/16
 * Time: 19:11
 */


session_start();

require_once 'userController.php';
require_once '../model/accesBdd.php';

if (!isset($_POST['address'], $_POST['town'], $_POST['postal'], $_POST['mail']) || !isset($_SESSION["type"]) || is_null($_SESSION["type"])) {
    header("Location: ../view/editProfile.php");
}


foreach ($_POST as $info => $value) {
//    echo "$info <br> $value <br><br><hr>";
    updateUser($info, $value);
}


header("Location: ../view/showProfile.php");




