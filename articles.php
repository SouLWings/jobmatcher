<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/articleDAO.php';

//creating an instance of the data access object
$articleDAO = new articleDAO();

if(isset($_POST['action']))
{
	require_account_type('admin');
	if($_POST['action'] == 'addarticle')
	{
		if(!$articleDAO->add_article($_POST['title'], $_POST['content']))
		{
			echo 'fail add article';
		}
		else
		{
			header('Location:articles.php');
		}
	}
	else if($_POST['action'] == 'editarticle')
	{
		if(!$articleDAO->edit_article($_POST['articleid'], $_POST['title'], $_POST['content']))
		{
			echo 'fail edit article';
		}
		else
		{
			header('Location:articles.php');
		}
	}
	else if($_POST['action'] == 'deletearticle')
	{
		if(!$articleDAO->delete_article($_POST['articleid']))
		{
			echo 'fail delete article';
		}
		else
		{
			header('Location:articles.php');
		}
	}
}

//output variables
$articles = $articleDAO->get_all_articles();

//close the connection if not using it anymore
$articleDAO->disconnect();

$editable = false;
if(is_logged_in() && $ut == 'admin')
{
	$editable = true;
}

//include a view to display declared variables
include 'views/articles.V.php';
?>