<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
//include 'session.php';
//session_start();
//$user=$_SESSION['user']['firstname'].', '.$_SESSION['user']['lastname'];
//$uuid=$_SESSION['user']['id'];
//$type=$_SESSION['user']['usertype'];

$f = new forumDAO();

//get the statistic info for side panel
$allpostcount = $f->count_all_posts();
$allthreadcount = $f->count_all_threads();
$allmembercount = $f->count_all_members();
$allonlinecount = $f->count_all_online();

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
