<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';
if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin')
{
	if(isset($_GET['action']) && isset($_GET['id']))
	{
		$userDAO = new userDAO();
		if($_GET['action'] == 'approve')
		{
			if($userDAO->approve_user($_GET['id']))
			{
				echo 'approved';
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
			}
			else
			{
				echo 'fail disapproved';
			}
		}
		$userDAO->disconnect();
		header('Location: '.$referer);
	}
}
else
{
	header('Location: error.php?code=456');
}
?>