<?php
//database connection
if(!@mysql_connect('localhost','root','') || !@mysql_select_db('dawn'))
{
	die('Could not Connect: '.mysql_error());
}
?>