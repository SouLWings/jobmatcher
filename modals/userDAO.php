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
	public function check_account_exist($un){
		return mysql_num_rows(mysql_query("SELECT id FROM account WHERE username = '$un'")) == 1;
	}
	
	//check whether the account details are valid
	public function check_submitted_account($un, $pw, $pw2, $em, $ut){
		if($pw != $pw2)
			return false;
		
		else if(strlen($pw) < 6)
			return false;
			
		else if(strlen($un) < 4 || strlen($un) > 20)
			return false;
		
		else if($ut!='jobseeker' && ut!='employer')
			return false;
		
		return true;
	}
	
	//check whether the jobseeker details are valid
	public function check_submitted_jobseeker($fn, $ln, $matric)
	{
		return true;
	}
	
	//check whether the employer details are valid
	public function check_submitted_employer($fn, $ln, $position, $company)
	{
		return true;
	}
	
	public function register_jobseeker($un, $pw, $em, $ut, $fn, $ln, $matric)
	{
		return mysql_query("INSERT INTO ");
	}
	
	public function send_approval_email($email, $fn, $un)
	{
		$to = $email;
		$subject = "Welcome to UM Job Matching Portal";
		$message = "Dear $fn,\n\nYour account is not approved. Your may log in to the portal.\n\nUsername is: $un";
		return (mail($to,$subject,$message) == true);
	}

	
	public function send_registration_email($email, $fn)
	{
		$to = $email;
		$subject = "Pending account approval - UM Job Matching Portal";
		$message = "Dear $fn,\n\nThank you for signing up with UM Job Matching Portal.\nPlease wait while your account is being approved. Your will recieve an email notification when your account get approved.";
		return (mail($to,$subject,$message) == true);
	}	
	
	public function get_all_company()
	{
		$result = mysql_query('SELECT * FROM company', $this->con);
		$companies = array();
		while ($row = mysql_fetch_assoc($result)) {
			$companies[] = $row;
		}

		return $companies;
	}

	/***********************
	  functions for log in
	***********************/	
	public function do_log_in($un, $pw)
	{
		$query = "SELECT a.id, at.type FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.username = '$un' AND a.password = '$pw'";
		if($result = mysql_query($query))
		{
			if(mysql_num_rows($result) != 1)
				return false;
			else
			{
				//$user = array("id"=>"","usertype"=>"","time"=>"","firstname"=>"");
				$row = mysql_fetch_assoc($result);
				$user['id'] = $row['id'];
				$user['usertype'] = $row['type'];
				$id = $user['id'];
				$table = $user['usertype'];
				//add limit to increase performance
				$result = mysql_query("SELECT time FROM loginlog WHERE account_ID = $id ORDER BY time DESC");
				if(mysql_num_rows($result) > 0)
					$user['time'] = mysql_result($result, 0, "time");
				
					//might have error
				$user['firstname'] = mysql_result(mysql_query("SELECT firstname FROM $table WHERE account_ID = $id"), 0, 'firstname');
				echo 'firstnam query= '."SELECT firstname FROM $table WHERE account_ID = $id";
				mysql_query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)");
						foreach ($user as $a):
			echo $a.'<br>';
		endforeach;
				return $user;
			}
		}		
	}
}