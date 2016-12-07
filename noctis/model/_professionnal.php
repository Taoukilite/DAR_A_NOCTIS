<?php
	require_once "_user.php";
	require_once '_service.php';
	class Professionnal extends User
	{
		private $_id;
		private $_login;
		private $_suppliedServices = array();
		// Constructeur
		function __construct($id, $name, $firstname, $login, $suppliedServices, $address, $town, $postalCode, $mail){
			parent::__construct($id, $name, $firstname, $login, $address, $town, $postalCode, $mail);
			$this->_id = $id;
			$this->_login = $login;
			$this->_suppliedServices = $suppliedServices;
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
		public function getSuppliedServices()
		{
			return $this->_suppliedServices;
		}
		// Setter
		public function setSuppliedServices($services)
		{
			$this->_suppliedServices = $services;
		}
		
		//Methods
		
		public function toString()
		{
			$str = parent::toString();
			return $str;
		}
	}
?>