<?php 
/*  --	defining optional variables  --
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder
 * 
 *  --  variables supplied to this page  --
 *  jobspecializations - 2 dimentional array of all job specializations {id, specialization}
 *  
 *  --  list of tasks for this view  --
 *  msg when no related result, styles, display a proper content, a link to f
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */

?>

<?php ob_start() ?>
	
	<form id='advancedsearch' action='jobs.php' method='get' class="form-horizontal">
		<fieldset>
			<legend>Advanced search</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputname'>Job name:</label>  
				<div class='col-sm-5'>
					<input autofocus type='text' id='inputname' class='form-control' value='' name='name'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputcompany'>Company name:</label>
				<div class='col-sm-5'>
					<input type='text' value='' name='company' id='inputcompany' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputlocation'>Location:</label>
				<div class='col-sm-5'>
					<input type='text' name='location' class='form-control' />
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputlocation'>Job Type:</label>
				<div class='col-sm-5'>
					<select name='type' class='form-control' id='selectjobtype'>
						<option value='Permanent'>
							Permanent
						</option>
						<option value='Short term'>
							Short term
						</option>
						<option value='Internship'>
							Internship
						</option>
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputlocation'>Job Specialization:</label>
				<div class='col-sm-5'>
					<select name='jobspecializationid' class='form-control'>
						<?php foreach ($jobspecializations as $jobspecialization): ?>
							<option value='<?php echo $jobspecialization['id'] ?>'>
								<?php echo $jobspecialization['specialization'] ?>
							</option>
						<?php endforeach; ?>					
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputSalary'>Minimun Monthly Salary: </label>
				<div class='col-sm-2 input-group'>
					<span class="input-group-addon">RM</span>
					<input style='text-transform: uppercase;' type='text' autocomplete='off' value='' name='salarymin' id='inputsalarymin' class='form-control masterTooltip' pattern='[0-9]{3,7}' title='eg.2000'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputSalary'>Maximum Monthly Salary: </label>
				<div class='col-sm-2 input-group'>
					<span class="input-group-addon">RM</span>
					<input style='text-transform: uppercase;' type='text' autocomplete='off' value='' name='salarymax' id='inputsalarymax' class='form-control masterTooltip' pattern='[0-9]{3,7}' title='eg.5000'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputRoom'>Minimum Experience:</label>
				<div class='col-sm-2 input-group'>
					<select name='experiencemin' class='form-control'><option>0</option> <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> </select>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label' for='inputRoom'>Maximum Experience:</label>
				<div class='col-sm-2 input-group'>
					<select name='experiencemax' class='form-control'><option>0</option> <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option> </select>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-sm-3 col-sm-offset-3'>
					<input type='submit' class='btn btn-primary' value='Search Job'/>
				</div>
			</div>
			<input type='hidden' name='search'>
		</fieldset>
	</form>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>