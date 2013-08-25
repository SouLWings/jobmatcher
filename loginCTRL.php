<?php
include 'controller.inc.php';
include 'modals/userDAO.php';

$userDAO = new userDAO();
if(!isset($_SESSION['user']))
{
	if(isset($_POST['loginusername']) && !empty($_POST['loginusername']) && isset($_POST['loginpassword']) && !empty($_POST['loginpassword']))
	{
		$un = get_secured($_POST['loginusername']);
		$pw = get_secured($_POST['loginpassword']);
		$user = $userDAO->do_log_in($un, $pw);//md5($pw))
		if(strtoupper($user['status']) == 'APPROVED')
			$_SESSION['user'] = $user;
		else if(strtoupper($user['status']) == 'PENDING')
			$_SESSION['msg'] = 'accountpending';
		else
			$_SESSION['msg'] = 'loginfailed';
		echo "<pre>";
		print_r($user);
		echo "</pre>";
		echo $_SESSION['msg'];
	}
}
header('Location: '.$referer);
?>