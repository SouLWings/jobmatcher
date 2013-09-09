<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
include_once 'modals/userDAO.php';

if(is_logged_in())
{
	//creating an instance of the data access object
	$msgDAO = new msgDAO();

	$msgprevlist = $msgDAO->get_msg_preview($aid);
	if(sizeof($msgprevlist) > 0)
	{
		if(isset($_GET['id']))
		{
			$contact_id = intval($_GET['id']);
		}
		else
		{
<<<<<<< HEAD
			$contact_id = $msgprevlist[0]['sender_ID'];
=======
			$contact_id = $msgprevlist[0]['id'];
>>>>>>> origin/llaw
		}
		$msghistory = $msgDAO->get_msg($contact_id,$aid,20);
		$contact_name = $msgDAO->get_username_by_id($contact_id);
		$latesttime = $msgDAO->get_latest_msg_time($aid);
		$msgDAO->disconnect();
<<<<<<< HEAD
		if(sizeof($msghistory) > 0)
			include 'views/message.V.php';
		else
			include 'views/error404.V.php';
=======
		include 'views/message.V.php';
>>>>>>> origin/llaw
	}
	else
	{
		$msgDAO->disconnect();
		include 'views/nomessage.V.php';
	}
	
<<<<<<< HEAD
	/*echo 'msg preview array<pre>';
	print_r($msgprevlist);
	echo '</pre>';
	echo $latesttime;*/
	//close the connection if not using it anymore
}
else
	include 'views/error401.V.php';
=======
	echo 'msg preview array<pre>';
	print_r($msgprevlist);
	echo '</pre>';
	echo $latesttime;
	//close the connection if not using it anymore
}
else
	header('Location:error.php?code=456');
>>>>>>> origin/llaw
?>