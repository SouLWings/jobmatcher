<?php 
/*  --	defining optional variables  -
 *  $title - add title of the page, eg. $title = 'sample';
 *  $scripts[] - additional script of the page eg. $scripts[] = 'asd'; to include asd.js inside js folder 	* if the order is important, define the inversely
 *  $styles[] - additional style of the page eg. $styles[] = 'asd'; to include asd.css inside css folder  	* as the loop will begin from backward
 * 
 *  --  variables supplied to this page from controller --
 *  $articles - 2 dimentional array {id,admin_ID,date,title,content}
 *  $editable - true if current user can edit content of page, false otherwise
 *  
 *  --  list of tasks for this view  --
 *  
 *  
 *  --  printing a variable  --
 *  <?php echo $ ?>
 */
if($editable)
{
	$scripts[] = 'articles';
	$modalforms[] = 'articles-modal-forms';
}
?>

<?php ob_start() ?>
	<style>
		#contentsection section{
			border:1px solid black;
		}
		#contentsection > section > header{
			font-size:2em;
			font-weight:bold;
		}
		#contentsection > section > article{
			font-size:0.9em;
		}
	</style>

    <h1>Articles</h1>
	<?php if($editable)echo ' <a data-toggle="modal" href="#modaladdarticle" class="btn btn-primary btn-xs btnaddarticle" style="color:white"><span class="glyphicon glyphicon-asterisk"></span>  Add an article</a>';?>
	<?php foreach ($articles as $a): ?>
	<section>
		<header><?php echo $a['title'] ?></header>
		<small>
		<?php 
		echo $a['date']; 
		if($editable){
			echo ' <a data-toggle="modal" href="#modaleditarticle" class="btn btn-primary btn-xs btneditarticle" style="color:white"><span class="glyphicon glyphicon-edit"></span></a><a data-toggle="modal" href="#modaldeletearticle" class="btn btn-primary btn-xs btndeletearticle" style="color:white"><span class="glyphicon glyphicon-trash"></span></a>';
		}
		?>
		</small>
		<article><?php echo nl2br($a['content']) ?></article>
		<input type='hidden' name='articleid' value='<?php echo $a['id'] ?> '/>
	</section>
    <?php endforeach; ?>
	
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>