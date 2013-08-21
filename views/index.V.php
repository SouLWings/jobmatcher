<?php 
$styles[] = 'style';
$styles[] = 'content';

?>

<?php ob_start() ?>

	
<div class="browsejob">
	<h2>Browse Job</h2>

<div class="browsejob2">
	<ul>
	<?php foreach ($jobspecializations as $jobspecialization): ?>
		<li>
			<a href="jobs.php?typeid=<?php echo $jobspecialization['id'] ?>">
				<?php echo $jobspecialization['specialization'] ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

</div>

<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>