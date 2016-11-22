<?php

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

?>