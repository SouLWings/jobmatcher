<style>
.submit-group{
	text-align:right;
}/*
fieldset input[type='text'],fieldset input[type='number']{
	width:420px;
}
textarea{
	width:420px;
}
select{
	width:420px;
}
*/
#modaleditjob .modal-dialog{
	width:650px;
}

#modaldeletejob .modal-dialog{
	width:370px;
	padding-top:20%;
}

.modal-body{
	background:linear-gradient(to bottom,#ddefff 0,#b4d3e7 100%);
	border-radius: 6px 6px 0px 0px;
}
.modal-footer{
	margin-top:0;
	background:#9EB8E6;
	border-radius:0px 0px 6px 6px;
	border:none;
}
</style>

<div class="modal fade" id="modaleditjob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<form id='editjobform' action='jobCTRL.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Edit Job</legend>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Title:</label>
							<div class='col-sm-8'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Position:</label>
							<div class='col-sm-8'>
								<input required type='text' id='inputPosition' autocomplete='off' class='form-control' placeholder='' name='position'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Specialization:</label>
							<div class='col-sm-8'>
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
							<label class='col-sm-3 control-label'>Responsibility:</label>
							<div class='col-sm-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='responsibility' rows='5' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Requirement:</label>
							<div class='col-sm-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='requirement' rows='5' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Location:</label>
							<div class='col-sm-8'>
								<input required type='text' id='inputLocation' autocomplete='off' class='form-control' placeholder='' name='location'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Salary:</label>
							<div class='col-sm-3 input-group'>
								<span class="input-group-addon">RM</span>
								<input required type='number' id='inputSalary' autocomplete='off' class='form-control' placeholder='' name='salary' step='100'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Experience:</label>
							<div class='col-sm-4 input-group'>
								<input required type='number' id='inputExperience' autocomplete='off' class='form-control' placeholder='' name='experience'/>
								<span class="input-group-addon">Year(s)</span>
							</div>
						</div>
						<input type='hidden' value='editjob' name='action'/>
						<input type='hidden' value='0' name='jobid' id='editid'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Edit'/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>

<div class="modal fade" id="modaldeletejob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='deletejob' action='jobCTRL.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to delete this job?</legend>
						<input type='hidden' value='deletejob' name='action'/>
						<input type='hidden' value='0' name='jobid' id='deleteid'/>
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