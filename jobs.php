<?php
include 'modals/jobDAO.php';

if(isset($_GET['type']) && !empty($_GET['type']))
{
	$jobDAO = new jobDAO();
	$jobs = $jobDAO->get_all_jobs_of_type($_GET['type']);
	$jobDAO->disconnect();

	include 'views/jobslist.V.php';
}
else if(isset($_GET['id']) && !empty($_GET['id']))
{
	$jobDAO = new jobDAO();
	$job = $jobDAO->get_job($_GET['id']);
	$jobDAO->disconnect();

	include 'views/aJob.V.php';
}
else
	header("Location:index.php");
	
?>