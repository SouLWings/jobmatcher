<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/jobDAO.php';

require_account_type('employer');

if(isset($_POST['action']))
{
	$jobDAO = new jobDAO();
	if($_POST['action'] == 'addjob')
	{
		if(isset($_POST['jobid']) && $_POST['jobid'] == 0 && isset($_POST['title']) && isset($_POST['position']) && isset($_POST['jobspecializationid']) && isset($_POST['responsibility']) && isset($_POST['requirement']) && isset($_POST['location']) && isset($_POST['salary']) && isset($_POST['experience']))
		{
			$specID = intval($_POST['jobspecializationid']);
			$employerId = $eid;
			$date = ''.getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
			$title = get_secured($_POST['title']);
			$position = get_secured($_POST['position']);
			$responsibility = get_secured($_POST['responsibility']);
			$requirement = get_secured($_POST['requirement']);
			$location = get_secured($_POST['location']);
			$salary = intval($_POST['salary']);
			$experience = intval($_POST['experience']);
			if(!$jobDAO->add_job($specID, $employerId, $date, $title, $position, $responsibility, $requirement, $location, $salary, $experience))
				echo 'failed add job';
			else
				header('Location:managejobads.php');
		}
		else
		{
			echo 'invalid form';
		}
	}
	else if($_POST['action'] == 'editjob')
	{
		if(isset($_POST['jobid']) && isset($_POST['title']) && isset($_POST['position']) && isset($_POST['jobspecializationid']) && isset($_POST['responsibility']) && isset($_POST['requirement']) && isset($_POST['location']) && isset($_POST['salary']) && isset($_POST['experience']))
		{
			$id = intval($_POST['jobid']);
			$specID = intval($_POST['jobspecializationid']);
			$employerId = $eid;
			$title = get_secured($_POST['title']);
			$position = get_secured($_POST['position']);
			$responsibility = get_secured($_POST['responsibility']);
			$requirement = get_secured($_POST['requirement']);
			$location = get_secured($_POST['location']);
			$salary = intval($_POST['salary']);
			$experience = intval($_POST['experience']);
			if(!$jobDAO->edit_job($id, $specID, $employerId, $title, $position, $responsibility, $requirement, $location, $salary, $experience))
				echo 'failed';
			else
				header('Location:managejobads.php');
		}
		else
		{
			echo 'invalid form editjob';
		}
	}
	else if($_POST['action'] == 'deletejob')
	{
		echo $_POST['jobid'];
		if(isset($_POST['jobid']))
		{
			$id = intval($_POST['jobid']);
			if(!$jobDAO->delete_job($id))
			{
				echo 'failed delete';
			}
			else
				header('Location:managejobads.php');
		}
		else
		{
			echo 'invalid delete form';
		}
	}
	else if($_POST['action'] == 'editcompany')
	{
		if(isset($_POST['cid']) && $_POST['cid'] != 0 && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['website']) && isset($_POST['phone']) && isset($_POST['fax']) && isset($_POST['overview']))
		{
			$cid = intval($_POST['cid']);
			$name = get_secured($_POST['name']);
			$address = get_secured($_POST['address']);
			$website = get_secured($_POST['website']);
			$phone = get_secured($_POST['phone']);
			$fax = get_secured($_POST['fax']);
			$overview = get_secured($_POST['overview']);
			//if(!$jobDAO->edit_company($cid, $name, $address, $website, $phone, $fax, $overview))
			//	echo 'failed edit company';
			//else
				//header('Location:managejobads.php');
				echo 'name: '.$name;
				echo 'overvieew: '.$overview;
		}
		else
		{
			echo 'invalid form';
		}	
	}
	$jobDAO->disconnect();
}
?>