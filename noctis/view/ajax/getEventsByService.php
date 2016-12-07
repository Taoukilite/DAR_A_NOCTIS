<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 05/12/16
 * Time: 10:31
 */

require_once '../../model/_appointment.php';

$serviceName = (isset($_POST['serviceName']) && !empty($_POST['serviceName'])) ? $_POST['serviceName'] : null;
$serviceId = (isset($_POST['serviceId']) && !empty($_POST['serviceId'])) ? $_POST['serviceId'] : null;

/* Si on a pas eu de service en entrer
 * prévenir erreur
 */
//if ($serviceId == null) header("location: ../index.php");

// test toutes les plages horaires (2h) d'une semaine
// recup l'id des pro dispo pour chaque plage horaire du service

/** On récupe la date du jour
 * et on met heure et minute à 0
 * pour unifier chaque chargement de l'agenda
**/
$dateBegin = new DateTime();
$dateBegin->setTime(0, 0);

$dateEndTemp = new DateTime();
$dateEndTemp->setTime(0, 0);
$dateEndTemp->add(new DateInterval('PT2H'));

// Quand on l'utilise
//$dateBegin->format('Y-m-d H:i:s');

$dateEnd = new DateTime();
$dateEnd->setTime(0, 0);
$dateEnd->add(new DateInterval('P8D'));

$dateEnd->format('Y-m-d H:i:s');
$diff=$dateBegin->diff($dateEnd);

$unusableEvents = array();
$usableEvents = array();
while (($diff->d) > 0) {

    // Requete de recherche des id
    $idPro = Appointment::isUsableEventRange($serviceId, $dateBegin->format('Y-m-d H:i:s'), $dateEndTemp->format('Y-m-d H:i:s'));
    if ($idPro == false) {
        $event['title'] = $serviceName." Indisponible";
        $event['start'] = $dateBegin->format('Y-m-d H:i:s');
        // Pour convertir en ISO - Fullcalendar
        $start = $event['start'];
        $start_obj = new DateTime($start);
        $event['start'] = $start_obj->format(DateTime::ISO8601);

        $event['end'] = $dateEndTemp->format('Y-m-d H:i:s');
        // Pour convertir en ISO - Fullcalendar
        $end =$event['end'];
        $end_obj = new DateTime($end);
        $event['end'] = $end_obj->format(DateTime::ISO8601);
        $event['backgroundColor'] = "#f00";
        array_push($unusableEvents, $event);
    } else {
        $event['title'] = $serviceName." Disponible";
        $event['start'] = $dateBegin->format('Y-m-d H:i:s');
        // Pour convertir en ISO - Fullcalendar
        $start = $event['start'];
        $start_obj = new DateTime($start);
        $event['start'] = $start_obj->format(DateTime::ISO8601);

        $event['end'] = $dateEndTemp->format('Y-m-d H:i:s');
        // Pour convertir en ISO - Fullcalendar
        $end =$event['end'];
        $end_obj = new DateTime($end);
        $event['end'] = $end_obj->format(DateTime::ISO8601);
        $end =$event['end'];

        $event['professionnalId'] = $idPro;
        $event['backgroundColor'] = "#0f0";
        array_push($usableEvents, $event);
    }
    $event = null;

    // FIN
    $dateBegin->add(new DateInterval('PT2H'));
    $dateEndTemp->add(new DateInterval('PT2H'));
    $diff=$dateBegin->diff($dateEnd);
}
$res = array();
array_push($res, $unusableEvents);
array_push($res, $usableEvents);

echo json_encode($res);

