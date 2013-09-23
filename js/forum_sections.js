$(document).ready(function(){ 

	//when type button is clicked, the id of thread will be copied to the form
	$('.btnchgthreadtype').click(function(){
		$('#modalchgthreadtype').find("input[name='threadid']").val($(this).closest("td").find("input[name='threadid']").val());
	});
	
	//when delete section button is clicked, the id of thread will be copied to the form
	$('.btnchgthreadstatus').click(function(){
		$('#modalchgthreadstatus').find("input[name='threadid']").val($(this).closest("td").find("input[name='threadid']").val());
	});
	
	//when delete section button is clicked, the id of section to be deleted will be copied to the form
	$('.btnremovethread').click(function(){
		$('#modalremovethread').find("input[name='threadid']").val($(this).closest("td").find("input[name='threadid']").val());
	});
	
	$('.pagination .disabled a, .pagination .active a').on('click', function(e) {
		e.preventDefault();
	});
});