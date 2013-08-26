<?php
include_once 'controller.inc.php';
include 'modals/forumDAO.php';
//if(true)//check for session user
	if(isset($_POST['action']) && !empty($_POST['action']))
	{
		echo $_POST['action']."<br>";
		echo $_POST['id'];
		//echo $id;
		$f = new forumDAO();
		
		if($_POST['action'] == 'addSection')
		{
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->createSection($_POST['title'],$_POST['description']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}		
		}
		
		else if($_POST['action'] == 'deleteSection')
		{
			if(isset($_POST['id']) && !empty($_POST['id']))
			{
				$success = $f->deleteSection($_POST['id']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'editSection')
		{
			
			if(isset($_POST['id']) && !empty($_POST['id'])&& isset($_POST['title']) && !empty($_POST['title'])&&  isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection($_POST['id'],$_POST['title'],$_POST['desciption']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'addThread')
		{
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->createThread($_POST['title'],$_POST['description'],$_POST['f0id']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}		
		}
		
		else if($_POST['action'] == 'deleteSection')
		{
			if(isset($_POST['id']) && !empty($_POST['id']))
			{
				echo $_POST['id'];
				$success = $f->deleteSection($_POST['id']);echo 'babi';
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'editSection')
		{	
			
			if(isset($_POST['id']) && !empty($_POST['id'])&& isset($_POST['title']) && !empty($_POST['title'])&&  isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection($_POST['id'],$_POST['title'],$_POST['desciption']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		$f->disconnect();
	}
	else
	{
		header("Location:error.php?code=X");
	}
/* else
{
	header("Location:error.php?code=Y");
} */
?>