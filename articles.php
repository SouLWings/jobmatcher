<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/articleDAO.php';

//creating an instance of the data access object
$articleDAO = new articleDAO();


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