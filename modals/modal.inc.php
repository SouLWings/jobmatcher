<?php
class modal{
	
	public $con;
	
	public function __construct()
	{
		$this->con = new mysqli("sql2.freemysqlhosting.net", "sql217015", "wY9*aE4!", "sql217015");//("127.0.0.1", "root", "", "job_matcher");
		if ($this->con->connect_errno)
			die("Unable to enstablish connection to database: " . $con->connect_error);
	}

	public function disconnect()
	{
		if($this->con)
			$this->con->close();
	}

	public function get_first_row($selectquery)
	{
		$result = $this->con->query($selectquery);
		$row = $result->fetch_assoc();
		
		$result->free();
		return $row;
	}
	
	public function get_all_rows($selectquery)
	{
		$rows = array();
		if($result = $this->con->query($selectquery))
		{
			while ($row = $result->fetch_assoc())
				$rows[] = $row;
			$result->free();
		}
		return $rows;
	}
	
	public function insert_row($values, $table)
	{
		return $this->con->query("INSERT INTO `$table` VALUES($values)");
	}
	
	public function row_count($selectquery)
	{
		return $this->con->query($selectquery)->num_rows;
	}
}
?>