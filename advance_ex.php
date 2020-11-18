<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	//$guest=$_GET['guest'];
	$id=$_GET['id'];
	if(isset($_GET['amt']))
	{
		
		$dt=date('Y.m.d');
		$q="insert into advance_master(booking_id,advance_amount,advance_date)values('$_GET[id]','$_GET[amt]','$dt')";
		$r=mysqli_query($conn,$q);
		//echo $q;
		$q_m="select advance from booking_master where booking_id='$_GET[id]'";
		$r_m=mysqli_query($conn,$q_m);
		$ad=mysqli_fetch_assoc($r_m);
		$advance=$ad['advance'];
		$advance=$advance+$_GET['amt'];
		$q_up="update booking_master set advance=$advance where booking_id='$_GET[id]'";
		$q_up=mysqli_query($conn,$q_up);
		
		//echo $q;
		
	}
	$qr="select * from booking_master where booking_id='$_GET[id]'";
		$rr=mysqli_query($conn,$qr);
		$guest=mysqli_fetch_assoc($rr);
		//echo 
		$acc="select * from booking_detail where booking_id='$_GET[id]'";
		$acc_r=mysqli_query($conn,$acc);
		echo "<table width='75%' ><tr><td><p class='mn'>".$guest['guest_name']."</p></td><td colspan='3'><p class='mn'>Payment Summary</p></td></tr> <tr><td valign='top'><table  cellspacing='0' cellpadding='15' class='guests'  width='550' >
		
		<tr  bgcolor='#0078d7' class='header'>
		<td>Accompany name</td>
		<td>Room no</td>
		<td>Status</td></tr>
		";
		while($accompany=mysqli_fetch_assoc($acc_r))
		{
			$room_q="select * from room_info where room_id='$accompany[room_id]'";
			$rr=mysqli_query($conn,$room_q);
			$resl=mysqli_fetch_assoc($rr);
			echo "<tr><td class='b'>".$accompany['accompany_name']."</td>";
			echo "<td class='b'>".$resl['c_room_no']."</td>";
			if($accompany['checkout_status']==0)
				echo "<td class='b'>Currently Booked</td></tr>";
			else
				echo "<td class='b'>Checked out</td></tr>";
		}
		echo "</table>";
	$query="select * from advance_master where booking_id='$id'";
		//echo $query;
	$res=mysqli_query($conn,$query);
	
	?>
    </td>
    <title>::Hotel Booking System::</title>
    
    <td valign="top">
	<table width="439" cellpadding="15" cellspacing="0" class="guests">
    
    <tr bgcolor='#0078d7' class='header'>
   
    <td>Description</td>
    <td>Amount</td>
    <td>Date</td>
    </tr>
	<?php
	if(mysqli_num_rows($res))
	{
		
		
		while($data=mysqli_fetch_assoc($res))
		{
		?>
			<tr>
           
            <td>Advance Paid</td>
            <td><?php echo $data['advance_amount'];?></td>
            <td><?php echo $data['advance_date'];?></td>
            </tr>
            
		<?php
		
        }
	}
	else
	{
		?>
			<tr><td colspan='3'>No Payments made</td></tr>
		<?php
	
	}
		
	
	
?>
</table>
<br>
<table width="439" cellpadding="15" cellspacing="0" class="guests">
<tr>

<form name="f1">
<input type="hidden" id='id' name="id" value='<?php echo $id;?>'>
<td >Make payment</td><td><input type="text" id="amt" size="4"></td><td>
<input type="button" onClick="pay()"  class="button" value="pay"></td>
</form>
</td></tr>
</table>
</td></tr>
</table>
