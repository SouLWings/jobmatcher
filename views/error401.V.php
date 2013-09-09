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
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
?>

<?php ob_start() ?>
	
    <h1>Error: 401 <span class="glyphicon glyphicon-minus-sign"></span> Access denied.</h1>

    <div class="">
<<<<<<< HEAD:views/error401.V.php
		Authorization failed by filter. You are not logged in or your account doesn't seems to have the privilege to view the content of the page.
=======
		Authorization failed by filter. Your account doesn't seems to have the privilege to view the content of the page.
>>>>>>> origin/llaw:views/error401.V.php
	</div>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>