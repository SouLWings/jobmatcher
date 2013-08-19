<?php
//core php file
ob_start();
session_start();

$curr_location = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']))
	$referer = $_SERVER['HTTP_REFERER'];
else
	$referer = $curr_location;

	
//check whether a user has logged in
function loggedin()
{
	if(isset($_SESSION['id']) && !empty($_SESSION['id']))
		return true;
	else
	{
		return false;
	}
}

//echo a time giving a string time
function echotime($time)
{
	//date_default_timezone_set ('Asia/Singapore');
	echo ' You last visited: ';
	if((date('d',time())-date('d',strtotime($time)))=='0')
		echo 'Today ';
	else if((date('d',time())-date('d',strtotime($time)))=='1')
		echo 'Yesterday';
	else
		echo date('d-m-Y ', $time);
		
	echo date('g:i a', strtotime($time));
}

?>
