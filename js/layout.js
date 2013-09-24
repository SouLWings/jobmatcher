$(document).ready(function(){ 
	//start the slider animation
	$('.carousel').carousel()
	
	//hide the forgetpassword, and show on click
	$("#forgetpwform").hide();
	$("#forgetpw").click(function(){
		$("#signinform").toggle(500);
		$("#forgetpwform").toggle(500);
		if($(this).text() == 'Forget password?')
			$(this).text('Sign in');
		else
			$(this).text('Forget password?');
	});
	
	//slide the sign in bar up n down
	$("#signinbtn").click(function(){
		$("#signinbar").toggleClass('dropdowntoggle');
		$(this).toggleClass('active');
	});
	
	//send a ajax request out from the forgetpassword form
	$('#forgetpwform').submit(function(event) {
		$("button[type='submit']").prop('disabled',true);
		var form = $(this);
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function(data) 
			{
				alert(data);
			}
		}).fail(function() {
			alert("Fail to connect to server");
		}).done(function() {
			$("button[type='submit']").prop('disabled',false);
		});
		event.preventDefault();
	});
});