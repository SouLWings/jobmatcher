<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

//creating an instance of the data access object
$jobDAO = new jobDAO();


//output variables
$jobapplications = $jobDAO->get_applications_of_js($jsid);
//close the connection if not using it anymore
$jobDAO->disconnect();

//include a view to display declared variables
include 'views/jobapplications.V.php';
?>