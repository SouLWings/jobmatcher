<?php
if(!isset($title))
	$title = 'UM Job Matching System';
else
	$title .= 'UM Job Matching System';
if(!isset($content))
	$content = 'Nothing to display';
if(!isset($slider))
	$slider = '';
<<<<<<< HEAD
if(!isset($aside))
	$aside = '';
=======
>>>>>>> origin/llaw
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
<<<<<<< HEAD
	$('.carousel').carousel()
	$("#forgetpwform").hide();
=======
>>>>>>> origin/llaw
	$("#signinbtn").click(function(){
		$("#signinbar").toggleClass('dropdowntoggle');
		//$("#maincontainer").toggleClass('dropdowntoggle');
		$(this).toggleClass('active');
	});
<<<<<<< HEAD
	
	//
	$("#forgetpw").click(function(){
		$("#signinform").toggle(500);
		$("#forgetpwform").toggle(500);
		if($(this).text() == 'Forget password?')
			$(this).text('Sign in');
		else
			$(this).text('Forget password?');
	});
	
	$('#forgetpwform').submit(function(event) {
		$("button[type='submit']").prop('disabled',true);
		var form = $(this);
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function(data) 
			{
				alert(data);
			}
		}).fail(function() {
			alert("Fail to connect to server");
		}).done(function() {
			$("button[type='submit']").prop('disabled',false);
		});
		event.preventDefault();
	});
});
</script>
    </head>
    <body style="margin-top:50px">
		<!-- sign in menu bar -->
		<div class="navbar-fixed-top hidebehind" id='signinbar' style=''>
			<div id='' class="pull-right navbar-btn" >
				<form class="form-inline form-signin" action="loginCTRL.php" method="POST" id='signinform'>
=======
});
</script>
    </head>
    <body style=''>
		<div class="navbar-fixed-top hidebehind" id='signinbar' style=''>
			<div id='' class="pull-right navbar-btn" >
				<form class="form-inline form-signin" action="loginCTRL.php" method="POST">
>>>>>>> origin/llaw
					<div class="form-group">
						<input type="text" class="form-control" id="loginusername" name='loginusername' placeholder="Username" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required >
					</div>
					<button class="btn btn-primary" type="submit">Sign in</button>
<<<<<<< HEAD
				</form>				
				<form class="form-inline form-signin" action="profile.php" method="GET" id='forgetpwform' style='margin-right:158px;'>
					<div class="form-group">
						<input type="email" class="form-control" id="loginusername" name='email' placeholder="Email" required>
					</div>
					<input type='hidden' name='action' value='forgetpw'/>
					<button class="btn btn-primary" type="submit">Send email</button>
				</form>
				<p id='forgetpw'>Forget password?</p>
=======
				</form>
>>>>>>> origin/llaw
			</div>
			<div id='' class="pull-right navbar-btn">
				<?php echo $errormsg ?>
			</div>
		</div>
<<<<<<< HEAD
		
		<!-- top menu bar -->
=======
>>>>>>> origin/llaw
		<div class="navbar-fixed-top">
			<p class="navbar-text">UMJM logo</p>
			<a href="index.php" class="navbar-brand">HOME</a>
			<a href="advanced-search.php" class="navbar-brand">JOB SEARCH</a>
			<a href="forum.php" class="navbar-brand">JOB FORUM</a></li>
<<<<<<< HEAD
			<a href="articles.php" class="navbar-brand">RESOURCES</a></li>
			<?php include $navbartype ?>
		</div>
		
		<div>
			<?php echo $slider ?>
		</div>
		<!-- container for the main content -->
		<div class='container' id='maincontainer'>				
			<aside>
				<?php echo $aside ?>
=======
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
>>>>>>> origin/llaw
			</aside>
			
			<section id='contentsection'>
				<?php echo $content ?>
			</section>			
			
			<?php 
			foreach ($modalforms as $modalform): 
				include "views/$modalform".'.inc.php';
			endforeach; 
			?>			
		</div>
<<<<<<< HEAD
		
		
		<!-- footer -->
		<footer>
			<div class='container'>
				<ul>
					<li><a href="contactus.php">Send Enquiry</a></li> 
					<li><a href="aboutus.php">About Job Portal</a></li>
					<li><a href="http://portal.um.edu.my/">UM portal</a></li>
					<li class='pull-right'>&copy; 2013 UM Job Portal</li>
=======
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
>>>>>>> origin/llaw
				</ul>
			</div>		
		</footer>
    </body>
</html>