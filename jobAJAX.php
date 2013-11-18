<?php
include 'controller.inc.php';
include 'modals/jobDAO.php'; 

require_account_type("employer");

$jobDAO = new jobDAO();
$allcriterias = $jobDAO->get_all_criterias();
$criteriacatagory = array();
foreach ($allcriterias as $criteria):
	if(!in_array($criteria['catagory'], $criteriacatagory))
		$criteriacatagory[] = $criteria['catagory'];
endforeach;
//responding job details request from edit job with job details
if(isset($_POST['action']) && $_POST['action'] == 'getjobdetails' && isset($_POST['id']))
{
	if($job = $jobDAO->get_job($_POST['id'],false))
		echo json_encode($job);
	else
		echo 'no';
}
//responding job criteria reqest from manage criteria with all the criteria of the specific job
else if(isset($_POST['action']) && $_POST['action'] == 'getjobcriteria' && isset($_POST['id']))
{
	$jobcriterias = $jobDAO->get_criterias_of_job(intval($_POST['id']));
	

	if(sizeof($jobcriterias) > 0)
	{
		$x = 0;
		foreach ($jobcriterias as $jobcriteria):
			$x++;
?>
							<div class='form-group criteria'>
								<label class='col-sm-1 control-label'><?php echo $x ?></label>
								<div class='col-sm-7'>
									<select name='criteriaid<?php echo $x ?>' class='form-control'>
										<?php foreach ($criteriacatagory as $cc): ?>
										<optgroup label="<?php echo $cc?>">
											<?php foreach ($allcriterias as $criteria): if($cc == $criteria['catagory']){?>
											<option value='<?php echo $criteria['id']?>' <?php if($criteria['id'] == $jobcriteria['criteria_ID'])echo "selected";?>>
												<?php echo $criteria['name'] ?>
											</option>
											<?php }endforeach; ?>	
										</optgroup>
										<?php endforeach; ?>					
									</select>
								</div>
								<div class='col-sm-2 input-group'>
									<input required type='number' id='inputExperience' autocomplete='off' class='form-control' value='<?php echo $jobcriteria['minrating'] ?>' name='minrating<?php echo $x ?>' max='5' min='1'/>
								</div>
								<button type="button" class="btn btn-danger btn-xs btndeletecriteria" style='margin:7px 0px 0px 20px;' id=''>
									<span class="glyphicon glyphicon-remove"></span>
								</button>
							</div>
							
<?php		
		endforeach;
		echo "<input type='hidden' value='$x' name='totalcriteria'/>";
	}
	else
	{
		
?>
							
							<input type='hidden' value='0' name='totalcriteria'/>
<?php	
	}
}
//responding request for getting a new criteria row
else if(isset($_POST['action']) && $_POST['action'] == 'getcriteriarow')
{

?>
							<div class='form-group criteria'>
								<label class='col-sm-1 control-label'></label>
								<div class='col-sm-7'>
									<select name='criteriaid' class='form-control'>
										<?php foreach ($criteriacatagory as $cc): ?>
										<optgroup label="<?php echo $cc?>">
											<?php foreach ($allcriterias as $criteria): if($cc == $criteria['catagory']){?>
											<option value='<?php echo $criteria['id']?>'>
												<?php echo $criteria['name'] ?>
											</option>
											<?php }endforeach; ?>	
										</optgroup>
										<?php endforeach; ?>					
									</select>
								</div>
								<div class='col-sm-2 input-group'>
									<input required type='number' id='inputExperience' autocomplete='off' class='form-control' value='1' name='minrating' max='5' min='1'/>
								</div>
								<button type="button" class="btn btn-danger btn-xs btndeletecriteria" style='margin:7px 0px 0px 20px;' id=''>
									<span class="glyphicon glyphicon-remove"></span>
								</button>
							</div>
<?php	

}
$jobDAO->disconnect();
?>