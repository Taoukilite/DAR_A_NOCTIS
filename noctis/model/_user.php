<<<<<<< HEAD
<?php

	require_once "_client.php";
	require_once "_professionnal.php";
	require_once '_manager.php';
	class User
	{
		private $_id;
		private $_name;
		private $_firstname;
		private $_login;

		// Constructeur

		function __construct($id, $name, $firstname, $login)
		{
			$this->_id = $id;
			$this->_name = $name;
			$this->_firstname = $firstname;
			$this->_login = $login;
		}


		// Getters

		function getId()
		{
			return $this->_id;
		}

		function getName()
		{
			return $this->_name;
		}

		function getFirstname()
		{
			return $this->_firstname;
		}

		function getLogin()
		{
			return $this->_login;
		}

		function toString()
		{
			$str = "id : ";
			$str .= $this->getId();
			$str .= '<br />';
			$str .= 'nom : ';
			$str .= $this->getName();
			$str .= '<br />';
			$str .= 'prenom : ';
			$str .= $this->getPrenom();
			$str .= '<br />';
			$str .= 'login : ';
			$str .= $this->getLogin();
			
			return $str;
		}

		
	}


	
=======
<?php

	require_once "accesBdd.php";
	require_once "_client.php";
	require_once "_professionnal.php";
	require_once '_manager.php';
	class User
	{
		private $_name;
		private $_firstname;
		private $_adresse;
		private $_login;
		private $_mdp;

		// Constructeur

		function __construct($name, $firstname, $adresse, $login, $mdp )
		{
			
			$this->_name = $name;
			$this->_firstname = $firstname;
			$this->_adresse = $adresse;
			$this->_login = $login;
			$this->_mdp = $mdp;
			
		}


		// Getters

		function getId()
		{
			return $this->_id;
		}

		function getName()
		{
			return $this->_name;
		}

		function getFirstname()
		{
			return $this->_firstname;
		}

		function getLogin()
		{
			return $this->_login;
		}

		function toString()
		{
			$str = "id : ";
			$str .= $this->getId();
			$str .= '<br />';
			$str .= 'nom : ';
			$str .= $this->getName();
			$str .= '<br />';
			$str .= 'prenom : ';
			$str .= $this->getFirstname();
			$str .= '<br />';
			$str .= 'login : ';
			$str .= $this->getLogin();
			
			return $str;
		}

		
	}

/*
	function login($login, $pwd)
	{
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
	    		$user = new Professionnal($id, $name, $firstname, $login);
	    	}
	    	elseif ($type == 3) {
	    		$user = new Client($id, $name, $firstname, $login);
	    	}
	    	return $user;
	    }else{
	    	return NULL;
	    }
	}*/
>>>>>>> refs/remotes/origin/master
