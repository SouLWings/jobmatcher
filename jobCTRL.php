<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');

if(isset($_POST['action']) && isset($_POST['id']))
{
	$jobDAO = new jobDAO();
	if($_POST['action'] == 'addjob')
	{
		if(isset($_POST['id']) && $_POST['id'] == 0 && isset($_POST['title']) && isset($_POST['position']) && isset($_POST['jobspecializationid']) && isset($_POST['responsibility']) && isset($_POST['requirement']) && isset($_POST['location']) && isset($_POST['salary']) && isset($_POST['experience']))
		{
			$specID = intval($_POST['jobspecializationid']);
			$employerId = $eid;
			$date = ''.getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
			$title = get_secured($_POST['location']);
			$position = get_secured($_POST['location']);
			$responsibility = get_secured($_POST['location']);
			$requirement = get_secured($_POST['location']);
			$location = get_secured($_POST['location']);
			$salary = intval($_POST['salary'});
			$experience = intval($_POST['experience'});
			if(!$jobDAO->add_job($specID, $employerId, $date, $title, $position, $responsibility, $requirement, $location, $salary, $experience)
				echo 'failed';
			else
				header('Location:managejobads.php')
		}
		else
		{
			echo 'invalid form';
		}
	}
	else if($_POST['action'] == 'editjob')
	{
		if(isset($_POST['id']) && $_POST['id'] != 0 && isset($_POST['title']) && isset($_POST['position']) && isset($_POST['jobspecializationid']) && isset($_POST['responsibility']) && isset($_POST['requirement']) && isset($_POST['location']) && isset($_POST['salary']) && isset($_POST['experience']))
		{
			$id = intval($_POST['id']);
			$specID = intval($_POST['jobspecializationid']);
			$employerId = $eid;
			$title = get_secured($_POST['location']);
			$position = get_secured($_POST['location']);
			$responsibility = get_secured($_POST['location']);
			$requirement = get_secured($_POST['location']);
			$location = get_secured($_POST['location']);
			$salary = intval($_POST['salary'});
			$experience = intval($_POST['experience'});
			if(!$jobDAO->edit_job($id, $specID, $employerId, $title, $position, $responsibility, $requirement, $location, $salary, $experience)
				echo 'failed';
			else
				header('Location:managejobads.php')
		}
		else
		{
			echo 'invalid form';
		}
	}
	else if($_POST['action'] == 'editcompany')
	{
		if(isset($_POST['cid']) && $_POST['cid'] != 0 && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['website']) && isset($_POST['phone']) && isset($_POST['fax']) && isset($_POST['overview']))
		{
		
			if(!$jobDAO->edit_job($id, $specID, $employerId, $title, $position, $responsibility, $requirement, $location, $salary, $experience)
				echo 'failed';
			else
				header('Location:managejobads.php')
		}
		else
		{
			echo 'invalid form';
		}	
	}
	$jobDAO->disconnect();
	header('Location: '.$referer);
}
?>