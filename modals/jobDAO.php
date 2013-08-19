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
		$result = mysql_query('SELECT type FROM jobtype', $this->con);
		$jobtypes = array();
		while ($row = mysql_fetch_assoc($result)) {
			$jobtypes[] = $row['type'];
		}

		return $jobtypes;
	}
	
	public function get_job($id)
	{
		return mysql_fetch_assoc(mysql_query("SELECT * FROM jobs where id = $id", $this->con));
	}
	
	public function get_all_jobs_of_type($type)
	{
		return mysql_fetch_assoc(mysql_query("SELECT * FROM jobs where jobtype_ID =", $this->con));
	}
	
}
?>