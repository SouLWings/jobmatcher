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
#modaleditcompany .modal-dialog{
	width:800px;
}
</style>
<div class="modal fade" id="modaleditprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<form id='editprofileform' action='profile.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Edit Profile</legend>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>First name:</label>
							<div class='col-sm-9'>
								<input required type='text' id='' autocomplete='off' class='form-control' placeholder='' name='firstname' value='<?php echo $user['firstname'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Last name:</label>
							<div class='col-sm-9'>
								<input required type='text' id='' autocomplete='off' class='form-control' placeholder='' name='lastname' value='<?php echo $user['lastname'] ?>'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Email:</label>
							<div class='col-sm-9'>
								<input required type='text' id='' autocomplete='off' class='form-control' placeholder='' name='email' value='<?php echo $user['email'] ?>'/>
							</div>
						</div>
						<input type='hidden' value='editprofile' name='action'/>
						<input type='hidden' value='<?php echo intval($_GET['id'])?>' name='id'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Save'/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>
<div class="modal fade" id="modalchgpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<form id='editpwform' action='profile.php' method='post' class='form-horizontal'>
				<fieldset>
					<div class="modal-body">
						<legend>Change Password</legend>
						<div class='form-group'>
							<label class='col-sm-4 control-label'>Old password:</label>
							<div class='col-sm-7'>
								<input required type='password' id='' autocomplete='off' class='form-control' placeholder='' name='oldpw'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-4 control-label'>New password:</label>
							<div class='col-sm-7'>
								<input required type='password' id='' autocomplete='off' class='form-control' placeholder='' name='newpw'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-4 control-label'>Repeat new password:</label>
							<div class='col-sm-7'>
								<input required type='password' id='' autocomplete='off' class='form-control' placeholder='' name='newpw2'/>
							</div>
						</div>
						<input type='hidden' value='editpw' name='action'/>
						<input type='hidden' value='<?php echo intval($_GET['id'])?>' name='id'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Change'/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>

<div class="modal fade" id="modaluploadprofilepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<form id='profilepicform' action='profile.php' method='post' class='form-horizontal' enctype="multipart/form-data">
				<fieldset>
					<div class="modal-body">
						<legend>Upload profile picture</legend>
						<div class='form-group'>
							<label class='col-sm-4 control-label'>Choose an image:</label>
							<div class='col-sm-7'>
								<input type = "file" name = "profilepic" value = "Choose Image" style='padding:6px 12px;' id='profilepicfile' required>
							</div>
						</div>
						<input type='hidden' value='profilepic' name='action'/>
						<input type='hidden' value='<?php echo intval($_GET['id'])?>' name='id'/>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Upload'/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
    </div>
</div>