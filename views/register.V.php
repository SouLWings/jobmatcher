<?php 
/*  --	defining optional variables  --
 *  $title - add title of the page, eg. ;
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page  --
 *  $companies - 2 dimentional array of {id,name} 
 * 
 *  --  thgs to add  --
 *  js to validate all input fields upon form submittion, show tooltips for invalid fields, form group success n danger for correct n incorrect info
 *  pop up msg telling user to check email whn approved
 *  change usertype input to radio
 *  echo post value for all input fields
 *  
 *  --  printing variable  --
 *  <?php echo $ ?>
 */
 $title = 'New account registration';
 $scripts[] = 'register';
?>

<?php ob_start() ?>
	<form id='registerform' action='register.php' method='POST' class="form-horizontal">
		<fieldset>
			<legend>Register new account</legend>
			<div class='form-group'>
				<label class='col-sm-4 control-label' for='inputname'>Username:</label>  
				<div class='col-sm-4'>
					<input autofocus required type='text' id='inputname' class='form-control' value='' name='username'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label' for='inputpassword'>Password:</label>
				<div class='col-sm-4'>
					<input required type='password' value='' name='password' id='inputpassword' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label' for='inputrpassword'>Repeat Password:</label>
				<div class='col-sm-4'>
					<input required type='password' value='' name='rpassword' id='inputrpassword' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label' for='inputemail'>Email:</label>
				<div class='col-sm-4'>
					<input required type='email' value='' name='email' id='inputemail' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-4 control-label' for='inputusertype'>Account type:</label>
				<div class='col-sm-4'>
					<select name='usertype' class='form-control' id='inputusertype'><option value=''>Please choose one</option> <option value='jobseeker'>Job seeker</option> <option value='employer'>Employer</option></select>
				</div>
			</div>
			<div id='commonform'>
				<div class='form-group'>
					<label class='col-sm-4 control-label' for='inputfirstname'>First name:</label>
					<div class='col-sm-4'>
						<input required type='text' value='' name='firstname' id='inputfirstname' class='form-control masterTooltip'/>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-4 control-label' for='inputlastname'>Last name:</label>
					<div class='col-sm-4'>
						<input required type='text' value='' name='lastname' id='inputlastname' class='form-control masterTooltip'/>
					</div>
				</div>
			</div>
			<div id='jobseekerform'>
				<div class='form-group'>
					<label class='col-sm-4 control-label' for='inputmatric'>Matric number:</label>
					<div class='col-sm-4'>
						<input type='text' value='' name='matric' id='inputmatric' class='form-control masterTooltip'/>
					</div>
				</div>
			</div>
			<div id='employerform'>
				<div class='form-group'>
					<label class='col-sm-4 control-label' for='inputposition'>Position:</label>
					<div class='col-sm-4'>
						<input type='text' value='' name='position' id='inputposition' class='form-control masterTooltip'/>
					</div>
				</div>
				<div class='form-group'>
					<label class='col-sm-4 control-label' >Please choose an option for your company:</label>
					<div class='col-sm-4'>
						<label class="radio-inline">
							<input type="radio" id="radio1" value="create" name='companyoption'> Create new company
						</label>
						<label class="radio-inline">
							<input type="radio" id="radio2" value="choose" name='companyoption'> Choose from a list of existing company
						</label>
					</div>
				</div>
				<div id='employeroption1'>
					<div class='form-group'>
						<label class='col-sm-4 control-label' for='inputcompany'>Company:</label>
						<div class='col-sm-6'>
							<select name='companyid' class='form-control' id='inputcompany'>
								<option value=''>Please choose one</option>
								<?php foreach ($companies as $company): ?>
								<option value='<?php echo $company['id']?>'><?php echo $company['name']?></option> 
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div id='employeroption2'>
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company name:</label>
						<div class='col-sm-4'>
							<input type='text' value='' name='cname' id='inputmatric' class='form-control masterTooltip'/>
						</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company addree:</label>
						<div class='col-sm-4'>
							<textarea name='caddress' id='inputcaddress' class='form-control masterTooltip'></textarea>
						</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company website:</label>
						<div class='col-sm-4'>
							<input type='text' value='' name='cwebsite' id='inputcwebsite' class='form-control masterTooltip'/>
						</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company phone:</label>
						<div class='col-sm-4'>
							<input type='text' value='' name='cphone' id='inputcphone' class='form-control masterTooltip'/>
						</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company fax:</label>
						<div class='col-sm-4'>
							<input type='text' value='' name='cfax' id='inputcfax' class='form-control masterTooltip'/>
						</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-4 control-label'>Company overview:</label>
						<div class='col-sm-4'>
							<textarea name='coverview' id='inputcoverview' class='form-control masterTooltip'></textarea>
						</div>
					</div>				
				</div>
			</div>
			
			<div class='form-group'>
				<div class='col-sm-3 col-sm-offset-4'>
					<input id='registrationsubmit' type='submit' class='btn btn-primary' value='Request Account'/>
				</div>
			</div>
		</fieldset>
	</form>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>