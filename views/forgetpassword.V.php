<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $user - single dimention array {id,name}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$scripts[] = 'forgetpassword';
?>

<?php ob_start() ?>
	
	<form id='resetpasswordform' action='forgetpassword.php' method='POST' class="form-horizontal">
		<fieldset>
			<legend>Reset password</legend>
			<div class='form-group'>
				<label class='col-sm-4 control-label'>Username:</label>  
				<div class='col-sm-6'>
					<p class="form-control-static"><?php echo $user['name'] ?></p>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label'>New password:</label>  
				<div class='col-sm-6'>
					<input required type='password' id='newpw' class='form-control' value='' name='pw'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label'>Repeat password:</label>  
				<div class='col-sm-6'>
					<input required type='password' id='newpw2' class='form-control' value='' name='pw2'/>
				</div>
			</div>
			<input type='hidden' name='aid' value='<?php echo $user['id']?>'/>
			<div class='form-group'>
				<div class='col-sm-3 col-sm-offset-4'>
					<input id='btnresetsubmit' type='submit' class='btn btn-primary' value='Reset password'/>
				</div>
			</div>
		</fieldset>
	</form>

	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>