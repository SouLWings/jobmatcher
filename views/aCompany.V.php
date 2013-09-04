<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $company - single array of details of a company {id,name,address,website,phone,fax,overview}
 *  
 *  --  list of tasks for this view  --
 *  styles, display a proper content
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */

?>

<?php ob_start() ?>

    <h1>
	<?php 
		echo $company['name'];
		if($editable)
			echo ' <a data-toggle="modal" href="#modaleditcompany" class="btn btn-primary btn-md" id="btneditcompany"><span class="glyphicon glyphicon-edit"></span>  Edit</a>';
	?>
	
	</h1>

    <div class="">
		address: <?php echo $company['address'] ?><br>
        website: <?php echo $company['website'] ?><br>
        phone: <?php echo $company['phone'] ?><br>
        fax: <?php echo $company['fax'] ?><br>
        overview: <?php echo $company['overview'] ?><br>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>