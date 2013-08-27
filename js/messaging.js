$(document).ready(function(){ 
		
	$("#inputmsg").keypress(function(event){

		var keycode = null;
		if(event.keyCode != 0)
			keycode = event.keyCode;
		else
			keycode = event.which;
		if(keycode == '13' && !event.shiftKey){
			event.preventDefault(); 
			var msg = $.trim($("#inputmsg").val());
			$("#inputmsg").val("");
			$.post("messageAJAX.php",
			{
				action:"sendmsg",
				receiver:contact_id,
				content:msg
			},
			function(data,status){
				if(status == 'success')
				{
					if(data == 'success')
						$('#dialoghistory').append("<br>"+own_name+': '+msg);
					else
						alert('failedasd');
				}
				else
					alert('post failed');
			});
		}
 
	});
	setInterval( "updatemsg()", 1000 );
});
function updatemsg(){
	var d;
	$('#test').text('now requesting '+time);
	$.post("messageAJAX.php",
	{
		action:"getnewmsg",
		receiver:contact_id,
		latesttime:time
	},
	function(data,status){
		if(status == 'success')
		{
			if(data == 'no')
				var y = 0;
			else
			{
				$('#dialoghistory').append(data);
			}
		}
		else
			alert('updatemsg failed');
	});
	d = new Date();
	time = ''+d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
};