<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
	$query="select * from floor_info where floor_no=$_GET[floor_no] and floor_id<>'$_GET[id]'";
	//echo $query;
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "Floor '$_GET[floor_no]'  already exists.";
		echo"<input type='hidden' id='error_received_e' value='1'>";
		
		$query="select * from floor_info where floor_name='$_GET[alias]' and floor_id<>'$_GET[id]'";
	//echo $query;
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "'$_GET[alias]' floor already exists.";
		echo"<input type='hidden' id='error_received_e' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_received_e' value='0'>";
	}
	}
	else
	{
		
		$query="select * from floor_info where floor_name='$_GET[alias]' and floor_id<>'$_GET[id]'";
	//echo $query;
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result))
	{
		echo "    '$_GET[alias]' already exists.";
		echo"<input type='hidden' id='error_received_e' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_received_e' value='0'>";
	}
		
		//echo"<input type='hidden' id='error_received_e' value='0'>";
	}
	
	
	
//	or 
?>