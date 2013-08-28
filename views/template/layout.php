<?php
if(!isset($title))
	$title = 'UM Job Matching System';
else
	$title .= 'UM Job Matching System';
if(!isset($content))
	$content = 'Nothing to display';
if(!isset($slider))
	$slider = '';
if(!isset($modalforms))
	$modalforms = array();
	
$styles[] = 'structure';
$styles[] = 'bootstrap';
$scripts[] = 'bootstrap.min';
$scripts[] = 'jquery-1.10.2.min';
?>


<!DOCTYPE html>
<html>
	
    <head>
        <title><?php echo $title ?></title>
		
		<!--scripts-->
		<?php foreach (array_reverse($scripts) as $script): ?>
		<script type='text/javascript' src='/jobmatcher/js/<?php echo $script?>.js'></script>
		<?php endforeach; ?>
		
		<!--styles-->
		<?php foreach (array_reverse($styles) as $style): ?>
		<link rel="stylesheet" type="text/css" href="/jobmatcher/css/<?php echo $style?>.css" />
		<?php endforeach; ?>
<script>
$(document).ready(function(){ 
	$("#signin").hide();
	$("#signinbtn").click(function(){
	$("#signin").slideToggle();
	});
});	
</script>
    </head>
    <body style=''>
	<div class="navbar-fixed-top">
			<div class='container'>
				<a href="index.php" class="navbar-brand">HOME</a>
				<a href="aboutus.php" class="navbar-brand">ABOUT US</a>
				<a href="advanced-search.php" class="navbar-brand">JOB SEARCH</a>
				<a href="match.php" class="navbar-brand">JOB MATCH</a></li>
				<a href="forum.php" class="navbar-brand">JOB FORUM</a></li>
				<a href="contactus.php" class="navbar-brand">RESOURCES</a></li>
				<a href='register.php' class="pull-right btn btn-primary btn-xs" style='margin-top:9px; margin-left: 0.5%;'>Register</a>
				<a class="pull-right" id='signinbtn' style='margin-top:9px'>Sign In</a>
				<div id='jobsearch' class="pull-right">
					<form action ='jobs.php' method = 'GET'>
						<div class="input-group">
							<input type="text" name='name' class="form-control" placeholder="Search jobs">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
						<input type='hidden' name='search'>
					</form>
				</div>
			</div>
			<div id='signin'>
				<div class='container'>
					<form class="form-inline pull-right" role="form">
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">Username</label>
							<input type="email" class="form-control input-sm" id="exampleInputEmail2" placeholder="Username">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword2">Password</label>
							<input type="password" class="form-control input-sm" id="exampleInputPassword2" placeholder="Password">
						</div>
					  <div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					  </div>
					  <button type="submit" class="btn btn-default btn-sm">Sign in</button>
					</form>
				</div>
			</div>
		</div>
		<div class='container' style="padding-top:70px">				
			<aside>
				<div id='login'><?php include $asideinclude ?></div>
				<br>
				<div id='quickjobsearch'>
					<form action ='jobs.php' method = 'GET'>
						<div class="input-group">
							<input type="text" name='name' class="form-control" placeholder="Search jobs">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
						<input type='hidden' name='search'>
					</form>
				</div>
			</aside>
			
			<section id='contentsection'>
				<section id='slidersection'>
					<?php echo $slider ?>
				</section> 
				<?php echo $content ?>
			</section>			
			
			<?php 
			foreach ($modalforms as $modalform): 
				include "views/$modalform".'.inc.php';
			endforeach; 
			?>			
		</div>
		<footer>
			<div class='container'>
				<ul>
				  <li><a href="index.php">Home</a></li>
				  <li><a href="aboutus.php">About Us</a></li>
				  <li><a href="advanced-search.php">Job Search </a></li>
				  <li><a href="match.php">Job Match </a></li>
				  <li><a href="forum.php">Job Forum </a></li>
				  <li><a href="contactus.php">Send Enquiry</a></li> 
				  <li>&copy; 2013 UM Job Portal</li>
				</ul>
			</div>		
		</footer>
    </body>
</html>