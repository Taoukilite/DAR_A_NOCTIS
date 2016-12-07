<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 05/12/16
 * Time: 10:31
 */

require_once '../../model/accesBdd.php';

$service = (isset($_POST['service']) && !empty($_POST['service'])) ? $_POST['service'] : null;

if ($service == null) header("location: ../index.php");


/** Requete BDD **/

$pdo = connexionBdd();

// Pour recup les plages horaires + idpro (on le choisira après)
$sql = <<<SQL
SELECT DISTINCT a.start, a.end, a.serviceId
FROM services AS se,appointment as a 
WHERE se.name = :service
AND se.id = a.serviceId
ORDER BY a.id
SQL;

try{
    $requete = $pdo->prepare($sql);
    $requete->execute(array(
        ':service'=> $service
    ));
    $results = $requete->fetchAll();
    $requete->CloseCursor();
    $requete = null;

    // dates deb/fin
    $res = array();
    foreach($results as $date)
    {
        $start = $date['start'];
        $start_obj = new DateTime($start);
        $date['start'] = $start_obj->format(DateTime::ISO8601);

        $end = $date['end'];
        $end_obj = new DateTime($end);
        $date['end'] = $end_obj->format(DateTime::ISO8601);
        $date['id'] = 5;
        array_push($res, $date);
    }
    echo json_encode($res);
}catch(PDOException $e){
    $requete = null;
    echo 'Erreur getEventsByService : ' . $e->getMessage() . '';
    die();
}