<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  job - single array of details of a job {id, jobspecialization_ID,employer_ID,date,title,position,responsibility,requirement, location, salary, experience}
 *  
 *  --  list of tasks for this view  --
 *  styles, display a proper content, a link to f
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */

?>

<?php ob_start() ?>
	<script>
		$(document).ready(function(){ 
			$("#btncntapplyjob").click(function(){
				alert('<?php if(isset($errMsg))echo $errMsg ?>');
			});
			$('#fillincriteriaform').submit(function(event) {
				var form = $(this);
				$.ajax({
					type: form.attr('method'),
					url: form.attr('action'),
					data: form.serialize(),
					success: function(data) 
					{
						alert(data);
						$('#modalfillincriteria').modal('hide');
						if(data.substring(0,1) == 'S')
						{
							$('#btnapplyjob').remove();
							$('#contentsection').append("<a class='btn btn-warning btn-lg disabled'><span class='glyphicon glyphicon-thumbs-down'></span> Not Qualified</a>");
						}
						else if(data.substring(0,1) == 'J')
						{
							$('#btnapplyjob').remove();
							$('#contentsection').append("<a class='btn btn-success btn-lg'><span class='glyphicon glyphicon-thumbs-up'></span> Job Applied</a>");
						}
					}
				}).fail(function() {
					$('#modalfillincriteria').modal('hide')
					alert("Fail to connect to server");
				});
				event.preventDefault();
			});
		});
	</script>

    <h1><?php echo $job['title'] ?></h1>

    <div class="">
		date: <?php echo $job['date'] ?><br>
        responsibility: <?php echo $job['responsibility'] ?><br>
        requirement: <?php echo $job['requirement'] ?><br>
        location: <?php echo $job['location'] ?><br>
        salary: <?php echo $job['salary'] ?><br>
        experience: <?php echo $job['experience'] ?><br>
    </div>
	
	<?php if(isset($errMsg)){?>
	<a data-toggle="modal" href="#" class="btn btn-primary btn-lg" id='btncntapplyjob'><span class="glyphicon glyphicon-hand-right"></span> Apply job</a>
	<?php }else{?>
	<a data-toggle="modal" href="#modalfillincriteria" class="btn btn-primary btn-lg" id='btnapplyjob'><span class="glyphicon glyphicon-hand-right"></span> Apply job</a>
	<?php }?>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>