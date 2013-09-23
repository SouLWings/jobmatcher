<!-- add section -->
<div class="modal fade" id="modaladdsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addsectionform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Create Section</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-4 control-label'>Section Title:</label>
							<div class='col-lg-7'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='Enter New Section Title Here' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-4 control-label'>Section Description:</label>
							<div class='col-lg-7'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' placeholder='Enter Section Description Here'></textarea>
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
<!-- edit section -->
<div class="modal fade" id="modaleditsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='editsectionform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Edit Section</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-4 control-label'>Section Title:</label>
							<div class='col-lg-7'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='Enter New Section Title Here' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-4 control-label'>Section Description:</label>
							<div class='col-lg-7'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' placeholder='Enter Section Description Here'></textarea>
							</div>
						</div>
						<input type='hidden' value='editSection' name='action'/>
						<input type='hidden' value='0' name='sectionid' id='editid'/>
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
<!-- delete section -->
<div class="modal fade" id="modaldeletesection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='deletesectionform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to delete this section?</legend>
						<input type='hidden' value='deleteSection' name='action'/>
						<input type='hidden' value='0' name='sectionid' id='deleteid'/>
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
<!-- change thread type -->
<div class="modal fade" id="modalchgthreadtype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='chgthreadtypeform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Change thread type</legend>
						<div class='form-group'>
							<label class='col-lg-4 control-label'>Thread type:</label>
							<div class='col-lg-7'>
								<select class='form-control' name='threadtype'>
									<option value='sticky'>
										STICKY
									</option>
									<option value='hot'>
										HOT
									</option>
									<option value='global'>
										GLOBAL
									</option>
									<option value='normal'>
										NORMAL
									</option>
								</select>
							</div>
						</div>
						<input type='hidden' value='chgthreadtype' name='action'/>
						<input type='hidden' value='0' name='threadid'/>
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
<!-- chg thread status -->
<div class="modal fade" id="modalchgthreadstatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='chgthreadstatusform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to change the status of this thread?</legend>
						<input type='hidden' value='chgthreadstatus' name='action'/>
						<input type='hidden' value='0' name='threadid'/>
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
<!-- delete thread -->
<div class="modal fade" id="modalremovethread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='deletethreadform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to delete this thread?</legend>
						<input type='hidden' value='deleteThread' name='action'/>
						<input type='hidden' value='0' name='threadid'/>
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

<!-- new thread -->
<div class="modal fade" id="modaladdthread"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addthreadform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Create Thread</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-4 control-label'>Thread Title:</label>
							<div class='col-lg-7'>
								<input required type='text' id='inputName' autocomplete='off' class='form-control' placeholder='Enter New Thread Title Here' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-4 control-label'>Thread Description:</label>
							<div class='col-lg-7'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' placeholder='Enter New Thread Description Here'></textarea>
							</div>
						</div>
						
						<input type='hidden' value='addThread' name='action'/>
						<input type='hidden' value="<?php echo $secid?>" name='f0id'/>
						<input type='hidden' value="<?php echo $aid?>" name='uuid'/>
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


<!-- new post -->
<div class="modal fade" id="addpost"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addpostform' action='forumManager.php' method='post' class='form-horizontal'>
				<?php 
					/* include_once '../ckeditor/ckeditor.php';
					
					$ckeditor = new CKEditor();
					$ckeditor->basePath = '/ckeditor/';
					$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
					$ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
					$ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
					$ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
					$ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
					$ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
					$ckeditor->editor('CKEditor1'); */
				?>
				<fieldset>
						<legend>Create Post</legend>
						<div class='form-group'>
							<label for='inputtitle' class='col-lg-2 control-label'>Topic:</label>
							<div class='col-lg-4'>
								<input class='form-control' placeholder='' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label for='inputAddress' class='col-lg-2 control-label'></label>
							<div class='col-lg-4'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='description' rows='3' style='width:400px' placeholder=''></textarea>
							</div>
						</div>
						
						<input type='hidden' value='addPost' name='action'/>
						<input type='hidden' value="<?php echo $f1id?>" name='f1id'/>
						<input type='hidden' value="<?php echo $uuid//change to $session[user][id]?>" name='uuid'/>
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