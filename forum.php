<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
//include 'session.php';
//session_start();
//$user=$_SESSION['user']['firstname'].', '.$_SESSION['user']['lastname'];
//$uuid=$_SESSION['user']['id'];
//$type=$_SESSION['user']['usertype'];

$f = new forumDAO();

$sections = $f->getSections();

foreach($sections as $section)
{
	$id=$section['id'];
	$numthread["$id"]=$f->numThread($id);
	$totalpost["$id"]=intval($f->totalPost($id)) + intval($f->numThread($id));
	
	$last = $f->seclastpost($id);
	$lastpost[$id] = $last['post_ID'];
	$lastdate["$lastpost[$id]"]=$f->gettime($lastpost[$id]);
	$lastuser["$lastpost[$id]"]=$f->getuser($lastpost[$id]);
}

$editable = false;
if(isset($ut) && $ut == 'admin'){
	$editable = true;
}
$f->disconnect();

include 'views/forum.V.php';
?>
