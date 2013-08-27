<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  job - single array of details of a job {id, jobspecialization_ID,employer_ID,date,title,position,responsibility,requirement, location, salary, experience}
 *  
 *  --  list of tasks for this view  --
 *  styles, display a proper content, a link to f
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */

?>

<?php ob_start() ?>
    <h1><?php echo $job['title'] ?></h1>

    <div class="">
		date: <?php echo $job['date'] ?><br>
        responsibility: <?php echo $job['responsibility'] ?><br>
        requirement: <?php echo $job['requirement'] ?><br>
        location: <?php echo $job['location'] ?><br>
        salary: <?php echo $job['salary'] ?><br>
        experience: <?php echo $job['experience'] ?><br>
    </div>
	
	<a href='#' class='btn btn-primary btn-sm'>Apply Job</a>
<?php	/*
if(is_logged_in()){
if($_SESSION['user']['usertype'] == 'employer' && )
{
?>
	<a href='#editjob' class='btn btn-primary btn-sm'>Edit Job</a>
	<a href='#deletejob' class='btn btn-primary btn-sm'>Delete Job</a>
<?php
}
else if()
{
?>
<?php
}
else if
{
?>	
	<a href='#' class='btn btn-primary btn-sm'>Disapprove Job</a>

<?php}}*/ $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>