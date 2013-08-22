<form class="form-signin" action="<?php echo 'loginCTRL.php' ?>" method="POST">
	<h3 class="form-signin-heading">Sign in</h3>
	<?php $errormsg ?>
	<div class="form-group">
	<input type="text" class="form-control" id="loginusername" name='loginusername' placeholder="Username" required>
	</div>
	<input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required >
	<br>
	<button class="btn btn-primary btn-block" type="submit">Sign in</button><br>
</form>
<a class="btn btn-primary btn-block" href='register.php'>Register</a>
