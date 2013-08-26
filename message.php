<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
include_once 'modals/userDAO.php';

if(is_logged_in())
{
	//creating an instance of the data access object
	$msgDAO = new msgDAO();

	$msgprevlist = $msgDAO->get_msg_preview($_SESSION['user']['id']);
	if(sizeof($msgprevlist) > 0)
	{
		if(isset($_GET['id']))
		{
			$contact_id = intval($_GET['id']);
		}
		else
		{
			$contact_id = $msgprevlist[0]['id'];
		}
		$msghistory = $msgDAO->get_msg($contact_id,$_SESSION['user']['id'],20);
		$contact_name = $msgDAO->get_username_by_id($contact_id);
		
		$msgDAO->disconnect();
		include 'views/message.V.php';
	}
	else
	{
		$msgDAO->disconnect();
		include 'views/nomessage.V.php';
	}
	echo '<pre>';
	print_r($msgprevlist);
	echo '</pre>';
	
	//close the connection if not using it anymore
}
else
	header('Location:error.php?code=456');
?>