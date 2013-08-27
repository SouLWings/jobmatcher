<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');

//creating an instance of the data access object
$jobDAO = new jobDAO();

$jobs = $jobDAO->get_employer_jobs($aid);

//close the connection if not using it anymore
$jobDAO->disconnect();

//include a view to display declared variables
include 'views/managejobads.V.php';
?>