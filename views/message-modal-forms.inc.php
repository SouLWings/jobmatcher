<style>
.submit-group{
	text-align:right;
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

<div class="modal fade" id="modalchat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<form id='chatform' action='messageAJAX.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Send new message</legend>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>To:</label>
							<div class='col-sm-7'>
								<p class="form-control-static"><?php echo $user['firstname'].' '.$user['lastname'] ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Message:</label>
							<div class='col-sm-9'>
								<textarea id='inputmsg' rows=5 cols=70 name='content'></textarea>
							</div>
						</div>
						<input type='hidden' value='sendnewmsg' name='action'/>
						<input type='hidden' value='<?php echo intval($_GET['id'])?>' name='id'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Send'/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>
