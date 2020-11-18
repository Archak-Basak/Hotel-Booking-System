<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
function submit_form()
{
	this.form.submit();
}
</script>

</head>

<body onload="init()">
<table width="100%" border>
<tr>
<?php

	if(!empty($_POST['room']))
	{
		foreach ($_POST['room'] as $room)
		{
			echo $room;
		}
	}
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$query="select *from room_info where status=0";
	$result=mysqli_query($conn,$query);
	
	if($result)
	{
		while($data=mysqli_fetch_assoc($result))
		{
			$query2="select * from booking_detail where room_id='$data[room_id]'";
			$result2=mysqli_query($conn,$query2);
			$data2=mysqli_fetch_assoc($result2);
			
			
			
			?>
				<td>
                <form name="frm1" method="POST"><input onChange="this.form.submit()" type="checkbox" id="check" name="room[]" value='<?php echo $data['room_id'];?>'><?php echo $data['c_room_no'];?></form></td>
			<?php	
		}
	}
?>
</tr>
</table>
<br>
<br>
</body>
</html>