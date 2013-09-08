$(document).ready(function(){ 
	
	$('#btnresetsubmit').prop('disabled', true);
	
	$("input[type='password']").keyup(function(){
	if($("#newpw").val().length > 5 && $("#newpw").val() == $("#newpw2").val())
		$('#btnresetsubmit').prop('disabled', false);
	else
		$('#btnresetsubmit').prop('disabled', true);
	});
	
});