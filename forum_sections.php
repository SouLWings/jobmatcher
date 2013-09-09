<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
$user='llaw_lee';
$uuid='20';
$type='admin';

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

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	echo $id;
}

			
$f = new forumDAO();

/* $max=1;
$page= $f-> threadPage($id,$max);
echo $page; */
//$count=0;
//$threads = $f-> getThreads($id,$count);
$count=0;
$threads = $f-> getThreads($id,$count);


$sectionname= $f-> sectionname($id);

foreach($threads as $thread)
{
	$f1id=$thread['id'];
	$numpost[$f1id]=$f->numPost($f1id);
	$username[$f1id]=$f->getUsers($f1id);
	$sectionname[$f1id]=$f->sectionname($f1id);
	$thread['content']=xecho($thread['content']);
	
	$lasts=$f->thrlastpost($f1id);
	foreach ($lasts as $last)
	{
		$lastpost[$f1id] = $last['last'];
		$lastdate["$lastpost[$f1id]"]=$f->gettime($lastpost[$f1id]);
		$lastuser["$lastpost[$f1id]"]=$f->getuser($lastpost[$f1id]);
	}
	
}

$f->disconnect();

include 'views/forum_sections.V.php';
?>
