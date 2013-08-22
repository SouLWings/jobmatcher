<?php
if(!isset($title))
	$title = 'UM Job Matching System';
else
	$title .= 'UM Job Matching System';
if(!isset($content))
	$content = 'Nothing to display';
if(!isset($slider))
	$slider = '';
	
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
					<li><a href="index.php">Home</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href="advanced-search.php">Job Search</a></li>
					<li><a href="match.php">Job Match</a></li>
					<li><a href="forum.php">Job Forum</a></li>
					<li><a href="contactus.php">Resources</a></li>
				</ul>
			</nav>
			
			
			<aside>
				<div id='quickjobsearch' style='width:200px'>
					<form action ='jobs.php' method = 'GET'>
						<div class="input-group">
							<input type="text" name='name' class="form-control">
							<span class="input-group-btn">
								<input class="btn btn-primary" type="submit" value='Search'>
							</span>
						</div>
						<input type='hidden' name='search'>
					</form>
				</div>
				<?php include $asideinclude ?>
			</aside>

			<section>
				<?php echo $slider ?>
			</section>
			
			<section id='contentsection'>
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
				<br>
				<p style="color:black"><small><i>&copy; 2013 UM Job Portal</i></small></p>
			</footer>			
		</div>
    </body>
</html>