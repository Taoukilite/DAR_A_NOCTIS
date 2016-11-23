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