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
	
	if(check_submitted_account($username, $password, $rpassword, $email, $usertype))
	{
		if($_POST['usertype'] == 'jobseeker' && isset($_POST['matric']) && !empty($_POST['matric'])
		{
			$matric = get_secured($_POST['matric']);
		}
		else if($_POST['usertype'] == 'employer' && isset($_POST['position']) && !empty($_POST['position'] && isset($_POST['company']) && !empty($_POST['company'])
		{
			$position = get_secured($_POST['position']);
			$company = get_secured($_POST['company']);
		}
	}	
	
	
}
else
{
	
	include 'views/register.V.php';
}


?>