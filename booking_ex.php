 
 
 <table cellpadding="10" cellspacing="10" width="1090px" >
<?php
	
	/*$query0="select * from floor_info";
	$result0=mysqli_query($conn,$query0);
	while($data0=mysqli_fetch_assoc($result0))
	
	{*/
	session_start();
	echo "<br><br><br>";
	$checkin=$_GET['checkin'];
	$checkout=$_GET['checkout'];
	
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
		
		//$fl=$data0['floor_no'];
		$q="select * from room_type";
		$r=mysqli_query($conn,$q);
		while($d=mysqli_fetch_assoc($r))
		{
			?>
			<tr><td colspan="5" class="header_text"><?php echo $d['type_name']." rooms - Rs ".$d['rate'];?></td></tr><tr>
			<?php
		
	$query="select * from room_info where type='$d[type_id]' order by c_room_no";
	//echo $query;
	$result=mysqli_query($conn,$query);
	$count=0;
	
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
		
		
		?>
        	<td height="100px"  valign="top">
            
            <table bgcolor="<?php if($flag==0) echo"#0099CC";else echo"red";?>" ><tr>
              <td style="margin-top:0px" height="20px" class="room_no" width="180px" >
            
            <table  onClick="try_check('<?php echo $data['room_id'];?>','<?php echo $_SESSION['login_name'];?>')"  id='<?php echo "table".$data['room_id'];?>' class="tct"><tr><td width="20"><input name="room[]" value='<?php echo $data['room_id']?>' id='<?php echo $data['room_id'];?>' 
            onclick="trigger_anim(<?php echo $data['room_id'];?>)" type="checkbox" style="visibility:hidden" class="rooms_"></td><td width="17"><p class="room_number" id='<?php echo "room_no".$data['room_id'];?>'> <?php echo $data['c_room_no'];?></p></td><td width="138" align="right"><p class="rate_box"></p></td></tr></table>
            
            <div id='<?php echo "div".$data['room_id'];?>' class="accompany">
            <p class="name">Accompany Name</p>
            
           <p class="name"> <input type="radio" name='radio'  id='<?php echo "accompany".$data['room_id']?>' 
            onclick="same_as_clicked(<?php echo $data['room_id'];?>)" class='<?php echo $data['room_id'];?>'>Same as Guest</p>
            
            &nbsp;<input type="text"  onKeyUp="validate_acc('<?php echo $data['room_id'];?>')" name='<?php echo "text".$data['room_id']?>' id='<?php echo "text".$data['room_id']?>'  onClick="toggle_radio(<?php echo $data['room_id'];?>)" class="acc_name">
            
            <p class="valid2">Invalid Input</p>
            <input type="hidden" name="rate" id='<?php echo "rate".$data['room_id'];?>' value='<?php echo $d['rate'];?>' >
            </div>
          <input type="hidden" value='<?php echo $d['type_name'];?>' id='<?php echo "room_type".$data['room_id'];?>'>
          
            </td></tr></table>
            </td>
            
        <?php	
		$count++;
		if($count%5==0)
		{
		?></tr><tr><?php
		}
	
		
	}		
	?></tr><tr><?php
	
		}
	
?>
</tr>


</table>
