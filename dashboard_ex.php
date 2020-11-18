<table >
<tr>
<td>
<table cellpadding="12" cellspacing="20">
    <?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$type=$_GET['type'];
	if($type==-1)
	{
		$clause="";
	}
	else
	{
		$clause=" and status=$type";
	}
        if($_GET['state']==0)
		{
		 $query="select distinct floor_no from floor_info order by floor_no";
        $result=mysqli_query($conn,$query);
		}
		else
		{
		$query="select * from room_type";
		$result=mysqli_query($conn,$query);
		}
        while($filter=mysqli_fetch_assoc($result))
        {
           
		   if($_GET['state']==0)
		   { 
		   		$query2="select * from room_info where floor_no=$filter[floor_no]".$clause." order by c_room_no";
            	$result2=mysqli_query($conn,$query2);
		   }
		   else
		   {
			  $query2="select * from room_info where type=$filter[type_id]".$clause." order by c_room_no";
            	$result2=mysqli_query($conn,$query2);
			}
	  ?>
      
       <tr><td colspan="4"><p class="floor"><?php
	    if($_GET['state']==0)
	   echo "Floor $filter[floor_no]";
	   else
	    echo "$filter[type_name]";
	   ?></p></td></tr><tr>
       <?php
            $count=0;            
            while($room=mysqli_fetch_assoc($result2))
            {
                
     
			    
				if($room['status']==0)
				{
                $color="#f44336";
					$query20="select * from booking_detail,booking_master where room_id='$room[room_id]' and checkout_status='0' and checkin_status='1' and booking_master.booking_id=booking_detail.booking_id";
            $result20=mysqli_query($conn,$query20);
			$acc_name=mysqli_fetch_assoc($result20);
			$ac_n=$acc_name['accompany_name'];
				}else if($room['status']==1)
				{
                $color="#53b567";
				$ac_n="Available";
				
				}
				else 
				{
                $color="#ff9800";
				$ac_n="Unavailable";
				}
         ?>               
               <td align="center" bgcolor='<?php echo $color;?>' class="room"><p class="room_no"><?php echo $room['c_room_no'];?></p><div class="name"><?php echo $ac_n;?></div></td>
                
         <?php
                $count++;
                if($count%5==0)
                {
          ?>
                    </tr><tr>
         <?php
                    
                }
				
            }
			if($count==0)
			{
				echo "<td><p class='n_r'>No rooms found</p></td>";
			}
			
          ?>
                </tr>
          <?php
        }
        
    ?>
</table>
</td>
<td></td></tr></table>