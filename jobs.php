<?php
include 'modals/jobDAO.php';

if(isset($_GET['typeid']) && !empty($_GET['typeid']))
{
	$jobDAO = new jobDAO();
	
	//output variables
	$jobs = $jobDAO->get_all_jobs_of_type($_GET['typeid']);
	$containertitle = $jobDAO->get_job_type_by_id($_GET['typeid']);
	
	$jobDAO->disconnect();

	include 'views/jobslist.V.php';
}
else if(isset($_GET['search']))
{
	if(isset($_GET['name']))
	{
		$jobDAO = new jobDAO();
		//advanced search
		if(isset($_GET['location']) && isset($_GET['company']) && isset($_GET['salarymin']) && isset($_GET['salarymax']) && isset($_GET['jobspecializationid']) && isset($_GET['experiencemin']) && isset($_GET['experiencemax']))
		{
			//output variables
			$jobs = $jobDAO->advanced_Search($_GET['name'],$_GET['company'],$_GET['location'],$_GET['salarymin'],$_GET['salarymax'],$_GET['jobspecializationid'],$_GET['experiencemin'],$_GET['experiencemax']);
			$containertitle = "Showing ".sizeof($jobs)." matched job(s)";
		}
		else //keyword search
		{
			//output variables
			$jobs = $jobDAO->search($_GET['name']);	echo '123';
			$containertitle = "Matched jobs for keyword '".$_GET['name']."'";
		}
		$jobDAO->disconnect();
		
		include 'views/jobslist.V.php';
	}
	else{
		header("Location:advanced-search.php?error=1");	
	}
}
else if(isset($_GET['id']) && !empty($_GET['id']))
{
	$jobDAO = new jobDAO();
	
	//output variables
	$job = $jobDAO->get_job($_GET['id']);
	
	$jobDAO->disconnect();

	include 'views/aJob.V.php';
}
else
	header("Location:index.php");
	
?>