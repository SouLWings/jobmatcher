<?php
include_once 'modal.inc.php';

class jobDAO extends modal{


	/************************************
	  functions for retrieving job info
	************************************/	
	public function get_all_job_Specializations()
	{
		return $this->get_all_rows('SELECT * FROM jobspecialization ORDER BY specialization');
	}
	
	public function get_job($id, $isApproved = true)
	{
		if($isApproved)
			return $this->get_first_row("SELECT * FROM jobs where UPPER(status) = 'APPROVED' AND id = $id");
		else
			return $this->get_first_row("SELECT * FROM jobs where id = $id");
	}
	
	public function get_all_jobs_of_type($jobspecializationid)
	{
		return $this->get_all_rows("SELECT j.title, c.name as company, j.location, j.type, j.salary, j.experience, j.date, j.id FROM jobs j INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id WHERE UPPER(j.status) = 'APPROVED' AND j.jobspecialization_ID = $jobspecializationid");
	}
	
	public function get_job_type_by_id($jobspecializationid)
	{
		return $this->get_first_row("SELECT specialization FROM jobspecialization WHERE id = $jobspecializationid")['specialization'];
	}
	
	public function search($keyword)
	{
		return $this->get_all_rows("SELECT j.title, c.name as company, j.location, j.salary, j.experience, j.date, j.id FROM jobs j INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id  WHERE UPPER(j.status) = 'APPROVED' AND (j.title LIKE '%$keyword%' OR j.position LIKE '%$keyword%')");
	}
	
	public function advanced_Search($name, $company, $location, $type, $salaryMin, $salaryMax, $jobspecializationid, $expmin, $expmax)
	{
		$extraFilter = '';
		if(!empty($location))
			$extraFilter .= ' AND j.location = \''.$location.'\'';
		if(!empty($type))
			$extraFilter .= ' AND j.type = \''.$type.'\'';
		if(!empty($salaryMin))
			$extraFilter .= ' AND j.salary <= '.$salaryMin;
		if(!empty($salaryMax))
			$extraFilter .= ' AND j.salary >= '.$salaryMax;
		if(!empty($jobspecializationid))
			$extraFilter .= ' AND j.jobSpecialization_ID = '.$jobspecializationid;
		$extraFilter .= ' AND j.experience >= '.$expmin;
		$extraFilter .= ' AND j.experience <= '.$expmax;
		$query = "SELECT j.title, c.name as company, j.location, j.salary, j.experience, j.date, j.id
					FROM jobs j 
					INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id
					WHERE UPPER(j.status) = 'APPROVED' AND (lower(j.title) LIKE lower('%$name%') 
						AND lower(c.name) LIKE lower('%$company%') 
						$extraFilter)";
		return $this->get_all_rows($query);
	}
	
	public function get_all_pending_jobs()
	{
		return $this->get_all_rows("SELECT c.name, a.firstname, j.title, j.position, j.date, j.salary, j.experience, j.id FROM jobs j INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id INNER JOIN account a ON a.id = e.account_ID WHERE UPPER(status) = 'PENDING'");
	}
	
	public function get_employer_jobs($aid)
	{
		return $this->get_all_rows("SELECT j.id, j.date, j.title, js.specialization, j.salary, j.experience, j.status FROM jobs j INNER JOIN jobspecialization js ON js.id = j.jobSpecialization_ID INNER JOIN employer e ON e.id = j.employer_ID INNER JOIN account a ON a.id = e.account_ID WHERE a.id = $aid");
	}

	/************************
	  functions for add job
	************************/
	public function add_job($specID, $employerId, $date, $title, $position, $responsibility, $requirement, $type, $location, $salary, $experience)
	{
		return $this->insert_row("NULL, $specID, $employerId, '$date', '$title', '$position', '$responsibility', '$requirement', '$type', '$location', $salary, $experience, 'PENDING'",'jobs');
	}
	
	
	/*************************
	  functions for edit job
	*************************/
	public function edit_job($id, $specID, $employerId, $title, $position, $responsibility, $requirement, $type, $location, $salary, $experience)
	{
		return $this->con->query("UPDATE jobs SET jobSpecialization_ID = $specID, employer_ID = $employerId, title = '$title', position = '$position', responsibility = '$responsibility', requirement = '$requirement', type = '$type', location = '$location', salary = $salary, experience = $experience WHERE id = $id");
	}
	public function edit_company($cid, $name, $address, $website, $phone, $fax, $overview)
	{
		echo "UPDATE company SET name = '$name', address = '$address', website = '$website', phone = '$phone', fax = '$fax', overview = '$overview' WHERE id = $cid";
		return $this->con->query("UPDATE company SET name = '$name', address = '$address', website = '$website', phone = '$phone', fax = '$fax', overview = '$overview' WHERE id = $cid");
	}
	
