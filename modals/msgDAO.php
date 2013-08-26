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
		return $this->row_count("SELECT id FROM message WHERE receiver_ID = $reciever_id GROUP BY sender_ID");
	}
	
	public function get_msg_preview($receiver_id)
	{
		$rows = $this->get_all_rows("SELECT CONCAT_WS(' ',a.firstname,a.lastname) as lastchat, m1.content FROM message m1 INNER JOIN account a ON a.id = m1.sender_ID WHERE `time` = (SELECT MAX(`time`) FROM message m2 WHERE m2.sender_ID = m1.sender_ID) AND m1.receiver_ID = $receiver_id ORDER BY m1.id DESC");
		if(sizeof($rows)>0)
		{		
			$chatpersons = $this->get_all_rows("SELECT m1.id, CONCAT_WS(' ',a.firstname,a.lastname) as name FROM message m1 INNER JOIN account a ON a.id = m1.sender_ID WHERE m1.receiver_ID = 1 GROUP BY m1.sender_ID ORDER BY m1.id DESC");
			$x = 0;
			foreach($chatpersons as $chatperson):
				$rows[$x]['id'] = $chatperson['id'];
				$rows[$x]['name'] = $chatperson['name'];
			endforeach;
		}
		return $rows;
	}
}