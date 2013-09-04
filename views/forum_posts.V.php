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
$title = 'Forum Posts'; 
?>

<?php ob_start() ?>
    <h1>Forum Users</h1>

    <table class="table-striped table-bordered table-hover tablesorter">
		<tr><td>datetime</td><tr>
		<tr>
			<td>username/pic/post</td>
			<td>threadtopic/description</td>
			<br>
		</tr>
		
		
		
	<?php foreach ($posts as $post): ?>
		<tr><td>datetime</td><tr>
		<tr>
			<td><?php echo"<a href=forum_posts.php?id=$users[id]> $users[title]</a>";?>/pic/post</td>
			<td>post</td>
			<br>
		</tr>
			
				
	<?php endforeach; ?>
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>

