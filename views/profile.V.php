<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $user - singular array of admin	{usertype, onlinestatus, email, firstname, lastname, createTime, lastlogintime}
 *  					   employer {usertype, onlinestatus, email, firstname, lastname, createTime, lastlogintime, position, name(company)}
 *  					  jobseeker {usertype, onlinestatus, email, firstname, lastname, createTime, lastlogintime, matric}
 *  $editable - whether the current user hv the privilege to modify the page info
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
if($editable)
{
	$modalforms[] = 'profile-modal-forms';
	$scripts[] = 'profile';
}
?>

<?php ob_start() ?>
	
    <div>
		<div style='width:200px;height:200px;' class='pull-left img-thumbnail'>
			<img src="img/profile_pic/aid1.png" alt="" class="img-thumbnail" style='margin:auto;height:100%;'>
		</div>
		<div class="panel panel-info pull-left" style='height:200px;margin-left:20px; width:600px;'>
			<div class="panel-heading">
				<h2 class="panel-title">  <b><?php echo $user['firstname'].' '.$user['lastname'] ?></b>  <span style='color:<?php echo $onlinecolor ?>' class="glyphicon glyphicon-stop"></span></h2>
			</div>
			<div class="panel-body">
				<span class="glyphicon glyphicon-user"></span> <?php echo $user['usertype'] ?><br>
				<span class="glyphicon glyphicon-time"></span> Joined on <?php echo $user['createTime'] ?><br>
				<span class="glyphicon glyphicon-log-in"></span> Last Log in on <?php echo $user['lastlogintime'] ?><br>
				
				
			</div>		
		</div>
    </div>
	
    <div class="panel panel-info" style='clear:left'>
		<div class="panel-heading">
			<h3 class="panel-title">Personal Info <?php if($editable)echo ' <a data-toggle="modal" href="#modaleditprofile" class="btn btn-primary btn-xs" id="btneditprofile" style="color:white"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a><a data-toggle="modal" href="#modalchgpassword" class="btn btn-primary btn-xs" id="btneditprofile" style="color:white"><i class="icon-lock"></i> Change password</a>'?></h3>
		</div>
		<div class="panel-body">			
			Email:<?php echo $user['email'] ?><br>
			<?php include $user['ut'].'-profileinfo.inc.php'; ?>
			
		</div>		
    </div>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>