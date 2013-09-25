<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $example - explaination/details of the variable
 *  
 *  --  list of tasks for this view  --
 *  jobspecializations - 2 dimentional array of all job specializations {id, specialization}
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
//$styles[] = 'slider';
$styles[] = 'content';

?>


<?php ob_start() ?>

	
<div id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<img src="img/header/banner.jpg" alt="First slide" >
			<div class="container">
				<div class="carousel-caption">
					<h1>UM Job Portal</h1>
					<p>The connector between the fresh graduates and the industries</p>
					<p><a class="btn btn-large btn-primary" href="register.php"><span class="glyphicon glyphicon-ok"></span> Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="img/slider/s3.jpg" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Looking for jobs?</h1>
					<p>View job advertisements in no time.</p>
					<p>
						<form action ='jobs.php' method = 'GET'>
							<input type="text" name='name' class="form-control" placeholder="Type job name here" style='text-align:center'>
							<br>
							<button type='submit' class="btn btn-large btn-primary" href="#"><span class="glyphicon glyphicon-search"></span> Search job</button>
							<input type='hidden' name='search'>
						</form>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
		  <img src="img/slider/s4.jpg" alt="Third slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Career Advice</h1>
					<p>Check out the articles available in the portal.</p>
					<p><a class="btn btn-large btn-primary" href="articles.php"><span class="glyphicon glyphicon-hand-right"></span> Browse Resource</a></p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<?php $slider = ob_get_clean() ?>

<?php ob_start() ?>

	
<div class="browsejob">
	<h2>Browse Job</h2>
<div class="browsejob2">
	<ul>
	<?php foreach ($jobspecializations as $jobspecialization): ?>
		<li>
			<a href="jobs.php?typeid=<?php echo $jobspecialization['id'] ?>">
				<?php echo $jobspecialization['specialization'] ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

</div>

<?php $content = ob_get_clean() ?>

<?php include 'views/template/layout.php' ?>