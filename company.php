<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the user classes that needed to access resource
include 'modals/userDAO.php';

if(isset($_GET['id']) && !empty($_GET['id']))
{
	//creating an instance of the data access object
	$userDAO = new userDAO();

	$id = intval($_GET['id']);
	//output variables
	$company = $userDAO->get_company_by_id($id);
	
	if(is_logged_in() && $_SESSION['user']['usertype'] == 'employer')
	{
		$modalforms[] = 'company-modal-forms';
		$editable = true;
	}	

	//close the connection if not using it anymore
	$userDAO->disconnect();

	//include a view to display declared variables
	include 'views/acompany.V.php';
}
else
	header('Location:index.php');
?>