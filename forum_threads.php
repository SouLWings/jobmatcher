<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';

//forum section must have and ID in URL
if(isset($_GET['id']))
{
	$tid=$_GET['id'];

	$f = new forumDAO();
	
	//get the name of this section
	$section = $f-> get_section_by($tid);
	
	$thread = $f->get_thread_by($tid);

	$posts = $f->get_all_posts($tid);
	for($x = 0; $x < sizeof($posts); $x++)
		$posts[$x]['posts'] = $f->num_post_by_user($posts[$x]['id']);
	$f->disconnect();

	/* testing purpose*/
	echo '<pre>';
	print_r($thread);
	echo '</pre>';
	
	/* testing purpose*/
	echo '<pre>';
	print_r($posts);
	echo '</pre>';
	
	//include 'views/forum_threads.V.php';
}
else
	header('forum.php');
?>
