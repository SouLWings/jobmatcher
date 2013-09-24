
<!-- reply to thread -->
<div class="modal fade" id="modalreplythread"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='addpostform' action='forumManager.php' method='post' class='form-horizontal'>
				<fieldset>
						<legend>New Post</legend>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Topic:</label>
							<div class='col-lg-8'>
								<p class="form-control-static"><?php echo $thread['title']?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Content:</label>
							<div class='col-lg-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='content' rows='3'></textarea>
							</div>
						</div>
						<input type='hidden' value='addPost' name='action'/>
						<input type='hidden' value="<?php echo $thread['id'] ?>" name='f1id'/>
						<input type='hidden' value="<?php echo $aid ?>" name='uuid'/>
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
<!-- edit thread -->
<div class="modal fade" id="modaleditthread"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='editthreadform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Edit Thread</legend>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Thread Title:</label>
							<div class='col-lg-8'>
								<input required type='text' autocomplete='off' class='form-control' value='<?php echo $thread['title'] ?>' name='title'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Thread content:</label>
							<div class='col-lg-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='content' rows='5'><?php echo $thread['content']?></textarea>
							</div>
						</div>
						<input type='hidden' value='editThread' name='action'/>
						<input type='hidden' value="<?php echo $thread['id'] ?>" name='f1id'/>
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
<!-- edit post -->
<div class="modal fade" id="modaleditpost"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='editpostform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Edit Post</legend>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Post content:</label>
							<div class='col-lg-8'>
								<textarea required class='form-control' spellcheck='false' autocomplete='off' name='content' rows='5'></textarea>
							</div>
						</div>
						<input type='hidden' value='editPost' name='action'/>
						<input type='hidden' value="" name='pid'/>
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

<!-- delete post -->
<div class="modal fade" id="modaldeletepost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form id='deletepostform' action='forumManager.php' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Are you sure to delete this post?</legend>
						<input type='hidden' value='deletePost' name='action'/>
						<input type='hidden' value='0' name='pid'/>
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