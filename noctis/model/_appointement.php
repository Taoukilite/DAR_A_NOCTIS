<?php
/**
* 
*/
class Appointement
{
	private $_title;
	private $_date;
	private $_start;
	private $_end;
	private $_description;
	function __construct($title, $date, $start, $end, $description)
	{
		$this->_title = $title;
		$this->_date = $date;
		$this->_start = $start;
		$this->_description = $description;
	}

	function timeToISO8601(){
		
	}
}

?>