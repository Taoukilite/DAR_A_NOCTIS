<?php
require_once '../../model/accesBdd.php';

	session_start();
    
    $professionnalId = "";


    if(isset($_SESSION["UID"])){
    	$professionnalId = $_SESSION["UID"];
    }
    extract($_POST);
    echo confirmProfessionnalAppointment($appointmentId, $duration, $price, $stateId);



    function confirmProfessionnalAppointment($appointmentId, $endTime, $price, $stateId)
    {
    	$pdo = connexionBdd();
        $succes = false;
        $stateId++;
        $endTimeDateTimeFormat = date("Y-m-d H:i:s", strtotime($endTime));


        $sql = "UPDATE appointment 
        		SET price = :price, end = :endTime, state = :stateId
        		WHERE id = :appointmentId";

        try{
            $requete = $pdo->prepare($sql);
            $requete->execute(array(
                ':price' => $price,
                ':endTime' => $endTimeDateTimeFormat,
                ':stateId' => $stateId,
                ':appointmentId' => $appointmentId
            ));
            $succes = true;

        }
        catch(PDOException $e)
        {
            $requete = null;
            echo 'Erreur confirmProfessionnalAppointment : ' . $e->getMessage() . '';
            die();
        }
        return $succes; 
    }
?>