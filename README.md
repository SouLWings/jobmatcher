jobmatcher
==========

UM job matching system


configure email smtp

1. 	c:\xampp\php\php.ini
	search under [mail function], comment everythg except:
	sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
	mail.add_x_header=Off

2.	c:\xampp\sendmail\sendmail.ini
	delete every thing and paste following lines:
	[sendmail]
	smtp_server=smtp.gmail.com
	smtp_port=587
	error_logfile=error.log
	debug_logfile=debug.log
	auth_username=*****@gmail.com
	auth_password=*****
	force_sender=*****@gmail.com
	
controllers 
	must include 'controller.inc.php';
	
