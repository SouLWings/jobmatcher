<?php ob_start() ?>
<h1>Contact Us</h1>
<p>
If you are having any queries or are facing any difficulties regarding services provided by UM Job Portal, do not hesitate to contact our helpful Customer Support Consultants available to offer you the world-class customer care that you have come to expect from us.
</p>
<p>
We Service from the Heart.
</p>
<form id='contactusform' action='contactus.php' method='post' class="form-horizontal">
	<fieldset>
		<legend>We value your opinons. Leave us a message!</legend>
		<div class='form-group'>
			<label class='col-sm-3 control-label' for='inputname'>Your Name:</label>  
			<div class='col-sm-7'>
				<input autofocus required type='text' id='inputname' class='form-control' value='' name='name'/>
			</div>
		</div>
		<div class='form-group'>
			<label class='col-sm-3 control-label' for='inputname'>Your Email:</label>  
			<div class='col-sm-7'>
				<input required type='email' id='inputemail' class='form-control' value='' name='email'/>
			</div>
		</div>
		<div class='form-group'>
			<label class='col-sm-3 control-label' for='inputpassword'>Message:</label>
			<div class='col-sm-7'>
				<textarea rows='5' required class='form-control' name='message'></textarea>
			</div>
		</div>
		
		<center>
				<input id='registrationsubmit' type='submit' class='btn btn-primary' value='Send'/>
		</center>
	</fieldset>
</form>
<?php $content = ob_get_clean() ?>


<?php include 'template/layout.php' ?>