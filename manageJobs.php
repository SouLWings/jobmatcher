<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/jobDAO.php';

//creating an instance of the data access object
$jobDAO = new jobDAO();


//output variables
$pendingjobs = $jobDAO->get_all_pending_jobs();


//close the connection if not using it anymore
$jobDAO->disconnect();

//include a view to display declared variables
include 'views/manageJobs.V.php';
?>