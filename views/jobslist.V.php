<?php 
/*  --	defining optional variables  --
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder
 * 
 *  --  variables supplied to this page  --
 *  $containertitle - the title for the container
 *  $jobs - array of jobs, each job is array consist of {'title','company','location','salary','experience','date','id'}
 * 
 *  --  thgs to add  --
 *  styles
 *  
 *  --  printing variable  --
 *  <?php echo $ ?>
 */
?>

<?php ob_start() ?>
	<h2><?php echo $containertitle ?></h2>
	<?php if(sizeof($jobs) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width='300px'>Job Title</th>
				<th width='300px'>Company</th>
				<th width='100px'>Location</th>
				<th width='100px'>Salary</th>
				<th width='100px'>Yrs Exp</th>
				<th width='100px'>Date</th>
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
	<?php }else{ ?>
	<h3>No job found.</h3>
	<a href='advanced-search.php' class='btn btn-primary'><span class="glyphicon glyphicon-refresh"></span> Search again</a>
	<?php }?>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>