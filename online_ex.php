<?php 
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$dt=strtotime($_GET['date1']);
			$tdt=strtotime($_GET['date1']);
			$dt2=strtotime($_GET['date2']);
			$qr="select * from room_type";
			$r_s=mysqli_query($conn,$qr);
			//echo "<table border>";
	while($dt0=mysqli_fetch_assoc($r_s))
	{
		$count=0;
		echo "type name=".$dt0['type_name']."";
		$query="select * from room_info where type=$dt0[type_id]";
		$res=mysqli_query($conn,$query);
		$booked=0;		
		while($data=mysqli_fetch_assoc($res))
		{
			//echo "$data[c_room_no]<br>";
			$room_id=$data['room_id'];
			$i=0;
			$dt=strtotime($_GET['date1']);
			while($dt<=$dt2)
			{
				$print=0;
				$room_q="select * from booking_detail where room_id='$room_id'";
				$room_r=mysqli_query($conn,$room_q);	
				$flag=0;	
				while($room_d=mysqli_fetch_assoc($room_r))
				{
					$print=1;
					$q="select * from booking_master,booking_detail where booking_master.booking_id=booking_detail.booking_id and booking_detail.room_id='$data[room_id]'";
					$r=mysqli_query($conn,$q);
					$flag=0;
					while($d=mysqli_fetch_assoc($r))
					{
						$checkin=strtotime($d['checkin_date']);
						$checkout=strtotime($d['checkout_date']);
								
						if($dt>=$checkin && $dt<=$checkout)
						{
							//echo "<br> Booking ID= ".$d['booking_id']."Dates".date("Y-m-d",$checkin)." ".date("Y-m-d",$dt)." ".date("Y-m-d",$checkout);
							//echo "<br>room id".$data['room_id']."room no =".$data['c_room_no']." booked on ".date("Y-m-d",$dt);		
							$flag=1;
							$booked=1;
							break;
						}
						else
						{
							//echo "<br> Booking ID= ".$d['booking_id']."Dates".date("Y-m-d",$checkin)." ".date("Y-m-d",$dt)." ".date("Y-m-d",$checkout);
							//echo "<br>room id".$data['room_id']."room no =".$data['c_room_no']." not booked on ".date("Y-m-d",$dt);		
							
						}
					}
					if($booked==1)
					{
						echo "<br>room id".$data['room_id']."room no =".$data['c_room_no']." booked on ".date("Y-m-d",$dt);		
							
						break;
					
					}
				}
				if($booked==1)
						break;
				$dt=strtotime("+1 day", $dt);
						
			}
			if($flag==0)
				$count++;	
			//else
			//echo "<br>flag=1<br>";
				
		}
	//	echo "<td>$dt0[rate]</td><td>$count</td><td><input type='text' id='$dt0[type_id]' value='0'></tr>";			
		echo $count."<br>";
	}
	
	echo "</table>";
?>