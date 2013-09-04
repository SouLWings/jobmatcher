<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/resumeDAO.php';

if(is_logged_in() && $ut == 'jobseeker')
{
	//creating an instance of the data access object
	$resumeDAO = new resumeDAO();

	if(isset($_POST['dateofbirth']) && isset($_POST['graduationdate']))
	{
		$fullname = get_secured($_POST['fullname']);
		$address = mysql_real_escape_string($_POST['address']);
		$ic = get_secured($_POST['ic']);
		$matric = get_secured($_POST['matric']);
		$gender = get_secured($_POST['gender']);
		$phone = get_secured($_POST['phone']);
		$email = get_secured($_POST['email']);
		$dateofbirth = $_POST['dateofbirth'];
		$faculty = get_secured($_POST['faculty']);
		$programme = get_secured($_POST['programme']);
		$graduationdate = $_POST['graduationdate'];
		$cgpa = get_secured($_POST['cgpa']);
		$skills = mysql_real_escape_string($_POST['skills']);
		$personalities = mysql_real_escape_string($_POST['personalities']);
		$additionaldescription = mysql_real_escape_string($_POST['additionaldescription']);
	}


	//output variables
	$resume = $resumeDAO->get_resume_by_aid($aid);

	if(sizeof($resume) > 0)
	{
		if(isset($_POST['rid']))
		{
			$rid = intval($_POST['rid']);
			if($resumeDAO->update_resume($rid, $fullname, $ic, $matric, $gender, $address, $phone, $email, $dateofbirth, $faculty, $programme, $graduationdate, $cgpa, $skills, $personalities, $additionaldescription))
			{
				header('Location:resume.php');
				die();
			}
			else
				echo 'fail update resume';
		}
		else if(isset($_GET['edit']))
		{
			include 'views/resumeform.V.php';
		}
		else
			include 'views/resume.V.php';
	}
	else
	{
		if(isset($_POST['dateofbirth']) && isset($_POST['graduationdate']))
		{
			if($resumeDAO->new_resume($aid, $fullname, $ic, $matric, $gender, $address, $phone, $email, $dateofbirth, $faculty, $programme, $graduationdate, $cgpa, $skills, $personalities, $additionaldescription))
			{
				header('Location:resume.php');
				die();
			}
			else
				echo 'fail update resume';
		}
		$resume['id'] = '';
		$resume['fullname'] = '';
		$resume['ic'] = '';
		$resume['matric'] = '';
		$resume['gender'] = '';
		$resume['address'] = '';
		$resume['phone'] = '';
		$resume['email'] = '';
		$resume['dateofbirth'] = '';
		$resume['faculty'] = '';
		$resume['programme'] = '';
		$resume['graduationdate'] = '';
		$resume['cgpa'] = '';
		$resume['skills'] = '';
		$resume['personalities'] = '';
		$resume['additionaldescription'] = '';
		include 'views/resumeform.V.php';
	}
	$resumeDAO->disconnect();
}
else if(is_logged_in() && $ut == 'employer')
{
	if(isset($_GET['id']) &&  intval($_GET['id'] > 0))
	{
		$resumeDAO = new resumeDAO();
		if($resumeDAO->is_permitted($eid, intval($_GET['id'])))
		{
			$resume = $resumeDAO->get_resume_by_rid(intval($_GET['id']));
			$resumeDAO->disconnect();
			include 'views/resume.V.php';
		}
		else
			header('Location:error.php?code=401');
	}
	else
		header('Location:error.php?code=401');
}
else
{
	header('Location:error.php?code=401');
}
$resumeDAO->disconnect();
?>