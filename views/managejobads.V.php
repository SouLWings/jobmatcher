<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 *  
 *  --  variables supplied to this page from controller --
 *  $jobs - 2 dimentional array of {id,date,title,specialization,salary,experience,status}
 *  $jobspecializations - 2 dimentional array of {id,specialization}
 *  $alljobapplicants - 3 dimentional array of {{name(jobseeker),time,resumeID,aid(jobseeker account id)}}
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
	var index = 1;
	$(document).ready(function(){ 
		$("#btnaddcriteria").click(function(){
			$.post("jobAJAX.php",
			{
				action:"getcriteriarow",
			},
			function(data,status){
				if(status == 'success')
				{
					//alert(data);
					index++;
					$("#criterialist").append(data);
					$(".criteria").last().parent().find("input[name='totalcriteria']").val(parseInt($(".criteria").last().parent().find("input[name='totalcriteria']").val())+1);
					$(".criteria").last().find("label").text(index);
					$(".criteria").last().find("select[name='criteriaid']").attr('name', 'criteriaid'+parseInt($(".criteria").last().parent().find("input[name='totalcriteria']").val()));
					$(".criteria").last().find("input[name='minrating']").attr('name', 'minrating'+parseInt($(".criteria").last().parent().find("input[name='totalcriteria']").val()));
					$(".criteria").last().find("label").text(index);
					$(".criteria").last().hide();
					$(".criteria").last().slideDown('fast');
				}
				else
					alert('retrieve criteria failed');
			});
			
		});
		$('#criterialist').on('click', '.btndeletecriteria', function() {
			$(this).parent().slideUp(function(){
				$(this).nextAll('.criteria').each(function(index, val){
					$(this).find('label').text((parseInt($(this).find('label').text())-1));
				});
				$(this).remove();
			});;
			index--;
		});
		$(".btneditcriteria").click(function(){
			$("#btnaddcriteria").prop('disabled',true);
			$("input[type='submit']").prop('disabled',true);
			var jobid = $(this).parent().find("input[name='jobid']").val();
			$('#editcriteriaform').find("input[name='jobid']").val(jobid);
			$.post("jobAJAX.php",
			{
				action:"getjobcriteria",
				id:jobid
			},
			function(data,status){
				if(status == 'success')
				{
					/*if(data.substr(1,2) == 'i')
						alert("Press the plus button to add new criteria.");*/
					$('#criterialist').html(data);
					index = $("#criterialist").find("input[name='totalcriteria']").val();
					$("#btnaddcriteria").prop('disabled',false);
					$("input[type='submit']").prop('disabled',false);
				}
				else
					alert('retrieve criteria failed, please reload the page');
			});
		});
		$("#btnaddjob").click(function(){
			$("#modaleditjob legend").text("Add Job");
			$("#modaleditjob input[type='submit']").val("Add");
			$("input[name='action']").val("addjob");
			$("#editid").val('0');
			$("input[name='title']").val('');
			$("input[name='salary']").val('3000');
			$("input[name='experience']").val('0');
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
					//alert(data);
					if(data == 'no')
						alert('Error. No job found');
					else
					{
						var job = $.parseJSON(data);
						$("#modaleditjob legend").text("Edit Job");
						$("#modaleditjob input[type='submit']").val("Edit");
						$("input[name='action']").val("editjob");
						$("#editid").val(job.id);
						$("input[name='title']").val(job.title);
						$("input[name='salary']").val(job.salary);
						$("select[name='type']").val(job.type);
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
			$("#deleteid").val('<?php echo $job['id']?>');
			$("input[name='action']").val("deletejob");
		});
	<?php endforeach; ?>
	});
	</script>
    <h1>My Posted Job Ads</h1>
	<a data-toggle="modal" href="#modaleditjob" class="btn btn-primary btn-xs" id='btnaddjob'><span class="glyphicon glyphicon-asterisk"></span> Add a new job</a>
	<?php if(sizeof($jobs) > 0){ ?>
	<table id="jobslist" class="table-striped table-hover tablesorter">
		<thead>
			<tr>
				<th width='90px'>Date</th>
				<th width=''>Job Title</th>
				<th width=''>specialization</th>
				<th width=''>Salary</th>
				<th width=''>Yrs Exp</th>
				<th width=''>Status</th>
				<th width='100px'>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $x=0; foreach ($jobs as $job): ?>
			<tr class='trhover'>	
				<td><?php echo $job['date'] ?></td>
				<td><?php echo $job['title'] ?></td>
				<td><?php echo $job['specialization'] ?></td>
				<td><?php echo $job['salary'] ?></td>
				<td><?php echo $job['experience'] ?></td>
				<td><?php echo $job['status'] ?></td>
				<td>
					<a data-toggle="modal" href="#modaleditjob" class="btn btn-primary btn-xs" id='btnedit<?php echo $job['id']?>job' title='Edit'><span class="glyphicon glyphicon-edit"></span></a> 
					
					<a data-toggle="modal" href="#modalcriteria" class="btn btn-primary btn-xs btneditcriteria" id='btneditcriteria' title='Criteria'><span class="glyphicon glyphicon-list"></span></a> 
					
					<a data-toggle="modal" href="#modaldeletejob" class="btn btn-primary btn-xs" id='btndelete<?php echo $job['id']?>' title='Delete'><span class="glyphicon glyphicon-trash"></span></a> 
					
					<input type='hidden' value='<?php echo $job['id']?>' name='jobid'/>
				</td>
			</tr>
			<?php foreach ($alljobapplicants[$x] as $jobapplicants): ?>
			<tr class='trhide'>
				<td></td>
				<td>Applicant: </td>
				<td colspan='4'><a href='profile.php?id=<?php echo $jobapplicants['aid'] ?>'><?php echo $jobapplicants['name'] ?></a>, <?php echo $jobapplicants['time'] ?></td>
				<td><a href='resume.php?id=<?php echo $jobapplicants['resumeID'] ?>' class='btn btn-primary btn-xs'><span class="glyphicon glyphicon-zoom-in"></span> Resume</a></td>
				<td></td>
			</tr>
			<tr>
				<td colspan='2'></td>
				<td>Application count: <?php echo $jobapplicants['application_count']?><br>Score:<?php echo $jobapplicants['criteriascore']?></td>
				<td colspan='4'></td>
			</tr>
			<?php endforeach; ?>
		<?php $x++; endforeach; ?>
		</tbody>
	</table>
	<?php }else{ ?>
	<h3>No posted job record.</h3>
	<?php }?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>