<?php
require 'controller.inc.php';
<<<<<<< HEAD
if(isset($_SESSION['user']))
{
	include 'modals/userDAO.php';

	$userDAO = new userDAO();

	$userDAO->do_log_out($_SESSION['user']['id']);

	$userDAO->disconnect();
	session_destroy();
}
=======
session_destroy();
if($referer == $curr_location)
	$referer = 'index.php';
>>>>>>> origin/senopi
header('Location: index.php');
?>