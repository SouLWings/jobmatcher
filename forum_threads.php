<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
$user='llaw_lee';
$uuid='20';
$type='admin';
if(isset($_GET['id']))
{
	$f1id=$_GET['id'];
}

$f = new forumDAO();
$thread= $f-> getThread($f1id);
	$datetime=$thread['datetime'];
	$numpost=$f->numPost($f1id);
	$username=$f->getUsers($f1id);
	$threadtopic=$thread['title'];
	$threadcontent=$thread['content'];

if ($type=='admin')
{
	$posts = $f-> getPosts($f1id);
}
else 
{
	$posts = $f-> getPosts2($f1id);
}
	
foreach($posts as $post)
{	
	$f2id=$post['id'];
	$pdatetime[$f2id]=$post['datetime'];
	$posttopic[$f2id]=$post['topic'];
	$postcontent[$f2id]=$post['content'];	
	if ($type=='admin')
	{
		$pstatus[$f2id]=$post['type'];
	}
	else
	{
		$pstatus[$f2id]='';
	}
	$puid[$f2id]=$post['uid'];
	$uid=$puid[$f2id];
	$pusername[$uid]=$f->pgetUsers($uid);
	$pnumpost[$uid]=$f->pnumPosts($uid);
}

$f->disconnect();

include 'views/forum_threads.V.php';
?>
