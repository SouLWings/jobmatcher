<?php
include 'controller.inc.php';
include 'modals/resumeDAO.php'; 
include 'modals/jobDAO.php'; 

if(is_logged_in())
	if($ut == 'jobseeker')
	{
		$resumeDAO = new resumeDAO();
		if(sizeof($resumeDAO->get_resume_by_aid($aid)) > 0)
		{
			
		}
		else
			echo json_encode(array('status'=>'failed','message'=>'Please create your resume first.'));
				$jobDAO = new jobDAO();
					$allcriterias = $jobDAO->get_all_criterias();
					//for adding a new msg to the db
					if(isset($_POST['action']) && $_POST['action'] == 'getjobdetails' && isset($_POST['id']))
					{
						if($job = $jobDAO->get_job($_POST['id'],false))
							echo json_encode($job);
						else
							echo 'no';
					}
					else if(isset($_POST['action']) && $_POST['action'] == 'getjobcriteria' && isset($_POST['id']))
					{
					$jobDAO->disconnect();
	}
	else
		echo json_encode(array('status'=>'failed','message'=>'Access denied. Only jobseeker accounts can apply for jobs.'));
else
	echo json_encode(array('status'=>'failed','message'=>'Please log in first.'));
?>