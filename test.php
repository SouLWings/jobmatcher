<html>
<body>
<<<<<<< HEAD
<?php 
$con = new mysqli("127.0.0.1", "root", "", "job_matcher");
$result = $con->query("
declare @i int =1;

 select [sender_ID],[receiver_ID], [content],[time], c.username as sender , d.username as receiver into #temp0
 from message as a

inner join account c on c.id = sender_ID 
inner join account d on d.id = receiver_ID 
where  [time] = (SELECT MAX([time]) FROM message WHERE (([sender_ID] = [a].[sender_ID]) and ([receiver_ID] = @i)) or ([sender_ID] = @i) and ([receiver_ID] = a.[receiver_ID]) ) 
group by [sender_ID],[receiver_ID], [content],[time], [c].[username] , [d].[username] 

select a.[sender_ID],a.[receiver_ID],a.[content],a.[sender],a.[receiver],a.[time],
          b.[sender_ID] as sender_ID2,b.[receiver_ID] as receiver_ID2 ,b.[content] as content2,
		 b.[sender] as sender2,b.[receiver] as receiver2,b.[time] as [time2] into #temp1 
from #temp0 as a
inner join #temp0 as b on (a.sender_ID=b.receiver_ID) and (a.receiver_ID=b.sender_ID)

select top (select (count(*))/2 from #temp0) a.sender, a.[receiver],a.content,'Date1'=cast(((convert(varchar(30), time, 112))+( replace(replace(convert(varchar(30), time, 108),':',''),':','')))as bigint), a.[sender2], a.[receiver2],a.content2, 'Date2'=cast(((convert(varchar(30), time2, 112))+(replace(replace(convert(varchar(30), time2, 108),':',''),':',''))) as bigint),time,time2 into #temp2
from #temp1 as a

select 'Sender'=case when Date1>Date2 then (sender) else (sender2) end,'Content'=case when Date1>Date2 then (content) else (content2) end,'Time'=case when Date1>Date2 then (time) else (time2) end
from #temp2 
order by [Time]desc           

drop table #temp0,#temp1,#temp2
");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
/*
if(mail("alan_98797@hotmail.com","halo","sm msg"))
	echo 'true';
else
	echo 'false';*/

?>
=======
<form action='messageCTRL.php' method='post'>
<input type='hidden' value='sendmsg' name='action'/>
<input type='hidden' value='3' name='receiver'/>
<input type='hidden' value='asdasdsadasdasds' name='content'/>
<input type='submit' value='submit'/>
</form>
<?php 

			$date = ''.getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
			echo md5('123456');?>
>>>>>>> origin/llaw
</body>
</html>