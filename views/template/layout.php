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
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.0/amelia/bootstrap.min.css" rel="stylesheet">-->

		<!--styles-->
		<?php foreach (array_reverse($styles) as $style): ?>
		<link rel="stylesheet" type="text/css" href="/jobmatcher/css/<?php echo $style?>.css" />
		<?php endforeach; ?>
<script>
$(document).ready(function(){ 
	$("#signinbtn").click(function(){
		$("#signinbar").toggleClass('dropdowntoggle');
		//$("#maincontainer").toggleClass('dropdowntoggle');
		$(this).toggleClass('active');
	});
});
</script>
    </head>
    <body style=''>
		<div class="navbar-fixed-top hidebehind" id='signinbar' style=''>
			<div id='' class="pull-right navbar-btn" >
				<form class="form-inline form-signin" action="loginCTRL.php" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" id="loginusername" name='loginusername' placeholder="Username" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required >
					</div>
					<button class="btn btn-primary" type="submit">Sign in</button>
				</form>
			</div>
			<div id='' class="pull-right navbar-btn">
				<?php echo $errormsg ?>
			</div>
		</div>
		<div class="navbar-fixed-top">
			<p class="navbar-text">UMJM logo</p>
			<a href="index.php" class="navbar-brand">HOME</a>
			<a href="advanced-search.php" class="navbar-brand">JOB SEARCH</a>
			<a href="forum.php" class="navbar-brand">JOB FORUM</a></li>
			<a href="contactus.php" class="navbar-brand">RESOURCES</a></li>
			<?php include $navbartype ?>
		</div>
		
		<div class='container' style="padding-top:80px" id='maincontainer'>				
			<aside>
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