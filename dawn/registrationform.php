<?php

$query = "SELECT USER_TYPE FROM user_type";
$query_run = mysql_query($query);
?>


<form action="register.php" method="post">
<br>Username:
<br><input type="text" name="un" value="<?php echo $un ?>" maxlength="15">
<br>Password:
<br><input type="password" name="pw1">
<br>Retype Password:
<br><input type="password" name="pw2">
<br>Firstname:
<br><input type="text" name="fn" value="<?php echo $fn ?>" maxlength="30">
<br>Lastname:
<br><input type="text" name="ln" value="<?php echo $ln ?>" maxlength="30">
<br>Email:
<br><input type="email" name="em" value="<?php echo $em ?>" maxlength="30">
<br>User type:
<br><select name="ut">
<?php
while($row = mysql_fetch_assoc($query_run))
{	
	$value = $row['USER_TYPE'];
	if($value!='Admin')
		echo "<option value='$value'>$value</option>";
}
?>
</select><br>
<br><input type="submit" value="Register">
</form>

<a href='homepage.php'>Back to homepage</a>