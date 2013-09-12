<?php
include 'controller.inc.php';
include 'modals/userDAO.php';

$userDAO = new userDAO();

//check whether there is user already logged in
if(!isset($_SESSION['user']))
{
	if(isset($_POST['loginusername']) && !empty($_POST['loginusername']) && isset($_POST['loginpassword']) && !empty($_POST['loginpassword']))
	{
		$un = get_secured($_POST['loginusername']);
		$pw = get_secured($_POST['loginpassword']);
		$user = $userDAO->do_log_in($un, $pw);
		
		//check whether login success
		if(strtoupper($user['accountstatus']) == 'APPROVED')
			$_SESSION['user'] = $user;
		else if(strtoupper($user['accountstatus']) == 'PENDING')
			$_SESSION['msg'] = 'accountpending';
		else
			$_SESSION['msg'] = 'loginfailed';
			
		//debugging msg
		echo "<pre>";
		print_r($user);
		echo "</pre>";
		echo $_SESSION['msg'];
	}
}
$userDAO->disconnect();
header('Location: '.$referer);
?>