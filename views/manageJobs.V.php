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
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width='200px'>Date</th>
				<th width='200px'>Company name</th>
				<th width='200px'>Employer name</th>
				<th width='200px'>Job title</th>
				<th width='200px'>Position</th>
				<th width='200px'>salary</th>
				<th width='200px'>Yrs Exp</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pendingjobs as $job): ?>
			<tr onclick="location.href='profile.php?id=<?php echo $jobseeker['id']?>'" style='cursor:pointer;'>	
				<td><?php echo $jobseeker['firstname'] ?></td>
				<td><?php echo $jobseeker['lastname'] ?></td>
				<td><?php echo $jobseeker['matric'] ?></td>
				<td><?php echo $jobseeker['email'] ?></td>
				<td><?php echo $jobseeker['createTime'] ?></td>
				<td><a href='accountCTRL.php?id=<?php echo $jobseeker['id']?>&action=approve'>Approve</a> <a href='accountCTRL.php?id=<?php echo $jobseeker['id']?>&action=disapprove'>Disapprove</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>