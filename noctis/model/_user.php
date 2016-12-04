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
		private $_address;
		private $_town;
		private $_postalCode;

		// Constructeur

		function __construct($id, $name, $firstname, $login, $address, $town, $postalCode)
		{
			$this->_id = $id;
			$this->_name = $name;
			$this->_firstname = $firstname;
			$this->_login = $login;
			$this->_address = $address;
			$this->_town = $town;
			$this->_postalCode = $postalCode;
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

		function getAddress()
		{
			return $this->_address;
		}

		function getTown()
		{
			return $this->_town;
		}

		function getPostalCode()
		{
			return $this->_postalCode;
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


	