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
	<h1>Update resume</h1>
	<form id='resumeform' action='resume.php' method='POST' class="form-horizontal">
		<fieldset>
			<legend>Personal Details</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Full name:</label>  
				<div class='col-sm-4'>
					<input autofocus required type='text' id='' class='form-control' value='<?php echo $resume['fullname'] ?>' name='fullname'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Identity card number:</label>  
				<div class='col-sm-4'>
					<input  required type='text' id='' class='form-control' value='<?php echo $resume['ic'] ?>' name='ic'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Matric number:</label>  
				<div class='col-sm-4'>
					<input  required type='text' id='' class='form-control' value='<?php echo $resume['matric'] ?>' name='matric'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Gender:</label>  
				<div class='col-sm-4'>
					<input  required type='text' id='' class='form-control' value='<?php echo $resume['gender'] ?>' name='gender'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Date of birth:</label>
				<div class='col-sm-3'>
					<input required type='date' value='<?php echo $resume['dateofbirth'] ?>' name='dateofbirth' id='' class='form-control masterTooltip'/>
				</div>
			</div>
			<legend>Contact Details</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Address:</label>
				<div class='col-sm-6'>
					<textarea required class='form-control' spellcheck='false' autocomplete='off' name='address' rows='3' placeholder=''><?php echo $resume['address'] ?></textarea>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Phone:</label>
				<div class='col-sm-2'>
					<input required type='tel' value='<?php echo $resume['phone'] ?>' name='phone' id='inputphone' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Email:</label>
				<div class='col-sm-3'>
					<input required type='email' value='<?php echo $resume['email'] ?>' name='email' id='inputemail' class='form-control masterTooltip'/>
				</div>
			</div>
			<legend>Educational Details</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Faculty:</label>
				<div class='col-sm-4'>
					<input required type='text' value='<?php echo $resume['faculty'] ?>' name='faculty' id='' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Programme:</label>
				<div class='col-sm-4'>
					<input required type='text' value='<?php echo $resume['programme'] ?>' name='programme' id='' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Date of graduation:</label>
				<div class='col-sm-3'>
					<input required type='date' value='<?php echo $resume['graduationdate'] ?>' name='graduationdate' id='' class='form-control masterTooltip'/>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>CGPA:</label>
				<div class='col-sm-2'>
					<input required type='text' value='<?php echo $resume['cgpa'] ?>' name='cgpa' id='' class='form-control masterTooltip'/>
				</div>
			</div>
			<legend>Additional Details</legend>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Skills:</label>
				<div class='col-sm-6'>
					<textarea required class='form-control' spellcheck='false' autocomplete='off' name='skills' rows='3' placeholder=''><?php echo $resume['skills'] ?></textarea>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Personalities:</label>
				<div class='col-sm-6'>
					<textarea required class='form-control' spellcheck='false' autocomplete='off' name='personalities' rows='3' placeholder=''><?php echo $resume['personalities'] ?></textarea>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Additional description:</label>
				<div class='col-sm-6'>
					<textarea required class='form-control' spellcheck='false' autocomplete='off' name='additionaldescription' rows='3' placeholder=''><?php echo $resume['additionaldescription'] ?></textarea>
				</div>
			</div>
			<input type='hidden' value='<?php echo $resume['id']?>' name='rid'/>
			<div class='form-group'>
				<div class='col-sm-3 col-sm-offset-3'>
					<input id='registrationsubmit' type='submit' class='btn btn-primary' value='Update'/>
					<a href='<?php echo $referer ?>' class='btn	 btn-primary'>Return</a>
				</div>
			</div>
		</fieldset>
	</form>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>