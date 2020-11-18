<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
	if(isset($_GET['cancel_all']))
	{
		$query_m="select * from booking_detail where booking_id='$_GET[cancel_all]'";
		$r_m=mysqli_query($conn,$query_m);
		while($data_0=mysqli_fetch_assoc($r_m))
		{
			$qry="update room_info set status=1 where room_id='$data_0[room_id]'";
			$re=mysqli_query($conn,$qry);	
		}
		
		$query="delete from booking_detail where booking_id='$_GET[cancel_all]'";
		$result=mysqli_query($conn,$query);	
		$query="delete from booking_master where booking_id='$_GET[cancel_all]'";
		$result=mysqli_query($conn,$query);	
	
	}
	else if(isset($_GET['delete']))
	{
		$q_c="select * from booking_detail where booking_id=$_GET[bid]";
		$r_c=mysqli_query($conn,$q_c);
		$flag=0;
		if(mysqli_num_rows($r_c)==1)
		{
			$flag=1;
		}
		$q="select * from booking_detail where booking_detail_id='$_GET[delete]'";
		$r=mysqli_query($conn,$q);
		$room_no=mysqli_fetch_assoc($r);
		$qq="update room_info set status=1 where room_id='$room_no[room_id]'";
		$rr=mysqli_query($conn,$qq);
		$query_d="delete from booking_detail where booking_detail_id='$_GET[delete]'";
		$run_del=mysqli_query($conn,$query_d);
		
		if($flag==1)
		{
			$q_d="delete from booking_master where booking_id='$_GET[bid]'";
			mysqli_query($conn,$q_d);
		}
		else
		{
			$r_c=mysqli_query($conn,$q_c);	
			?>
			<table  cellpadding="15" cellspacing="0"  width="300px" class="guests">
    <tr bgcolor='#0078d7' class='header'><td>Guest Name</td><td align='right'><td align='right'><input type="button" id='<?php echo $data['booking_id']?>' value="Cancel all" onClick="cancel_all('<?php echo $_GET['bid']?>')">	</td></tr>
			<?php
			while($d=mysqli_fetch_assoc($r_c))
			{
				echo "<tr><td>".$d['accompany_name']."</td><td align='right'><input type='button' id='$d[booking_detail_id]' value='Cancel' onClick='cancel_one($d[booking_detail_id],$d[booking_id])'></td></tr>";
		
			}
		}
		
		
	}
	else
	{
	$name=$_GET['name'];
	$room=$_GET['room'];
	
	$query="select * from room_info,booking_detail where c_room_no='$room' and booking_detail.room_id=room_info.room_id and accompany_name='$name'";
	$run=mysqli_query($conn,$query);
	while($data=mysqli_fetch_assoc($run))
	{
	
	
		$query2="select * from booking_master where booking_master.booking_id=$data[booking_id] and checkin_status=0";
		//echo $query2;
		$run2=mysqli_query($conn,$query2);
		//$data2=mysqli_fetch_assoc($run2);
		//echo $data2['guest_name'];
		?>
		
	<?php
	?><table  cellpadding="15" cellspacing="0"  width="300px" class="guests">
    <tr bgcolor='#0078d7' class='header'><td>Guest Name</td><td align='right'><input type="button" id='<?php echo $data['booking_id']?>' value="Cancel all" onClick="cancel_all('<?php echo $data['booking_id']?>')">	</td></tr>
    <?php
		if(mysqli_num_rows($run2))
		{
			$query3="select * from booking_detail where booking_id='$data[booking_id]'";
			$run3=mysqli_query($conn,$query3);
			while($data3=mysqli_fetch_assoc($run3))
			{
				echo "<tr><td>".$data3['accompany_name']."</td><td align='right'><input type='button' id='$data3[booking_detail_id]' value='Cancel' onClick='cancel_one($data3[booking_detail_id],$data3[booking_id])'></td></tr>";
			}
		}
		
	}
	}
?></table>