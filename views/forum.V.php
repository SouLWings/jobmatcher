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
?>

<?php ob_start() ?>


<a data-toggle="modal" href="#addsection" class="btn btn-primary btn-lg">New Section</a>

    <h1>Forum Sections</h1>
	<?php 
		
		echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+1).'">Next</a>';
		$prev = $startrow - 1;
		if ($prev >= 0)
		echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Previous</a>';
	?>
    <table class="table-striped table-bordered table-hover tablesorter">
		<tr>
			<th>Section</th>
			<th>Threads</th>
			<th>Posts</th>
			<th>Last Post</th>
			<th></th>
			<th></th>
		</tr>
	
	<?php foreach ($sections as $section):  ?>
		<tr>
			<td><?php echo"<a href=forum_sections.php?id=$section[id]> $section[section]</a>";?><br><h6><?php echo $section['description']?></h6></td>
			
			<td><?php echo $numthread["$section[id]"]?></td>
			<td><?php echo $totalpost["$section[id]"]?></td>
			<td><?php //echo $section['lastPost']?></td>
			<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$section[id] name='id'/>";?><input type="submit"  value="editSection" name="action" /></form></td>
			
			<td><form action="forumManager.php" method="post"><?php echo "<input type='hidden' value=$section[id] name='id'/>"?><input type="submit"  value="deleteSection" name="action" /></form></td>
			
		</tr>	
		<script>
			
		</script>
	<?php endforeach; ?>
	
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>