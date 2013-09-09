<?php
include_once 'modal.inc.php';

class forumDAO extends modal{

	/**
	 *	mysqli object = $con
	 *	get_first_row($selectquery) 	return array
	 *	get_all_rows($selectquery)		return multidimentional array
	 *	insert_values($values, $table)	return boolean
	 *	
	 *	begin to write functions
	 */

	
	
	function getSections()
	{
		$qry="SELECT * FROM f0 ";
		return $this->get_all_rows($qry);
	} 

	function getThreads($id,$count)
	{
		$qry="SELECT * FROM f1 WHERE f0id='$id' ORDER BY status DESC ";//LIMIT $count,1
		//$qry="SELECT * FROM f1 WHERE f0id='$id' ORDER BY status DESC LIMIT $count,$limit";	
		return $this->get_all_rows($qry);
		
	}

	function getPosts($f1id)
	{
		$qry="SELECT * FROM f2 WHERE f1id='$f1id'";
		return $this->get_all_rows($qry);
	}
	
	function getPosts2($f1id)
	{
		$qry="SELECT * FROM f2 WHERE f1id='$f1id' AND type='visible'";
		return $this->get_all_rows($qry);
	}
	
	function getUsers($f1id)
	{
		$qry="SELECT username FROM account WHERE id=(SELECT uid FROM f1 WHERE id=$f1id)";
		$users=$this->get_all_rows($qry);
		foreach($users as $user)
		{
			$usernames=$user['username'];
		}
		return $usernames;
	}
	
	
	function editSection($id, $topic, $descr)
	{
		$qry="UPDATE f0 SET section='$topic', description='$descr' WHERE id='$id'";
		$res=$this->con->query($qry);	
		
		if($res)
			$msg='success';
		else
			$msg='failed';
		return $msg;
	}

	function editThread()
	{
	}

	function editPost()
	{}

	function deleteSection($id)
	{
		$qry="DELETE FROM f0  WHERE id='$id'" ;
		$res=$this->con->query($qry);	

		if($res)
			$msg='success';
		else
			$msg='failed';
		return $msg;
	}

	function deleteThread($id)
	{
		$qry="DELETE FROM f1  WHERE id='$id'" ;
		$res=$this->con->query($qry);	

		if($res)
			$msg='success';
		else
			$msg='failed';
		return $msg;
	}

	function deletePost($f2id)
	{
		$qry="DELETE FROM f2  WHERE id='$f2id'" ;
		$res=$this->con->query($qry);	

		if($res)
			$msg='success';
		else
			$msg='failed';
		return $msg;
	}

