<?php
include 'connection.php';

class jobDAO extends connection{
	
	public $con = 0;

	public function __construct(){
		if(!$this->con)
			$this->con = $this->connect();
	}
	
	public function get_all_job_Types()
	{
		$result = mysql_query('SELECT * FROM jobspecialization ORDER BY specialization', $this->con);
		$jobspecializations = array();
		while ($row = mysql_fetch_assoc($result)) {
			$jobspecializations[] = $row;
		}

		return $jobspecializations;
	}
	
	public function get_job($id)
	{
		return mysql_fetch_assoc(mysql_query("SELECT * FROM jobs where id = $id", $this->con));
	}
	
	public function get_all_jobs_of_type($jobspecializationid)
	{
		$result = mysql_query("SELECT j.title, c.name as company, j.location, j.salary, j.experience, j.date, j.id FROM jobs j INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id WHERE j.jobspecialization_ID = $jobspecializationid", $this->con);
		$jobs = array();
		while($row = mysql_fetch_assoc($result))
			$jobs[] = $row;
		return $jobs;
	}
	
	public function get_job_type_by_id($jobspecializationid)
	{
		return mysql_fetch_assoc(mysql_query("SELECT specialization FROM jobspecialization where id = $jobspecializationid", $this->con))['specialization'];
	}
	
	public function search($keyword)
	{
		if($result=mysql_query("SELECT j.title, c.name as company, j.location, j.salary, j.experience, j.date, j.id FROM jobs j INNER JOIN employer e ON j.employer_ID = e.id INNER JOIN company c ON e.company_ID = c.id  WHERE j.title LIKE '%$keyword%' OR j.position LIKE '%$keyword%'", $this->con))
		{
			$jobs = array();
			while($row = mysql_fetch_assoc($result))
				$jobs[] = $row;
			return $jobs;
		}
	}
	
	public function advanced_Search($name, $company, $location, $salaryMin, $salaryMax, $jobspecializationid, $expmin, $expmax)
	{
		$extraFilter = '';
		if(!empty($location))
			$extraFilter .= ' AND j.location = \''.$location.'\'';
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
					WHERE (lower(j.title) LIKE lower('%$name%') 
						AND lower(c.name) LIKE lower('%$company%') 
						$extraFilter)";
		
		if($result=mysql_query($query, $this->con))
		{
			$jobs = array();
			while($row = mysql_fetch_assoc($result))
				$jobs[] = $row;
			return $jobs;
			/*if(mysql_num_rows($result) == 0)
				echo "<div class='alert alert-danger' style='clear:left;'>No student found.</div>";
			else
			{
				echo "<div class='alert alert-success' style='clear:left;'>".mysql_num_rows($result)." student(s) found.</div>";
				showTable($result);
			}*/
		}
	}
	
}
?>