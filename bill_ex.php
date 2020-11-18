<?php
	
		
		$foreward_amt=0;
					$forewards='';
		$name=$_GET['guest'];
		$room=$_GET['room'];
		$check_in_date=$_GET['from'];
		$check_out_date=$_GET['to'];
		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"hotel_db");
		
		
		function return_root_room($room,$booking_id,$conn)
		{
			$GLOBALS['id']=$room;
			$qr="select * from foreward_master where booking_id='$booking_id' and status='1'";
			
			
			$r=mysqli_query($conn,$qr);
			$id=$room;
			while($data=mysqli_fetch_assoc($r))
			{
				if(is_numeric(strpos($data['of_room'],$room)))
				{
					if($data['to_room']!=NULL)
					{
						return_root_room($data['to_room'],$booking_id,$conn);
						break;
					}
				}
			}
	
			
			
		}
		$query="select * from room_info where c_room_no='$room'";
		$result=mysqli_query($conn,$query);
		$room_info=mysqli_fetch_assoc($result);
		$room_id=$room_info['room_id'];
		
		$query2="select * from booking_master,booking_detail where booking_master.booking_id=booking_detail.booking_id and 
		checkin_date='$check_in_date' and accompany_name='$name' and room_id='$room_id'";
		//echo $query2;
		$result2=mysqli_query($conn,$query2);
		$data=mysqli_fetch_assoc($result2);
		
		$booking_id=$data['booking_id'];
		echo "<script>alert($booking_id);</script>";
		$query4="select * from booking_detail where booking_id='$booking_id' and checkout_status=1";
		//echo $query4;
		$result4=mysqli_query($conn,$query4);
		?>
        <form name="frm1" method="POST" action="print.php">
        
		<table width="1120" cellpadding="10" cellspacing="0" class="table_php" id="r">
        <tr>
        <td width="165"><input type="hidden" value='<?php echo $name;?>' name="g_name"></td>
        <td width="68"></td>
        <td width="76"></td><td width="111"></td>
        <td width="105"></td>
        <td width="70"></td>
        <td width="127"></td>
       
        <td width="103"></td>
        </tr>
		<?php
		$i=0;
		while($room=mysqli_fetch_assoc($result4))
		{
			
			?><?php
			
			
			
			$tempquery="select * from foreward_master where booking_id='$booking_id' and status='1'";
			$tempresult=mysqli_query($conn,$tempquery);
			while($tempdata=mysqli_fetch_assoc($tempresult))
			{
				$tq="select * from room_info where room_id='$room[room_id]'";
				$tr=mysqli_query($conn,$tq);
				$room_in=mysqli_fetch_assoc($tr);
				$room_number=$room_in['c_room_no'];
				$checkout=$tempdata['checkout_date'];
				$room_rate=$room_in['rate'];
				if(is_numeric(strpos($tempdata['of_room'],$room_number)))
				{
					//$rooms_to_check_out=$data2['of_room'];
					$GLOBALS['id']=0;
					if($tempdata['to_room']!=NULL)
					{
						
						return_root_room($tempdata['to_room'],$booking_id,$conn);
						$id=$GLOBALS['id'];
						//$id=$tempdata['to_room'];
					}					
					else
					{
						$id=$room_number;
					}
					?><tr><td height="41" class="b_d"><?php echo $room['accompany_name'];?><input type="hidden" value='<?php echo $room['accompany_name'];?>' name='<?php echo "g_name_".$i;?>'></td>
                    <td class="b_d"><?php echo $room_number;?><input type="hidden" value='<?php echo $room_number;?>' name='<?php echo "room_no".$i;?>'></td>
					
						
					<td class="b_d"><?php echo $room_rate;?><input type="hidden" value='<?php echo $room_rate;?>' name='<?php echo "rate_".$i;?>'></td>
					<?php
					$no=date_create($data['checkin_date']);
					?>
					<td class="b_d"><?php echo $data['checkin_date'];?></td>
                    <td class="b_d"><?php echo $checkout;?></td>
					<?php
					$dt=$checkout;
					$d=date_create($dt);
		
					$diff=date_diff($d,$no);
					$t_d=$diff->format("%a");
					if(date('H')>10)
					 $t_d+=1;
					 if($t_d==0)
					 {
						$t_d=1;	
					}
					?><td class="b_d"> <?php echo $t_d;?><input type="hidden" value='<?php echo $t_d;?>' name='<?php echo "no_of_days_".$i;?>'></td>
					
					<?php
					
					$foreward_amt=0;
					$forewards='';
					$query_foreward="select * from foreward_master where to_room='$room_number' and booking_id='$booking_id'";
					$result_foreward=mysqli_query($conn,$query_foreward);
					if(mysqli_num_rows($result_foreward))
					{
						while($fr=mysqli_fetch_assoc($result_foreward))
						{
							$forewards=$forewards.$fr['of_room'];
							$foreward_amt=$fr['amount'];
						}
							
							
					}
					else
					{
						$forewards='None';
					}
					
					?>
					 <td class="b_d"><?php echo $forewards;?></td>
           
             <td class="b_d">
             
             <?php 
			 if ($tempdata['bill_status']==0)
			 {
				
			
			 
			 ?> Not paid<input type="checkbox" name='<?php echo $i;?>' class='<?php echo $id;?>' onClick="poll_rest(<?php echo $id;?>,<?php echo $i;?>)" id='<?php echo $i;?>' checked style="visibility:hidden">
           
             </td></tr>
					<?php
                    
					}
					else
					{
						?>
					Bill paid
					<?php
					}
					break;
				}
			}
			
			$i++;
		}
		$l=$i+1;
	?>
    </table>
    
   <center> <input type="hidden" name="booking_id" value='<?php echo $booking_id;?>'><input type="submit" class="button"></center>
    <input type="hidden" id="len" value='<?php echo $l;?>' name="length">

    </form>
        
			
			
		
		
		
	