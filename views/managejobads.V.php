<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 *  
 *  --  variables supplied to this page from controller --
 *  $jobs - 2 dimentional array of {id,date,title,specialization,salary,experience,status}
 *  
 *  --  list of tasks for this view  --
 *  style
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 $modalforms[] = 'jobads-modal-forms';
?>

<?php ob_start() ?>
	
    <h1>My Posted Job Ads</h1>

	<?php if(sizeof($jobs) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width=''>Date</th>
				<th width=''>Job Title</th>
				<th width=''>specialization</th>
				<th width=''>Salary</th>
				<th width=''>Yrs Exp</th>
				<th width=''>Status</th>
				<th width=''>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($jobs as $job): ?>
			<tr onclick="location.href='jobs.php?id=<?php echo $job['id']?>'" style='cursor:pointer;'>	
				<td><?php echo $job['date'] ?></td>
				<td><?php echo $job['title'] ?></td>
				<td><?php echo $job['specialization'] ?></td>
				<td><?php echo $job['salary'] ?></td>
				<td><?php echo $job['experience'] ?></td>
				<td><?php echo $job['status'] ?></td>
				<td><a href='#modaleditjob'>Edit</a> <a href='#modaldeletejob'>Delete</a> </td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No posted job record.</h3>
	<?php }?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>