<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
//include 'session.php';
//session_start();
//$user=$_SESSION['user']['firstname'].', '.$_SESSION['user']['lastname'];
//$uuid=$_SESSION['user']['id'];
//$type=$_SESSION['user']['usertype'];

$user='llaw_lee';
$uuid='20';
$type='admin';

$f = new forumDAO();
if(!isset($_GET['startrow']))
{
	$startrow=0;
}
else
{
	$startrow=(int)$_GET['startrow'];
}

$sections = $f-> getSections($startrow);

foreach($sections as $section)
{
	$id=$section['id'];
	$numthread ["$id"]=$f->numThread($id);
	$totalpost["$id"]=$f->totalPost($id);
}


$f->disconnect();

include 'views/forum.V.php';
?>
