<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $user - singular array of 	{usertype, onlinestatus, email, firstname, lastname, createTime}
 *  							{usertype, onlinestatus, email, firstname, lastname, createTime, position, name(company)}
 *  							{usertype, onlinestatus, email, firstname, lastname, createTime, matric}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
 
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
				
				
			</div>		
		</div>
    </div>
	
    <div class="panel panel-info" style='clear:left'>
		<div class="panel-heading">
			<h3 class="panel-title">Personal Info</h3>
		</div>
		<div class="panel-body">			
			email:<?php echo $user['email'] ?>
			<?php include $ut.'-profileinfo.inc.php'; ?>
			
		</div>		
    </div>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>