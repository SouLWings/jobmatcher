<?php
include 'controller.inc.php';
include 'modals/forumDAO.php';

//forum section must have and ID in URL
if(isset($_GET['id']))
{
	$f = new forumDAO();
	
	//get the statistic info for side panel
	$allpostcount = $f->count_all_posts();
	$allthreadcount = $f->count_all_threads();
	$allmembercount = $f->count_all_members();
	$allonlinecount = $f->count_all_online();
	
	//obtain the id from URL
	$secid=$_GET['id'];
	
	//set the page number (default = 1 if not specified in URL)
	$page=1;
	if(isset($_GET['page']) && intval($_GET['page']) > 0)
		$page = intval($_GET['page']);

	//get the number of normal/hot threads of this section
	$numThreads = $f->numThread($secid, false);
	
	//get the name of this section
	$sectionname= $f-> get_section_name_by($secid);
	
	//start output buffer for the page pagination
	$x = 1;
	ob_start();
	?>
		<ul class="pagination">
			<li <?php if($page == 1)echo 'class="disabled"'?>><a href="forum_sections.php?id=<?php echo $secid ?>&page=<?php echo intval($page)-1 ?>">&laquo;</a></li>
			<?php for($x; $x < $numThreads / 5 + 1; $x++){?>
			<li <?php if($page == $x)echo 'class="active"'?>><a href="forum_sections.php?id=<?php echo $secid ?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
			<?php } ?>
			<li <?php if($page+1 == $x)echo 'class="disabled"'?>><a href="forum_sections.php?id=<?php echo $secid ?>&page=<?php echo intval($page)+1 ?>">&raquo;</a></li>
		</ul>
	<?php
	$pagination = ob_get_clean();
	
	//get all the threads
	$threads = $f-> get_all_Threads($secid,'normal',$page);

	//loop through each threads
	for($i = 0; $i < sizeof($threads); $i++)
	{
		//getting the last post details
		$lastpost = $f->get_last_post_by($threads[$i]['id']);
		$threads[$i]['lastusername'] = $lastpost['username'];
		$threads[$i]['lastid'] = $lastpost['id'];
		$threads[$i]['lastdatetime'] = $lastpost['datetime'];
		
		//setting the tag and class for the thread type
		if($threads[$i]['type'] == 'hot')
		{
			$threads[$i]['tag'] = '<span class="label label-danger pull-right">HOT</span>';
			$threads[$i]['class'] = 'warning';
			//setting the icon for the thread
			if($threads[$i]['status'] == 'open')
				$threads[$i]['icon'] = 'hot_open';
			else
				$threads[$i]['icon'] = 'hot_closed';
		}
		else
		{
			$threads[$i]['tag'] = '<span class="label label-default pull-right">Normal</span>';
			$threads[$i]['class'] = '';
			//setting the icon for the thread
			if($threads[$i]['status'] == 'open')
				$threads[$i]['icon'] = 'normal_open';
			else
				$threads[$i]['icon'] = 'normal_closed';
		}
	}
	
	//doing the same thing as above for sticky and global threads
	$stickythreads = $f-> get_all_Threads($secid,'important');
	
	for($i = 0; $i < sizeof($stickythreads); $i++)
	{
		$lastpost = $f->get_last_post_by($stickythreads[$i]['id']);
		$stickythreads[$i]['lastusername'] = $lastpost['username'];
		$stickythreads[$i]['lastid'] = $lastpost['id'];
		$stickythreads[$i]['lastdatetime'] = $lastpost['datetime'];
		if($stickythreads[$i]['type'] == 'sticky')
		{
			$stickythreads[$i]['tag'] = '<span class="label label-success pull-right">STICKY</span>';
			$stickythreads[$i]['class'] = 'success';
			//setting the icon for the thread
			if($stickythreads[$i]['status'] == 'open')
				$stickythreads[$i]['icon'] = 'sticky_open';
			else
				$stickythreads[$i]['icon'] = 'sticky_closed';
		}
		else if($stickythreads[$i]['type'] == 'global')
		{
			$stickythreads[$i]['tag'] = '<span class="label label-warning pull-right">GLOBAL</span>';
			$stickythreads[$i]['class'] = 'warning';
			//setting the icon for the thread
			if($stickythreads[$i]['status'] == 'open')
				$stickythreads[$i]['icon'] = 'global_open';
			else
				$stickythreads[$i]['icon'] = 'global_closed';
		}
	}
	
	/* testing purpose
	echo '<pre>';
	print_r($stickythreads);
	echo '</pre>';
	*/

	$f->disconnect();
	
	//set editable to true if admin logged in
	$editable = false;
	if(isset($ut) && $ut == 'admin')
		$editable = true;

	include 'views/forum_sections.V.php';
}
else
	header('forum.php');
?>
