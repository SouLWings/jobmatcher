<?php
include 'controller.inc.php';
include 'modals/userDAO.php';

//if is logged in then cnt register agn
if(is_logged_in())
{
	header("Location:index.php");
}
//processing the submitted register data to execute the registration
else if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['rpassword']) && !empty($_POST['rpassword']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['usertype']) && !empty($_POST['usertype']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']))
{
	$username = get_secured($_POST['username']);
	$password = get_secured($_POST['password']);
	$rpassword = get_secured($_POST['rpassword']);
	$email = get_secured($_POST['email']);
	$usertype = get_secured($_POST['usertype']);
	$firstname = get_secured($_POST['firstname']);
	$lastname = get_secured($_POST['lastname']);
	
	$userDAO = new userDAO();
	
	//check whether the account name exist
	if(!$userDAO->check_account_exist($username))
	{
		//check submitted value is correct
		if($userDAO->check_submitted_account($username, $password, $rpassword, $email, $firstname, $lastname, $usertype))
		{
			//if register jobseeker, matric muz be there
			if($usertype == 'jobseeker' && isset($_POST['matric']) && !empty($_POST['matric']))
			{
				$matric = get_secured($_POST['matric']);
				if($userDAO->check_submitted_jobseeker($matric))
				{
					//creating account
					if($userDAO->register_account($username, $password, $email, $firstname, $lastname, 1))
					{
						//creating jobseeker record
						if($userDAO->register_jobseeker($matric))
						{
							//set $msg to be displayed
							$msg = 'Thank you for registering in UM Job Matching Portal. Your account is pending for approval. You will receive an email when your account is approved.';
							$userDAO->send_registration_email($email,$firstname);
							include 'views/register-result.V.php';
						}else
							$registrationsuccess = 'register jobseeker failed';
					}else
						$registrationsuccess = 'register jobseeker account failed';
				}else
					$registrationsuccess = 'invalid submitted jobseeker details';
			}
			//else if user is employer + position is set + (companyId/companyDetails) is set
			else if($usertype == 'employer' && isset($_POST['position']) && !empty($_POST['position']) && (isset($_POST['companyid']) && !empty($_POST['companyid'])) || (isset($_POST['cname']) && !empty($_POST['cname']) &&isset($_POST['caddress']) && !empty($_POST['caddress']) &&isset($_POST['cwebsite']) && !empty($_POST['cwebsite']) &&isset($_POST['cphone']) && !empty($_POST['cphone']) &&isset($_POST['cfax']) && !empty($_POST['cfax']) &&isset($_POST['coverview']) && !empty($_POST['coverview'])))
			{
				$position = get_secured($_POST['position']);
				
				//if existing company -> get id, else -> register new company
				if(isset($_POST['companyid']) && !empty($_POST['companyid']))
				{
					$companyid = get_secured($_POST['companyid']);
				}
				else
				{
					$cname = get_secured($_POST['cname']);
					$caddress = get_secured($_POST['caddress']);
					$cwebsite = get_secured($_POST['cwebsite']);
					$cphone = get_secured($_POST['cphone']);
					$cfax = get_secured($_POST['cfax']);
					$coverview = get_secured($_POST['coverview']);
					
					//check whether the company exist
					if(!$userDAO->check_company_exist($cname)){
						if($userDAO->register_company($cname, $caddress, $cwebsite, $cphone, $cfax, $coverview))
						{
							$companyid = $userDAO->get_company_id_by_name($cname);
						}
						else
							$registrationsuccess = 'register company failed';
					}
					else{
						$errorcontent = 'Company already exist, please choose the company from the list.';
						include 'views/register.V.php';
					}
				}
				
				if(isset($companyid))
				{
					//all data ready, check employer details and start registration
					if($userDAO->check_submitted_employer($position, $companyid))
					{
						if($userDAO->register_account($username, $password, $email, $firstname, $lastname, 2))
						{
							if($userDAO->register_employer($position, $companyid))
							{
								$msg = 'Thank you for registering in UM Job Matching Portal. Your account is pending for approval. You will receive an email when your account is approved.';
								$userDAO->send_registration_email($email,$firstname);
								include 'views/register-result.V.php';
							}else
								$registrationsuccess = 'register employer failed';
						}else
							$registrationsuccess = 'register employer account failed';
					}else
						$registrationsuccess = 'invalid submitted employer details';
				}
			}else
				$registrationsuccess = 'employer or student details not set';
		}else
			$registrationsuccess = 'invalid submitted account details';
	}
	else
	{
		$errorcontent = 'Account with the same username already exist.';
		include 'views/register.V.php';
	}	
	$userDAO->disconnect();
	
	//if somethg failed
	if(isset($registrationsuccess))
	{
		$msg = 'Sorry! There is a problem with your registration. Please try again later.<br>'.$registrationsuccess;
		include 'views/register-result.V.php';	
	}
}
else
{
	$userDAO = new userDAO();
	
	$companies = $userDAO->get_all_companies();
	
	$userDAO->disconnect();
	include 'views/register.V.php';
}

?>