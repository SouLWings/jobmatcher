<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/userDAO.php';
include_once 'modals/JobDAO.php';

require_account_type('admin');

if(isset($_GET['action']) && isset($_GET['id']))
{
	$userDAO = new userDAO();
	$jobDAO = new jobDAO();
	if($_GET['action'] == 'approveaccount')
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
	else if($_GET['action'] == 'disapproveaccount')
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
	else if($_GET['action'] == 'approvejob')
	{
		if($jobDAO->approve_job($_GET['id']))
		{
			echo 'approved';
		}
		else
		{
			echo 'fail approve';
		}
	}
	else if($_GET['action'] == 'disapprovejob')
	{
		if($jobDAO->disapprove_job($_GET['id']))
		{
			echo 'disapproved';
		}
		else
		{
			echo 'fail disapproved';
		}
	}
	$userDAO->disconnect();
	$jobDAO->disconnect();
	header('Location: '.$referer);
}
?>