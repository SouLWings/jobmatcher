<div id='forumsearch'>
	<form action ='forum_search.php' method = 'POST'>
		<div class="input-group">
			<input type="text" name='keyword' class="form-control" placeholder="Search this forum" required>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
		<input type='hidden' name='action' value='forumsearch'/>
	</form>
</div>
<br>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Forum Statistic</h3>
	</div>
	<div class="panel-body">
		Total Posts: <b><?php echo $allpostcount ?></b><br>
		Total Threads: <b><?php echo $allthreadcount ?></b><br>
		Total Members: <b><?php echo $allmembercount ?></b><br>
		Currently Online: <b><?php echo $allonlinecount ?></b><br>
	</div>
</div>
