<?php
session_start();
include 'forumDAO.php';
if(true)//check for session user
	if(isset($_POST['action']) && !empty($_POST['action']))
	{
		$f = new forumDAO();
		if($_POST['action'] == 'editSection')
		{
			if(isset($_POST['id']) && !empty($_POST['id']) isset($_POST['title']) && !empty($_POST['title']) isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection($_POST['id'],$_POST['title'],$_POST['desciption']);
				if($success == 1)
					echo "success";
				else
					echo "failed";
			}
		}
		else if($_POST['action'] == 'addSection')
		{
			if(isset($_POST['title']) && !empty($_POST['title']) isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection($_POST['id'],$_POST['title'],$_POST['desciption']);
				if($success == 1)
					echo "success";
				else
					echo "failed";
			}		
		}
		
		$f->disconnect();
	}
	else
	{
		header("Location:error.php?code=X");
	}
else
{
	header("Location:error.php?code=Y");
}

?>