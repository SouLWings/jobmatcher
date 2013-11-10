<?php
include 'controller.inc.php';
include 'modals/resumeDAO.php'; 
include 'modals/jobDAO.php';

//if a jobtype id is specified then display job of that type
if(isset($_GET['typeid']) && !empty($_GET['typeid']))
{
	$jobDAO = new jobDAO();
	
	//output variables
	$jobs = $jobDAO->get_all_jobs_of_type($_GET['typeid']);
	$containertitle = $jobDAO->get_job_type_by_id($_GET['typeid']);
	
	$jobDAO->disconnect();

	include 'views/jobslist.V.php';
}
//if search parameter is there then search
else if(isset($_GET['search']))
{
	if(isset($_GET['name']))
	{
		$jobDAO = new jobDAO();
		
		//advanced search - if other parameters is there
		if(isset($_GET['location']) && isset($_GET['company']) && isset($_GET['salarymin']) && isset($_GET['salarymax']) && isset($_GET['jobspecializationid']) && isset($_GET['experiencemin']) && isset($_GET['experiencemax']) && isset($_GET['type']))
		{
			//output variables
			$jobs = $jobDAO->advanced_Search(get_secured($_GET['name']),get_secured($_GET['company']),get_secured($_GET['location']),get_secured($_GET['type']),get_secured($_GET['salarymin']),get_secured($_GET['salarymax']),get_secured($_GET['jobspecializationid']),get_secured($_GET['experiencemin']),get_secured($_GET['experiencemax']));
			$containertitle = "Showing ".sizeof($jobs)." matched job(s)";
		}
		else //keyword search
		{
			//output variables
			$jobs = $jobDAO->search(get_secured($_GET['name']));
			$containertitle = "Matched jobs for keyword '".get_secured($_GET['name'])."'";
		}
		$jobDAO->disconnect();
		
		include 'views/jobslist.V.php';
	}
	else{
		header("Location:advanced-search.php?error=1");	//havent do error telling
	}
}
//if job id is there just show the job 
else if(isset($_GET['id']) && !empty($_GET['id']))
{
	$jobDAO = new jobDAO();
	
	
	$job = $jobDAO->get_job($_GET['id']);
	$criterias = $jobDAO->get_criteria_form_of_job($_GET['id']);
	$jid = $job['id'];
	
	
	//setting the message to be displayed when user clicks to apply job
	if(is_logged_in())
	{
		//if the user is a jobseeker
		if($ut == 'jobseeker')
		{
			//if the user applied more thn 5 times
			$applicants = $jobDAO->get_applicants_of_job($jid);
			foreach ($applicants as $applicant):
				if($applicant['aid'] == $jsid && $applicant['application_count'] > 5)
					$morethan5 = true;
			endforeach;
			if(!isset($morethan5))
			{
				//if the user not failed this job within 24hours
				if(!$jobDAO->failed_job_in24hrs($jid, $jsid))
				{
					//if the user not passed the job
					if(!$jobDAO->passed_job($jid, $jsid))
					{
						$resumeDAO = new resumeDAO();
						
						//if the resume exist
						if(sizeof($resumeDAO->get_resume_by_aid($aid)) > 0)
						{
							$modalforms[] = 'apply-job-modal-form';
						}
						else
							$errMsg = 'Please create or upload your resume first.';
						$resumeDAO->disconnect();
					}
					else
						$errMsg = 'Your resume already sent for review. Please wait for futher info.';
				}
				else
					$errMsg = 'Your are not qualified for this job. Please try again another day.';
			}
			else
				$errMsg = 'You are not qualified for this job anymore';
		}
		else
			$errMsg = 'Access denied. Only jobseeker accounts can apply for jobs.';
	}
	else
		$errMsg = 'Please sign in first.';	
	
	$jobDAO->disconnect();
	include 'views/aJob.V.php';
}
else
	header("Location:index.php");
	
?>