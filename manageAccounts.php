<?php
//includes core controller functions and variables 
include 'controller.inc.php';

if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin')
{
	include 'modals/userDAO.php';

	//creating an instance of the data access object
	$userDAO = new userDAO();


	//output variables
	$pendingjobseekers = $userDAO->get_all_pending_jobseeker();
	$pendingemployers = $userDAO->get_all_pending_employer();


	//close the connection if not using it anymore
	$userDAO->disconnect();

	//include a view to display declared variables
	include 'views/manageAccounts.V.php';
}
else
{
	include 'views/error401.V.php';
}
?>