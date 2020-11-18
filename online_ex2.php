 
 
 <table cellpadding="10" cellspacing="0" class="rooms_t" border>
 <tr><td class='bordr'>Room Type</td><td class='bordr'>Rate per day</td><td class='bordr'>No of Rooms available</td><td class='bordr'>No of rooms to book</td></tr>
<?php
	
	/*$query0="select * from floor_info";
	$result0=mysqli_query($conn,$query0);
	while($data0=mysqli_fetch_assoc($result0))
	
	{*/
	session_start();
	$checkin=$_GET['date1'];
	$checkout=$_GET['date2'];
	
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
		
		//$fl=$data0['floor_no'];
		$q="select * from room_type";
		$r=mysqli_query($conn,$q);
		$ctr=0;
		while($d=mysqli_fetch_assoc($r))
		{
			$ctr++;
			if($ctr%2==0) 
				$color='#e5dcdc';
				else
				$color='white';
				
				echo "<tr bgcolor=$color><td class='bordr'>".$d['type_name']." </td><td class='bordr'>".$d['rate']."</td>";
		
	$query="select * from room_info where type='$d[type_id]' order by c_room_no";
	//echo $query;
	$result=mysqli_query($conn,$query);
	$count=0;
	$av=0;
	while($data=mysqli_fetch_assoc($result))
	{
		$i=0;
		//echo "i=0";
		$query_d="select * from booking_master where checkin_status <> '2'";
		$res_d=mysqli_query($conn,$query_d);
		
		while($dat_d=mysqli_fetch_assoc($res_d))
		{
			$chk_in=$dat_d['checkin_date'];
			$chk_out=$dat_d['checkout_date'];
			//echo $chk_out;
			$check_in_date_d=explode("-",$chk_in);
			$check_out_date_d=explode("-",$chk_out);
			$check_in_date_u=explode("-",$checkin);
			$check_out_date_u=explode("-",$checkout);
			
			if($check_in_date_d[1]==$check_in_date_u[1])
			if(($check_in_date_d[2]>=$check_in_date_u[2] && $check_in_date_d[2]<=$check_out_date_u[2]) || ($check_out_date_d[2]<=$check_out_date_u[2] && $check_out_date_d[2]>=$check_in_date_u[2])||($check_in_date_d[2]<=$check_in_date_u[2] && $check_out_date_d[2]>=$check_out_date_u[2]))
			{
				//echo $dat_d['booking_id'];	
				$booking_id=$dat_d['booking_id'];
				$query_rooms="select * from booking_detail where booking_id='$booking_id' and checkout_status=0";
				$res_r=mysqli_query($conn,$query_rooms);
				
				while($data_r=mysqli_fetch_assoc($res_r))
				{
					
					$room_id[$i]=$data_r['room_id'];
				
					$i++;	
				}
			}
			
		}
		$flag=0;
		//echo "room id= ".$data['room_id'];
		for($k=0;$k<$i;$k++)
		{
			if($data['room_id']==$room_id[$k])
			{
				$flag=1;
			//	echo "  ".$data['room_id'];
			
				break;	
			}
		}
		
		
		
            
          if($flag==0)
		  {
				$av++;
		  }
             
            
       
	
		
	}		
	
	echo "<td class='bordr'>".$av."</td><td class='bordr'><input type='number' id='$d[type_id]' value='0' size='4' class='room_nos'><input type='hidden' id='amt$d[type_id]' value=$d[rate]></td></tr>";
		}
	
?>



</table>

<table cellpadding="10" cellspacing="10" border width="100%" align="center">
<tr>
<td width="132">
<input type="text" id="guest_name" placeholder="Name" class="user" style="outline:none">
</td><td width="900px"></td></tr><tr><td>
<input type="text" id="guest_email" placeholder="Email" class="user" style="outline:none">
</td><td width="900px"></td></tr><tr><td>
<input type="text" id="guest_phone" placeholder="Phone" class="user" style="outline:none">
</td><td width="900px"></td></tr>
<tr><td>

<input type="button" onClick="reserve_room()" value="Proceed to payment">
</td></tr></table>
</td></tr></table>