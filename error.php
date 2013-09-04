<?php
include 'controller.inc.php';

if(isset($_GET['code']))
{
	$code = get_secured($_GET['code']);
	if($code == '404')
		include 'views/error404.V.php';
	else if($code == '401')
		include 'views/error401.V.php';
}
else
	include 'views/error404.V.php';
?>