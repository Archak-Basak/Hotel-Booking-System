<?php
	$conn=mysqli_connect("localhost","root");
	$db=mysqli_select_db($conn,"hotel_db");
	//echo "ok";
	$email=$_GET['email'];
	$query="select * from booking_master,booking_detail where guest_email='$email' and checkout_status='0' and booking_master.booking_id=booking_detail.booking_id";
	//echo $query;
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res))
	{
		echo "There is already a current booking with email <b>$email</b>";
		echo"<input type='hidden' id='error_status' value='1'>";
	}
	else
	{
		echo"<input type='hidden' id='error_status' value='0'>";
	}
	
?>