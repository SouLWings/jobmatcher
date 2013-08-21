<?php
if(!isset($title))
	$title = 'UM Job Matching System';
else
	$title .= 'UM Job Matching System';
if(!isset($content))
	$content = 'Nothing to display';
	
$styles[] = 'structure';
$styles[] = 'bootstrap';
$scripts[] = 'jquery-1.10.2.min';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
		
		<!--styles-->
		<?php foreach (array_reverse($styles) as $style): ?>
		<link rel="stylesheet" type="text/css" href="/jobmatcher/css/<?php echo $style?>.css" />
		<?php endforeach; ?>
		
		<!--scripts-->
		<?php foreach (array_reverse($scripts) as $script): ?>
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
				<?php include $asideinclude ?>
			</aside>
<div id="slider">
	<div id="mask">
	<ul>
		<li id="first" class="firstanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_1.jpg" alt="Cougar"/>
			</a>
			<div class="tooltip">
				<h1>Cougar</h1>
			</div>
		</li>

		<li id="second" class="secondanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_2.jpg" alt="Lions"/>
			</a>
			<div class="tooltip">
				<h1>Lions</h1>
			</div>
		</li>
		
		<li id="third" class="thirdanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_3.jpg" alt="Snowalker"/>
			</a>
			<div class="tooltip">
				<h1>Snowalker</h1>
			</div>
		</li>
					
		<li id="fourth" class="fourthanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_4.jpg" alt="Howling"/>
			</a>
			<div class="tooltip">
				<h1>Howling</h1>
			</div>
		</li>
					
		<li id="fifth" class="fifthanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_5.jpg" alt="Sunbathing"/>
			</a>
			<div class="tooltip">
				<h1>Sunbathing</h1>
			</div>
		</li>
	</ul>
	</div>
	<div class="progress-bar"></div>
</div>			
			
			<section style='clear:left'>
				<?php echo $content ?>
			</section>
			
			<section>
				<div class='alert alert-info'>every job also need position</div>
				<div class='alert alert-info'>company will have a table</div>
				<div class='alert alert-info'>employer will hv a table</div>
				<div class='alert alert-info'>1 company can hv many account</div>


			</section>
			
			
			<footer>
				<b>Sitemap</b>
				<ul>
				  <a href=""><li>Home</li></a>
				  <a href=""><li>My Profile</li></a>
				  <a href=""><li>Job Search</li></a>
				  <a href=""><li>Job Match</li></a>
				  <a href=""><li>Job Forum</li></a>
				  <a href=""><li>Contact Us</li></a>  
				</ul>
				
				<p>&copy; 2013 UM Job Portal</p>
			</footer>			
		</div>
    </body>
</html>