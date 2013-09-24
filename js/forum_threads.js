$(document).ready(function(){ 
	
	$('.btndeletepost').click(function(){
		$('#modaldeletepost').find("input[name='pid']").val($(this).closest("div").find("input[name='postid']").val());
	});
	
	$('.btneditpost').click(function(){
		$('#modaleditpost').find("input[name='pid']").val($(this).closest("div").find("input[name='postid']").val());
		$('#modaleditpost').find("textarea").val($(this).parent().justtext());
	});
	
	$('.pagination .disabled a, .pagination .active a').on('click', function(e) {
		e.preventDefault();
	});
});

jQuery.fn.justtext = function() {

    return $(this).clone()
            .children()
            .remove()
            .end()
            .text().trim();

};