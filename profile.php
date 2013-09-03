<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();
if(isset($_POST['id']) && intval($_POST['id']) > 0 && isset($_POST['lastname']) && isset($_POST['email']))
{
	if(!$userDAO->update_profile(intval($_POST['id']), get_secured($_POST['firstname']), get_secured($_POST['lastname']), get_secured($_POST['email'])))
	{
		echo 'update profile failed';
		die();
	}
	else
	{
		header("Location:profile.php?id=$aid");
		$userDAO->disconnect();
		die();
	}
}

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
		}
		else if($user['accounttype_ID'] == 1)
		{	
			$user['usertype'] = 'Job seeker';
			$user['ut'] = 'jobseeker';
		}

		$editable = false;
		if(intval($_GET['id']) == $_SESSION['user']['id'])
		{
			$editable = true;
			$modalforms[] = 'profile-modal-forms';
		}
	}
	else
		header('Location:error.php');
}
else
{
	header('Location:error.php');
}
//close the connection if not using it anymore
$userDAO->disconnect();

//include a view to display declared variables
include 'views/profile.V.php';
?>