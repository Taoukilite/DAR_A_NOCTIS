<?php

	require_once '../model/accesBdd.php';
	require_once '../model/_professionnal.php';
	require_once '../controller/serviceController.php';



	function getProfessionnals()
	{
		$pdo = connexionBdd();
	    $professionnals = null;
	    
	    $sql = "SELECT *
	    FROM users
	    WHERE type = 2";
<<<<<<< HEAD
	    
	    try{

	        $requete = $pdo->prepare($sql);
	        $requete->execute();

	        $results = $requete->fetchAll();
	        $requete->CloseCursor();
	        $requete = null;

	        $professionnals = array();

	        foreach($results as $res)
	        {
	        	$pro = new Professionnal($res["id"], $res["name"], $res["firstname"], null, null, $res["address"], $res["town"], $res["postal"]);
	        	array_push($professionnals, $pro);
	        }

	    }catch(PDOException $e){
	        $requete = null;
	        echo 'Erreur getProfessionals : ' . $e->getMessage() . '';
	        die();
	    }
	    if($professionnals){
	        return $professionnals;
	    }else{
	        return NULL;
	    }		
	}

	function setSuppliedServices(Professionnal $professionnal)
	{
	    $pdo = connexionBdd();
	    
	    $sql = "SELECT *
	    FROM service_supplier
	    WHERE professionnalId = :id";
	    
		    try{

	        $requete = $pdo->prepare($sql);
	        $requete->execute(array(
	            ':id'=> $professionnal->getId()
	        ));

	        $result = $requete->fetchAll();
	        $requete->CloseCursor();
	        $requete = null;

	        $services = getServices();
	        $suppliedServices = array();

	        foreach($result as $res){
	        	foreach ($services as $service) {
	        		if($res["serviceId"] == $service->getId())
	        		{
	        			array_push($suppliedServices, $service);
	        		}
	        	}
	        }
	        $professionnal->setSuppliedServices($suppliedServices);



	    }catch(PDOException $e){
	        $requete = null;
	        echo 'Erreur setSuppliedServices : ' . $e->getMessage() . '';
	        die();
	    }
	    if($result){
	        return true;

	    }else{
	        return false;
	    }
	}

=======

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute();

        $results = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;

        $professionnals = array();

        foreach($results as $res)
        {
            $pro = new Professionnal($res["id"], $res["name"], $res["firstname"], null, null, $res["address"], $res["town"], $res["postal"], $res["mail"]);
            array_push($professionnals, $pro);
        }

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getProfessionals : ' . $e->getMessage() . '';
        die();
    }
    if($professionnals){
        return $professionnals;
    }else{
        return NULL;
    }
}

function setSuppliedServices(Professionnal $professionnal)
{
    $pdo = connexionBdd();

    $sql = "SELECT *
	    FROM service_supplier
	    WHERE professionnalId = :id";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id'=> $professionnal->getId()
        ));

        $result = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;

        $services = getServices();
        $suppliedServices = array();

        foreach($result as $res){
            foreach ($services as $service) {
                if($res["serviceId"] == $service->getId())
                {
                    array_push($suppliedServices, $service);
                }
            }
        }
        $professionnal->setSuppliedServices($suppliedServices);



    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setSuppliedServices : ' . $e->getMessage() . '';
        die();
    }
    if($result){
        return true;

    }else{
        return false;
    }
}
>>>>>>> refs/remotes/origin/develop
?>