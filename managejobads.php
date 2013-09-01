<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');
$jobDAO = new jobDAO();


$jobs = $jobDAO->get_employer_jobs($aid);
$jobspecializations = $jobDAO->get_all_job_Specializations();


$jobDAO->disconnect();

//include a view to display declared variables
include 'views/managejobads.V.php';
?>