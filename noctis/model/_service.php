<?php


	class Service
	{
		private $_id;
		private $_name;

		// Constructeur

		function __construct($id, $name){
			$this->_id = $id;
			$this->_name = $name;
		}

		// Getter
		
		public function getId()
		{
			return $this->_id;
		}
		public function getName()
		{
			return $this->_name;
		}
		

		

	}



?>