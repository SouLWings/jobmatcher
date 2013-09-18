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
$title = 'Forum Sections';
$modalforms[] = 'forum-modal-forms';
$styles[] = 'forum';
?>

<?php ob_start() ?>


<a data-toggle="modal" href="#addsection" class="btn btn-primary btn-md">New Section</a>

    <h1>Forum Sections</h1>

    <table class="table table-striped table-bordered table-hover tablesorter">
		<tr>
			<th>Section</th>
			<th>Threads</th>
			<th>Posts</th>
			<th>Last Post</th>
		</tr>
	
	<?php foreach ($sections as $section): $sid=$section['id']; ?>
		<tr>
			<td><?php echo"<a href=forum_sections.php?id=$section[id]> $section[section]</a>";?><br><h6><?php $section['description'];?></h6></td>

			<td><?php echo $numthread["$sid"]?></td>
			<td><?php echo $totalpost["$sid"]?></td>
			<td><?php echo "<a href='profile.php?id=".$lastuser["$lastpost[$sid]"]['id']."'>".$lastuser["$lastpost[$sid]"]['username'].'</a><br>'.$lastdate["$lastpost[$sid]"];?></td>
			
			
			
			<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$section[id] name='id'/>";?><input type="submit"  value="editSection" name="action" /></form></td>
			
			<td><form action="forumManager.php" method="post"><?php echo "<input type='hidden' value=$section[id] name='id'/>"?><input type="submit"  value="deleteSection" name="action" /></form></td>
			
			<td><a data-toggle="modal" href="#editsection" class="btn btn-primary btn-md">Edit Section</a></td>
		</tr>	
		<script>
			
		</script>
	<?php endforeach; ?>
	
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>