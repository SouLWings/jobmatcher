<?php
class connection{

	public function connect(){
		$con = mysql_connect('localhost','root','');
		mysql_select_db('job_matcher', $con);
		return $con;
	}

	public function disconnect()
	{
		mysql_close($this->con);
	}

}
?>