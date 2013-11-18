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
	
	//check whether a company exist, return true if exist
	public function check_company_exist($cn){
		return $this->con->query("SELECT id FROM company WHERE name = '$cn'")->num_rows == 1;
	}
	
	//check whether the password matches the account id
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
	
	//create a new account with the provided details
	public function register_account($un, $pw, $em, $fn, $ln, $ut)
	{
		$pw = md5($pw);
		$success = $this->insert_row("NULL, '$un', '$pw', '$em', '$fn', '$ln', $ut, CURRENT_TIMESTAMP, 'PENDING','OFFLINE'", 'account');
		$this->account_id = $this->con->insert_id;
		return $success;
	}
	
	//create a new jobseeker record right after the creation of account
	public function register_jobseeker($matric)
	{
		return $this->insert_row("NULL, $this->account_id, '$matric', 0", 'jobseeker');
	}
	
	//create a new employer record right after the creation of account
	public function register_employer($position, $company_ID)
	{
		return $this->insert_row("NULL, $this->account_id, '$position', $company_ID",'employer');
	}
	
	//create a new company during registration for employer
	public function register_company($name, $address, $website, $phone, $fax, $overview)
	{
		return $this->insert_row("NULL, '$name', '$address', '$website', '$phone', '$fax', '$overview'",'company');
	}
	
	//function to send an email when an account is approved by the admin
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
	
	//function to send email when an account is disapproved
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

	//send email when the account is registered in the database
	public function send_registration_email($email, $fn)
	{
		$to = $email;
		$subject = "Pending account approval - UM Job Matching Portal";
		$message = "Dear $fn,\n\nThank you for signing up with UM Job Matching Portal.\nPlease wait while your account is being approved. You will receive an email notification when your account get approved.";
		return (mail($to,$subject,$message) == true);
	}	
	
	//retrieve all data from companies
	public function get_all_companies()
	{
		return $this->get_all_rows('SELECT * FROM company');
	}
	
	//return the company ID by providing the name
	public function get_company_id_by_name($cname)
	{
		return $this->get_first_row("SELECT id FROM company WHERE name = '$cname'")['id'];
	}

	/***************************
	  functions for log in/out
	***************************/	
	
	//retrieve user details given a username and password
	public function do_log_in($un, $pw)
	{
		$pw = md5($pw);
		$query = "SELECT a.id, at.type, a.firstname, a.lastname, a.accountstatus FROM account a INNER JOIN accounttype at ON a.accounttype_ID = at.id WHERE a.username = '$un' AND a.password = '$pw'";
		if($result = $this->con->query($query))
		{
			//if 0 row or more than 1 rows return, log in = fail
			if($result->num_rows != 1)
			{
				echo'false';
				return false;
			}
			//user autenticated, getting data for the user
			else
			{
				//retrieving a row from the resultset
				$row = $result->fetch_assoc();
				
				//free the resource
				$result->free();
				
				//store infomation into a $user array to be returned
				$user['id'] = $row['id'];
				$id = $row['id'];
				$user['usertype'] = $row['type'];
				$user['accountstatus'] = $row['accountstatus'];
				$user['firstname'] = $row['firstname'];
				$user['lastname'] = $row['lastname'];
				
				$result = $this->con->query("SELECT time FROM loginlog WHERE account_ID = $id ORDER BY time DESC LIMIT 1");
				if($result->num_rows > 0)
					$user['time'] = $result->fetch_assoc()["time"];
				$result->free();
				
				//getting extra info for employer and jobsseeker account
				if($user['usertype'] == 'employer')
				{
					$result = $this->con->query("SELECT id, company_ID FROM employer WHERE account_ID = $id");
					echo 'asd';
					if($result->num_rows > 0)
					{	
					echo 'asde';
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
				
				//update loginlog and printing some debugging log
				if($this->con->query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)"))
					echo 'loginlog';
				else
					echo 'no log';
				
				//update the user status to online and printing some debugging log
				if($this->con->query("UPDATE account SET onlinestatus = 'online' WHERE id = $id"))
					echo 'online-ed';
				else
					echo 'online status unchanged';
					
				return $user;
			}
		}
	}
	
	//chg user back to offline when log out
	public function do_log_out($id)
	{
		if($this->con->query("UPDATE account SET onlinestatus = 'offline' WHERE id = $id"))
			echo 'offline-ed';
		else
			echo 'online status unchanged';
	}
	
	//check whether the a user is onlines
	public function is_online($id)
	{
		return ($this->get_first_row("SELECT onlinestatus FROM account WHERE id = $id")['onlinestatus'] == 'ONLINE');
	}
	
	//check total number of line user
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
			return $this->get_first_row("SELECT a.*,a.id as account_ID, max(time) as lastlogintime FROM account a INNER JOIN loginlog ll ON a.id = ll.account_ID WHERE a.id = $id");
		else
			return $this->get_first_row("SELECT a.onlinestatus, a.email, a.firstname, a.lastname, a.createTime, a.accounttype_ID, t.*, MAX(ll.time) as lastlogintime FROM account a INNER JOIN $ut t ON t.account_ID = a.id INNER JOIN loginlog ll ON a.id = ll.account_ID WHERE a.id = $id");
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
	/*******************************
	  functions for reset password
	*******************************/
	public function get_account_by_hash($hash)
	{
		return $this->get_first_row("SELECT a.id, a.username, CONCAT_WS(' ',a.firstname, a.lastname) as name FROM account a INNER JOIN forgetpassword fp ON fp.account_ID = a.id WHERE fp.resethash = '$hash'");
	}
	
	public function resetPassword($aid, $pw)
	{
		$pw = md5($pw);
		return ($this->con->query("UPDATE account SET password = '$pw' WHERE id = $aid") && $this->con->query("DELETE FROM forgetpassword WHERE account_ID = $aid"));
	}
	
	public function send_forgetpw_email($email)
	{	
		$row = $this->get_first_row("SELECT id, firstname, username FROM account WHERE email = '$email'");
		if(sizeof($row) < 1)
			die("No account associate with this email address.");
		$fn = $row['firstname'];
		$un = $row['username'];
		$aid = $row['id'];
		$to = $email;
		$hash = md5($aid.$un);
		if(!$this->insert_row("NULL, $aid, '$hash', NOW()",'forgetpassword')){
			die('die insert row');
		}
		$subject = "Password reset - UM Job Matching Portal";
		$message = "Dear $fn,\n\nPlease click the following link to reset your password.\nhttp://".$_SERVER['SERVER_ADDR']."/jobmatcher/forgetpassword.php?hash=$hash \nIgnore this message if you did not perform such request.\n\nRegards,\nUMJobPortal Support team";
		return (mail($to,$subject,$message) == true);
	}

	/********************************
	  functions for profile picture
	********************************/
	public function get_profile_pic_dirc($aid)
	{
		$row = $this->get_first_row("SELECT picdirc FROM account WHERE id = $aid");
		if(sizeof($row)>0 && $row['picdirc'] != '')
			return $row['picdirc'];
		else 
			return "img/profile_pic/0.png";
	}
	
	public function save_profile_pic_dirc($name, $aid)
	{
		return $this->con->query("UPDATE account SET picdirc = '$name' WHERE id = $aid");
	}
}