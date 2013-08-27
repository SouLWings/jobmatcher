<?php
require 'controller.inc.php';
session_destroy();
if($referer == $curr_location)
	$referer = 'index.php';
header('Location: index.php');
?>