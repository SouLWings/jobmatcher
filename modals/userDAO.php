<?php
include 'connection.php';

class userDAO extends connection{
	
	public $con = 0;

	public function __construct(){
		if(!$this->con)
			$this->con = $this->connect();
	}
	
	public function check_submitted_registration($un, $pw, $pw2, $em, $ut){
		if($pw != $pw2)
			return false;
		
		else if(strlen($pw) < 6)
			return false;
			
		else if(check_username_exist($un))
			return false;
			
		else if()
	}
	
	//check whether a username exist, return true if exist
	public function check_username_exist($un){
		return mysql_num_rows(mysql_query("SELECT id FROM account WHERE username = '$un'")) == 1;
	}
}