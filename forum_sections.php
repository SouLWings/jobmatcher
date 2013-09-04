<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
$user='llaw_lee';
$uuid='20';
$type='admin';
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

$f = new forumDAO();

$threads = $f-> getThreads($id);
$sectionname= $f-> sectionname($id);

foreach($threads as $thread)
{
	$f1id=$thread['id'];
	$numpost[$f1id]=$f->numPost($f1id);
	$username[$f1id]=$f->getUsers($f1id);
	$sectionname[$f1id]=$f->sectionname($f1id);
	$lastposts[$f1id]= $f->lastPost($f1id);
	
	foreach ($lastposts[$f1id] as $last)
	{
		//$uid[$f1id]=$last['uid'];
		$time[$f1id]=$last['datetime'];
		
		$user[$f1id]=$f->pgetUsers($last['uid']);
	}
	
}

$f->disconnect();

include 'views/forum_sections.V.php';
?>
