$(document).ready(function(){ 
	$('#modalchgpassword').find("input[type='submit']").prop('disabled', true);
	$("#modalchgpassword input[type='password']").keyup(function(){
		if($("input[name='newpw']").val().length > 5 && $("input[name='newpw']").val() == $("input[name='newpw2']").val())
			$('#modalchgpassword').find("input[type='submit']").prop('disabled', false);
		else
			$('#modalchgpassword').find("input[type='submit']").prop('disabled', true);
	});
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
	
	$('#profilepicform').submit(function(event) {
		if(!$('#profilepicfile').val() || ){
			alert('Chose a file!');
			return false;
		}
	});
	
});