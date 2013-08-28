<style>
.modal-content .btn + .btn {
	margin-left:5px;
}
.submit-group{
	text-align:right;
}
fieldset input[type='text']{
	width:400px;
}
textarea{
	width:400px;
}
</style>

<div class="modal fade" id="modaleditjob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='editjobform' action='jobCTRL.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Edit Job</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Job Title:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Position:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputPosition' autocomplete='off' class='form-control' placeholder='' name='position'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label' for='inputlocation'>Job Specialization:</label>
							<div class='col-sm-2'>
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
							<label for='inputAddress' class='col-lg-2 control-label'>Responsibility:</label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='responsibility' rows='3' style='width:400px' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-2 control-label'>Requirement:</label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='requirement' rows='3' style='width:400px' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-2 control-label'>Location:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputLocation' autocomplete='off' class='form-control' placeholder='' name='location'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-2 control-label'>Salary:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputSalary' autocomplete='off' class='form-control' placeholder='' name='salary'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-2 control-label'>Experience:</label>
							<div class='col-lg-4'>
								<input required type='number' id='inputExperience' autocomplete='off' class='form-control' placeholder='' name='experiece'/>
							</div>
						</div>
						<input type='hidden' value='editjob' name='action'/>
						<div class='submit-group'>
							<input type='submit' class='btn btn-primary' value='Confirm'/>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>
<script>
//$("input[name='action']").val("editsection");
</script>
<div class="modal fade" id="editsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='editsectionform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Edit Section</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Section Title:</label>
							<div class='col-lg-4'>
								<input required type='text' type='text' id='inputName' autocomplete='off' class='form-control' value='' name='name'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-2 control-label'>Section Description:</label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' style='width:400px'></textarea>
							</div>
						</div>
						<input type='hidden' value='editsection' name='action'/>
						<div class='submit-group'>
							<input type='submit' class='btn btn-primary' value='Confirm'/>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>