<?php
	$conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"hotel_db");
	
	if(isset($_GET['dep']))
	{
		
		$date=date("Y-m-d");
	$query_ex="select * from booking_master where checkout_date='$date'";
	//echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	echo "<table class='div_t'>";
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select * from booking_detail where booking_id='$data[booking_id] and checkout_status='0'";
		//echo $qr;
		$rs=mysqli_query($conn,$qr);
		if($rs)
		{
		while($dt=mysqli_fetch_assoc($rs))
		{
			$rooms="select * from room_info where room_id=$dt[room_id]";
			$rooms1=mysqli_query($conn,$rooms);
			$r_data=mysqli_fetch_assoc($rooms1);
			echo "<tr><td class='td1'>".$dt['accompany_name']."</td><td class='td1'>".$r_data['c_room_no']."</td></tr>";
			//echo "<br>";
		}
		}
		
		
	}
	echo "</tr></table><center><input type='button' onclick='close_modal()' value='close'></center>";
	}
	
	if(isset($_GET['chk']))
	{
		
		$date=date("Y-m-d");
	$query_ex="select * from booking_master where checkin_date='$date' and checkin_status=1";
	//echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	echo "<table class='div_t'><tr><td class='td1'>Name</td><td class='td1'>Room No</td></tr>";
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select * from booking_detail where booking_id='$data[booking_id]'";
		//echo $qr;
		$rs=mysqli_query($conn,$qr);
		while($dt=mysqli_fetch_assoc($rs))
		{
			$rooms="select * from room_info where room_id=$dt[room_id]";
			$rooms1=mysqli_query($conn,$rooms);
			$r_data=mysqli_fetch_assoc($rooms1);
		
			echo "<tr><td class='td1'>".$dt['accompany_name']."</td><td class='td1'>".$r_data['c_room_no']."</td></tr>";
			//echo "<br>";
		}
				
	}
	echo "</table><center><input type='button' onclick='close_modal()' value='close'></center>";
	}
	
	if(isset($_GET['arr']))
	{
		
		$date=date("Y-m-d");
	$query_ex="select * from booking_master where checkin_date='$date' and checkin_status=0";
	//echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select * from booking_detail where booking_id='$data[booking_id]'";
		//echo $qr;
		$rs=mysqli_query($conn,$qr);
		while($dt=mysqli_fetch_assoc($rs))
		{
			echo $dt['accompany_name'];
			echo "<br>";
		}
		echo "<br>";
		
	}
	}
	
	if(isset($_GET['i_h']))
	{
		$qr="select * from room_info where status=0";
		$res=mysqli_query($conn,$qr);
		echo "<table class='div_t'><tr><td class='td1'>Name</td><td class='td1'>Room No</td></tr>";
		while($room=mysqli_fetch_assoc($res))
		{
		
		$query20="select * from booking_detail,booking_master where room_id='$room[room_id]' and checkout_status='0' and checkin_status='1' and booking_master.booking_id=booking_detail.booking_id";
            $result20=mysqli_query($conn,$query20);
			$acc_name=mysqli_fetch_assoc($result20);
			echo "<tr><td class='td1'>".$acc_name['accompany_name']."</td><td class='td1'>".$room['c_room_no']."</td></tr>";
			//echo "<br>";
		}
		echo "</table><center><input type='button' onclick='close_modal()' value='close'></center>";
			
	}
	if(isset($_GET['online']))
	{
		$online="select *  from booking_master where online=1";
		$dt=mysqli_query($conn,$online);
		echo "<table class='div_t'><tr><td class='td1'>Guest Name</td><td class='td1'>Email</td><td class='td1'>Phone No</td></tr>";
		while($dta=mysqli_fetch_assoc($dt))
		{
			echo "<tr><td class='td1'>".$dta['guest_name']."</td><td>".$dta['guest_email']."</td><td class='td1'>".$dta['guest_phone']."</td></tr>";
		}	
			echo "</table><center><input type='button' onclick='close_modal()' value='close'></center>";
	}
?>