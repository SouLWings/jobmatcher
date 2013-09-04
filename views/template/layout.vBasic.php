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
$styles[] = 'bootstrap-theme';
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
					<li><a href="forum.php">Job Forum</a></li>
					<li><a href="articles.php">Resources</a></li>
				</ul>
			</nav>
		
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
				<?php echo $content ?>
			</section>			
			
			<footer>
				<ul>
				  <li><a href="index.php">Home</a></li>
				  <li><a href="aboutus.php">About Us</a></li>
				  <li><a href="advanced-search.php">Job Search </a></li>
				  <li><a href="match.php">Job Match </a></li>
				  <li><a href="forum.php">Job Forum </a></li>
				  <li><a href="contactus.php">Send Enquiry</a></li> 
				  <li>&copy; 2013 UM Job Portal</li>
				</ul>
			</footer>

			<?php 
			foreach ($modalforms as $modalform): 
				include "views/$modalform".'.inc.php';
			endforeach; 
			?>			
		</div>
    </body>
</html>