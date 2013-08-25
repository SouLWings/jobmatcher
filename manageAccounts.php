<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();


//output variables
$pendingjobseekers = $userDAO->get_all_pending_jobseeker();
$pendingemployers = $userDAO->get_all_pending_employer();


//close the connection if not using it anymore
$userDAO->disconnect();

//include a view to display declared variables
include 'views/manageusers.V.php';
?>