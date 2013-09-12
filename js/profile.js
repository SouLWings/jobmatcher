$(document).ready(function(){ 
	//disable the submit button for change password
	$('#modalchgpassword').find("input[type='submit']").prop('disabled', true);
	
	//toogle the disabled property when user input password and repeat password. the submit button will only enabled if the password is more thn 6 char long and both password matches
	$("#modalchgpassword input[type='password']").keyup(function(){
		if($("input[name='newpw']").val().length > 5 && $("input[name='newpw']").val() == $("input[name='newpw2']").val())
			$('#modalchgpassword').find("input[type='submit']").prop('disabled', false);
		else
			$('#modalchgpassword').find("input[type='submit']").prop('disabled', true);
	});
	
	//send ajax request when edit profile form is submitted
	$('#editprofileform').submit(function(event) {
		$("input[type='submit']").prop('disabled',true);
		var form = $(this);
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function(data) 
			{
				alert(data);
				location.reload(true);
			}
		}).fail(function() {
			$("input[type='submit']").prop('disabled',false);
			alert("Fail to connect to server");
		});
		event.preventDefault();
	});
	
	//send ajax request when edit password form is submitted
	$('#editpwform').submit(function(event) {
		$("input[type='submit']").prop('disabled',true);
		var form = $(this);
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function(data) 
			{
				alert(data);
				if(data.substr(0,1) == 'P')
					location.reload(true);
				else
					$("input[type='submit']").prop('disabled',false);
			}
		}).fail(function() {
			$("input[type='submit']").prop('disabled',false);
			alert("Fail to connect to server");
		});
		event.preventDefault();
	});
	
	//alert user if the file choosen to upload is not a common image file
	$('#profilepicfile').change( function() {  
		var ext = $('#profilepicfile').val().split('.').pop().toLowerCase();  
		if($.inArray(ext, ['jpg','jpeg','bmp','gif','png']) == -1) {  
			$('#profilepicfile').val("");  
			alert('You can only upload a common image files.');  
         
		}  
   }); 
	
});