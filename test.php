<html>
<body>
<form action='messageCTRL.php' method='post'>
<input type='hidden' value='sendmsg' name='action'/>
<input type='hidden' value='3' name='receiver'/>
<input type='hidden' value='asdasdsadasdasds' name='content'/>
<input type='submit' value='submit'/>
</form>
<?php 

			$date = ''.getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
			echo $date;?>
</body>
</html>