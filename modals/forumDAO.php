<?php
include_once 'modal.inc.php';

class forumDAO extends modal{

	/**
	 *	mysqli object = $con
	 *	get_first_row($selectquery) 	return array
	 *	get_all_rows($selectquery)		return multidimentional array
	 *	insert_values($values, $table)	return boolean
	 *	row_count($selectquery)			return number of row
	 *	begin to write functions
	 */

	
	function getSections()
	{
		$qry="SELECT * FROM f0 ";
		return $this->get_all_rows($qry);
	} 

	function get_section_name_by($secid)
	{
		$qry= "SELECT section FROM f0 WHERE id=$secid";
		$name=$this->get_first_row($qry)['section'];
		return $name;
	}
	

	function get_section_by($tid)
	{
		$qry= "SELECT s.id as id, s.section as name FROM f1 t INNER JOIN f0 s ON s.id = t.f0id WHERE t.id=$tid";
		return $this->get_first_row($qry);
	}
	
	function get_all_Threads($id,$type,$page=0)
	{	
		if($page > 0){
			$limit = 'LIMIT '.(($page - 1) * 5).','.(($page) * 5);
		}else{
			$limit = '';
		}
		
		if($type == 'normal')
			$type = "t.type = 'hot' OR t.type = 'normal'";
		else if($type == 'important')
			$type = "t.type = 'sticky'";
		
		$qry="SELECT t.id, t.title, a.username, a.id as userid, t.datetime, t.type, t.status, count(p.id) as replies ,t.views FROM f1 t INNER JOIN account a on a.id = t.uid LEFT JOIN f2 p ON p.f1id = t.id WHERE t.f0id = $id AND ($type) GROUP BY t.id ORDER BY t.type,t.id DESC $limit";
		$threads = $this->get_all_rows($qry);		
		
		//get global threads and merge to the threads
		if($type == "t.type = 'sticky'")
		{
			$qry="SELECT t.id, t.title, a.username, a.id as userid, t.datetime, t.type, t.status, count(p.id) as replies ,t.views FROM f1 t INNER JOIN account a on a.id = t.uid LEFT JOIN f2 p ON p.f1id = t.id WHERE type = 'global' GROUP BY t.id ORDER BY t.id DESC";
			$globalthreads = $this->get_all_rows($qry);
			$threads = array_merge($globalthreads, $threads);
		}
		return $threads;
	}
	
	function get_thread_by($tid)
	{
		$qry = "SELECT t.id, t.title, t.content, a.username, a.id as userid, at.type as usertype, t.datetime, t.status FROM f1 t INNER JOIN account a on a.id = t.uid INNER JOIN accounttype at ON at.id = a.accounttype_ID WHERE t.id = $tid";
		$result = $this->get_first_row($qry);
		return $result;
	}
	
	function view_increment($tid)
	{
		return $this->con->query("UPDATE f1 SET views = (views+1) WHERE id = $tid");
	}
	
	function get_last_post_by($thread_ID)
	{
		return $this->get_first_row("SELECT a.username, a.id, p.datetime as datetime FROM f2 p INNER JOIN account a ON a.id = p.uid WHERE p.f1id = $thread_ID ORDER BY datetime DESC LIMIT 1");
	}
	
	function get_all_posts($tid, $page)
	{
		if($page == 1){
			$limit = 'LIMIT 0,4';
		}else if($page > 1){
			$limit = 'LIMIT '.(($page - 1) * 5 - 1).','.(($page) * 5 - 1);
		}else{
			$limit = '';
		}
		
		$qry="SELECT p.id, p.content, a.username, a.id as userid, at.type as usertype, p.datetime FROM f2 p INNER JOIN account a on a.id = p.uid INNER JOIN accounttype at ON at.id = a.accounttype_ID WHERE p.f1id = $tid ORDER BY p.datetime $limit";
		return $this->get_all_rows($qry);
	}
	
