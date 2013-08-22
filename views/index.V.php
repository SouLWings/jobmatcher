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
 
$styles[] = 'slider';
$styles[] = 'content';

?>

<?php ob_start() ?>
<div id="slider">
	<div id="mask">
	<ul>
		<li id="first" class="firstanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_1.jpg" alt="Cougar"/>
			</a>
			<div class="tooltiplinktext">
				<h1>Cougar</h1>
			</div>
		</li>

		<li id="second" class="secondanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_2.jpg" alt="Lions"/>
			</a>
			<div class="tooltiplinktext">
				<h1>Lions</h1>
			</div>
		</li>
		
		<li id="third" class="thirdanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_3.jpg" alt="Snowalker"/>
			</a>
			<div class="tooltiplinktext">
				<h1>Snowalker</h1>
			</div>
		</li>
					
		<li id="fourth" class="fourthanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_4.jpg" alt="Howling"/>
			</a>
			<div class="tooltiplinktext">
				<h1>Howling</h1>
			</div>
		</li>
					
		<li id="fifth" class="fifthanimation">
			<a href="#">
				<img src="/jobmatcher/img/slider/img_5.jpg" alt="Sunbathing"/>
			</a>
			<div class="tooltiplinktext">
				<h1>Sunbathing</h1>
			</div>
		</li>
	</ul>
	</div>
	<div class="sliderprogress"></div>
</div>			
<div style='clear:left'></div>

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

<?php include 'template/layout.php' ?>