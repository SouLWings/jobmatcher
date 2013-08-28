<?php
require 'controller.inc.php';
if(isset($_SESSION['user']))
{
	include 'modals/userDAO.php';

	$userDAO = new userDAO();

	$userDAO->do_log_out($_SESSION['user']['id']);

	$userDAO->disconnect();
	session_destroy();
}
header('Location: index.php');
?>