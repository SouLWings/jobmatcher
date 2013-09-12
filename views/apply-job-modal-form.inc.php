<div class="modal fade" id="modalfillincriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<form id='fillincriteriaform' action='apply-jobAJAX.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Complete the survey</legend>
						<div class='form-group'>
							<label class='col-sm-1 control-label'>No.</label>
							<label class='col-sm-3 control-label'>Criteria</label>
							<label class='col-sm-7 control-label'>Rate yourself</label>
						</div>
						<?php $x=1; foreach ($criterias as $c): ?>
						<div id='criterialist'>
							<div class='form-group criteria'>
								<label class='col-sm-1 control-label'><?php echo $x ?></label>
								<div class='col-sm-7 col-sm-offset-1'>
									<p class="form-control-static"><?php echo $c['name'] ?></p>
								</div>
								<div class='col-sm-2 input-group'>
									<input type='hidden' name='criteria<?php echo $x ?>' value='<?php echo $c['name'] ?>'/>
									<input required type='number' id='inputExperience' autocomplete='off' class='form-control' value='1' name='jsrating<?php echo $x ?>' max='5' min='1'/>
								</div>
							</div>							
						</div>
						<?php $x++; endforeach; ?>
						
						<input type='hidden' value='applyjob' name='action'/>
						<input type='hidden' value='<?php echo $job['id'] ?>' name='jobid' id='editid'/>
						<input type='hidden' value='<?php echo $x ?>' name='criteriacount' id='editid'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary btn-sm' value='Submit'/>
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>
