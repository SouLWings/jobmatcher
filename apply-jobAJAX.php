<?php
include 'controller.inc.php';
include 'modals/jobDAO.php'; 

$jobDAO = new JobDAO();

if(isset($_POST['action']))
{
	if($_POST['action'] == 'applyjob')
	{
		$jid = $_POST['jobid'];
		
		//obtain the criteria name and score from _POST and store in $jscriteria
		for($i = 1; $i < $_POST['criteriacount']; $i++)
		{
			if(isset($_POST['criteria'.$i]) && isset($_POST['jsrating'.$i]))
			{
				$jscriteria[] = array("criteria"=>$_POST['criteria'.$i],"jsrating"=>intval($_POST['jsrating'.$i]));
			}
		}
		
		//fetch the min criteria score from database
		$mincriteria = $jobDAO->get_criteria_form_of_job($jid);
		
		//a boolean flag to check whether the criteria meets the requirement
		$jobmatcherflag = true;
		
		$criteriascore = '';
		foreach ($jscriteria as $jsc):
		{
			$criteriascore .= '<br>'.$jsc['criteria'].': '.$jsc['jsrating'];
		}
		endforeach;
		//loop through each criteria in employer-defined-criterias
		foreach ($mincriteria as $mc):
		{
			$jobmatcherflag = false;
			
			//compare a employer criteria with
			foreach ($jscriteria as $jsc):
			{
				if($mc['name'] == $jsc['criteria'] && $mc['minrating'] <= $jsc['jsrating'])
				{
					$jobmatcherflag = true;
					break;
				}
			}
			endforeach;
			
			if(!$jobmatcherflag)
				break;
		}	
		endforeach;
		
		if($jobmatcherflag)
			$status = 'pass';
		else
			$status = 'fail';
			
		//adding the job application record to DB
		if(!$jobDAO->add_job_application($jid, $jsid, $status, $criteriascore))
		{
			echo 'Error when applying job';
		}
		else
		{
			// remember to change the checking parameter for aJob.V.php javascript of the first letter of the message changed
			if($jobmatcherflag)
				echo 'Job application successfull. Your resume has been sent for review. Please wait for related authority for further info.';
			else
				echo 'Sorry, you does not qualify for this job.';
		}
	}
}
$jobDAO->disconnect();
?>