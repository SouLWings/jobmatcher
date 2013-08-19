<?php
if(isset($_POST['email']) && isset($_POST['password']))
{
	$ue = $_POST['email'];
	$up = md5($_POST['password']);
	$ue = htmlentities($ue);
	$ue = stripslashes($ue);
	$ue = mysql_real_escape_string($ue);
	
	if(!empty($ue) && !empty($up))
	{
		$query = "SELECT * FROM user WHERE USER_EMAIL = '$ue' AND USER_PASSWORD = '$up'";
		if($query_run = mysql_query($query))
		{
			$num_row = mysql_num_rows($query_run);
			if($num_row != 1)
				echo 'Invalid email or password';
			else
			{
				$_SESSION['id'] = mysql_result($query_run, 0, 'USER_ID');
				$ui = $_SESSION['id'];
				$_SESSION['un'] = mysql_result($query_run, 0, 'USER_NAME');
				$q2 = mysql_query("INSERT INTO user_login_log VALUES('','$ui',CURRENT_TIMESTAMP)");
				header('Location: '.$referer);
			}
		}
	}
}
?>

<form action = "<?php echo $curr_location; ?>" method = "POST">
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Log In">
</form>


