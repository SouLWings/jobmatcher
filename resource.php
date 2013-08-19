<?php
include 'controller.inc.php';
include 'modals/resourceDAO.php';

$resourceDAO = new resourceDAO();

if(isset($_GET['id']) && !empty($_GET['id']))
{
	//output variables
	$id = intval($_GET['id'])
	$article = $resourceDAO->get_article_by_id($id)
	
	include 'views/aResource.V.php';
}
else
{
	//output variables
	
	
	include 'views/resourcelist.V.php';
}

$resourceDAO->disconnect();
?>