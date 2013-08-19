<?php
require 'core.inc.php';
require 'db_con.inc.php';

$regisflag = false;
$un = '';
$pw1 = '';
$pw2 = '';
$fn = '';
$ln = '';
$em = '';
$ut = '';
if(loggedin())
	echo 'You had logged in';
else
	if(isset($_POST['un']) && isset($_POST['pw1']) && isset($_POST['pw2']) && isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['em']) && isset($_POST['ut']))
	{
		$un = $_POST['un'];
		$pw1 = $_POST['pw1'];
		$pw2 = $_POST['pw2'];
		$fn = $_POST['fn'];
		$ln = $_POST['ln'];
		$em = $_POST['em'];
		$ut = $_POST['ut'];
		if(!empty($un) && !empty($pw1) && !empty($pw2) && !empty($fn) && !empty($ln) && !empty($em) && !empty($ut))
		{
			$query = "SELECT USER_NAME FROM user WHERE USER_NAME = '$un'";
			$query_run = mysql_query($query);
			
			//check if a username exist
			if(mysql_num_rows($query_run)!=0)
			{
				echo 'Error: username already exist.<br>';
				$regisflag = true;
			}
			
			$query = "SELECT USER_EMAIL FROM user WHERE USER_EMAIL = '$em'";
			$query_run = mysql_query($query);
			
			//check if a email already being used
			if(mysql_num_rows($query_run)!=0)
			{
				echo 'Error: email already used.<br>';
				$regisflag = true;
			}
			
			//passwords match
			if($pw1!=$pw2)
			{
				echo 'Error: passwords mismatch.<br>';
				$regisflag = true;
			}
			
			//passwords length
			if(strlen($pw1) < 6)
			{
				echo 'Error: passwords too short.<br>';
				$regisflag = true;
			}
		}
		else
		{
			echo 'Please fill in all fields before you can register.';
			$regisflag = true;
		}
	}
	else
		$regisflag = true;
		
if($regisflag)
{
	include 'registrationform.php';
}
else
{
	$un = mysql_real_escape_string(stripslashes($un));
	$pw1 = mysql_real_escape_string(stripslashes(md5($pw1)));
	$fn = mysql_real_escape_string(stripslashes($fn));
	$ln = mysql_real_escape_string(stripslashes($ln));
	$em = mysql_real_escape_string(stripslashes($em));
	
	$query = "SELECT USER_TYPE_ID FROM user_type WHERE USER_TYPE ='$ut'";
	$query_run = mysql_query($query);
	$uti = mysql_result($query_run, 0, 'USER_TYPE_ID');
	$query = "INSERT INTO user VALUES('','$un','$fn','$ln','$em','$pw1',CURRENT_TIMESTAMP,'$uti')";
	if(mysql_query($query))
		echo 'Registered. Please check your e-mail to confirm your registration.<br>Password is: '.$pw1;
	else
		echo 'Registration GG-ed';
	echo '<br><a href=\'homepage.php\'>Back to homepage</a>';
}
?>