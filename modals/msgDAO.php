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

	//get the number of new inbox message that the user havent seen
	public function get_num_new_msg($reciever_id)
	{
		return $this->row_count("SELECT id FROM message WHERE receiver_ID = $reciever_id AND status = 'not seen' GROUP BY sender_ID");
	}
	
	//get the left side bar de contact list
	public function get_msg_preview($receiver_id)
	{
		$chatpersons = $this->get_all_rows("SELECT m1.sender_ID, m1.receiver_ID, CONCAT_WS(' ',a.firstname,a.lastname) as sender_name, CONCAT_WS(' ',a2.firstname,a2.lastname) as receiver_name FROM message m1 INNER JOIN account a2 ON a2.id = m1.receiver_ID INNER JOIN account a ON a.id = m1.sender_ID WHERE m1.receiver_ID = $receiver_id OR m1.sender_ID = $receiver_id ORDER BY m1.id DESC");
		
		$uniqueperson = array();
		for($i = 0; $i < sizeof($chatpersons); $i++)
		{
			if($chatpersons[$i]['sender_ID'] == $receiver_id)
			{
				$chatpersons[$i]['sender_ID'] = $chatpersons[$i]['receiver_ID'];
				$chatpersons[$i]['sender_name'] = $chatpersons[$i]['receiver_name'];
			}
		}
		for($i = 0; $i < sizeof($chatpersons); $i++)
		{
			if(in_array($chatpersons[$i]['sender_ID'],$uniqueperson))
			{
				unset($chatpersons[$i]);
				$chatpersons = array_values($chatpersons);
				$i--;
			}
			else	
			{
				$uniqueperson[] = $chatpersons[$i]['sender_ID'];
			}
		}
		return $chatpersons;
	}
	
	public function get_msg($contact_ID, $own_ID, $limit)
	{
		$this->con->query("UPDATE message SET status = 'seen' WHERE (sender_ID = $contact_ID AND receiver_ID = $own_ID)");
		return array_reverse($this->get_all_rows("SELECT CONCAT_WS(' ',a1.firstname,a1.lastname) as sender, CONCAT_WS(' ',a2.firstname,a2.lastname) as receiver, content FROM message m INNER JOIN account a1 ON a1.id = m.sender_ID INNER JOIN account a2 ON a2.id = m.receiver_ID WHERE (sender_ID = $contact_ID AND receiver_ID = $own_ID) OR (sender_ID = $own_ID AND receiver_ID = $contact_ID) ORDER BY time DESC LIMIT $limit"));
	}	
	public function get_username_by_id($id)
	{
		return $this->get_first_row("SELECT CONCAT_WS(' ',firstname,lastname) as name FROM account WHERE id = $id")['name'];
	}
	
	public function new_message($msg, $to, $from)
	{
		$query="INSERT INTO message(sender_ID, receiver_ID, content) VALUES($from, $to, '$msg')";
		return $this->con->query($query);
	}
	
	public function get_update($contact_ID, $own_ID, $latesttime)
	{
		$rows = $this->get_all_rows("SELECT CONCAT_WS(' ',a1.firstname,a1.lastname) as sender, CONCAT_WS(' ',a2.firstname,a2.lastname) as receiver, content FROM message m INNER JOIN account a1 ON a1.id = m.sender_ID INNER JOIN account a2 ON a2.id = m.receiver_ID WHERE (sender_ID = $contact_ID AND receiver_ID = $own_ID) AND time >= '$latesttime' AND status = 'not seen' ORDER BY time DESC");
		$this->con->query("UPDATE message SET status = 'seen' WHERE (sender_ID = $contact_ID AND receiver_ID = $own_ID) AND time >= '$latesttime'");
		return array_reverse($rows);
	}
	
	public function get_latest_msg_time($own_id)
	{
		if($result = $this->con->query("SELECT max(time) as latesttime FROM message WHERE sender_ID = $own_id OR receiver_ID = $own_id"))
			return $result->fetch_assoc()['latesttime'];
		return 0;
	}
}