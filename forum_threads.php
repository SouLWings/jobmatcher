<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';
include 'modals/userDAO.php';

function rephase_usertype($usertype){
	if($usertype == 'admin')
		return 'Administrator';
	else if($usertype == 'jobseeker')
		return 'Job Seeker';
	else if($usertype == 'employer')
		return 'Employer';
	else
		return '';
}

//forum section must have and ID in URL
if(isset($_GET['id']))
{
	$tid=$_GET['id'];

	$page = 1;
	if(isset($_GET['page']) && intval($_GET['page']) > 1)
		$page = intval($_GET['page']);
	
	if($page == 1)
		$postcount = 0;
	else
		$postcount = ($page - 1) * 5;
	
	$f = new forumDAO();
	$userDAO = new userDAO();
	
	//get the statistic info for side panel
	$allpostcount = $f->count_all_posts();
	$allthreadcount = $f->count_all_threads();
	$allmembercount = $f->count_all_members();
	$allonlinecount = $f->count_all_online();
	
	//get the name of this section
	$section = $f-> get_section_by($tid);
	
	$thread = $f->get_thread_by($tid);
	$thread['usertype'] = rephase_usertype($thread['usertype']);
	$thread['userposts'] = $f->num_post_by_user($thread['userid']);
	$thread['profilepicdirc'] = $userDAO->get_profile_pic_dirc($thread['userid']);
	
	$posts = $f->get_all_posts($tid, $page);
	for($x = 0; $x < sizeof($posts); $x++){
		$posts[$x]['userposts'] = $f->num_post_by_user($posts[$x]['userid']);
		$posts[$x]['usertype'] = rephase_usertype($posts[$x]['usertype']);
		$posts[$x]['profilepicdirc'] = $userDAO->get_profile_pic_dirc($posts[$x]['userid']);
	}
	
	$replyable = false;
	if(is_logged_in() && $thread['status'] == 'open')
		$replyable = true;
	
	$editable = false;
	if(is_logged_in() && $thread['userid'] == $aid)
		$editable = true;
		
	$numPosts = intval($f->numPost($tid)) + 1;
	//start output buffer for the page pagination
	$x = 1;
	ob_start();
	?>
		<ul class="pagination">
			<li <?php if($page == 1)echo 'class="disabled"'?>><a href="forum_threads.php?id=<?php echo $tid ?>&page=<?php echo intval($page)-1 ?>">&laquo;</a></li>
			<?php for($x; $x < $numPosts / 5 + 1; $x++){?>
			<li <?php if($page == $x)echo 'class="active"'?>><a href="forum_threads.php?id=<?php echo $tid ?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
			<?php } ?>
			<li <?php if($page+1 == $x)echo 'class="disabled"'?>><a href="forum_threads.php?id=<?php echo $tid ?>&page=<?php echo intval($page)+1 ?>">&raquo;</a></li>
		</ul>
	<?php
	$pagination = ob_get_clean();
	
	
	//retrieve the link of the profile pic
	if($page == 1)
		$f->view_increment($tid);

	/* testing purpose
	echo '<pre>';
	print_r($thread);
	echo '</pre>';*/
	
	/* testing purpose
	echo '<pre>';
	print_r($posts);
	echo '</pre>';*/
	
	$userDAO->disconnect();
	$f->disconnect();
	include 'views/forum_threads.V.php';
}
else
	header('forum.php');
?>
