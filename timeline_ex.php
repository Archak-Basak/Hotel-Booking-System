<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	//echo $_GET['date1'];
	$i=0;
	$print=0;
	
	if($_GET['room_type']>-1)
		$tm="where type='$_GET[room_type]'";
	else
		$tm="";
	//	$dt=strtotime("+1 day", strtotime($_GET['date1']));
		//echo "<br>".date("Y-m-d",$dt);
			$dt=strtotime($_GET['date1']);
			$tdt=strtotime($_GET['date1']);
			$dt2=strtotime($_GET['date2']);
		
		?>
						<table cellspacing="2px" cellpadding="2px" class="tab"><tr><td>
                        <?php 
		
		while($tdt<=$dt2)
		{
			?>
						<td  bgcolor="#CCCCCC">
                        <?php 
					//	$main_col++;
			echo "<p class='text'>".date("d-m-Y",$tdt)."</p></td>";
			$tdt=strtotime("+1 day", $tdt);
		}
		$query="select * from room_info $tm";
		$res=mysqli_query($conn,$query);
		while($data=mysqli_fetch_assoc($res))
		{
			echo "</tr><tr><td  width='100px' bgcolor='#CCCCCC'>$data[c_room_no]</td>";
			$room_id=$data['room_id'];
			$i=0;
			$dt=strtotime($_GET['date1']);
			while($dt<=$dt2)
			{
				$print=0;
				$room_q="select * from booking_detail where room_id='$room_id'";
				$room_r=mysqli_query($conn,$room_q);		
				while($room_d=mysqli_fetch_assoc($room_r))
				{
					$print=1;
					$q="select * from booking_master,booking_detail where booking_master.booking_id=booking_detail.booking_id and booking_detail.room_id='$data[room_id]' and booking_detail.checkout_status<>1";//last line added
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
							?>
							<td bgcolor="#f44336" width="140px"><?php echo $d['accompany_name'];?></td>
                            <?php 
							$flag=1;
						}
					}
					if($flag==0)
					{
						//echo "<br> Dates".date("Y-m-d",$checkin)." ".date("Y-m-d",$dt)." ".date("Y-m-d",$checkout);
						//echo "<br>room id".$data['room_id']."room no =".$data['c_room_no']." not booked on ".date("Y-m-d",$dt);
						//?>
						<td bgcolor="#4caf50" ></td>
                        <?php 
						$flag=1;
						$print=1;
					}
					break;
				}
				$dt=strtotime("+1 day", $dt);
				if($print==0)
				{
					?>
						<td bgcolor="#4caf50" ></td>
                        <?php 	
				}			
			}
		}
		echo "</table>";	
		
?>