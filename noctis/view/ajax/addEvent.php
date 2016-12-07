<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 05/12/16
 * Time: 15:25
 */

session_start();
require_once '../../model/accesBdd.php';

if(!isset($_SESSION["type"]) || is_null($_SESSION["type"]) || empty($_SESSION["type"])) {
    echo json_encode(false);
} else {

    $serviceId = (isset($_POST['serviceId']) && !empty($_POST['serviceId'])) ? $_POST['serviceId'] : null;
    $serviceName = (isset($_POST['serviceName']) && !empty($_POST['serviceName'])) ? $_POST['serviceName'] : null;
    $start = (isset($_POST['start']) && !empty($_POST['start'])) ? $_POST['start'] : null;
    $end = (isset($_POST['end']) && !empty($_POST['end'])) ? $_POST['end'] : null;
    $professionnalId = (isset($_POST['professionnalId']) && !empty($_POST['professionnalId'])) ? $_POST['professionnalId'] : null;

    // ça a merdé
    if ($start == null || $end == null) echo json_encode(false);
    $pdo = connexionBdd();
// Enregistrement dans base.
    $sql = <<<SQL
Insert INTO appointment (serviceId, clientId, professionnalId, start, end, price, state)
VALUE  (:serviceId, :clientId, :professionnalId, :start, :end, 0, 0);
SQL;

    try{
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':serviceId'=> $serviceId,
            ':clientId' => $_SESSION['UID'],
            ':professionnalId' => $professionnalId,
            ':start' => $start,
            ':end' => $end
        ));

        $requete->CloseCursor();
        $requete = null;
        echo json_encode(true);
    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getEventsByService : ' . $e->getMessage() . '';
        die();
    }

}