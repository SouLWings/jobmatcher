$(document).ready(function(){ 
	
	//scripts to show tracing tooltips
	$('.masterTooltip').hover(function(){
		var title = $(this).attr('title');
		$(this).data('tipText', title).removeAttr('title');
		$('<div class="btn-default btn-small guide"></div>').html(title).appendTo('body').fadeIn('slow');
	}, function() {
		$(this).attr('title', $(this).data('tipText'));
		$('.guide').remove();
	}).mousemove(function(e) {
			var mousex = e.pageX + 20; //Get X coordinates
			var mousey = e.pageY + 10; //Get Y coordinates
			$('.guide').css({ top: mousey, left: mousex })
	});
	
	
	$('#commonform').hide();
	$('#jobseekerform').hide();
	$('#employerform').hide();
	$('#employeroption1').hide();
	$('#employeroption2').hide();
	$('#registrationsubmit').prop('disabled', true);
	
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
		if($('input[name=companyoption]:checked', '#registerform').val() == 'create')
		{
			$('#employeroption1').hide();
			$('#employeroption2').show();
		}
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
	/* $("input[name='ic']").keydown(function(event) {
		// Allow: backspace, delete, tab, escape, and enter
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
			 // Allow: Ctrl+A
			(event.keyCode == 65 && event.ctrlKey === true) || 
			 // Allow: home, end, left, right
			(event.keyCode >= 35 && event.keyCode <= 39)) {
				 // let it happen, don't do anything
				 return;
		}
		else {
			// Ensure that it is a number and stop the keypress
			if ($("input[name='ic']").val().length > 11 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault(); 
			}   
		}
	});

	$("input[name='ic']").keydown(function(event) {
	// Allow: backspace, delete, tab, escape, and enter
	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
		 // Allow: Ctrl+A
		(event.keyCode == 65 && event.ctrlKey === true) || 
		 // Allow: home, end, left, right
		(event.keyCode >= 35 && event.keyCode <= 39)){
			 // let it happen, don't do anything
			 return;
	}
	else {
		// Ensure that it is a number and stop the keypress
		if ($("input[name='ic']").val().length > 11 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
			event.preventDefault(); 
		}   
	}
	});
	$("input[name='phone']").keydown(function(event) {
		// Allow: backspace, delete, tab, escape, and enter
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
			 // Allow: Ctrl+A
			(event.keyCode == 65 && event.ctrlKey === true) || 
			 // Allow: home, end, left, right
			(event.keyCode >= 35 && event.keyCode <= 39)){
				 // let it happen, don't do anything
				 return;
		}
		else {
			// Ensure that it is a number and stop the keypress
			if ($("input[name='phone']").val().length > 10 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault(); 
			}
		}
	});
	
	$("input[name='room']").keydown(function(event) {
		// Allow: backspace, delete, tab, escape, and enter
		if(event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
			 // Allow: Ctrl+A
			(event.keyCode == 65 && event.ctrlKey === true) || 
			 // Allow: home, end, left, right
			(event.keyCode >= 35 && event.keyCode <= 39) ||
			
			(event.keyCode >= 65 && event.keyCode <= 90 && $("input[name='room']").val().length < 4)) {
				 // let it happen, don't do anything
				 return;
		}
		else 
		{
			if ($("input[name='room']").val().length > 3 || event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {			
				event.preventDefault(); 
			}
		}
	}); 
	
	//for editDetails.php form checking
	$("#registerForm").submit(function()
	{
		var flag = true;
		$('#alertcontainer').empty();
		if($("#inputIC").val().length != 12){
			$('#alertcontainer').append('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid IC length</div>');
			$("#inputIC").parent().parent().addClass('has-error');
			flag = false;
		}
		else
			$("#inputIC").parent().parent().removeClass('has-error');
			
		if($("#inputPhone").val().length > 11 ||$("#inputPhone").val().length < 10){
			$('#alertcontainer').append('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid phone number length</div>');
			$("#inputPhone").parent().parent().addClass('has-error');
			flag = false;
		}
		else
			$("#inputPhone").parent().parent().removeClass('has-error');
			
		if($("#inputMatric").val().length != 9){
			$('#alertcontainer').append('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Matric number format</div>');
			$("#inputMatric").parent().parent().addClass('has-error');
			flag = false;
		}
		else
			$("#inputMatric").parent().parent().removeClass('has-error');
			
		if(!flag)
			return false;
	});*/
	
	
});