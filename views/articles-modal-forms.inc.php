<div class="modal fade" id="modaladdarticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<form id='addarticleform' action='articles.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Add article</legend>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Title:</label>
							<div class='col-sm-8'>
								<input required type='text' id='' autocomplete='off' class='form-control' placeholder='' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Content:</label>
							<div class='col-sm-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='content' rows='13' placeholder=''></textarea>
							</div>
						</div>
						<input type='hidden' value='addarticle' name='action'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary btn-xs' value='Add'/>
						<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>

<div class="modal fade" id="modaleditarticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<form id='editarticleform' action='articles.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Edit article</legend>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Title:</label>
							<div class='col-sm-8'>
								<input required type='text' id='edittitle' autocomplete='off' class='form-control' placeholder='' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-3 control-label'>Content:</label>
							<div class='col-sm-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='content' rows='13' id='editcontent'></textarea>
							</div>
						</div>
						<input type='hidden' value='editarticle' name='action'/>
						<input type='hidden' value='0' name='articleid' id='editid'/>
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

<div class="modal fade" id="modaldeletearticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='deletearticleform' action='articles.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to delete this article?</legend>
						<input type='hidden' value='deletearticle' name='action'/>
						<input type='hidden' value='0' name='articleid' id='deleteid'/>
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