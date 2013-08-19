<?php
require 'core.inc.php';
session_destroy();
if($referer == $curr_location)
	$referer = 'homepage.php';
header('Location: '.$referer);
?>