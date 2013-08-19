<?php
require 'core.inc.php';
require 'db_con.inc.php';

if(loggedin())
{
	$un = $_SESSION['un'];
	$query_run = mysql_query("select DATETIME from user_login_log where user_id = (select user_id FROM user where user_name = '$un') order by datetime desc");
	echo 'Welcome, '.$un.'.';
	if(mysql_num_rows($query_run) > 1)
		echotime(mysql_result($query_run, 1, "DATETIME"));
	echo '<a href="logout.php"><br>Log out</a>';
}
else
{
	include 'loginform.php';
	echo "<a href='register.php'>Register<a>";
}

?>