<?php
include_once 'controller.inc.php';
include 'modals/forumDAO.php';
$f = new forumDAO();
if(isset($_POST['action']) && $_POST['action'] == 'forumsearch')
{
	if(isset($_POST['keyword']) && !empty($_POST['keyword']))
	{
		//get the statistic info for side panel
		$allpostcount = $f->count_all_posts();
		$allthreadcount = $f->count_all_threads();
		$allmembercount = $f->count_all_members();
		$allonlinecount = $f->count_all_online();
		$threads = $f->search_threads(get_secured($_POST['keyword']));
		$posts = $f->search_posts(get_secured($_POST['keyword']));	
		for($i = 0; $i < sizeof($threads); $i++)
			if(strlen($threads[$i]['content']) > 100)
				$threads[$i]['content'] = substr($threads[$i]['content'],0,100).'...';
		
		include 'views/forum_search.V.php';
	}
}
else
	header('forum.php');
?>
