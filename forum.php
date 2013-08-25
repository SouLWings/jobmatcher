<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
//sad
$f = new forumDAO();
//print threadnum
$sections = $f-> getSections();

foreach($sections as $section)
{
	$id=$section['id'];
	$numthread ["$id"]=$f->numThread($id);
}

/* $sections = $f-> getSections();


$numthread [$id]=$f->numThread($id);
$numpost["$id"]=$f->numPost($id);	*/




$f->disconnect();

include 'views/forum.V.php';
?>
