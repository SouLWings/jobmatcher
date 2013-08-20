<?php
include 'controller.inc.php';
include 'modals/userDAO.php';

$userDAO = new userDAO();

if(isset($_POST['loginusername']) && !empty($_POST['loginusername']) && isset($_POST['loginpassword']) && !empty($_POST['loginpassword']))
{
	$un = get_secured($_POST['loginusername']);
	$pw = get_secured($_POST['loginpassword']);
	
	if($user = $userDAO->do_log_in($un, $pw))//md5($pw))
		$_SESSION['user'] = $user;
	else
		$_SESSION['msg'] = 'loginfailed';
		
	header('Location: '.$referer);
	
}
?>