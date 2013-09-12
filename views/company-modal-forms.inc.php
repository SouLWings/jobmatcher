<div class="modal fade" id="modaleditcompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<form id='editjobform' action='jobCTRL.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Edit Company Details</legend>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Name:</label>
							<div class='col-sm-9'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='' name='name' value='<?php echo $company['name'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Address:</label>
							<div class='col-sm-9'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='address' rows='3' placeholder=''><?php echo nl2br($company['address']) ?></textarea>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Website:</label>
							<div class='col-sm-9'>
								<input required type='text' id='inputWebsite' autocomplete='off' class='form-control' placeholder='' name='website' value='<?php echo $company['website'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Phone:</label>
							<div class='col-sm-4'>
								<input required type='tel' id='inputPhone' autocomplete='off' class='form-control' placeholder='' name='phone' value='<?php echo $company['phone'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Fax:</label>
							<div class='col-sm-4'>
								<input required type='tel' id='inputFax' autocomplete='off' class='form-control' placeholder='' name='fax' value='<?php echo $company['fax'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Overview:</label>
							<div class='col-sm-9'>
								<textarea required class='form-control' spellcheck='false' name='overview' rows='7' placeholder=''><?php echo $company['overview'] ?></textarea>
							</div>
						</div>
						<input type='hidden' value='editcompany' name='action'/>
						<input type='hidden' value='<?php echo $id?>' name='cid'/>
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
