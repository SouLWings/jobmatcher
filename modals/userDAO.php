<?php
include_once 'modal.inc.php';

class userDAO extends modal{

	private $account_id = 0;
	private $company_id = 0;
	
 
	/****************************
	  functions for create user
	****************************/

	//check whether a username exist, return true if exist
	public function check_account_exist($un){
		return $this->con->query("SELECT id FROM account WHERE username = '$un'")->num_rows == 1;
	}
	
	//check whether the account details are valid
	public function check_submitted_account($un, $pw, $pw2, $em, $fn, $ln, $ut){
		if($pw != $pw2)
			return false;
		
		else if(strlen($pw) < 6)
			return false;
			
		else if(strlen($un) < 4 || strlen($un) > 20)
			return false;
		
		else if($ut!='jobseeker' && $ut!='employer')
			return false;
		
		return true;
	}
	
	//check whether the jobseeker details are valid
	public function check_submitted_jobseeker($matric)
	{
		return true;
	}
	
	//check whether the employer details are valid
	public function check_submitted_employer($position, $company)
	{
		return true;
	}
	
	public function register_account($un, $pw, $em, $fn, $ln, $ut)
	{
		$success = $this->insert_row("NULL, '$un', '$pw', '$em', '$fn', '$ln', $ut, CURRENT_TIMESTAMP, 'PENDING'", 'account');
		$this->account_id = $this->con->insert_id;
		return $success;
	}
	
	public function register_jobseeker($matric)
	{
		return $this->insert_row("NULL, $this->account_id, '$matric', 0", 'jobseeker');
	}
	
	public function register_employer($position, $company_ID)
	{
		return $this->insert_row("NULL, $this->account_id, '$position', $company_ID",'employer');
	}
	
	public function register_company($name, $address, $website, $phone, $fax, $overview)
	{
		return $this->insert_row("NULL, '$name', '$address', '$website', '$phone', '$fax', '$overview'",'company');
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
	
	public function get_all_companies()
	{
		return $this->get_all_rows('SELECT * FROM company');
	}
	
	public function get_company_id_by_name($cname)
	{
		return $this->get_first_row("SELECT id FROM company WHERE name = '$cname'")['id'];
	}

	/***********************
	  functions for log in
	***********************/	
	public function do_log_in($un, $pw)
	{
		$query = "SELECT a.id, at.type, a.firstname, a.status FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.username = '$un' AND a.password = '$pw'";
		if($result = $this->con->query($query))
		{
			if($result->num_rows != 1)
			{
				echo'false';
				return false;
			}
			else
			{
				$row = $result->fetch_assoc();
				$result->free();
				$user['id'] = $row['id'];
				$user['usertype'] = $row['type'];
				$user['status'] = $row['status'];
				$user['firstname'] = $row['firstname'];
				$id = $user['id'];
				$table = $user['usertype'];
				
				$result = $this->con->query("SELECT time FROM loginlog WHERE account_ID = $id ORDER BY time DESC LIMIT 1");
				if($result->num_rows > 0)
					$user['time'] = $result->fetch_assoc()["time"];
				$result->free();
				
				if($this->con->query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)"))
					echo 'loginlog';
				else
					echo 'no log';

				return $user;
			}
		}
	}
	
	

	/****************************************
	  functions for selecting users/company
	****************************************/
	public function get_all_pending_jobseeker()
	{
		return $this->get_all_rows("SELECT a.id, a.firstname, a.lastname, js.matric, a.email, a.createTime FROM account a INNER JOIN jobseeker js ON a.id = js.account_ID WHERE UPPER(a.status) = 'PENDING'");
	}
	public function get_all_pending_employer()
	{
		return $this->get_all_rows("SELECT a.id, a.firstname, a.lastname, c.name, a.email, a.createTime, c.id as cid FROM account a INNER JOIN employer e ON a.id = e.account_ID INNER JOIN company c ON e.company_ID = c.id WHERE UPPER(a.status) = 'PENDING'");
	}
	public function get_company_by_id($id)
	{
		return $this->get_first_row("SELECT * FROM company WHERE id = $id");
	}
	public function approve_user($id)
	{
		return $this->con->query("UPDATE account SET status = 'APPROVED' WHERE id = $id");
	}
	public function disapprove_user($id)
	{
		$ut = $this->get_first_row("SELECT at.type FROM account a INNER JOIN accounttype at ON  at.id = a.accounttype_ID WHERE a.id = $id")['type'];
		echo "deleting from table: $ut";
		return($this->con->query("DELETE FROM $ut WHERE account_ID = $id") && ($this->con->query("DELETE FROM account WHERE id = $id")));
	}
}