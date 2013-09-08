<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();
if(isset($_GET['hash']))
{
	$hash = get_secured($_GET['hash']);
	//output variables
	$user = $userDAO->get_account_by_hash($hash);


	//close the connection if not using it anymore
	$userDAO->disconnect();
	if(sizeof($user) > 0)
		include 'views/forgetpassword.V.php';
	else
		include 'views/error401.php';
}
else if(isset($_POST['pw']) && isset($_POST['pw2']) && isset($_POST['aid']))
{
	if(!$userDAO->resetPassword($_POST['aid'], get_secured($_POST['pw'])))
		$msg = 'Fail to reset password. Please try again later;';
	else
		$msg = 'Password reset successfully. You can now log in with your new password.';
	include 'forgetpassword-result.V.php';
}
?>