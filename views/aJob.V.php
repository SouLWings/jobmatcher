<?php $title = ''//add title of the page ?>
<?php $scripts[] = ''//add script of the page $scripts = 'asd' to include asd.js inside js folder?>
<?php $styles[] = ''//add style of the page eg.  $styles = 'asd' to include asd.css inside css folder?>

<?php ob_start() ?>
    <h1><?php echo $job['title'] ?></h1>

    <div class="body">
		<label class='label'>date:</label><?php echo $job['date'] ?><br>
        <?php echo $job['description'] ?><br>
        location: <?php echo $job['location'] ?><br>
        salary: <?php echo $job['salary'] ?><br>
        experience: <?php echo $job['experience'] ?><br>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>