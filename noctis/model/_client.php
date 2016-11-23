<?php

	require_once "_user.php";

	class Client extends User
	{
		private $_type;

		// Constructeur

		function __construct($name, $firstname, $adresse, $login, $mdp ,$type){
			parent::__construct($name, $firstname, $adresse, $login, $mdp);
			$this->_type = $type;
			connexionBdd();
			$sql = 'INSERT INTO users(name,firstname,adresse, type,login ,password) VALUES ("'.$name.'","'.$firstname.'","'.$adresse.'","'.$type.'","'.$login.'","'.hash("sha256", $mdp).'")';
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		
		}

		// Getter
		
		public function getId()
		{
			return $this->_type;
		}
		public function getLogin()
		{
			return $this->_login;
		}
		

		public function toString()
		{
			$str = parent::toString();
			return $str;
		}

	}



?>
