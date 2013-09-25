<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $threads - 2 dimentional array {id,title,username,datetime,type,status,replies,views,lastusername,lastid,lastdatetime}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Threads'; 
$modalforms[] = 'forum-modal-forms';
$styles[] = 'forum';
$scripts[] = 'forum_sections';

?>
<?php ob_start() ?>
	<h4><b><a href='forum.php'>Forum Board</a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> <b><?php echo $sectionname ?></b></h4>
	<br>
	<?php if($editable){?>
	<a data-toggle="modal" href="#modaladdthread" class="btn btn-primary btn-md"><span class='glyphicon glyphicon-file'></span> Post a New Thread</a>
	<br>
	<br>
	<?php } ?>
	
    <table class="table table-bordered" style='margin-bottom:0'>
		<thead>
			<tr>
				<th>HIGHLIGHTED THREADS</th>
				<th width='82px'>REPLIES</th>
				<th width='82px'>VIEWS</th>
				<th width='180'>LAST REPLY</th>
				<?php if($editable)echo "<th width='82px'>ACTION</th>" ?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($stickythreads as $thread):?>
			<tr class='<?php echo $thread['class']?>'>
				<!-- thread name + usuername + time -->
				<td>
					<img src='img/forum/<?php echo $thread['icon']?>.gif'/>
					<?php echo $thread['tag'] ?>
					<b><a href='forum_threads.php?id=<?php echo $thread['id']?>'> <?php echo $thread['title']?></a></b>
					<br>
					<h6>
						<i>Started By</i> 
						<a href='profile.php?id=<?php echo $thread['userid']?>'><?php echo $thread['username']?></a> 
						&mdash;
						<?php echo $thread['datetime']?>
					</h6>
				</td>
				
				<!-- thread replies number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['replies']?></td>
				
				<!-- thread views number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['views']?></td>
				
				<!-- last post -->
				<td>
					<?php if(!empty($thread['lastusername'])){ ?>
					<a href='profile.php?id=<?php echo $thread['lastid']?>'><?php echo $thread['lastusername']?></a>
					<br>
					<?php echo $thread['lastdatetime'];}else echo 'No reply yet';?>
				</td>
				
				<?php if($editable){?>
				
				<!-- last post -->
				<td>
					<a data-toggle='modal' href='#modalchgthreadtype' class='btn btn-primary btn-xs btnchgthreadtype'><span class='glyphicon glyphicon-paperclip'></span> Type</a> 
					<a data-toggle='modal' href='#modalchgthreadstatus' class='btn btn-primary btn-xs btnchgthreadstatus'><span class='glyphicon glyphicon-edit'></span> Status</a> 
					<a data-toggle='modal' href='#modalremovethread' class='btn btn-primary btn-xs btnremovethread'><span class='glyphicon glyphicon-trash'></span> Remove</a> 
					<input type='hidden' value=<?php echo $thread['id']?> name='threadid'/>
				</td>
				<?php } ?>
			</tr>		
		<?php endforeach; ?>
		</tbody>
	</table>
    <table class="table table-bordered">
		<thead>
			<tr>
				<th>NORMAL THREADS</th>
				<th width='82px'>REPLIES</th>
				<th width='82px'>VIEWS</th>
				<th width='180'>LAST REPLY</th>
				<?php if($editable)echo "<th width='82px'>ACTION</th>" ?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($threads as $thread):?>
			<tr class='<?php echo $thread['class']?>'>
				<!-- thread name + usuername + time -->
				<td>
					<img src='img/forum/<?php echo $thread['icon']?>.gif'/>
					<?php echo $thread['tag'] ?>
					<b><a href='forum_threads.php?id=<?php echo $thread['id']?>'> <?php echo $thread['title']?></a></b>
					<br>
					<h6>
						<i>Started By</i> 
						<a href='profile.php?id=<?php echo $thread['userid']?>'><?php echo $thread['username']?></a> 
						&mdash;
						<?php echo $thread['datetime']?>
					</h6>
				</td>
				
				<!-- thread replies number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['replies']?></td>
				
				<!-- thread views number -->
				<td style='font-size:1.5em;width:60px;'><?php echo $thread['views']?></td>
				
				<!-- last post -->
				<td>
					<?php if(!empty($thread['lastusername'])){ ?>
					<a href='profile.php?id=<?php echo $thread['lastid']?>'><?php echo $thread['lastusername']?></a>
					<br>
					<?php echo $thread['lastdatetime'];}else echo 'No reply yet';?>
				</td>
				
				<?php if($editable){?>
				
				<!-- last post -->
				<td>
					<a data-toggle='modal' href='#modalchgthreadtype' class='btn btn-primary btn-xs btnchgthreadtype'><span class='glyphicon glyphicon-paperclip'></span> Type</a> 
					<a data-toggle='modal' href='#modalchgthreadstatus' class='btn btn-primary btn-xs btnchgthreadstatus'><span class='glyphicon glyphicon-edit'></span> Status</a> 
					<a data-toggle='modal' href='#modalremovethread' class='btn btn-primary btn-xs btnremovethread'><span class='glyphicon glyphicon-trash'></span> Remove</a> 
					<input type='hidden' value=<?php echo $thread['id']?> name='threadid'/>
				</td>
				<?php } ?>
			</tr>		
		<?php endforeach; ?>
		</tbody>
	</table>
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