<?php

session_start();

$curr_location = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']))
	$referer = $_SERVER['HTTP_REFERER'];
else
	$referer = $curr_location;
	
if(loggedin())
{
	$un = $_SESSION['un'];
	$query_run = mysql_query("select DATETIME from user_login_log where user_id = (select user_id FROM user where user_name = '$un') order by datetime desc");
	
	if(mysql_num_rows($query_run) > 1)
		$lastvisitedmsg = get_last_visited_msg(mysql_result($query_run, 1, "time"));
	else
		$lastvisitedmsg = 'This is your first log in.';
	$useraside = 'welcome.php';
}
else
{
	$useraside = 'login.php';
}	

	
	
	
	
function is_logged_in()
{
	if(isset($_SESSION['id']) && !empty($_SESSION['id']))
		return true;
	else
	{
		return false;
	}
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

function get_secured($input)
{
	return mysql_real_escape_string(stripslashes(htmlentities($input)));
}


?>