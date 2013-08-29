<?php
//includes core controller functions and variables 
include 'controller.inc.php';
//includes the modal classes that needed to access resource
include 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();


//$user = $userDAO->get_user_by_id();

//close the connection if not using it anymore
$userDAO->disconnect();

//include a view to display declared variables
include 'views/profile.V.php';
?>