<?php
session_start();
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
 *  
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
	$firstname = $_SESSION['user']['firstname'];
	if(isset($_SESSION['user']['time'])){
		$lastvisitedmsg = get_last_visited_msg($_SESSION['user']['time']);
	}else
		$lastvisitedmsg = 'This is your first log in.';
	$asideinclude = 'welcome.php';
}
else
{
	if(isset($_SESSION['msg']) && $_SESSION['msg'] = 'loginfailed')
	{
		$errormsg = '<h4 class="form-signin-heading text-warning">Invalid username or password.</h4>';
		unset($_SESSION['msg']);
	}
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
	if(isset($_SESSION['user']) && !empty($_SESSION['user']))
		return true;
	else
		return false;
}

function get_last_visited_msg($time)
{
	//date_default_timezone_set ('Asia/Singapore');
	$lastvisitedmsg = ' You last visited: ';
	if((date('d',time())-date('d',strtotime($time)))=='0')
		$lastvisitedmsg .= 'Today ';
	else if((date('d',time())-date('d',strtotime($time)))=='1')
		$lastvisitedmsg .= 'Yesterday';
	else
		$lastvisitedmsg .= date('d-m-Y ', $time);
		
	$lastvisitedmsg .= date('g:i a', strtotime($time));
	
	return $lastvisitedmsg;
}


?>