	function num_post_by_user($uid)
	{	
		$qry1 = "SELECT t.id FROM account a INNER JOIN f1 t ON a.id = t.uid WHERE a.id = $uid";
		$qry2 = "SELECT p.id FROM account a INNER JOIN f2 p ON a.id = p.uid WHERE a.id = $uid";
		$total = 0;
		
		if($result1 = $this->con->query($qry1))
			$total += $result1->num_rows;
		if($result2 = $this->con->query($qry2))
			$total += $result2->num_rows;
			
		return ($total);
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
	
	function count_all_posts()
	{
		return $this->row_count("SELECT id FROM f2")+$this->row_count("SELECT id FROM f1");
	}
	
	function count_all_threads()
	{
		return $this->row_count("SELECT id FROM f1");
	}
	
	function count_all_members()
	{
		return $this->row_count("SELECT id FROM account");
	}
	
	function count_all_online()
	{
		return $this->row_count("SELECT id FROM account WHERE lower(onlinestatus) = 'online'");
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

	function editThread($tid, $title, $content)
	{
		return $this->con->query("UPDATE f1 SET title = '$title', content = '$content' WHERE id = $tid");
	}

	function editPost($pid, $content)
	{
		return $this->con->query("UPDATE f2 SET content = '$content' WHERE id = $pid");
	}

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
		$qry="DELETE FROM f1 WHERE id='$id'" ;
		$res=$this->con->query($qry);
		return $res;
	}

	function deletePost($f2id)
	{
		$qry="DELETE FROM f2 WHERE id='$f2id'" ;
		$res=$this->con->query($qry);
		return $res;
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
		$qry="INSERT INTO f1 (f0id, uid, title, content, type, status) VALUES ('$f0id', '$uuid', '$topic', '$descr', 'normal', 'open')" ;
		$res=$this->con->query($qry);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function createPost($f1id,$uuid,$descr)
	{
		$qry="INSERT INTO f2 (f1id, uid, content) VALUES ('$f1id', '$uuid', '$descr')" ;
		$res=$this->con->query($qry);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function numThread($secid, $all = true)
	{
		if(!$all)
			$type = "AND (type = 'hot' OR type = 'normal')";
		else
			$type = '';
			
		$qry= "SELECT * FROM f1 WHERE f0id=$secid $type";
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
	 
	function alterType($f1id, $threadtype)
	{	
		$qry="UPDATE f1 SET type = '$threadtype' WHERE id=$f1id";
		$result = $this->con->query($qry);
		return $result;
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
		
		if($status=='open')
		{
			$qry1="UPDATE f1 SET  status='closed' WHERE id='$f1id'" ;
			$res1=$this->con->query($qry1);	
			
			if($res1)
				{$msg='success';}
			else
				{$msg='failed';}
		}
		else
		{
			$qry2="UPDATE f1 SET  status='open' WHERE id='$f1id'" ;
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
	
	function lastPost($f1id)
	{
		$qry="SELECT * FROM f2  WHERE id=(SELECT max(id) FROM f2 WHERE f1id='$f1id')";
		$lasts=$this->get_all_rows($qry);
		return $lasts;
	}

// for forum.php
	function seclastpost($f0id)
	{
		$qry="SELECT max(f2.id) AS post_ID FROM f0 INNER JOIN f1 ON f1.f0id = f0.id INNER JOIN f2 ON f2.f1id = f1.id where f0.id = $f0id";
		$lasts=$this->get_first_row($qry);
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
		$qry="SELECT username, id FROM account WHERE id=(SELECT uid FROM f2 WHERE id=$last)";
		$user=$this->get_first_row($qry);
		if(sizeof($user) > 0)
			return $user;
		else
			return array("username"=>"No post","id"=>"");
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
	
	function search_threads($keyword)
	{		
		$qry="SELECT t.id, t.title, t.content, a.username, a.id as userid, t.datetime, t.type, t.status, count(p.id) as replies ,t.views FROM f1 t INNER JOIN account a on a.id = t.uid LEFT JOIN f2 p ON p.f1id = t.id WHERE t.content LIKE '%$keyword%' OR t.title LIKE '%$keyword%' GROUP BY t.id ORDER BY t.datetime DESC";
		$threads = $this->get_all_rows($qry);
		return $threads;
	}
	function search_posts($keyword)
	{
		$qry="SELECT p.id as pid, p.content, a.username, a.id as userid, p.datetime, t.title, t.id as tid FROM f2 p INNER JOIN account a on a.id = p.uid INNER JOIN f1 t ON t.id = p.f1id WHERE p.content LIKE '%$keyword%' ORDER BY p.datetime DESC";
		return $this->get_all_rows($qry);
	}
}
?>