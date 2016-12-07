<?php

	function authenticate($login, $pwd){

		$pwd = hash("sha256", $pwd);
	    $user = login($login, $pwd);

	    if($user != NULL)
	    {
	        session_start();
	        $_SESSION["UID"] = $user->getId();
	        $_SESSION["type"] = get_class($user);
	        $_SESSION["name"] = $user->getName();
	        $_SESSION["firstname"] = $user->getFirstname();


	        if($_SESSION["type"] == "Manager") {
	            header("Location: managerPanel.php");
	        }elseif ($_SESSION["type"] == "Professionnal") {
	            header("Location: professionnalPanel.php");
	        }elseif ($_SESSION["type"] == "Client") {
	            header("Location: clientPanel.php");
	        }

	    }
	}



	function login($login, $pwd)
    {
        $result = null;
        $pdo = connexionBdd();

        $sql = "SELECT id, name, firstname, login, address, town, postal, type, mail
	    FROM users
	    WHERE login = :login 
	    AND password = :pwd";

        try {

            $request = $pdo->prepare($sql);
            $request->execute(array(
                ':login' => $login,
                ':pwd' => $pwd,
            ));

            $result = $request->fetch();
            $request->CloseCursor();
            $request = null;

        } catch (PDOException $e) {
            $request = null;
            echo 'Erreur getProf : ' . $e->getMessage() . '';
            die();
        }
        if ($result) {
            extract($result);
            $user = null;
            if ($type == 1)
                $user = new Manager($id, $name, $firstname, $login, null, null, null, $mail);
            elseif ($type == 2) {
                $user = new Professionnal($id, $name, $firstname, $login, null, $address, $town, $postal, $mail);
            } elseif ($type == 3) {
                $user = new Client($id, $name, $firstname, $login, $address, $town, $postal, $mail);
            }
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Retourne objet user (idUser)
     *
     * @param $idUser
     * @return mixed
     * @throws Exception
     */
    function getUserById($idUser)
    {
        $pdo = connexionBdd();
        $sql = <<<SQL
            SELECT *
            FROM users
            WHERE id=:idUser
SQL;


        try {
            /*$request = $pdo->prepare($sql);
            $request->setFetchMode(PDO::FETCH_CLASS, "User");
            $request->execute(array(
                ':idUser'=> $idUser,
            ));

            $data = $request->fetch();
            $request->CloseCursor();
            $request = null;
            return $data;*/

            $request = $pdo->prepare($sql);
	        $request->execute(array(
	            ':idUser'=> $idUser
	        ));

	        $result = $request->fetch();
	        $request->CloseCursor();
	        $request = null;

	        extract($result);
            $user = null;
            if ($type == 1)
                $user = new Manager($id, $name, $firstname, $login, null, null, null, $mail);
            elseif ($type == 2) {
                $user = new Professionnal($id, $name, $firstname, $login, null, $address, $town, $postal, $mail);
            } elseif ($type == 3) {
                $user = new Client($id, $name, $firstname, $login, $address, $town, $postal, $mail);
            }
            return $user;
        } catch (PDOException $e) {
            $request = null;
            echo 'Erreur getProf : ' . $e->getMessage() . '';
            die();
        }
        return null;
    }

	function createUser($name, $firstname, $login, $pwd, $town, $postal, $address, $mail, $type){

		$pwd = hash("sha256", $pwd);
		$pdo = connexionBdd();


		$sql = "INSERT INTO users (name, firstname, login, password, town, postal, address, mail, type) 
		VALUES (:name, :firstname, :login, :pwd, :town, :postal, :address, :mail, :type)";

		try{

			$requete = $pdo->prepare($sql);
			$requete->execute(array(
				':name'=> $name,
				':firstname'=> $firstname,
				':login'=> $login,
				':pwd'=> $pwd,
				':town'=> $town,
				':postal' => $postal,
				':postal'=> $postal,
				':address'=> $address,
				':mail'=> $mail,
				':type'=> $type
			));

		}catch(PDOException $e){
			$requete = null;
			echo 'Erreur createUser : ' . $e->getMessage() . '';
			die();
		}
		return true;
	}

	function updateUser($info, $value){

		if(!isset($_SESSION['UID'])){
			return 'Error updateUser : ' . $e->getMessage() . '';
		}

		$requete = null;
		if($info=="pwd")
			$value = hash("sha256", $value);
		$pdo = connexionBdd();

		// Pour prévenir injection sql, on enlève tout sauf A-Z et _
        $info = preg_replace('/[^a-zA-Z_]*/', '', $info);
		$sql = "
UPDATE users
		SET $info = :valu
		WHERE id = :id
";

		try{
			$requete = $pdo->prepare($sql);
			$requete->execute(array(
				':id'=> $_SESSION['UID'],
				':valu'=> $value
			));

		}catch(PDOException $e){
			return 'Error updateUser : ' . $e->getMessage() . '';
		}
		return true;
	}

?>