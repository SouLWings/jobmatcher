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
$title = 'Forum Posts'; 
?>

<?php ob_start() ?>
    <h1>Forum Posts</h1>
	<a data-toggle="modal" href="#addpost" class="btn btn-primary btn-lg">Reply to Thread</a>
	<?php include('forum-modal-forms.inc.php'); ?>
    <table class="table-striped table-bordered table-hover tablesorter">
		<tr>
			<td><?php echo $datetime;?></td>
		<tr>
		<tr>

			<td>
				<table class="table-striped table-bordered table-hover tablesorter">
					<tr>	
						<td><?php echo $username."<br>".'Post:'. $numpost;?>//pic/link to profile/status</td>
						<td>
							<table class="table-striped table-bordered table-hover tablesorter">
								<tr>
									<td><h3><?php echo $threadtopic ?></h3><br> <?php echo $threadcontent ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<br>
		</tr>
		<tr>
			<td>
				<table class="table-striped table-bordered table-hover tablesorter">
					<tr>
						<td><a data-toggle="modal" href="#addpost" class="">Reply</a></td>
					</tr>
				</table>
			</td>
		<tr>
	</table>	

	<?php foreach ($posts as $post):$f2id=$post['id']; ?>
	<table class="table-striped table-bordered table-hover tablesorter">	
		<tr>
			<td><?php echo $pdatetime[$f2id]?></td>
		<tr>
		<tr>

			<td>
				<table class="table-striped table-bordered table-hover tablesorter">
					<tr>	
						<td><?php echo $pusername[$uid] ."<br>".'Post:'. $pnumpost[$uid]."<br>".'Post status:'.$pstatus[$f2id];?>//pic/link to profile/</td>
						<td>
							<table class="table-striped table-bordered table-hover tablesorter">
								<tr>
									<td><h4><?php echo $posttopic[$f2id] ?></h4><br><?php echo $postcontent[$f2id] ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<br>
		</tr>
		<tr>
			<td>
				<table class="table-striped table-bordered table-hover tablesorter">
						<tr>
							<td><a data-toggle="modal" href="#addpost" class="">Reply</a></td>
							<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$f2id name='f2id'/>";?><input type="submit"  value="editPost" name="action" /></form></td>
							<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$f2id name='f2id'/>";?><input type="submit"  value="deletePost" name="action" /></form></td>
							<td><form action="forumManager.php" method="post"><?php echo"<input type='hidden' value=$f2id name='f2id'/>";?><input type="submit"  value="alterType" name="action" /></form></td>
						</tr>
				</table>
			</td>
		<tr>
	</table>
	<?php endforeach; ?>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>