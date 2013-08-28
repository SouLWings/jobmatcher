<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');

if(isset($_GET['action']) && isset($_GET['id']))
{
	$userDAO = new userDAO();
	if($_GET['action'] == 'approve')
	{
		if($userDAO->approve_user($_GET['id']))
		{
			echo 'approved';
			if(!$userDAO->send_approval_email($_GET['id']))
				echo 'send email failed';
		}
		else
		{
			echo 'fail approve';
		}
	}
	else if($_GET['action'] == 'disapprove')
	{
		if($userDAO->disapprove_user($_GET['id']))
		{
			echo 'disapproved';
			if(!$userDAO->send_disapproval_email($_GET['id']))
				echo 'send email failed';
		}
		else
		{
			echo 'fail disapproved';
		}
	}
	$userDAO->disconnect();
	header('Location: '.$referer);
}
?>