<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder
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
	
    <h1><?php echo $variable ?></h1>

    <div class="date">
		<?php echo $array['parameter'] ?>
	</div>
	
	<?php foreach ($single_layer_array as $single): ?>
		<?php echo $single ?>
	<?php endforeach; ?>
	
	<?php foreach ($multi_dimentional_array as $array): ?>
		<ul>
			<li><?php echo $array['parameter'] ?></li>
			<li><?php echo $array['parameter'] ?></li>
			<li><?php echo $array['parameter'] ?></li>
		</ul>
	<?php endforeach; ?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>