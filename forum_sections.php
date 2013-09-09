<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
$user='llaw_lee';
$uuid='20';
$type='admin';
<<<<<<< HEAD
=======

function xecho($x)
{
	if(strlen($x)<=150)
	{
		$z=$x;
	}
	else
	{
		$z=substr($x,0,150) . '...';
		
	}
	return $z;
}

>>>>>>> origin/llaw
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	echo $id;
}

			
$f = new forumDAO();

<<<<<<< HEAD
$threads = $f-> getThreads($id);
=======
/* $max=1;
$page= $f-> threadPage($id,$max);
echo $page; */
//$count=0;
//$threads = $f-> getThreads($id,$count);
$count=0;
$threads = $f-> getThreads($id,$count);


>>>>>>> origin/llaw
$sectionname= $f-> sectionname($id);

foreach($threads as $thread)
{
	$f1id=$thread['id'];
	$numpost[$f1id]=$f->numPost($f1id);
	$username[$f1id]=$f->getUsers($f1id);
	$sectionname[$f1id]=$f->sectionname($f1id);
<<<<<<< HEAD
	$lastposts[$f1id]= $f->lastPost($f1id);
	
	foreach ($lastposts[$f1id] as $last)
	{
		//$uid[$f1id]=$last['uid'];
		$time[$f1id]=$last['datetime'];
		
		$user[$f1id]=$f->pgetUsers($last['uid']);
=======
	$thread['content']=xecho($thread['content']);
	
	$lasts=$f->thrlastpost($f1id);
	foreach ($lasts as $last)
	{
		$lastpost[$f1id] = $last['last'];
		$lastdate["$lastpost[$f1id]"]=$f->gettime($lastpost[$f1id]);
		$lastuser["$lastpost[$f1id]"]=$f->getuser($lastpost[$f1id]);
>>>>>>> origin/llaw
	}
	
}

$f->disconnect();

include 'views/forum_sections.V.php';
?>
