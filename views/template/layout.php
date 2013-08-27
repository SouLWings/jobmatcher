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
				<div id='login'><?php include $asideinclude ?></div>
				<br><br>
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
				top company
				<br>
				featured job
				<br>
				resource - HR corner
			</aside>

			
			
			<section id='contentsection'>
				<section id='slidersection'>
					<?php echo $slider ?>
				</section> 
				<?php echo $content ?>
			</section>			
			
			<footer>
				<b>Sitemap</b>
				<ul>
				  <a href=""><li>Home</li></a>
				  <a href=""><li>About Us</li></a>
				  <a href=""><li>Job Search</li></a>
				  <a href=""><li>Job Match</li></a>
				  <a href=""><li>Job Forum</li></a>
				  <a href=""><li>Send Enquiry</li></a>
				</ul>
				<br>
				<p style="color:black"><small><i>&copy; 2013 UM Job Portal</i></small></p>
			</footer>

			<?php 
			foreach ($modalforms as $modalform): 
				include "views/$modalform".'.inc.php';
			endforeach; 
			?>			
		</div>
    </body>
</html>