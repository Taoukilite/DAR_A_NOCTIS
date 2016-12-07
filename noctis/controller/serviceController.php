<?php
	require_once '../model/accesBdd.php';
	require_once '../model/_service.php';
	function getServices()
	{
	    $pdo = connexionBdd();
	    $services = null;
	    
	    $sql = "SELECT *
	    FROM services";
	    
	    try{
	        $requete = $pdo->prepare($sql);
	        $requete->execute();
	        $results = $requete->fetchAll();
	        $requete->CloseCursor();
	        $requete = null;
	        $services = array();
	        foreach($results as $res)
	        {
	        	$s = new Service($res["id"], $res["name"]);
	        	array_push($services, $s);
	        }
	    }catch(PDOException $e){
	        $requete = null;
	        echo 'Erreur getLesInfos : ' . $e->getMessage() . '';
	        die();
	    }
	    if($services){
	        return $services;
	    }else{
	        return NULL;
	    }
	}
function getServicesName($nameEnter)
{
    $pdo = connexionBdd();
    $services = null;
    $sql = "SELECT name
	    FROM services
	    WHERE name LIKE :nameEnter";
    try{
        $requete = $pdo->prepare($sql);
        $requete->execute(array(":nameEnter" => '%'.$nameEnter.'%'));
        $nameServices = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;
    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getLesInfos : ' . $e->getMessage() . '';
        die();
    }
    if($nameServices){
        $json = "[";
        $first = true;
        foreach($nameServices as $name){
            if (!$first){
                $json .=  ',';
            }else{
                $first = false;
            }
            $json .= '"'. $name["name"]. '"';
        }
        $json .= ']';
        return $json;
    }else{
        return NULL;
    }
}
?>