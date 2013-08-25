<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $pendingjobseekers - 2 dimention array {id(account),firstname,lastname,matric,email,createTime}
 *  $pendingemployers - 2 dimention array {id(account),firstname,lastname,name(company),email,createTime,cid(company)}
 *  
 *  --  list of tasks for this view  --
 *  display both list of pending accounts
 *  links to approve/disapprove for each account -> accountsCTRL.php?id=X&action=approve/disapprove
 *  links to view details of a company -> company.php?id=X
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
?>

<?php ob_start() ?>
	
	<h2>Pending job seekers account</h2>
	<?php if(sizeof($pendingjobseekers) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width='200px'>firstname</th>
				<th width='200px'>lastname</th>
				<th width='200px'>matric</th>
				<th width='200px'>email</th>
				<th width='200px'>time create</th>
				<th width='200px'>action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pendingjobseekers as $jobseeker): ?>
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
	<?php }else{ ?>
	<h3>No pending job seeker account found.</h3>
	<?php }?>
	
		<h2>Pending employer accounts</h2>
	<?php if(sizeof($pendingemployers) > 0){ ?>
	<table id="jobslist" class="table-striped table-bordered table-hover tablesorter">
		<thead>
			<tr>
				<th width='200px'>Firstname</th>
				<th width='200px'>lastname</th>
				<th width='300px'>company name</th>
				<th width='200px'>email</th>
				<th width='200px'>creation time</th>
				<th width='200px'>action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($pendingemployers as $employer): ?>
			<tr onclick="location.href='profile.php?id=<?php echo $employer['id']?>'" style='cursor:pointer;'>	
				<td><?php echo $employer['firstname'] ?></td>
				<td><?php echo $employer['lastname'] ?></td>
				<td><a href='company.php?id=<?php echo $employer['cid']?>'><?php echo $employer['name'] ?></a></td>
				<td><?php echo $employer['email'] ?></td>
				<td><?php echo $employer['createTime'] ?></td>
				<td><a href='accountCTRL.php?id=<?php echo $employer['id']?>&action=approve'>Approve</a> <a href='accountCTRL.php?id=<?php echo $employer['id']?>&action=disapprove'>Disapprove</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No job found.</h3>
	<?php }?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>