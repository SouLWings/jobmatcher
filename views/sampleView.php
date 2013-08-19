<?php 
/*  --	optional  --
 * add title of the page, eg. $title = 'sample';
 *
 * additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder
 *
 * additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder
 *
 */
 
?>

<?php ob_start() ?>
    <h1><?php echo $post['title'] ?></h1>

    <div class="date"><?php echo $post['date'] ?></div>
    <div class="body">
        <?php echo $post['body'] ?>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>