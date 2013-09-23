$(document).ready(function(){ 

	//when edit section button is clicked, the content and title of the section will be copied to the modal form
	$('.btneditsection').click(function(){
		$('#editsectionform').find("input[name='sectionid']").val($(this).closest("tr").find("input[name='sectionid']").val());
		$('#editsectionform').find("input[name='title']").val($(this).closest("tr").find("b").text());
		$('#editsectionform').find("textarea").val($(this).closest("tr").find("h6").text());
	});
	
	//when delete section button is clicked, the id of section to be deleted will be copied to the form
	$('.btndeletesection').click(function(){
		$('#deletesectionform').find("input[name='sectionid']").val($(this).closest("tr").find("input[name='sectionid']").val());
	});
});