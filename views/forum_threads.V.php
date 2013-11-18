<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $thread - singular array {id,title,content,username,userid,usertype,userposts,datetime,status}
 *  $posts - 2 dimentional array {id,content,username,userid,usertype,userposts,datetime}
 *  $section - singular array {id,name}
 *  $replyable - boolean
 *  $postcount - used to label number of post 
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Posts'; 
$modalforms[] = 'forum-thread-modal-forms';
$styles[] = 'forum';
$styles[] = 'forum_threads';
$scripts[] = 'forum_threads';
?>

<?php ob_start() ?>

	<h4><b><a href='forum.php'>Forum Board</a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> <b><a href='forum_sections.php?id=<?php echo $section['id'] ?>'><?php echo $section['name'] ?></a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> </h4> 
	<br>
    <?php if($replyable){?>
	<a data-toggle="modal" href="#modalreplythread" class="btn btn-primary btn-md"><span class='glyphicon glyphicon-share-alt'></span> Reply</a>
    <?php if($editable){?>
	<a data-toggle="modal" href="#modaleditthread" class="btn btn-primary btn-md"><span class='glyphicon glyphicon-edit'></span> Edit Thread</a>
	<?php } ?>
	<br>
	<br>
	<?php } ?>
	
	<!-- first post -->
	<?php if($page == 1){ ?>
	<div class='panel panel-info'>
		<!-- post header -->
		<div class='panel-heading'>
			<div class='pull-right'>
				#<?php echo ++$postcount ?>
			</div>
			<?php echo $thread['datetime'] ?>
		</div>
		<!-- user info -->
		<div class='pull-left postuser'>
			<b><a href='profile.php?id=<?php echo $thread['userid'] ?>'><?php echo $thread['username'] ?></a></b>
			<br>	
			<div style='width:150px;height:150px;' class='pull-left'>
				<img src="<?php echo $thread['profilepicdirc'] ?>" alt="" class="img-thumbnail" style='margin:auto;height:100%;'>
			</div>
			<br>
			<small><?php echo $thread['usertype'] ?></small>
			<br>
			<small>Posts: <?php echo $thread['userposts'] ?></small>
		</div>
		<!-- first post -->
		<div class='postcontent'>
			<h3><b><?php echo $thread['title'] ?></b></h3>
			<hr/>
			<?php echo nl2br($thread['content']) ?>
			<input type='hidden' value='<?php echo $thread['id'] ?>' name='threadid'/>
			<div style='clear:left'> </div>
		</div>
	</div>
	<?php } ?>
	
	<?php foreach ($posts as $post):?>
	<div class='panel panel-info'>
		<div class='panel-heading'>
			<div class='pull-right'>
				#<?php echo ++$postcount ?>
			</div>
			<?php echo $post['datetime'] ?>
		</div>
		<div class='pull-left postuser'>
			<b><a href='profile.php?id=<?php echo $post['userid'] ?>'><?php echo $post['username'] ?></a></b>
			<br>		
			<div style='width:150px;height:150px;' class='pull-left'>
				<img src="<?php echo $post['profilepicdirc'] ?>" alt="" class="img-thumbnail" style='margin:auto;height:100%;'>
			</div>
			<br>
			<small><?php echo $post['usertype'] ?></small>
			<br>
			<small>Posts: <?php echo $post['userposts'] ?> </small>
		</div>
		<div class='postcontent'>    
			<?php if($aid == $post['userid'] || $editable){?>
			<a data-toggle="modal" href="#modaldeletepost" class="btndeletepost pull-right btn btn-primary btn-md"><span class='glyphicon glyphicon-trash'></span> Delete Post</a>
			<?php } if($aid == $post['userid']){?>
			<a data-toggle="modal" href="#modaleditpost" class="btneditpost pull-right btn btn-primary btn-md"><span class='glyphicon glyphicon-edit'></span> Edit Post</a>
			<?php } ?>
			<?php echo nl2br($post['content']) ?>
			<input type='hidden' value='<?php echo $post['id'] ?>' name='postid'/>
			<div style='clear:left'> </div>
		</div>
	</div>
	<?php endforeach; ?>
    <?php if($replyable){?>
	<a data-toggle="modal" href="#modalreplythread" class="btn btn-primary btn-md pull-right"><span class='glyphicon glyphicon-share-alt'></span> Reply</a>
    <?php if($editable){?>
	<a data-toggle="modal" href="#modaleditthread" class="btn btn-primary btn-md pull-right"><span class='glyphicon glyphicon-edit'></span> Edit Thread</a>
	<?php } ?>
	<br>
	<?php } ?>
	<center>
		<?php echo $pagination ?>
	</center>
<?php $content = ob_get_clean() ?>

<?php 
ob_start() ;
include 'forum_aside.inc.php';
$aside = ob_get_clean()  
?>
<?php include 'template/layout.php' ?>