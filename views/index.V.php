<?php $title = ''//add title of the page ?>

<?php ob_start() ?>

<h2>Browse Job</h2>
<ul>
<?php foreach ($jobtypes as $type): ?>
	<li>
		<a href="job.php?type=<?php echo $type ?>">
			<?php echo $type ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>



<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>