<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $example - explaination/details of the variable
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Sections';
$modalforms[] = 'forum-modal-forms';
$styles[] = 'forum';
$scripts[] = 'forum';
?>

<?php ob_start() ?>
	<h4><b><a href='forum.php'>Forum Board</a></b></h4>
	<br>
	<?php if($editable){?>
	<a data-toggle="modal" href="#modaladdsection" class="btn btn-primary btn-md"><span class='glyphicon glyphicon-file'></span> New Section</a>
	<br>
	<br>
	<?php } ?>
	
    <table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>SECTION</th>
				<th width='82px'>THREADS</th>
				<th width='82px'>POSTS</th>
				<th width='180px'>LAST POST</th>
				<?php if($editable)echo "<th width='82px'>Action</th>" ?>
			</tr>
		</thead><tbody>
	<?php foreach ($sections as $section): $sid=$section['id']; ?>
		
			<tr>
				<td>
					<img src='img/forum/sections.gif'/> 
					<b><?php echo"<a href='forum_sections.php?id=$section[id]'>$section[section]</a>";?></b>
					<br>
					<h6><?php echo $section['description'];?></h6>
				</td>

				<td style='font-size:1.5em;width:60px;'><?php echo $numthread["$sid"]?></td>
				<td style='font-size:1.5em;width:60px;'><?php echo $totalpost["$sid"]?></td>
				
				<td><?php echo "<a href='profile.php?id=".$lastuser["$lastpost[$sid]"]['id']."'>".$lastuser["$lastpost[$sid]"]['username'].'</a><br>'.$lastdate["$lastpost[$sid]"];?></td>
				<?php if($editable){?>
				<td>
					<a data-toggle='modal' href='#modaleditsection' class='btn btn-primary btn-xs btneditsection'><span class='glyphicon glyphicon-edit'></span></a> 
					<a data-toggle='modal' href='#modaldeletesection' class='btn btn-primary btn-xs btndeletesection'><span class='glyphicon glyphicon-trash'></span></a> 
					<input type='hidden' value=<?php echo $section['id']?> name='sectionid'/>
				</td>
				<?php } ?>
			</tr>	
	<?php endforeach; ?>
	</tbody>
	
	</table>
	
<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
	<div id='forumsearch'>
		<form action ='forumManager.php' method = 'GET'>
			<div class="input-group">
				<input type="text" name='name' class="form-control" placeholder="Search this forum">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			<input type='hidden' name='search'>
		</form>
	</div>

<?php $aside = ob_get_clean() ?>

<?php include 'template/layout.php' ?>