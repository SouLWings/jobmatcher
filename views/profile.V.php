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
	
    <div>
		<div style='width:200px;height:200px;' class='pull-left'>
			<img src="img/profile_pic/aid1.png" alt="" class="img-thumbnail" style='margin:auto;'>
		</div>
		<div class="panel panel-info" style='height:200px'>
			<div class="panel-heading">
				<h3 class="panel-title">Panel title</h3>
			</div>
			<div class="panel-body">
		<h2>SoulWIngs</h2>
		Joined on Aug 18, 2013
				
			</div>		
		</div>
    </div>
	
    <div class="panel panel-info" style='clear:left'>
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>		
    </div>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>