<?php
	require_once '../../model/accesBdd.php';

    extract($_POST);
    echo confirmClientAppointment($appointmentId, $stateId);



    function confirmClientAppointment($appointmentId, $stateId)
    {
    	$pdo = connexionBdd();
        $succes = false;
        $stateId++;


        $sql = "UPDATE appointment 
        		SET state = :stateId
        		WHERE id = :appointmentId";

        try{
            $requete = $pdo->prepare($sql);
            $requete->execute(array(
                ':stateId' => $stateId,
                ':appointmentId' => $appointmentId
            ));
            $succes = true;

        }
        catch(PDOException $e)
        {
            $requete = null;
            echo 'Erreur confirmClientAppointment : ' . $e->getMessage() . '';
            die();
        }
        return $succes; 
    }
?>
