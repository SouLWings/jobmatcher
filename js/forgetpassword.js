$(document).ready(function(){ 
	
	//the button is disabled by default
	$('#btnresetsubmit').prop('disabled', true);
	
	//the button will only be enabled if the password length is greater than 5 and matched with repeat password
	$("input[type='password']").keyup(function(){
	if($("#newpw").val().length > 5 && $("#newpw").val() == $("#newpw2").val())
		$('#btnresetsubmit').prop('disabled', false);
	else
		$('#btnresetsubmit').prop('disabled', true);
	});
	
});