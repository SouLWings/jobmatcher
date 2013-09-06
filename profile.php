<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();

//handle AJAX post request to edit profile or edit password
if(isset($_POST['action']) && $_POST['action'] == 'editprofile')
{
	if(isset($_POST['id']) && intval($_POST['id']) > 0 && isset($_POST['lastname']) && isset($_POST['email']))
	{
		if(!$userDAO->update_profile(intval($_POST['id']), get_secured($_POST['firstname']), get_secured($_POST['lastname']), get_secured($_POST['email'])))
		{
			echo 'Failed to update account.';
		}
		else
		{
			echo 'Profile updated successfully.';
		}
	}
	die();
}
else if(isset($_POST['action']) && $_POST['action'] == 'editpw')
{
	if(isset($_POST['id']) && intval($_POST['id']) > 0 && isset($_POST['oldpw']) && isset($_POST['newpw']))
	{
		if($userDAO->check_password(intval($_POST['id']), get_secured($_POST['oldpw'])))
		{
			if(!$userDAO->update_password(intval($_POST['id']), get_secured($_POST['newpw'])))
			{
				echo 'Failed to change passwod.'; 
			}
			else
			{
				echo 'Password updated successfully.'; //output msg used in profile.js to check pass/fail
			}
		}
		else
			echo 'Invalid old password.'; 
	}
	die();
}
// call from core.js to send email about forgot password
else if(isset($_GET['action']) && $_GET['action'] == 'forgetpw')
{
	$em = $_GET['email'];
	if($userDAO->send_forgetpw_email(mysql_real_escape_string($em)))
		echo 'Please check your email for password reset';
	else
		echo 'Fail to reset password. Please try again next time.';
	die();
}


//if id parameter isset, show them the profile page of the id
if(isset($_GET['id']) && intval($_GET['id'] > 0))
{
	$user = $userDAO->get_user_by_id(intval($_GET['id']));
	if(sizeof($user) > 0)
	{
		if($user['onlinestatus'] == 'online')
			$onlinecolor = '#44dd44';
		else
			$onlinecolor = '#aaaaaa';
			
		if($user['accounttype_ID'] == 3)
		{
			$user['usertype'] = 'Administrator';
			$user['ut'] = 'admin';
		}
		else if($user['accounttype_ID'] == 2)
		{	
			$user['usertype'] = 'Employer';
			$user['ut'] = 'employer';
			
			//getting company name by id
			$user['name'] = '';
			if($company = $userDAO->get_company_by_id($user['company_ID']))
				$user['name'] = $company['name'];
		}
		else if($user['accounttype_ID'] == 1)
		{	
			$user['usertype'] = 'Job seeker';
			$user['ut'] = 'jobseeker';
		}

		$editable = false;
		if(isset($_SESSION['user']['id']) && intval($_GET['id']) == $_SESSION['user']['id'])
		{
			$editable = true;
		}
		include 'views/profile.V.php';
	}
	else
		include 'views/error404.V.php';
}
else
{
	include 'views/error404.V.php';
}

//close the connection if not using it anymore
$userDAO->disconnect();

//include a view to display declared variables
?>