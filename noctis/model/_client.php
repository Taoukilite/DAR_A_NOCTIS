<<<<<<< HEAD
<?php

	require_once "_user.php";

	class Client extends User
	{
		private $_id;
		private $_login;

		// Constructeur

		function __construct($id, $name, $firstname, $login){
			parent::__construct($id, $name, $firstname, $login);
			$this->_id = $id;
			$this->_login = $login;
		}

		// Getter
		
		public function getId()
		{
			return $this->_id;
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
=======
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
>>>>>>> refs/remotes/origin/master
