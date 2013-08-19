<?php
include 'controller.inc.php';
include 'modals/userDAO.php';
if(loggedin())
{
	echo 'You had logged in';
}
else if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['rpassword']) && !empty($_POST['rpassword']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['usertype']) && !empty($_POST['usertype']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	$email = $_POST['email'];
	$usertype = $_POST['usertype'];
}



include 'views/register.V.php';
?>