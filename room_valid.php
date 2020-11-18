<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
	$query="select * from room_info where c_room_no=$_GET[room]";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "room number $_GET[room] already exists.";
		echo"<input type='hidden' id='error_received' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_received' value='0'>";
	}
	
?>