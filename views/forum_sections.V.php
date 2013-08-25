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
    <h1>Forum Threads</h1>

    <table class="table-striped table-bordered table-hover tablesorter">
		<tr>
			<th>Threads</th>
			<th>User</th>
			<th>Status</th>
			<th>Post</th>
			<th>Last Post</th>
		</tr>
	<?php foreach ($threads as $thread): ?>
		<tr>
			<td><?php echo"<a href=forum_threads.php?id=$thread[id]> $thread[title]</a>";?><br><h6><?php echo $thread['content']?></h6></td>
			<td><?php //echo user?></td>
			<td><?php echo $thread['status']?></td>
			<td><?php  echo $numpost["$thread[id]"]?></td>
			<td><?php //echo $section['lastPost']?></td>
		</tr>		
	<?php endforeach; ?>
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>