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
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='responsibility' rows='3' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Requirement:</label>
							<div class='col-sm-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='requirement' rows='3' placeholder=''></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Type:</label>
							<div class='col-sm-8'>
								<select name='type' class='form-control' id='selectjobtype'>
									<option value='Permenant'>
										Permenant
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
						<input type='submit' class='btn btn-primary btn-xs' value='Edit'/>
						<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
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
							<input type='submit' class='btn btn-primary btn-xs' value='Confirm'/>
							<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>

<div class="modal fade" id="modalcriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<form id='editcriteriaform' action='jobCTRL.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Edit Criteria</legend>
						<input type='hidden' value='updatecriteria' name='action'/>
						<input type='hidden' value='10' name='jobid' id='editid'/>
						<div class='form-group'>
							<label class='col-sm-1 control-label'>No</label>
							<label class='col-sm-2 control-label'>Criteria</label>
							<label class='col-sm-7 control-label'>Min rating </label>
						</div>
						<div id='criterialist'>
							<!-- content loaded from job.AJAX.php -->
						</div>
						<div class='form-group'>
							<button type="button" class="col-sm-offset-1 btn btn-primary btn-xs" style='margin-left:60px;' id='btnaddcriteria'>
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						</div>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary btn-sm' value='Save'/>
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>
