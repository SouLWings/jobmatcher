<?php
include 'controller.inc.php';
include 'modals/userDAO.php';
if(is_logged_in())
{
	echo 'You had logged in. redirecting to homepage in 3 seconds.';
	header("Refresh: 3;url=index.php");
}
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
	
	if(!check_account_exist($username))
	{
		if(check_submitted_account($username, $password, $rpassword, $email, $usertype))
		{
			if($_POST['usertype'] == 'jobseeker' && isset($_POST['matric']) && !empty($_POST['matric'])
			{
				$matric = get_secured($_POST['matric']);
				if(check_submitted_jobseeker($firstname, $lastname, $matric))
					if(register_jobseeker($username, $password, $email, $firstname, $lastname, $matric))
					{
						$msg = 'Thank you for registering in UM Job Matching Portal. Your account is pending for approval. You will recieve an email when your account is approved.';
						include 'views/register-result.V.php';
					}
			}
			else if($_POST['usertype'] == 'employer' && isset($_POST['position']) && !empty($_POST['position'] && isset($_POST['company']) && !empty($_POST['company'])
			{
				$position = get_secured($_POST['position']);
				$company = get_secured($_POST['company']);
				if(check_submitted_employer($firstname, $lastname, $position, $company))
					if(register_employer($username, $password, $email, $firstname, $lastname, $position, $company))
					{
						$msg = 'Sorry! there is a problem currenty.';
						include 'views/register-result.V.php';
					}
			}
		}
	}	
	
	
}
else
{
	
	include 'views/register.V.php';
}


?>