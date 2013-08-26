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
 
?>

<?php ob_start() ?>
	
    <h1>Chat</h1>

	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width='300px'>Inbox</th>
				<th>Conversation</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($jobs as $job): ?>
			<tr onclick="location.href='jobs.php?id=<?php echo $job['id']?>'" style='cursor:pointer;'>	
				<td><?php echo $job['title'] ?></td>
				<td><?php echo $job['company'] ?></td>
				<td><?php echo $job['location'] ?></td>
				<td><?php echo $job['salary'] ?></td>
				<td><?php echo $job['experience'] ?></td>
				<td><?php echo $job['date'] ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>