<style>
.modal-content .btn + .btn {
	margin-left:5px;
}
.modal-dialog{
padding-top:10%;
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

<div class="modal fade" id="addsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addsectionform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Create Section</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Section Title:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='Enter New Section Title Here' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-2 control-label'>Section Description:</label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' style='width:400px' placeholder='Enter Section Description Here'></textarea>
							</div>
						</div>
						<input type='hidden' value='addSection' name='action'/>
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
$("input[name='action']").val("editsection");
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

<div class="modal fade" id="addthread"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addthreadform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Create Thread</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Thread Title:</label>
							<div class='col-lg-4'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='Enter New Section Title Here' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-2 control-label'>Thread Description:</label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' style='width:400px' placeholder='Enter Section Description Here'></textarea>
							</div>
						</div>
						<input type='hidden' value='addThread' name='action'/>
						<input type='hidden' value="$id" name='f0id'/>
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