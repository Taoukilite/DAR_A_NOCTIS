<?php
	require_once '../../model/accesBdd.php';

	session_start();
    
    $clientId = "";


    if(isset($_SESSION["UID"])){
    	$clientId = $_SESSION["UID"];
    }

	$appointments = getAppointments($clientId);


	$jsonAppointments = array();

	foreach ($appointments as $a) {
		$a["start"] = new DateTime($a["start"]);

		$a["start"] = $a["start"]->format(DateTime::ATOM);

		$a["end"] = new DateTime($a["end"]);

		$a["end"] = $a["end"]->format(DateTime::ATOM);

		$color = "default";

		if($a["state"] == 0)
		{
			$color = "default";
		}
		elseif ($a["state"] == 1) {
			$color = "green";
		}elseif ($a["state"] == 2) {
			$color = "purple";
		}
		$a["title"] = $a["name"];
		$a["color"] = $color;
		array_push($jsonAppointments, $a);
	}

	echo(json_encode($jsonAppointments));


	function getAppointments($clientId)
	{
	    $pdo = connexionBdd();

	    $sql = "SELECT S.name, A.start, A.end, A.state, A.price, A.id AS appointmentId
	            FROM appointment AS A
	            JOIN services AS S ON S.id = A.serviceId
	            WHERE A.clientId = :clientId";

	    try{

	        $requete = $pdo->prepare($sql);
	        $requete->execute(array(
	            ':clientId'=> $clientId
	        ));

	        $result = $requete->fetchAll();
	        $requete->CloseCursor();
	        $requete = null;


	        return $result;
	    }catch(PDOException $e){
	        $requete = null;
	        echo 'Erreur getAppointments : ' . $e->getMessage() . '';
	        die();
	    }
	}
?>