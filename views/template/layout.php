<?php
if(!isset($title))
	$title = 'UM Job Matching System';
else
	$title .= 'UM Job Matching System';
if(!isset($content))
	$content = 'Nothing to display';
	
$styles[] = 'bootstrap';
$styles[] = 'structure';
$scripts[] = 'jquery-1.10.2.min';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
		
		<!--styles-->
		<?php foreach ($styles as $style): ?>
		<link rel="stylesheet" type="text/css" href="/jobmatcher/css/<?php echo $style?>.css" />
		<?php endforeach; ?>
		
		<!--scripts-->
		<?php foreach ($scripts as $script): ?>
		<script type='text/javascript' src='/jobmatcher/js/<?php echo $script?>.js'></script>
		<?php endforeach; ?>
    </head>
    <body style=''>
		<div class='container'>	
			<header>
				<img src="img/header/banner.jpg" width="1170px" onclick="location.href='index.php'"/>
			</header>
			
			<nav>
				<ul class="nav nav-pills">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href="advanced-search.php">Job Search</a></li>
					<li><a href="match.php">Job Match</a></li>
					<li><a href="forum.php">Job Forum</a></li>
					<li><a href="contactus.php">Resources</a></li>
				</ul>
			</nav>
			
			
			<aside>
				aside
				<?php if(isset($_SESSION['userID']))include 'welcome.php';else include 'login.php'; ?>
			</aside>
			
			
			<section>
				<?php echo $content ?>
			</section>
			<br>
			
			<footer style='text-align:center'>
				<b>Sitemap</b></br>
				<ul>
				  <a href=""><li>Home</li></a>
				  <a href=""><li>My Profile</li></a>
				  <a href=""><li>Job Search</li></a>
				  <a href=""><li>Job Match</li></a>
				  <a href=""><li>Job Forum</li></a>
				  <a href=""><li>Contact Us</li></a>  
				</ul>
				<br>
				<p>&copy; 2013 UM Job Portal</p>
			</footer>			
		</div>
    </body>
</html>