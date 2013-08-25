<?php
include_once 'modal.inc.php';

class msgDAO extends modal{

	/**
	 *	mysqli object = $con
	 *	get_first_row($selectquery) 	return array
	 *	get_all_rows($selectquery)		return multidimentional array
	 *	insert_values($values, $table)	return boolean
	 *	
	 *	begin to write functions
	 */
	
	public function get_num_new_msg($reciever_id)
	{
		return $this->row_count("SELECT id FROM message WHERE receiver_ID = $reciever_id");
	}
	
	public function get_msg_preview($receiver_id)
	{
		return $this->get_all_rows("SELECT CONCAT_WS(' ',a.firstname,a.lastname) as name, m1.content FROM message m1 INNER JOIN account a on m1.sender_ID = a.id WHERE time = (SELECT MAX(time) FROM message m2 WHERE m2.sender_ID = m1.sender_ID) AND m1.receiver_ID = $receiver_id");
	}
}