	function createSection($topic,$descr)
	{
		$qry="INSERT INTO f0 (section, description) VALUES ('$topic','$descr')" ;
		$res=$this->con->query($qry);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function createThread($f0id,$uuid,$topic,$descr)
	{
		$qry="INSERT INTO f1 (f0id, uid, title, content) VALUES ('$f0id', '$uuid', '$topic', '$descr')" ;
		$res=$this->con->query($qry);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function createPost($f1id,$uuid,$topic,$descr)
	{
		$qry="INSERT INTO f2 (f1id, uid, topic, content) VALUES ('$f1id', '$uuid', '$topic', '$descr')" ;
		$res=$this->con->query($qry);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function numThread($id)
	{
		$qry= "SELECT * FROM f1 WHERE f0id=$id";
		$num=$this->row_count($qry);
		return $num;
	}
	 
	function totalPost($f0id)
	{
		$qry= "SELECT f2.id FROM f0 INNER JOIN f1 ON f1.f0id = f0.id INNER JOIN f2 ON f2.f1id = f1.id where f0.id = $f0id";
		$total=$this->row_count($qry);
		
		return $total;
	} 
	 
	function numPost($f1id)
	{
		$qry= "SELECT COUNT(*) as num FROM f2 WHERE f1id=$f1id";
		$num=$this->con->query($qry)->fetch_assoc()['num'];
		return $num;
	}
	 
	function sectionname($id)
	{
		$qry= "SELECT section FROM f0 WHERE id=(SELECT f0id FROM f1 WHERE id=$id)";
		//$qry="SELECT section FROM f0 INNER JOIN f1 ON f0.id = f1.f0id WHERE f0.id= $id";
		$names=$this->get_all_rows($qry);
		$sect='';
		foreach($names as $name)
		{
			$sect=$name['section'];
		}
		return $sect;
	}
	
	function alterStatus($f1id)
	{	
		$qry="SELECT status FROM f1  WHERE id='$f1id'";
		$statuss=$this->get_all_rows($qry);
		
		$status='';
		
		foreach($statuss as $sta)
		{
			$status=$sta['status'];
		}
		
		if($status=='normal')
		{
			$qry1="UPDATE f1 SET  status='sticky' WHERE id='$f1id'" ;
			$res1=$this->con->query($qry1);	
			
			if($res1)
				{$msg='success';}
			else
				{$msg='failed';}
		}
		else
		{
			$qry2="UPDATE f1 SET  status='normal' WHERE id='$f1id'" ;
			$res2=$this->con->query($qry2);	
			if($res2)
				{$msg='success2';}
			else
				{$msg='failed2';}
		}
		return $msg;
	}
	function getThread($f1id) 
	{
		$qry="SELECT * FROM f1 WHERE id='$f1id'";
		$thread=$this->get_first_row($qry);
		return $thread;
	}
	
	function pnumPosts($uid)
	{
		$qry= "SELECT COUNT(*) as num FROM f2 WHERE uid=$uid";
		$num=$this->con->query($qry)->fetch_assoc()['num'];
		return $num;
	}
	
	function pgetUsers($uid)
	{
		$qry="SELECT username FROM account WHERE id=$uid";
		$usernames=$this->get_all_rows($qry);
		$username='';
		foreach($usernames as $user)
		{
			$username=$user['username'];
		}
		return $username;
	}
	
	function alterType($f2id)
	{	
		$qry="SELECT type FROM f2  WHERE id='$f2id'";
		$types=$this->get_all_rows($qry);
		
		$type='';
		
		foreach($types as $ty)
		{
			$type=$ty['type'];
		}
		
		if($type=='hidden')
		{
			$qry1="UPDATE f2 SET  type='visible' WHERE id='$f2id'" ;
			$res1=$this->con->query($qry1);	
			if($res1)
				{$msg='success';}
			else
				{$msg='failed';}
		}
		else
		{
			$qry2="UPDATE f2 SET  type='hidden' WHERE id='$f2id'" ;
			$res2=$this->con->query($qry2);	
			if($res2)
				{$msg='success2';}
			else
				{$msg='failed2';}
		}
		return $msg;
	}
	
	function lastPost($f1id)
	{
		$qry="SELECT * FROM f2  WHERE id=(SELECT max(id) FROM f2 WHERE f1id='$f1id')";
		$lasts=$this->get_all_rows($qry);
		return $lasts;
	}

// for forum.php
	function seclastpost($f0id)
	{
		$qry="SELECT max(f2.id) AS last FROM f0 INNER JOIN f1 ON f1.f0id = f0.id INNER JOIN f2 ON f2.f1id = f1.id where f0.id = $f0id";
		$lasts=$this->get_all_rows($qry);
		return $lasts;
	}
	
	function gettime($last)
	{
		$qry="SELECT * FROM f2 WHERE id=$last";
		$dates=$this->get_all_rows($qry);
		$date='';
		foreach($dates as $da)
		{
			$date=$da['datetime'];
		}
		
		return $date;
	}
	
	function getuser($last)
	{
		$qry="SELECT * FROM account WHERE id=(SELECT uid FROM f2 WHERE id=$last)";
		$users=$this->get_all_rows($qry);
		$user='';
		
		foreach($users as $u)
		{
			$user=$u['username'];
		} 
		return $user;
	}
	
	//for forum_section.php
	function thrlastpost($f1id)
	{
		$qry="SELECT max(f2.id) AS last FROM  f2 INNER JOIN f1 ON f2.f1id = f1.id where f1.id = $f1id";
		$lasts=$this->get_all_rows($qry);
		return $lasts;
	}
	
	//count max threadpage needed
	function threadPage($id,$max)
	{
		$qry="SELECT COUNT(id) FROM f1 WHERE f0id=$id";
		$total=$this->row_count($qry);
		//$page=($total/$max);
		//return $page;
		return $total;
	}
	
}
?>