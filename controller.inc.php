<?php
session_start();
include 'modals/msgDAO.php';
/**
 *  Core controller file - containing functions for controlling user session
 *  
 *  Reserved variable names:
 *  	$curr_location
 *  	$referer
 *  	$firstname
 *  	$lastvisitedmsg
 *  	$errormsg
 *  	$asideinclude
 *  	$newmsgnum
 *  	$aid
 */

/*****************************
  assigning variables values
*****************************/
$curr_location = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']))
	$referer = $_SERVER['HTTP_REFERER'];
else
	$referer = $curr_location;

if(is_logged_in())
{
	//if user logged in, retrieve the id and firstname,
	$aid = $_SESSION['user']['id'];
	$firstname = $_SESSION['user']['firstname'];
	
	//call the function to get the last login message
	if(isset($_SESSION['user']['time'])){
		$lastvisitedmsg = get_last_visited_msg($_SESSION['user']['time']);
	}else
		$lastvisitedmsg = 'This is your first log in.';
		
	//retrieve number of unreaded msg
	$msgDAO = new msgDAO();
	$newmsgnum = $msgDAO->get_num_new_msg($aid);
	
	
	if($_SESSION['user']['usertype'] == 'admin')
		$asideinclude = 'adminmenu.php';
	else if($_SESSION['user']['usertype'] == 'employer')
		$asideinclude = 'employermenu.php';
	else if($_SESSION['user']['usertype'] == 'jobseeker')
		$asideinclude = 'jobseekermenu.php';
}
else
{
	if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'loginfailed')
	{
		$errormsg = '<h6 class="form-signin-heading">Invalid username or password.</h6>';
		unset($_SESSION['msg']);
	}
	else if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'accountpending')
	{
		$errormsg = '<h6 class="form-signin-heading">Account is pending for approval.</h6>';
		unset($_SESSION['msg']);
	}
	else
		$errormsg = '';
	$asideinclude = 'login.php';
}

	
/************
  functions 
************/
function get_secured($input)
{
	return mysql_real_escape_string(stripslashes(htmlentities($input)));
}

function is_logged_in()
{
	if(isset($_SESSION['user']) && isset($_SESSION['user']['id']) && isset($_SESSION['user']['usertype']) && isset($_SESSION['user']['firstname']))
		return true;
	else
		return false;
}

function get_last_visited_msg($time)
{
	//date_default_timezone_set ('Asia/Singapore');
	$lastvisitedmsg = 'Your last login: ';
	if((date('d',time())-date('d',strtotime($time)))=='0')
		$lastvisitedmsg .= 'Today ';
	else if((date('d',time())-date('d',strtotime($time)))=='1')
		$lastvisitedmsg .= 'Yesterday';
	else
		$lastvisitedmsg .= date('Y-m-d ', strtotime($time));
		
	$lastvisitedmsg .= date('g:i a', strtotime($time));
	
	return $lastvisitedmsg;
}

function require_account_type($ut)
{
	if(strtoupper($_SESSION['user']['usertype']) != strtoupper($ut))
	{
		header('Location:error.php?code=456');
		die();
	}
}

?>