<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $example - explaination/details of the variable
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Threads'; 
?>
<?php ob_start() ?>

	<a data-toggle="modal" href="#addthread" class="btn btn-primary btn-lg">New Thread</a>
	<?php include('forum-modal-forms.inc.php'); ?>
    <h1>Forum Threads</h1>

    <table class="table-striped table-bordered table-hover tablesorter">
		<tr>
			<th>Threads</th>
			<th>User</th>
			<th>Started</th>
			<th>Status</th>
			<th></th>
			<th>Post</th>
			<th>Last Post</th>
			<th></th>
			<th></th>
		</tr>
	<?php foreach ($threads as $thread): $f1id=$thread['id'];?>
		<tr>
			<td><?php echo $sectionname[$f1id].': '."<a href=forum_threads.php?id=$f1id> $thread[title]</a>";?><br><?php echo $thread['content']?></td>
			<td><?php echo $username[$f1id] //set link to profile?></td>
			<td><?php echo $thread['datetime']?></td>
			<td><?php echo $thread['status']?></td>
			<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$f1id name='f1id'/>";?><input type="submit"  value="alterStatus" name="action" /></form></td>
			<td><?php echo $numpost[$f1id]?></td>
			
			<td><?php echo $user[$f1id]."<br>".$time[$f1id]?></td>
			
			<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$f1id name='f1id'/>";?><input type="submit"  value="EditThread" name="action" /></form></td>
			<td><form action="forumManager.php" method="post"><?php echo "<input type='hidden' value=$f1id name='f1id'/>"?><input type="submit"  value="deleteThread" name="action" /></form></td>	
		</tr>		
	<?php endforeach; ?>
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>