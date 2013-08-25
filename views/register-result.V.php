<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $msg - the message to be displayed
 *  
 *  --  list of tasks for this view  --
 *  style
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 header("Refresh:100; url=index.php")
?>

<?php ob_start() ?>
	
    <h2><?php echo $msg ?></h2>
	<p>Redirecting to main page in <b><span id='countdown'>100</span></b></p>
	<script>
	var x = 100;
	function countdown(){
		document.getElementById('countdown').innerHTML = --x;
	}
	setInterval("countdown()", 1030)
	</script>
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>