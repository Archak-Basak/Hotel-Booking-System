<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
	$query="select * from room_info where c_room_no=$_GET[room] and room_id <> $_GET[id]";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "Room number $_GET[room] already exists.";
		echo"<input type='hidden' id='error_received_e' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_received_e' value='0'>";
	}
	
?>