<?php
	require_once "../model/accesBdd.php";
	
	$values = array(
			"login",
			"pwd",
			"mail",
			"town",
			"postal",
			"address"
		);
		
	function authenticate($login, $pwd){

		$pwd = hash("sha256", $pwd);


	    $user = login($login, $pwd);



	    if($user != NULL)
	    {
	        session_start();
	        $_SESSION["UID"] = $user->getId();
	        $_SESSION["type"] = get_class($user);


	        if($_SESSION["type"] == "Manager") {
	            header("Location: managerPanel.php");
	        }elseif ($_SESSION["type"] == "Professionnal") {
	            header("Location: professionnalPanel.php");
	        }elseif ($_SESSION["type"] == "Client") {
	            header("Location: clientPanel.php");
	        }
	    }
	}



	function login($login, $pwd){
		$result = null;
	    $pdo = connexionBdd();
	    
	    $sql = "SELECT id, name, firstname, login, type
	    FROM users
	    WHERE login = :login 
	    AND password = :pwd";
	    
	    try{
	        
	        $request = $pdo->prepare($sql);
	        $request->execute(array(
	            ':login'=> $login,
	            ':pwd'=> $pwd,
	        ));
	        
	        $result = $request->fetch();
	        $request->CloseCursor();
	        $request = null;
	        
	    }catch(PDOException $e){
	        $request = null;
	        echo 'Erreur getProf : ' . $e->getMessage() . '';
	        die();
	    }
	    if($result){
	    	extract($result);
	    	$user = null;
	    	if($type == 1)
	    		$user = new Manager($id, $name, $firstname, $login);
	    	elseif ($type == 2) {
	    		$user = new Professionnal($id, $name, $firstname, $login, NULL);
	    	}
	    	elseif ($type == 3) {
	    		$user = new Client($id, $name, $firstname, $login);
	    	}
	    	return $user;
	    }else{
	    	return NULL;
	    }
	}

	function createUser($login, $pwd, $town, $postal, $address, $mail){

		$pwd = hash("sha256", $pwd);
		$pdo = connexionBdd();

		$sql = "INSERT users (login, pwd, town, postal, address, mail) 
		VALUE (:login, :pwd, :town, :postal, :address, :mail)";

		try{

			$requete = $pdo->prepare($sql);
			$requete->execute(array(
				':login'=> $login,
				':pwd'=> $pwd,
				':town'=> $town,
				':postal'=> $postal,
				':address'=> $address,
				':mail'=> $mail
			));

		}catch(PDOException $e){
			$requete = null;
			echo 'Erreur setMdp : ' . $e->getMessage() . '';
			die();
		}
		return true;
	}


	function updateUser($info, $value){
		
		if(!isset($_SESSION['UID'])){
			echo 'Error updateUser : ' . $e->getMessage() . '';
			die();
		}
			
		$requete = null;
		if($info=="pwd")
			$value = hash("sha256", $value);
		$pdo = connexionBdd();

		$sql = "UPDATE users 
		SET :info = :value
		WHERE id = :id";

		try{

			$requete = $pdo->prepare($sql);
			$requete->execute(array(
				':id'=> $_SESSION['UID'],
				':value'=> $value,
				':info'=> $info
			));

		}catch(PDOException $e){
			echo 'Error updateUser : ' . $e->getMessage() . '';
			die();
		}
		return true;
	}
?>