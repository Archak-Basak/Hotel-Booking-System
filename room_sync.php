<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	if(isset($_GET['booking']))
	{
		if($_GET['mode']==1)
		{
			$query_b="insert into room_sync(page,room_id,username,user)values('booking','$_GET[room]','$_GET[username]','admin')";
			$result_b=mysqli_query($conn,$query_b);
				
		}
		else
		{
			$query_b="delete from room_sync where page='booking' and room_id='$_GET[room]' and username='$_GET[username]'";
			$result_b=mysqli_query($conn,$query_b);		
		}
	}
	
	if(isset($_GET['query']))
	{
		$user=$_GET['username'];
		$query="select* from room_sync where username<>'$user'";
		$run=mysqli_query($conn,$query);
		while($dt=mysqli_fetch_assoc($run))
		{
			echo $dt['room_id'].",";	
		}	
	}
	/*$user=$_GET['username'];
	$query="select* from room_sync where username<>'$user'";
	//echo $query;
	$run=mysqli_query($conn,$query);
	while($dt=mysqli_fetch_assoc($run))
	{
		echo $dt['room_id'].",";	
	}*/
?>