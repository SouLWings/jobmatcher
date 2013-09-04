<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $resume - singular array of {id(resume),jboseeker_ID,fullname, ic,matric,gender,address, phone, email, dateofbirth, faculty, programme, graduationdate, cgpa, skills, personalities, additionaldescription}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
?>

<?php ob_start() ?>
	<h1>My resume <?php if($ut=='jobseeker')echo "<a href='resume.php?edit' class='btn btn-sm btn-primary'><span class='glyphicon glyphicon-edit'></span> Edit</a>" ?></h1>
	
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Personal Info</h3>
		</div>
		<div class="panel-body" style='height:125px;'>			
			Full name:<?php echo $resume['fullname'] ?><br>
			Date of birth:<?php echo $resume['dateofbirth'] ?><br>
			I/C number:<?php echo $resume['ic'] ?><br>
			Matric number:<?php echo $resume['matric'] ?><br>
			Gender:<?php echo $resume['gender'] ?>
		</div>		
    </div>
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Contact Info</h3>
		</div>
		<div class="panel-body" style='height:85px;'>			
			Address:<?php echo $resume['address'] ?><br>
			Phone:<?php echo $resume['phone'] ?><br>
			Email:<?php echo $resume['email'] ?>
		</div>		
    </div>
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Educational Background</h3>
		</div>
		<div class="panel-body" style='height:100px;'>			
			Faculty:<?php echo $resume['faculty'] ?><br>
			Programme:<?php echo $resume['programme'] ?><br>
			CGPA:<?php echo $resume['cgpa'] ?><br>
			Graduation date:<?php echo $resume['graduationdate'] ?>
		</div>		
    </div>
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Skills</h3>
		</div>
		<div class="panel-body" style='height:100px;'>			
			<?php echo $resume['skills'] ?>
		</div>		
    </div>
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Personality</h3>
		</div>
		<div class="panel-body" style='height:100px;'>			
			<?php echo $resume['personalities'] ?>
		</div>		
    </div>
    <div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Additional Description</h3>
		</div>
		<div class="panel-body" style='height:100px;'>			
			<?php echo $resume['additionaldescription'] ?>
		</div>		
    </div>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>