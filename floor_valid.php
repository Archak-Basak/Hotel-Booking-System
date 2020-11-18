<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
	$query="select * from floor_info where floor_no=$_GET[floor]";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "floor number $_GET[floor] already exists.";
		echo"<input type='hidden' id='error_received' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_received' value='0'>";
	}
	
?>