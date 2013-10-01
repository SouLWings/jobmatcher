<?php
include_once 'controller.inc.php';
if(isset($_POST['name'])){
	header("Refresh:3; url=index.php");
	$content = '<h2>Thank you for leaving us a message!</h2>';
	include 'views/template/layout.php';
}
else
	include 'views/contactus.V.php';

?>