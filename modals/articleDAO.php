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
	
	public function add_article($title, $content)
	{
		return $this->insert_row("null, 1, NOW(), '$title','$content'",'article');
	}
	
	public function edit_article($id, $title, $content)
	{
		return $this->con->query("UPDATE article SET title = '$title', content = '$content' WHERE id = $id");
	}
	
	public function delete_article($id)
	{
		return $this->con->query("DELETE FROM article WHERE id = $id");
	}
}