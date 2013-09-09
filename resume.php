<?php
//includes core controller functions and variables 
include_once 'controller.inc.php';
//includes the modal classes that needed to access resource
include_once 'modals/resumeDAO.php';

if(is_logged_in() && $ut == 'jobseeker')
{
<<<<<<< HEAD

	//handling the post request of create/update resume
=======
	//creating an instance of the data access object
	$resumeDAO = new resumeDAO();

>>>>>>> origin/llaw
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

<<<<<<< HEAD
	//handling the resume file uploaded
	if(isset($_FILES['uploadresume']['name']) && !empty($_FILES['uploadresume']['name']))
	{
		if(!move_uploaded_file($_FILES['uploadresume']['tmp_name'], "resume/".$aid.".pdf"))
			echo 'upload failed';
		else
		{
			header('Location:resume.php');
			$resumeDAO->disconnect();
			die();
		}
	}
	
	//this is the page to delete the uploaded resume
	if(isset($_GET['removeUploadedResume']) && file_exists('resume/'.$aid.'.pdf'))
	{
		unlink('resume/'.$aid.'.pdf');
	}
	
	//creating an instance of the data access object
	$resumeDAO = new resumeDAO();
=======
>>>>>>> origin/llaw

	//output variables
	$resume = $resumeDAO->get_resume_by_aid($aid);

	if(sizeof($resume) > 0)
	{
<<<<<<< HEAD
		//this will update the resume and refresh the page
=======
>>>>>>> origin/llaw
		if(isset($_POST['rid']))
		{
			$rid = intval($_POST['rid']);
			if($resumeDAO->update_resume($rid, $fullname, $ic, $matric, $gender, $address, $phone, $email, $dateofbirth, $faculty, $programme, $graduationdate, $cgpa, $skills, $personalities, $additionaldescription))
			{
				header('Location:resume.php');
<<<<<<< HEAD
				$resumeDAO->disconnect();
=======
>>>>>>> origin/llaw
				die();
			}
			else
				echo 'fail update resume';
		}
<<<<<<< HEAD
		//this is the page to edit the resume
=======
>>>>>>> origin/llaw
		else if(isset($_GET['edit']))
		{
			include 'views/resumeform.V.php';
		}
<<<<<<< HEAD
		//this is the page to display the resume
		else
		{
			$uploadedresume = false;
			if(file_exists('resume/'.$aid.'.pdf'))
				$uploadedresume = true;
			
			$resumeaid = $aid;
			
			include 'views/resume.V.php';
		}
	}
	else
	{
		//if no resume record and there is a post variables set, means creating new resume
=======
		else
			include 'views/resume.V.php';
	}
	else
	{
>>>>>>> origin/llaw
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
<<<<<<< HEAD
		
		//if not creating new resume, show them empty form
=======
>>>>>>> origin/llaw
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
<<<<<<< HEAD
			$uploadedresume = false;
			$resumeaid = $resumeDAO->get_aid_by_rid(intval($_GET['id']));
			if(file_exists('resume/'.$resumeaid.'.pdf'))
				$uploadedresume = true;
=======
>>>>>>> origin/llaw
			$resumeDAO->disconnect();
			include 'views/resume.V.php';
		}
		else
<<<<<<< HEAD
			include 'views/error401.V.php';
	}
	else
		include 'views/error401.V.php';
}
else
{
	include 'views/error401.V.php';
}
=======
			header('Location:error.php?code=401');
	}
	else
		header('Location:error.php?code=401');
}
else
{
	header('Location:error.php?code=401');
}

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
>>>>>>> origin/llaw
?>