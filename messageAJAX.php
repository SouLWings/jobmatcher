<?php
include 'controller.inc.php';

if(is_logged_in())
{
	$msgDAO = new msgDAO();
	
	//handle new message from profile.php 'send message' function
	if(isset($_POST['action']) && isset($_POST['id']) && isset($_POST['content']) && $_POST['action'] == 'sendnewmsg')
	{
		if($msgDAO->new_message(get_secured($_POST['content']),intval($_POST['id']),$aid))
		{
			header('Location:message.php?id='.intval($_POST[id]));
		}
		else
			echo 'failed to send new message';		
	}
	
	//handle real time chatting
	if(isset($_POST['action']) && $_POST['action'] == 'sendmsg' && isset($_POST['receiver']) && isset($_POST['content']))
	{
		if($msgDAO->new_message(get_secured($_POST['content']),intval($_POST['receiver']),$aid))
			echo 'success';
		else
			echo 'failed';
	}
	else if(isset($_POST['action']) && $_POST['action'] == 'getnewmsg' && isset($_POST['receiver']) && isset($_POST['latesttime']))
	{
		$msgs = $msgDAO->get_update(intval($_POST['receiver']),$aid,$_POST['latesttime']);
		if(sizeof($msgs) > 0)
		{
			foreach($msgs as $msg):
				echo "<br> $msg[sender]: $msg[content]";
			endforeach;
		}
		else
			echo 'no';
	}
	$msgDAO->disconnect();
}
?>