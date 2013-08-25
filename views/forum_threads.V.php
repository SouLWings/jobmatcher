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
    <h1>Forum Posts</h1>

    <table class="table-striped table-bordered table-hover tablesorter">
		<tr>
			<td>User</td>
			<td>Posts</td>
			
		</tr>
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php //user ?></td>
			<td><?php echo $post['content']?></td>
			
			
			
		</tr>		
	<?php endforeach; ?>
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>