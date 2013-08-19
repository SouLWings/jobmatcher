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
				this is header
			</header>
			
			
			<nav>
				home | Search job | forum | Resource | about us
			</nav>
			
			
			<aside>
				aside
				<?php if(isset($_SESSION['userID']))include 'welcome.php';else include 'login.php'; ?>
			</aside>
			
			
			<section>
				<?php echo $content ?>
			</section>
			
			
			<footer>
				this is footer
			</footer>
			
		</div>
    </body>
</html>