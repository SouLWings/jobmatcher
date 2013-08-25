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

	/* function getSection($id)
	{
		$qry= "SELECT * FROM f0 WHERE id='$id'";
		$res= mysql_query($qry,$this->con);
		$sections=array();
		
		while($row=mysql_fetch_assoc($res))
		{
			$sections[]=$row;
		}
		
		return $sections;
	} */
	/* 
	function getSections()
	{
		$qry= "SELECT * FROM f0 ";
		$res= mysql_query($qry,$this->con);
		$sections= array();
		
		while($row=mysql_fetch_assoc($res))
		{
			$sections[]=$row;
		}
		
		return $sections;
	}  */
	function getSections()
	{
		return $this->get_all_rows("SELECT * FROM f0");
	} 
/* 
	function getThreads($id)
	{
		$qry= "SELECT * FROM f1 WHERE f0id='$id' ORDER BY status DESC" ;
		$res= mysql_query($qry,$this->con);
		$threads= array();
		
		while($row=mysql_fetch_assoc($res))
		{
			$threads[]=$row;
		}
		
		return $threads;
	} */
	function getThreads($id)
	{
		return $this->get_all_rows("SELECT * FROM f1 WHERE f0id='$id' ORDER BY status DESC");
	}
/* 
	function getPosts($id)
	{
		
		$qry= "SELECT * FROM f2 WHERE f1id='$id'";
		$res= mysql_query($qry,$this->con);
		$posts= array();
		
		while($row=mysql_fetch_assoc($res))
		{
			$posts[]=$row;
		}
		
		return $posts;
	}
	 */
	function getPosts($id)
	{
		return $this->get_all_rows("SELECT * FROM f2 WHERE f1id='$id'");
	}
	
	function getUsers($id)
	{
		return $this->get_all_rows();
	}
	
	function editSection($id, $topic, $descr)
	{
		$sql="UPDATE f0 SET section='$topic', description='$descr' WHERE id='$id'";
		$res=$this->con->query($sql);	
		
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
		$sql="DELETE FROM f0  WHERE id='$id'" ;
		$res=mysql_query($sql);	
		
		if($res)
			$msg='success';
		else
			$msg='failed';
		return $msg;
	}

	function deleteThread()
	{}

	function deletePost()
	{}

	function createSection($topic,$descr)
	{
		$sql="INSERT INTO f0 (section, description) VALUES ('$topic','$descr')" ;
		$res=$this->con->query($sql);	
		if($res)
			$msg='success';
		else
			$msg='failed';
			
		return $msg;
	}

	function createThread()
	{}

	function createPost()
	{}
	/* 

	function numThread($id)
	{
		$qry= "SELECT COUNT(*) FROM f1 WHERE f0id=$id";
		$res=mysql_query($qry,$this->con);
		$num=mysql_result($res,0);
		return $num;
	} */

	function numThread($id)
	{
		$qry= "SELECT * FROM f1 WHERE f0id=$id";
		$num=$this->row_count($qry);
		return $num;
	}
	/* 
	function numPost($f1id)
	{
		$qry= "SELECT COUNT(*) FROM f2 WHERE f1id=$f1id";
		$res=mysql_query($qry,$this->con);
		$num=mysql_result($res,0);
		return $num;
	}
	 */
	function numPost($f1id)
	{
		$qry= "SELECT * FROM f2 WHERE f1id=$f1id";
		$num=$this->row_count($qry);
		return $num;
	}
	
	/* function numThread()
	{
		$sections=$this->getSections();
		foreach($sections as $section)
		{
			$f0id=$section['id'];
			$qry1= "SELECT COUNT(*) FROM f1 WHERE f0id=$f0id AS num";
			$res1=mysql_query($qry1,$this->con);
			while($row=mysql_fetch_object($res1))
			{
				$threadnums[]=mysql_result($res1,0);
			}
		}
		return $threadnums;
	}
	 */
	/* function numPost($id)
	{
		$qry= "SELECT COUNT(*) FROM f2 INNER JOINED f1 ON f2.f1id=f1.id WHERE f2.f1id=$id";
		$res=mysql_query($qry,$this->con);
		$numpost=mysql_result($res,0);
		return $numpost;
	} */
	
	/* function numPost($id)
	{
		$qry= "SELECT * FROM f1 WHERE f0id=$id";
		$res=mysql_query($qry,$this->con);
		
		while($row=mysql_fetch_assoc($res));
		{
			$threads=$row;
		
		}
		foreach($threads as $thread)
		{
			$qry1="SELECT COUNT(*) FROM f2 WHERE f1id='$thread[id]'";
			$res1=mysql_query($qry1,$this->con);
			$resvalue=mysql_result($res1,0);
			while($row1=mysql_fetch_assoc(res1))
			{
				$numpost["$id"]=$numpost["$id"]+$resvalue;	
			}
		}
	
		}
		return $numpost["$id"];
	} 
 */
}
?>