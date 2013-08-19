<?php
include 'connection.php';

class sampleDAO extends connection{
	
	public $con = 0;

	public function __construct(){
		if(!$this->con)
			$this->con = $this->connect();
	}
		
	
}