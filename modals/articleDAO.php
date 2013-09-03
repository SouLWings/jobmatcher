<?php
include_once 'modal.inc.php';

class articleDAO extends modal{

	/**
	 *	mysqli object = $con
	 *	get_first_row($selectquery) 	return array
	 *	get_all_rows($selectquery)		return multidimentional array
	 *	insert_row($values, $table)	return boolean
	 *	row_count($selectquery)			return number of row int
	 *	
	 *	begin to write functions
	 */
	
	public function get_all_articles()
	{
		return $this->get_all_rows("SELECT * FROM article");
	}
}