<?php
class modal{
	
	public $con;
	
	//constructor function
	public function __construct()
	{
		$this->con = new mysqli("127.0.0.1", "root", "", "job_matcher");//("sql2.freemysqlhosting.net", "sql217015", "wY9*aE4!", "sql217015");
		if ($this->con->connect_errno)
			die("Unable to enstablish connection to database: " . $con->connect_error);
	}

	//close and free the connection
	public function disconnect()
	{
		if($this->con)
			$this->con->close();
	}
	
	//return an associate array of first row from the given query
	public function get_first_row($selectquery)
	{
		$row = array();
		if($result = $this->con->query($selectquery))
		{
			$row = $result->fetch_assoc();
			$result->free();
		}
		return $row;
	}
	
	//return an associate array of all rows from the given query
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
	
	//insert a new row with provided values, into a given table
	public function insert_row($values, $table)
	{
		return $this->con->query("INSERT INTO `$table` VALUES($values)");
	}
	
	//count the number of rows of result of a given query
	public function row_count($selectquery)
	{
		return $this->con->query($selectquery)->num_rows;
	}
	
}
?>