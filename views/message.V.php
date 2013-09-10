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
	
	
<div id='test'>Chat history</div>
	<div style='height:400px;width:150px;float:left'>
		<?php foreach ($msgprevlist as $msg): ?>
			<li onclick="location.href='message.php?id=<?php echo $msg['sender_ID']?>'" style='background:#eeeeee;cursor:pointer; border-top:2px solid #f0f0f0; border-bottom:1px solid #e0e0e0'>
				<div>
					<?php echo $msg['sender_name'] ?>
					<br>
					<?php //echo $msg['content'] ?>
				</div>
			</li>
		<?php endforeach; ?>
	</div>
	<div style='position:relative;margin-left:150px;margin-top:-40px;width:400px;'>
		<h2 style='border-bottom:1px solid #888888;position:relative;top:0px;left:150px;'>Conversation <?php echo ' - '.$contact_name ?></h2>
		<div style='position:relative;bottom:0px;left:150px;max-height:55vh;min-height:55vh;overflow:auto;' id='dialoghistory'>
			<?php foreach ($msghistory as $msg): ?>
				<?php echo "$msg[sender]: $msg[content]"?><br>
			<?php endforeach; ?>
		</div>
	</div>
	<div style='margin-left:300px;'>
		<textarea id='inputmsg' rows=5 cols=63></textarea>
	</div>
	<script>
		var time = "<?php echo $latesttime ?>";
		var timestring = time.split(/[- :]/);
		var latesttime = new Date(timestring[0], timestring[1]-1, timestring[2], timestring[3], timestring[4], timestring[5]);
		var own_id = <?php echo $aid ?>;
		var own_name = '<?php echo $firstname.' '.$lastname ?>';
		var contact_id = <?php echo $contact_id ?>;
	</script>
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>