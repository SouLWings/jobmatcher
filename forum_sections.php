<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';

if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

$f = new forumDAO();

$threads = $f-> getThreads($id);

foreach($threads as $thread)
{
	$f1id=$thread['id'];
	$numpost["$f1id"]=$f->numPost($f1id);
}

$f->disconnect();

include 'views/forum_sections.V.php';
?>
