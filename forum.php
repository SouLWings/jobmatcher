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


$sections = $f-> getSections();

foreach($sections as $section)
{
	$id=$section['id'];
	$numthread ["$id"]=$f->numThread($id);
	$totalpost["$id"]=$f->totalPost($id);
	
	$lasts = $f-> seclastpost($id);
	foreach($lasts as $last)
	{
		$lastpost[$id] = $last['last'];
		$lastdate["$lastpost[$id]"]=$f->gettime($lastpost[$id]);
		$lastuser["$lastpost[$id]"]=$f->getuser($lastpost[$id]);
	}
	
}


$f->disconnect();

include 'views/forum.V.php';
?>
