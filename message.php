<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
include_once 'modals/userDAO.php';

if(is_logged_in())
{
	//creating an instance of the data access object
	$msgDAO = new msgDAO();

	//getting the list for left side bar(chat persons and id)
	$msgprevlist = $msgDAO->get_msg_preview($aid);
	
	//if there is chat history display the message
	if(sizeof($msgprevlist) > 0)
	{
		//for main content, id id parameter is set, set $contact_id as that person's id, else it will display the latest chat, like FB
		if(isset($_GET['id']))
		{
			$contact_id = intval($_GET['id']);
		}
		else
		{
			$contact_id = $msgprevlist[0]['sender_ID'];
		}
		
		//retrieve past 20 rows of chat content with that person
		$msghistory = $msgDAO->get_msg($contact_id,$aid,20);
		
		//get the name of the person
		$contact_name = $msgDAO->get_username_by_id($contact_id);
		
		//get the latest time chatting with that person(for later ajax request)
		$latesttime = $msgDAO->get_latest_msg_time($aid);
		
		$msgDAO->disconnect();
		
		//if there is chat with that person, display it, else = page not found
		if(sizeof($msghistory) > 0)
			include 'views/message.V.php';
		else
			include 'views/error404.V.php';
	}
	else
	{
		$msgDAO->disconnect();
		include 'views/nomessage.V.php';
	}
	
	/*echo 'msg preview array<pre>';
	print_r($msgprevlist);
	echo '</pre>';
	echo $latesttime;*/
	//close the connection if not using it anymore
}
else
	include 'views/error401.V.php';
?>