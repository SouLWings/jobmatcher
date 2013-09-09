<?php
include 'controller.inc.php';

if(isset($_GET['code']))
{
	$code = get_secured($_GET['code']);
	if($code == '401')
		include 'views/error401.V.php';
	else
		include 'views/error404.V.php';
<<<<<<< HEAD
=======
	else if($code == '401')
		include 'views/error401.V.php';
>>>>>>> origin/llaw
}
else
	include 'views/error404.V.php';
?>