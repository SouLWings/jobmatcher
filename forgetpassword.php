<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/userDAO.php';

//creating an instance of the data access object
$userDAO = new userDAO();

//to reset password by getting the hash from parameter
if(isset($_GET['hash']))
{
	$hash = get_secured($_GET['hash']);
	//output variables
	$user = $userDAO->get_account_by_hash($hash);


	//close the connection if not using it anymore
	$userDAO->disconnect();
	
	//if there is such user requested a password reset thn show them the page
	if(sizeof($user) > 0)
		include 'views/forgetpassword.V.php';
	else
		include 'views/error401.php';
}
//process the data posted by the resetpassword form
else if(isset($_POST['pw']) && isset($_POST['pw2']) && isset($_POST['aid']))
{
	//replacing the old password with a new password
	if(!$userDAO->resetPassword($_POST['aid'], get_secured($_POST['pw'])))
		$msg = 'Fail to reset password. Please try again later;';
	else
		$msg = 'Password reset successfully. You can now log in with your new password.';
	include 'views/forgetpassword-result.V.php';
}
?>