<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $pendingjobs - 2 dimentional array {name(company),firstname(employer),title,position,salary,experience,date}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
?>

<?php ob_start() ?>
	<?php if(sizeof($pendingjobs) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width=''>Date</th>
				<th width=''>Company name</th>
				<th width=''>Employer name</th>
				<th width=''>Job title</th>
				<th width=''>Position</th>
				<th width=''>salary</th>
				<th width=''>Yrs Exp</th>
				<th width=''>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pendingjobs as $job): ?>
			<tr>	
				<td><?php echo $job['date'] ?></td>
				<td><a href='company.php?id='><?php echo $job['name'] ?></a></td>
				<td><a href='profile.php?id='><?php echo $job['firstname'] ?></a></td>
				<td><?php echo $job['title'] ?></td>
				<td><?php echo $job['position'] ?></td>
				<td><?php echo $job['salary'] ?></td>
				<td><?php echo $job['experience'] ?></td>
				<td><a href='adminactionCTRL.php?id=<?php echo $job['id']?>&action=approvejob'>Approve</a> <a href='adminactionCTRL.php?id=<?php echo $job['id']?>&action=disapprovejob'>Disapprove</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No pending job found.</h3>
	<?php }?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>