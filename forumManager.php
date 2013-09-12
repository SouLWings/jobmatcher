<?php
include_once 'controller.inc.php';
include 'modals/forumDAO.php';
//if(true)//check for session user
	if(isset($_POST['action']) && !empty($_POST['action']))
	{
		echo $_POST['action']."<br>";
		
		
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
			echo $_POST['id'];
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
			echo $_POST['title'];
			echo $_POST['description'];
			echo $_POST['f0id'];
			echo $_POST['uuid'];
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['f0id']) && isset($_POST['uuid']))
			{
				$success = $f->createThread(get_secured($_POST['f0id']), $_POST['uuid'], $_POST['title'],$_POST['description']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}		
		}
		
		else if($_POST['action'] == 'deleteThread')
		{
			if(isset($_POST['f1id']) && !empty($_POST['f1id']))
			{
				echo $_POST['f1id'];
				$success = $f->deleteThread($_POST['f1id']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'editThread')
		{	
			
			if(isset($_POST['id']) && !empty($_POST['id'])&& isset($_POST['title']) && !empty($_POST['title'])&&  isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection($_POST['id'],$_POST['title'],$_POST['desciption']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'alterStatus')
		{	
			
			if(isset($_POST['f1id']) && !empty($_POST['f1id']))
			{
				$success = $f->alterStatus($_POST['f1id']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		else if($_POST['action'] == 'addPost')
		{
			echo $_POST['title'];
			echo $_POST['description'];
			echo $_POST['f1id'];
			echo $_POST['uuid'];
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['f1id']) && isset($_POST['uuid']))
			{
				$success = $f->createPost($_POST['f1id'], $_POST['uuid'], $_POST['title'],$_POST['description']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}		
		}
		
		else if($_POST['action'] == 'deletePost')
		{
			if(isset($_POST['f2id']) && !empty($_POST['f2id']))
			{
				echo $_POST['f2id'];
				$success = $f->deletePost($_POST['f2id']);
				echo $success;
				header("refresh: 3; url=forum.php");
			}
		}
		
		else if($_POST['action'] == 'alterType')
		{	
			
			if(isset($_POST['f2id']) && !empty($_POST['f2id']))
			{
				$success = $f->alterType($_POST['f2id']);
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