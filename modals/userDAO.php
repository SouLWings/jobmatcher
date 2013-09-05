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
	
	public function check_password($id, $pw)
	{
		$pw = md5($pw);
		return $this->row_count("SELECT * FROM account WHERE id = $id AND password = '$pw'") > 0;
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
		$pw = md5($pw);
		$success = $this->insert_row("NULL, '$un', '$pw', '$em', '$fn', '$ln', $ut, CURRENT_TIMESTAMP, 'PENDING','OFFLINE'", 'account');
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
	
	public function send_approval_email($id)
	{	
		$row = $this->get_first_row("SELECT email, firstname, username FROM account WHERE id = $id");
		$email = $row['email'];
		$fn = $row['firstname'];
		$un = $row['username'];
		$to = $email;
		$subject = "Welcome to UM Job Matching Portal";
		$message = "Dear $fn,\n\nYour account is now approved. You may log in to the portal.\n\nUsername is: $un";
		return (mail($to,$subject,$message) == true);
	}
	
	public function send_disapproval_email($id)
	{	
		$row = $this->get_first_row("SELECT email, firstname, username FROM account WHERE id = $id");
		$email = $row['email'];
		$fn = $row['firstname'];
		$un = $row['username'];
		$to = $email;
		$subject = "UM Job Matching Portal";
		$message = "Dear $fn,\n\nSorry, Your account is not approved.\n\nRegards,\nUMJobPortal";
		return (mail($to,$subject,$message) == true);
	}

	
	public function send_registration_email($email, $fn)
	{
		$to = $email;
		$subject = "Pending account approval - UM Job Matching Portal";
		$message = "Dear $fn,\n\nThank you for signing up with UM Job Matching Portal.\nPlease wait while your account is being approved. You will receive an email notification when your account get approved.";
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

	/***************************
	  functions for log in/out
	***************************/	
	public function do_log_in($un, $pw)
	{
		$pw = md5($pw);
		$query = "SELECT a.id, at.type, a.firstname, a.lastname, a.accountstatus FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.username = '$un' AND a.password = '$pw'";
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
				$user['accountstatus'] = $row['accountstatus'];
				$user['firstname'] = $row['firstname'];
				$user['lastname'] = $row['lastname'];
				$id = $user['id'];
				$table = $user['usertype'];
				
				$result = $this->con->query("SELECT time FROM loginlog WHERE account_ID = $id ORDER BY time DESC LIMIT 1");
				if($result->num_rows > 0)
					$user['time'] = $result->fetch_assoc()["time"];
				$result->free();
				
				if($user['usertype'] == 'employer')
				{
					$result = $this->con->query("SELECT id, company_ID FROM employer WHERE account_ID = $id");
					if($result->num_rows > 0)
					{	
						$row = $result->fetch_assoc();
						$user['eid'] = $row["id"];
						$user['cid'] = $row["company_ID"];
						$result->free();
					}
				}
				else if($user['usertype'] == 'jobseeker')
				{
					$result = $this->con->query("SELECT id, matric FROM jobseeker WHERE account_ID = $id");
					if($result->num_rows > 0)
					{	
						$row = $result->fetch_assoc();
						$user['jsid'] = $row["id"];
						$user['matric'] = $row["matric"];
						$result->free();
					}
				}
				
				if($this->con->query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)"))
					echo 'loginlog';
				else
					echo 'no log';
				
				if($this->con->query("UPDATE account SET onlinestatus = 'online' WHERE id = $id"))
					echo 'online-ed';
				else
					echo 'online status unchanged';
				return $user;
			}
		}
	}
	
	public function do_log_out($id)
	{
		if($this->con->query("UPDATE account SET onlinestatus = 'offline' WHERE id = $id"))
			echo 'offline-ed';
		else
			echo 'online status unchanged';
	}
	
	public function is_online($id)
	{
		return ($this->get_first_row("SELECT onlinestatus FROM account WHERE id = $id")['onlinestatus'] == 'ONLINE');
	}
	
	public function num_current_online_user()
	{
		return $this->row_count("SELECT id FROM account WHERE UPPER(onlinestatus) = 'ONLINE'");
	}

	/*********************************
	  functions for account approval
	*********************************/
	public function get_all_pending_jobseeker()
	{
		return $this->get_all_rows("SELECT a.id, a.firstname, a.lastname, js.matric, a.email, a.createTime FROM account a INNER JOIN jobseeker js ON a.id = js.account_ID WHERE UPPER(a.accountstatus) = 'PENDING'");
	}
	public function get_all_pending_employer()
	{
		return $this->get_all_rows("SELECT a.id, a.firstname, a.lastname, c.name, a.email, a.createTime, c.id as cid FROM account a INNER JOIN employer e ON a.id = e.account_ID INNER JOIN company c ON e.company_ID = c.id WHERE UPPER(a.accountstatus) = 'PENDING'");
	}
	public function approve_user($id)
	{
		return $this->con->query("UPDATE account SET accountstatus = 'APPROVED' WHERE id = $id");
	}
	public function disapprove_user($id)
	{
		$ut = $this->get_first_row("SELECT at.type FROM account a INNER JOIN accounttype at ON  at.id = a.accounttype_ID WHERE a.id = $id")['type'];
		echo "deleting from table: $ut";
		return($this->con->query("DELETE FROM $ut WHERE account_ID = $id") && ($this->con->query("DELETE FROM account WHERE id = $id")));
	}

	/********************************
	  functions for retrieving data
	********************************/
	public function get_company_by_id($id)
	{
		return $this->get_first_row("SELECT * FROM company WHERE id = $id");
	}
	public function get_user_by_id($id)
	{
		$ut = $this->get_first_row("SELECT type FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.id = $id")['type'];
		if($ut == 'admin')
			return $this->get_first_row("SELECT a.*, max(time) as lastlogintime FROM account a INNER JOIN loginlog ll ON a.id = ll.account_ID WHERE a.id = $id");
		else
			return $this->get_first_row("SELECT a.onlinestatus, a.email, a.firstname, a.lastname, a.createTime, a.accounttype_ID, t.*, ll.time as lastlogintime FROM account a INNER JOIN $ut t ON t.account_ID = a.id INNER JOIN loginlog ll ON a.id = ll.account_ID WHERE a.id = $id");
	}
	

	/****************************
	  functions for modify data
	****************************/
	public function update_profile($aid, $firstname, $lastname, $email)
	{
		return $this->con->query("UPDATE account set firstname = '$firstname', lastname = '$lastname', email = '$email' WHERE id = $aid");
	}
	
	public function update_password($aid, $pw)
	{
		$pw = md5($pw);
		return $this->con->query("UPDATE account set password = '$pw' WHERE id = $aid");
	}
}