	public function approve_job($id)
	{echo "UPDATE jobs SET status = 'APPROVED' WHERE id = $id";
		return $this->con->query("UPDATE jobs SET status = 'APPROVED' WHERE id = $id");
	}
	
	public function disapprove_job($id)
	{
		return $this->con->query("UPDATE jobs SET status = 'DISAPPROVED' WHERE id = $id");
	}
	
	/***************************
	  functions for delete job
	***************************/
	public function delete_job($id)
	{
		return $this->con->query("DELETE FROM jobs WHERE id = $id");
	}
	
	/*****************************
	  functions for job criteria
	*****************************/
	public function get_all_criterias()
	{
		return $this->get_all_rows('SELECT * FROM criteriatype');
	}
	
	public function get_criterias_of_job($jid)
	{
		return $this->get_all_rows("SELECT * from jobcriteria WHERE job_ID = $jid");
	}
	
	public function update_criteria($jid, $criterias)
	{
		if(sizeof($criterias) > 0)
		{
			foreach($criterias as $c):
			{
				if(!isset($insertquery))
					$insertquery = "INSERT INTO jobcriteria VALUES(NULL, '$jid', '$c[criteria_ID]', '$c[minrating]')";
				else
					$insertquery.=", (NULL, '$jid', '$c[criteria_ID]', '$c[minrating]')";
			}
			endforeach;
			return ($this->con->query("DELETE FROM jobcriteria WHERE job_ID = $jid") && $this->con->query($insertquery));
		}
		else
			return $this->con->query("DELETE FROM jobcriteria WHERE job_ID = $jid");
	}
	
	public function get_criteria_form_of_job($jid)
	{
		return $this->get_all_rows("SELECT ct.name, jc.minrating FROM jobcriteria jc INNER JOIN criteriatype ct ON ct.id = jc.criteria_ID WHERE jc.job_ID = $jid");
	}
	
	/********************************
	  functions for job application
	********************************/
	public function failed_job_in24hrs($jid, $jsid)
	{
		return $this->con->query("SELECT * FROM jobapplication WHERE jobs_ID = $jid AND jobSeeker_ID = $jsid AND time > DATE_SUB(NOW(), INTERVAL 1 DAY) AND criteriastatus = 'fail'")->num_rows > 0;
	}
	
	public function passed_job($jid, $jsid)
	{
		return $this->con->query("SELECT * FROM jobapplication WHERE jobs_ID = $jid AND jobSeeker_ID = $jsid AND criteriastatus = 'pass'")->num_rows > 0;
	}
	
	public function add_job_application($jid, $jsid, $status)
	{
		return $this->insert_row("NULL,$jid,$jsid,CURRENT_TIMESTAMP,'$status'",'jobapplication');
	}
		
	public function get_applicants_of_job($jid)
	{
		return $this->get_all_rows("SELECT CONCAT_WS(' ',a.firstname, a.lastname) as name, ja.time, r.id as resumeID, a.id as aid FROM jobapplication ja INNER JOIN jobseeker js ON ja.jobSeeker_ID = js.id INNER JOIN account a ON a.id = js.account_ID INNER JOIN resume r ON r.jobseeker_ID = js.id WHERE ja.jobs_ID = $jid AND ja.criteriastatus = 'pass'");
	}
		
	public function get_applications_of_js($jsid)
	{
		return $this->get_all_rows("SELECT ja.time, j.title, j.position, c.name, j.location, j.salary FROM jobapplication ja INNER JOIN jobs j ON j.id = ja.jobs_ID INNER JOIN employer e ON e.id = j.employer_ID INNER JOIN company c ON c.id = e.company_ID WHERE ja.jobSeeker_ID = $jsid AND ja.criteriastatus = 'pass'");
	}
}
?>