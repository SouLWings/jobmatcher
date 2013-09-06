<?php
//includes core controller functions and variables 
include 'controller.inc.php';


if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin')
{
	include 'modals/jobDAO.php';

	//creating an instance of the data access object
	$jobDAO = new jobDAO();


	//output variables
	$pendingjobs = $jobDAO->get_all_pending_jobs();


	//close the connection if not using it anymore
	$jobDAO->disconnect();

	//include a view to display declared variables
	include 'views/manageJobs.V.php';

}
else
{
	include 'views/error401.V.php';
}
?>