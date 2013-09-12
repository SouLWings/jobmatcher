$(document).ready(function(){ 
	
	//scroll the dialoghistory box to the bottom if msg is long
	$('#dialoghistory').scrollTop($('#dialoghistory')[0].scrollHeight);
	
	//event where user press something in the input area for message
	$("#inputmsg").keypress(function(event){

		var keycode = null;
		
		//retrieve the keycode
		if(event.keyCode != 0)
			keycode = event.keyCode;
		else
			keycode = event.which;
			
		//if user press "Enter" without holding shift key
		if(keycode == '13' && !event.shiftKey){
			event.preventDefault(); 
			var msg = $.trim($("#inputmsg").val());
			$("#inputmsg").val("");
			
			//if there is something typed there, it will post the message
			if(msg != '')
			{
				$.post("messageAJAX.php",
				{
					action:"sendmsg",
					receiver:contact_id,
					content:msg
				},
				function(data,status){
					if(status == 'success')
					{
						//if the data is saved to database successfully, add the msg to the msghistory
						if(data == 'success')
						{
							$('#dialoghistory').append("<br>"+own_name+': '+msg);
							$('#dialoghistory').scrollTop($('#dialoghistory')[0].scrollHeight);
						}
						else
							alert('failedasd');
					}
					else
						alert('post failed');
				});
			}
		}
 
	});
	
	//set an interval to run the updatemsg() function every second to check whether there is new incoming message
	setInterval( "updatemsg()", 1000 );
});


function updatemsg(){
	var d;
	
	//post to the server to request for new message
	$.post("messageAJAX.php",
	{
		action:"getnewmsg",
		receiver:contact_id,
		latesttime:time
	},
	function(data,status){
		if(status == 'success')
		{
			//if server respond with message, append the message to msghistory to be displayed
			if(data != 'no')
			{
				$('#dialoghistory').append(data);
			}
		}
		else
			alert('updatemsg failed');
	});
	
	//setting var time to current time so that next request will only search for message newer than this time
	d = new Date();
	time = ''+d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
};