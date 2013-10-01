$(document).ready(function(){ 
	
	//hiding options and disable the register button
	$('#commonform').hide();
	$('#jobseekerform').hide();
	$('#employerform').hide();
	$('#employeroption1').hide();
	$('#employeroption2').hide();
	$('#registrationsubmit').prop('disabled', true);
	
	//when user choose the usertype only show the form according to the usertype
	$("#inputusertype").change(function(){
		if($('#inputusertype').val()=='employer')
		{
			$('#jobseekerform').hide();
			$('#commonform').show();		
			$('#employerform').show();		
			$('#registrationsubmit').prop('disabled', false);
		}
		else if($('#inputusertype').val()=='jobseeker')
		{
			$('#employerform').hide();		
			$('#commonform').show();
			$('#jobseekerform').show();
			$('#registrationsubmit').prop('disabled', false);
		}
		else
		{
			$('#commonform').hide();
			$('#jobseekerform').hide();
			$('#employerform').hide();
			$('#registrationsubmit').prop('disabled', true);
		}
	});	
	
	$('input[name=companyoption]').change(function(){
		//if employer choose to create company thn show company fields
		if($('input[name=companyoption]:checked', '#registerform').val() == 'create')
		{
			$('#employeroption1').hide();
			$('#employeroption2').show();
		}
		//if employer choose to pick from existing company thn show dropdown list
		else if($('input[name=companyoption]:checked', '#registerform').val() == 'choose')
		{
			$('#employeroption1').show();
			$('#employeroption2').hide();
		}
		else
		{
			$('#employeroption1').hide();
			$('#employeroption2').hide();
		}
			
	}); 
	
	//matric number - only alphabets and letters are allowed and no more than 9 characters can be input
	$("input[name='matric']").keydown(function(event) {
		// Allow: backspace, delete, tab, escape, and enter
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
			 // Allow: Ctrl+A
			(event.keyCode == 65 && event.ctrlKey === true) || 
			 // Allow: home, end, left, right
			(event.keyCode >= 35 && event.keyCode <= 39) ||
			
			(event.keyCode >= 65 && event.keyCode <= 90 && $("input[name='matric']").val().length < 9)) {
				 // let it happen, don't do anything
				 return;
		}
		else {
			// Ensure that it is a number and stop the keypress
			if ($("input[name='matric']").val().length > 8 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault(); 
			}   
		}
	});
	
	$("#registerform").submit(function(){
		if($("input[name='password']").val() != $("input[name='rpassword']").val())
		{
			alert('Password does not match with repeated password');
			return false;
		}
		if($("input[name='password']").val().length < 6)
		{
			alert('Password length must be at least 6');
			return false;
		}
		if($("input[name='username']").val().length < 4 || $("input[name='username']").val().length > 20)
		{
			alert('Username length must be between 4 and 20');
			return false;
		}
	});
});