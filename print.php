<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>::Hotel Booking System::</title>
<script>
	function prt()
	{
		window.print();
	}
</script>
<style>
	.table_b
	{
		border: 1.5px solid #4a8bc1;
	font-size: 14px;
	background-color: white;	
	font-family:'Segoe UI';
	}
	
	.table_h
	{
		border: 1.5px solid #4a8bc1;
	font-size: 14px;
	background-color: #4a8bc1;	
	font-family:'Segoe UI';
	color:white;
	}
	.header
	{
		//color:#00C;
		font-weight:600;
	}
	.guest
	{
		font-size:20px;
	}
</style>
</head>

<body>
<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$i=0;
	$grand_total=0;
	
	
	?>
    
    <table cellspacing="5" cellpadding="5" align="center" width="70%" class="table_b">
    <tr><td colspan="4"><p class="guest"><?php echo $_POST['g_name'];?></p></td></tr>
    <tr><td colspan="4"><hr></td></tr>
      <tr><td><p class="header">Guest Name</p></td><td><p class="header">Rate per day</p></td><td><p class="header">No of days</p></td><td><p class="header">Room Service rate</p></td><td><p class="header">Total</p></td></tr>
    <?php
	$qr="update foreward_master set bill_status='1' where booking_id='$_POST[booking_id]' and to_room is NULL and status='1'";
		
		//echo $qr;
			$r=mysqli_query($conn,$qr);
			
	while($i<=$_POST['length'])
	{
		
		if(isset($_POST[$i]))
		{
			$r="room_no".$i;
			$room=$_POST[$r];
			//echo $r;
		$qr2="update foreward_master set bill_status='1' where booking_id='$_POST[booking_id]' and to_room='$room' and status='1'";
		//echo $qr2;
			$r2=mysqli_query($conn,$qr2);
			
			
			//update foreward master set bill status=1 where booking id=$ ans to room=$ and checkout status=1--repeat
			
			//$q="update foreward_info set bill_status=1 where bill_status=0 and to_room='$_POST[room]'";
			//$q2="select * from foreward_info where "
			$guest_name="g_name_".$i;
			$extras="extra_".$i;
			?>
            <tr>
			<td><?php echo $_POST[$guest_name];?></td>
			<?php
			//echo $_POST[$guest_name]."<br>";
			$rate="rate_".$i;
		//	echo $_POST[$rate];
			?>
			<td><?php echo $_POST[$rate];?></td>
			<?php
			$no_of_days="no_of_days_".$i;
			//echo $_POST[$no_of_days];
			$total=$_POST[$no_of_days]*$_POST[$rate];
			?>
				<td><?php echo $_POST[$no_of_days];?></td>
                <td><?php echo $_POST[$extras];?></td>
                <?php $total+=$_POST[$extras];?>
                <td><?php echo $total;?></td></tr>
			<?php
			$grand_total+=$total;
		}
		$i++;
	}
?>
<tr>
<td colspan="4">
<hr>
</td>
</tr>
<tr>
<td>Total</td>
<td></td>
<td></td>
<td>
<?php echo $grand_total;?>
</td>
</tr>
</table>
<center>
<input type="button" onClick="prt()" value="print">
</center>
</body>
</html>