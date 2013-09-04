<?php
class resumeDAO extends modal{

	/**
	 *	mysqli object = $con
	 *	get_first_row($selectquery) 	return array
	 *	get_all_rows($selectquery)		return multidimentional array
	 *	insert_row($values, $table)	return boolean
	 *	row_count($selectquery)			return number of row int
	 *	
	 *	begin to write functions
	 */
	
	public function get_resume_by_aid($aid)
	{
		return $this->get_first_row("SELECT r.* from resume r INNER JOIN jobseeker js ON js.id = r.jobseeker_ID INNER JOIN account a ON a.id = js.account_ID WHERE a.id = $aid");
	}
	
	public function get_resume_by_rid($rid)
	{
		return $this->get_first_row("SELECT * FROM resume WHERE id = $rid");
	}
	
	public function delete_resume($rid)
	{
		return $this->con->query("DELETE FROM resume WHERE id = $rid");
	}
	
	public function new_resume($aid, $fullname, $ic, $matric, $gender, $address, $phone, $email, $dateofbirth, $faculty, $programme, $graduationdate, $cgpa, $skills, $personalities, $additionaldescription, $privacy = 'private')
	{
		$row = $this->get_first_row("SELECT js.id FROM jobseeker js INNER JOIN account a ON js.account_ID = a.id WHERE a.id = $aid");
		if(sizeof($row) > 0)
			$jsid = $row['id'];
		else
			return false;
		return $this->insert_row("null, $jsid, '$fullname', '$ic', '$matric', '$gender', '$address', '$phone', '$email', '$dateofbirth', '$faculty', '$programme', '$graduationdate', '$cgpa', '$skills', '$personalities', '$additionaldescription', '$privacy'",'resume');
	}
	
	public function update_resume($rid, $fullname, $ic, $matric, $gender, $address, $phone, $email, $dateofbirth, $faculty, $programme, $graduationdate, $cgpa, $skills, $personalities, $additionaldescription)
	{
		return $this->con->query("UPDATE resume set fullname = '$fullname', ic = '$ic', matric = '$matric', gender = '$gender', address = '$address', phone = '$phone', email = '$email', dateofbirth = '$dateofbirth', faculty = '$faculty', programme = '$programme', graduationdate = '$graduationdate', cgpa = '$cgpa', skills = '$skills', personalities = '$personalities', additionaldescription = '$additionaldescription' WHERE id = $rid");
	}
	
	public function is_permitted($eid, $rid)
	{
		return $this->con->query("SELECT j.employer_ID, r.id FROM resume r INNER JOIN jobapplication ja ON ja.jobSeeker_ID = r.jobseeker_ID INNER JOIN jobs j ON j.id = ja.jobs_ID WHERE j.employer_ID = $eid AND r.id = $rid AND ja.criteriastatus = 'pass'")->num_rows > 0;
	}
}