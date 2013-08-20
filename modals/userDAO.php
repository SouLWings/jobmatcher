<?php
include 'connection.php';

class userDAO extends connection{
	
	public $con = 0;

	
	public function __construct(){
		if(!$this->con)
			$this->con = $this->connect();
	}

	/*************************
	  functions for register
	*************************/
	
	//check whether a username exist, return true if exist
	public function check_username_exist($un){
		return mysql_num_rows(mysql_query("SELECT id FROM account WHERE username = '$un'")) == 1;
	}
	
	
	//check the details valid
	public function check_submitted_registration($un, $pw, $pw2, $em, $ut){
		if($pw != $pw2)
			return false;
		
		else if(strlen($pw) < 6)
			return false;
			
		else if(check_username_exist($un))
			return false;
			
		else if(strlen($un) < 4 || strlen($un) > 20)
			return false;
		
		else if(intval($ut) < 1 || intval($ut) > 2)
			return false;
			
		return true;
	}
	
	
	function send_approval_email($email, $fn, $un)
	{
		$to = $email;
		$subject = "Welcome to UM Job Matching Portal";
		$message = "Dear $fn,\n\nYour account is not approved. Your may log in to the portal.\n\nUsername is: $un";
		return (mail($to,$subject,$message) == true);
	}

	
	function send_registration_email($email, $fn)
	{
		$to = $email;
		$subject = "Pending account approval - UM Job Matching Portal";
		$message = "Dear $fn,\n\nThank you for signing up with UM Job Matching Portal.\nPlease wait while your account is being approved. Your will recieve an email notification when your account get approved.";
		return (mail($to,$subject,$message) == true);
	}	
	

	/***********************
	  functions for log in
	***********************/	
	function do_log_in($un, $pw)
	{
		echo'asdasd';
		$query = "SELECT a.id, UPPER(at.type) FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.username = '$un' AND a.password = '$pw'";
		if($result = mysql_query($query))
		{
			if(mysql_num_rows($result) != 1)
				return false;
			else
			{
				echo 'asd';
				$user['id'] = mysql_result($result, 0, 'id');
				$user['usertype'] = mysql_result($result, 0, 'type');
				$id = $user['id'];
				$table = $user['usertype'];
				//add limit to increase performance
				$result = mysql_query("SELECT time FROM loginlog WHERE account_ID = $id ORDER BY time DESC");
				if(mysql_num_rows($result) > 0)
					$user['time'] = mysql_result($query_run, 0, "time");
				
				//might have error
				$user['firstname'] = mysql_result(mysql_query("SELECT firstname FROM $table WHERE account_ID = $id"), 0, 'firstname');
				echo 'firstnam query= '."SELECT firstname FROM $table WHERE account_ID = $id";
				mysql_query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)");
				
				return $user;
			}
		}		
	}
}