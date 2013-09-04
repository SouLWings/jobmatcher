<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $jobapplications - 2 dimentional array of {time, title, position, name, location, salary}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
?>

<?php ob_start() ?>
	<h2>Job Applications Record</h2>
	<?php if(sizeof($jobapplications) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width=''>Time</th>
				<th width=''>Title</th>
				<th width=''>Position</th>
				<th width=''>Name</th>
				<th width=''>Location</th>
				<th width=''>Salary</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($jobapplications as $ja): ?>
			<tr  style='cursor:pointer;'>	
				<td><?php echo $ja['time'] ?></td>
				<td><?php echo $ja['title'] ?></td>
				<td><?php echo $ja['position'] ?></td>
				<td><?php echo $ja['name'] ?></td>
				<td><?php echo $ja['location'] ?></td>
				<td><?php echo $ja['salary'] ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No job application found.</h3>
	<?php }?>
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>