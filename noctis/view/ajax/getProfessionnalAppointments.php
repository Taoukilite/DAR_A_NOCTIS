<?php
	require_once '../../model/accesBdd.php';

	session_start();
    
    $professionnalId = "";


    if(isset($_SESSION["UID"])){
    	$professionnalId = $_SESSION["UID"];
    }




	$appointments = getAppointments($professionnalId);

	$jsonAppointments = array();

	foreach ($appointments as $a) {
		$a["start"] = new DateTime($a["start"]);

		$a["start"] = $a["start"]->format(DateTime::ATOM);

		$a["end"] = new DateTime($a["end"]);

		$a["end"] = $a["end"]->format(DateTime::ATOM);

		$color = "default";

		if($a["state"] == 0)
		{
			$color = "green";
		}
		elseif ($a["state"] == 2) {
			$color = "purple";
		}
		$a["title"] = $a["name"] . " - " . $a["town"];
		$a["color"] = $color;
		array_push($jsonAppointments, $a);


	}

	echo(json_encode($jsonAppointments));



function getAppointments($professionnalId)
{
    $pdo = connexionBdd();

    $sql = "SELECT U.id AS UserId, U.name, U.firstname, U.address, U.town, U.postal, S.name, A.start, A.end, A.state, A.id AS appointmentId
            FROM appointment AS A
            JOIN services AS S ON S.id = A.serviceId
            JOIN users AS U ON U.id = A.clientId
            WHERE A.professionnalId = :professionnalId";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':professionnalId'=> $professionnalId
        ));

        $result = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;


        return $result;
    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getAppointements : ' . $e->getMessage() . '';
        die();
    }
}
?>