<?php 
/*  --	defining optional variables  --
 *  $title - add title of the page, eg. ;
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder
 * 
 *  --  variables supplied to this page  --
 *  tadak
 * 
 *  --  thgs to add  --
 *  js to validate all input fields upon form submittion, show tooltips for invalid fields
 *  pop up msg telling user to come back tomorrow to log in
 *  
 *  --  printing variable  --
 *  <?php echo $ ?>
 */
 $title = 'New account registration';
?>

<?php ob_start() ?>
	<form id='register' action='register.php' method='get' class="form-horizontal">
		<fieldset>
			<legend>Register new account</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputname'>Username:</label>  
				<div class='col-sm-4'>
					<input autofocus type='text' id='inputname' class='form-control' value='' name='username'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputpassword'>Password:</label>
				<div class='col-sm-2'>
					<input type='password' value='' name='password' id='inputpassword' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputrpassword'>Repeat Password:</label>
				<div class='col-sm-2'>
					<input type='password' value='' name='rpassword' id='inputrpassword' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputemail'>Email:</label>
				<div class='col-sm-2'>
					<input type='email' value='' name='email' id='inputemail' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputusertype'>I am a...</label>
				<div class='col-sm-2'>
					<select name='usertype' class='form-control'><option>Job seeker</option> <option>Employer</option></select>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-sm-3 col-sm-offset-3'>
					<input type='submit' class='btn btn-primary' value='Request Account'/>
				</div>
			</div>
		</fieldset>
	</form>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>