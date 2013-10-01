<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $threads - 2 dimentional array {id,title,username,datetime,type,status,replies,views,lastusername,lastid,lastdatetime}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Threads'; 
$modalforms[] = 'forum-modal-forms';
$styles[] = 'forum';
$scripts[] = 'forum_sections';

?>
<?php ob_start() ?>
	<h4><b><a href='forum.php'>Forum Board</a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> <b>Search Result</b></h4>
	<br>
	<h4><?php echo sizeof($threads)?> Matched Threads</h4>
	<?php if(sizeof($threads) > 0) {?>
    <table class="table table-bordered">
		<thead>
			<tr>
				<th>THREADS</th>
				<th width='82px'>REPLIES</th>
				<th width='82px'>VIEWS</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($threads as $thread):?>
			<tr class='<?php echo $thread['class']?>'>
				<!-- thread name + usuername + time -->
				<td>
					<b><a href='forum_threads.php?id=<?php echo $thread['id']?>'> <?php echo $thread['title']?></a></b>
					<br>
					<h6>
						<?php echo $thread['content'] ?>
					</h6>
					<h6>
						<i>Started By</i> 
						<a href='profile.php?id=<?php echo $thread['userid']?>'><?php echo $thread['username']?></a> 
						&mdash;
						<?php echo $thread['datetime']?>
					</h6>
				</td>
				
				<!-- thread replies number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['replies']?></td>
				
				<!-- thread views number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['views']?></td>
			</tr>		
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php } ?>
	
	
	<h4><?php echo sizeof($posts)?> Matched Posts</h4>
	<?php if(sizeof($posts) > 0) {?>
    <table class="table table-bordered">
		<thead>
			<tr>
				<th>POST</th>
				<th>THREADS</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($posts as $post):?>
			<tr class='<?php echo $post['class']?>'>
				<td>						
					<b><?php echo $post['content'] ?> </b>
					<br>
					<i> by </i> 
					<a href='profile.php?id=<?php echo $post['userid']?>'><?php echo $post['username']?></a> 
					&mdash;
					<?php echo $post['datetime']?>
				</td>
				
				<td>
					<b><a href='forum_threads.php?id=<?php echo $post['tid']?>'> <?php echo $post['title']?></a></b>
				</td>
				
				
			</tr>		
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php } ?>
	
<?php $content = ob_get_clean() ?>

<?php 
ob_start() ;
include 'forum_aside.inc.php';
$aside = ob_get_clean()  
?>
<?php include 'template/layout.php' ?>