<?php
	$conn=mysqli_connect("localhost","root");
	$db=mysqli_select_db($conn,"hotel_db");
	$qr0="insert into room_info_backup(room_no,floor_no,status,type,upgradable,c_room_no,rate)values('1','1','1','1','1','1','1')";
			
		//	echo $qr0;
			$r0=mysqli_query($conn,$qr0);
?>