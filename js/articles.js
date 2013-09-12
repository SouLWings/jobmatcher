$(document).ready(function(){ 

	//when edit article button is clicked, the content and title of the article will be copied to the modal form
	$('.btneditarticle').click(function(){
		$('#editarticleform').find("input[name='articleid']").val($(this).closest("section").find("input[name='articleid']").val());
		$('#editarticleform').find("#edittitle").val($(this).closest("section").find("header").text());
		$('#editarticleform').find("#editcontent").val($(this).closest("section").find("article").text());
	});
	
	//when delete article button is clicked, the id of article to be deleted will be copied to the form
	$('.btndeletearticle').click(function(){
		$('#deletearticleform').find("input[name='articleid']").val($(this).closest("section").find("input[name='articleid']").val());
	});
});