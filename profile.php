<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';
include 'modals/forumDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();
$forumDAO = new forumDAO();

//handle AJAX post request from profile.php to [edit profile]
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
//handle AJAX request from profile.php to [edit password]
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
// AJAX call from core.js to send email about forgot password
else if(isset($_GET['action']) && $_GET['action'] == 'forgetpw')
{
	$em = $_GET['email'];
	if($userDAO->send_forgetpw_email(mysql_real_escape_string($em)))
		echo 'Please check your email for password reset';
	else
		echo 'Fail to reset password. Please try again next time.';
	die();
}

//handling the resume file uploaded
if(isset($_FILES['profilepic']['name']) && !empty($_FILES['profilepic']['name']))
{
	if(!move_uploaded_file($_FILES['profilepic']['tmp_name'], "img/profile_pic/".$aid.".".substr($_FILES['profilepic']['type'],6)))
		echo 'upload failed';
	else
	{
		$userDAO->save_profile_pic_dirc("img/profile_pic/".$aid.".".substr($_FILES['profilepic']['type'],6),$aid);
		header('Location:profile.php?id='.$aid);
		$userDAO->disconnect();
		die();
	}
}


//if id parameter isset, show them the profile page of the id
if(isset($_GET['id']) && intval($_GET['id'] > 0))
{
	$user = $userDAO->get_user_by_id(intval($_GET['id']));
	
	//if the user with such id exist
	if(sizeof($user) > 0)
	{
		//getting the number of posts in forum
		$user['posts'] = $forumDAO->num_post_by_user($user['id']);
		
		//set the online color to green if online, grey otherwise
		if($user['onlinestatus'] == 'online')
			$onlinecolor = '#44dd44';
		else
			$onlinecolor = '#aaaaaa';
		
		//setting the usertype text and personal details to be included
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

		//check whether the current user and the profile page if the same person, if yes then the content is editable
		$editable = false;
		if(isset($_SESSION['user']['id']) && intval($_GET['id']) == $_SESSION['user']['id'])
		{
			$editable = true;
		}
		
		//check whether the profile picture exist
		$profilepicdirc = $userDAO->get_profile_pic_dirc($_GET['id']);
		
		//finally include the profile view
		include 'views/profile.V.php';
	}
	//if the user not found, display no such page
	else
		include 'views/error404.V.php';
}
else
{
	include 'views/error404.V.php';
}

//close the connection if not using it anymore
$userDAO->disconnect();

?>