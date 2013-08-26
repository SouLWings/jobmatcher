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
$scripts[] = 'messaging';
?>

<?php ob_start() ?>
	
    <h1>Chat</h1>

	<div style='height:400px;width:150px;float:left'>
		<?php foreach ($msgprevlist as $msg): ?>
			<li onclick="location.href='message.php?id=<?php echo $msg['id']?>'" style='background:#eeeeee;cursor:pointer; border-top:2px solid #f0f0f0; border-bottom:1px solid #e0e0e0'>
				<div>
					<?php echo $msg['name'] ?>
					<br>
					<?php echo $msg['content'] ?>
				</div>
			</li>
		<?php endforeach; ?>
	</div>
	<div style='position:relative;margin-left:150px;width:400px;'>
		<h2 style='border-bottom:1px solid #888888;position:relative;top:0px;left:150px;'>Conversation <?php echo ' - '.$contact_name ?></h2>
		<div style='position:relative;bottom:0px;left:150px;'>
			<?php foreach ($msghistory as $msg): ?>
				<br><?php echo "$msg[sender]: $msg[content]"?>
			<?php endforeach; ?>
		</div>
	</div>
	<div style='margin-left:300px;'>
		<textarea id='inputmsg' rows=5 cols=65></textarea>
	</div>
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>