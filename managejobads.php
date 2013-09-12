<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';

//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');

$jobDAO = new jobDAO();

//retrieve all job specialization to be shown as options in the modal form
$jobspecializations = $jobDAO->get_all_job_Specializations();

//retrieving jobs of that employer
$jobs = $jobDAO->get_employer_jobs($aid);

//loop through all the jobs to retrieve the applicants
$alljobapplicants = array();
foreach ($jobs as $j):
	$alljobapplicants[] = $jobDAO->get_applicants_of_job($j['id']);
endforeach;

$jobDAO->disconnect();

//include a view to display declared variables
include 'views/managejobads.V.php';
?>