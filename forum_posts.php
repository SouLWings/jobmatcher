<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';

if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

$f = new forumDAO();

$users = $f-> getUsers($id);

$f->disconnect();

include 'views/forum_users.V.php';
?>
