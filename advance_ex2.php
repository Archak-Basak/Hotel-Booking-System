<?php 
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$guest=strtolower($_GET['guest_name_google']);
	if(strlen($guest)>0)
	{
	$len=strlen($guest);
	$query="select * from booking_detail,booking_master,room_info where accompany_name LIKE '%$guest%' and booking_detail.room_id=room_info.room_id and checkout_status=0 and checkin_status=1 and booking_detail.booking_id=booking_master.booking_id";
	//echo $query;
	$result=mysqli_query($conn,$query);
	echo"<br><br><table  width='280px' cellspacing='0' cellpadding='0' class='google'>
	<tr><td height='40px'></td><td></td></tr>";
	$room=false;
	
	if($result)
	{
		if(!mysqli_num_rows($result))
		{
			$query="select * from booking_detail,room_info where c_room_no LIKE '$guest%' and booking_detail.room_id=room_info.room_id and checkout_status=0";
			$result=mysqli_query($conn,$query);
			if($result)
			{
				$room=true;
				if(!mysqli_num_rows($result))
				{		
					echo "<tr class='border_down'><td><p>No Results found</p></td></tr>";
				}
			}
			
			
		}
	while($data=mysqli_fetch_assoc($result))
	{
		
		$database=strtolower($data['accompany_name']);
		$index=strpos($database,$guest);
		$str=str_split($data['accompany_name']);
		$i=0;
		$k=0;
		$length=strlen($database);
		
		echo "<tr class='border_down' onMouseOver='ok_td($data[booking_id])' onClick='ok($data[booking_id])'><td width='200px'><p id='$data[booking_id]' >";
		while($i<$length)
		{
			if($i>=$index && $k<$len && $room==false)
			{
				echo "<b>$str[$i]</b>";
				$k++;
			}
			else
			{
				echo "$str[$i]";
			}
			$i++;
		}
		if($room)
		{
			echo "<p><td> Room ";
		$str=str_split($data['c_room_no']);
		$length=strlen($data['c_room_no']);
		$i=0;
		while($i<$length)
		{
			if($i<strlen($guest))
			{
				echo"<b>$str[$i]</b>";
			}
			else
			{
				echo"$str[$i]";
			}	
			$i++;
		}
		echo "</td>";	
		}
		else
		echo"</p><td > Room ".$data['c_room_no']."</td>";
		echo "</tr>";
	
	}
	}
	else if($result_n)
	{
		
	}
	echo "</table>";
	}
	
?>

