<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';

if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

$f = new forumDAO();

$posts = $f-> getPosts($id);

$f->disconnect();

include 'views/forum_threads.V.php';
?>
