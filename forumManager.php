<?php
include_once 'controller.inc.php';
include 'modals/forumDAO.php';
if(is_logged_in())
{
	if(isset($_POST['action']) && !empty($_POST['action']))
	{		
		$f = new forumDAO();
		
		if($_POST['action'] == 'addSection')
		{
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->createSection($_POST['title'],$_POST['description']);
				echo $success;
				header("Location:forum.php");
			}
		}
		
		else if($_POST['action'] == 'deleteSection')
		{
			echo $_POST['sectionid'];
			if(isset($_POST['sectionid']) && !empty($_POST['sectionid']))
			{
				$success = $f->deleteSection($_POST['sectionid']);
				echo $success;
				header("Location:forum.php");
			}
		}
		
		else if($_POST['action'] == 'editSection')
		{
			
			if(isset($_POST['sectionid']) && !empty($_POST['sectionid'])&& isset($_POST['title']) && !empty($_POST['title'])&&  isset($_POST['description']) && !empty($_POST['description']))
			{
				$success = $f->editSection(intval($_POST['sectionid']),get_secured($_POST['title']),get_secured($_POST['description']));
				if($success)
					header("Location:forum.php");
				else
					echo "Failed to update section";
			}
		}
		
		else if($_POST['action'] == 'addThread')
		{
			if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['f0id']) && isset($_POST['uuid']))
			{
				$success = $f->createThread(get_secured($_POST['f0id']), $_POST['uuid'], $_POST['title'],$_POST['description']);
				echo $success;
				header("Location:$referer");
			}		
		}
		
		else if($_POST['action'] == 'deleteThread')
		{
			if(isset($_POST['threadid']) && intval($_POST['threadid']) > 0)
			{
				$success = $f->deleteThread(intval($_POST['threadid']));
				header('Location:'.$referer);
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
		
		else if($_POST['action'] == 'chgthreadstatus')
		{	
			if(isset($_POST['threadid']) && intval($_POST['threadid']) > 0)
			{
				$success = $f->alterStatus($_POST['threadid']);
				if($success)
					header('Location:'.$referer);
				else
					echo 'Update status failed';
			}
		}
		
		else if($_POST['action'] == 'chgthreadtype')
		{	
			if(isset($_POST['threadid']) && intval($_POST['threadid']) > 0 && isset($_POST['threadtype']))
			{
				$success = $f->alterType(intval($_POST['threadid']), get_secured($_POST['threadtype']));
				if($success)
					header('Location:'.$referer);
				else
					echo 'Update type failed';
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
		include 'views/error404.php';
	}
}
else
	include 'views/error401.php';
?>