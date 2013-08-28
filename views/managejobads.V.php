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
	<script>
	$(document).ready(function(){ 
		$("#btnaddjob").click(function(){
			$("#modaleditjob legend").text("Add Job");
			$("#modaleditjob input[type='submit']").val("Add");
			$("input[name='action']").val("addjob");
			$("input[name='jobid']").val('0');
			$("input[name='title']").val('');
			$("input[name='salary']").val('');
			$("input[name='experience']").val('');
			$("input[name='location']").val('');
			$("input[name='position']").val('');
			$("textarea[name='responsibility']").val('');
			$("textarea[name='requirement']").val('');
			$("input[name='position']").val('');
			$("select[name='jobspecializationid']").val('');			
		});
	<?php foreach ($jobs as $job): ?>
		$("#btnedit<?php echo $job['id']?>job").click(function(){
			$.post("jobAJAX.php",
			{
				action:"getjobdetails",
				id:'<?php echo $job['id']?>'
			},
			function(data,status){
				if(status == 'success')
				{
					if(data == 'no')
						alert('Error. No job found');
					else
					{
						var job = $.parseJSON(data);
						$("#modaleditjob legend").text("Edit Job");
						$("#modaleditjob input[type='submit']").val("Edit");
						$("input[name='action']").val("editjob");
						$("input[name='jobid']").val(job.id);
						$("input[name='title']").val(job.title);
						$("input[name='salary']").val(job.salary);
						$("input[name='experience']").val(job.experience);
						$("input[name='location']").val(job.location);
						$("input[name='position']").val(job.position);
						$("textarea[name='responsibility']").val(job.responsibility);
						$("textarea[name='requirement']").val(job.requirement);
						$("input[name='position']").val(job.position);
						$("select[name='jobspecializationid']").val(job.jobSpecialization_ID);
					}
				}
				else
					alert('updatemsg failed');
			});
		});
		$("#btndelete<?php echo $job['id']?>").click(function(){
			
		});
	<?php endforeach; ?>
	});
	</script>
    <h1>My Posted Job Ads</h1>
	<a data-toggle="modal" href="#modaleditjob" class="btn btn-primary btn-xs" id='btnaddjob'>Add</a>
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
			<tr style='cursor:pointer;' <?php //echo onclick="location.href='jobs.php?id= $job['id']?>'">	
				<td><?php echo $job['date'] ?></td>
				<td><?php echo $job['title'] ?></td>
				<td><?php echo $job['specialization'] ?></td>
				<td><?php echo $job['salary'] ?></td>
				<td><?php echo $job['experience'] ?></td>
				<td><?php echo $job['status'] ?></td>
				<td><a data-toggle="modal" href="#modaleditjob" class="btn btn-primary btn-xs" id='btnedit<?php echo $job['id']?>job'>Edit</a> <a data-toggle="modal" href="#modaldeletejob" class="btn btn-primary btn-xs" id='btndelete<?php echo $job['id']?>'>Delete</a>  
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No posted job record.</h3>
	<?php }?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>