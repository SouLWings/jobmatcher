<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/modalDAO.php';

//creating an instance of the data access object
$modalDAO = new modalDAO();


//output variables
$jobtypes = $modalDAO->get_some_values();

//close the connection if not using it anymore
$modalDAO->disconnect();

//include a view to display declared variables
include 'views/sampleview.V.php';
?>