<?php

	require_once '../model/accesBdd.php';
	require_once '../model/_professionnal.php';
	require_once '../controller/serviceController.php';
	
	$values = array(
			"name",
			"fname",
			"mail",
			"town",
			"postal",
			"address"
		);
		

	function getInfos($info){
		
		if(!isset($_GET['idpro'])){
			die();
		}
		
		$pdo = connectBddSuper();

		try{

			$requete = $pdo->prepare("SELECT :info FROM Pro WHERE IDPro = :id");
			$result =  $requete->execute(array(
				':id'=> $_GET['idpro'],
				':info'=> $info
			));
			$result = $result->fetch(PDO::FETCH_ASSOC)[$info];

		}catch(PDOException $e){
			$requete = null;
			echo 'Erreur setMdp : ' . $e->getMessage() . '';
			die();
		}
	}
	
	function getProfessionnals()
	{
		$pdo = connexionBdd();
	    $professionnals = null;
	    
	    $sql = "SELECT *
	    FROM users
	    WHERE type = 2";
	    
	    try{

	        $requete = $pdo->prepare($sql);
	        $requete->execute();

	        $results = $requete->fetchAll();
	        $requete->CloseCursor();
	        $requete = null;

	        $professionnals = array();

	        foreach($results as $res)
	        {
	        	$pro = new Professionnal($res["id"], $res["name"], $res["firstname"], null, null);
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

?>