<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $thread - singular array {id,title,content,username,userid,usertype,datetime,status}
 *  $posts - 2 dimentional array {id,content,username,userid,usertype,datetime}
 *  $section - singular array {id,name}
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
$title = 'Forum Posts'; 
$modalforms[] = 'forum-modal-forms';
$styles[] = 'forum';
//$scripts[] = 'forum_threads';
?>

<?php ob_start() ?>
	<h4><b><a href='forum.php'>Forum Board</a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> <b><a href='<?php echo $section['id'] ?>'><?php echo $section['name'] ?></a></b> <small><span class='glyphicon glyphicon-chevron-right'></span></small> </h4> 
	<br>
    
<?php $content = ob_get_clean() ?>

<?php include 'template/layout.php' ?>