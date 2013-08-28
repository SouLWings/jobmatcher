<?php
include 'controller.inc.php';
include 'modals/jobDAO.php'; 

require_account_type("employer");

$jobDAO = new jobDAO();
//for adding a new msg to the db
if(isset($_POST['action']) && $_POST['action'] == 'getjobdetails' && isset($_POST['id']))
{
	if($job = $jobDAO->get_job($_POST['id'],false))
		echo json_encode($job);
	else
		echo 'no';
}
$jobDAO->disconnect();
?>