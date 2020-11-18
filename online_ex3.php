<?php
		$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
		
		$name=$_GET['guest_name'];
		$phone=$_GET['guest_phone'];
		//$address=$_POST['guest_address'];
		//$phone=$_POST['guest_phone'];
		$email=$_GET['guest_email'];  
		//$cur_date=date('Y.m.d'); 
		$cur_date=date_create(date('Y.m.d'));
		$c_date=date_create($_GET['date1']);
		$n=date_diff($c_date,$c_date);
		$no_of_days=$n->format("%a");
		
		
		
		$c_to_date=$_GET['date2'];
		$query="insert into 			  
		booking_master(guest_name,guest_email,checkin_date,checkout_date,checkin_status,guest_phone,online)values('$name','$email','$_GET[date1]','$c_to_date','0','$phone','1')";
		echo $query;
		$result=mysqli_query($conn,$query);
		if($result)
		{
			$query1="select * from booking_master where guest_email='$email'";
			$result1=mysqli_query($conn,$query1);
			$temp=mysqli_fetch_assoc($result1);
			$b_id=$temp['booking_id'];
		
			
				$i=0;
		for($i=0;$i<$_GET['n'];$i++)
		{
			$index="type".$i;
			$type=$_GET[$index];
			$rooms=explode("-",$type);
			$type_id=$rooms[0];
			$no_of_rooms=$rooms[1];
			$qry="select * from room_info where type='$type_id'";
			$run=mysqli_query($conn,$qry);
			$k=0;
			while($k<$no_of_rooms)
			{
				$data=mysqli_fetch_assoc($run);
				$room=$data['room_id'];
				
				//$id="text".$room;
					//$accompany=$_POST[$id];
					$query2="insert into booking_detail(booking_id,room_id,accompany_name,checkout_status) values('$b_id','$room','unavailable','0')";
		    		echo $query2;
					$result2=mysqli_query($conn,$query2);
					
					$query3="update room_info set status=0 where room_id='$room'";
					$result3=mysqli_query($conn,$query3);
					$k++;
				
			}
			
		}
				
				
				
				/*foreach($_GET['room'] as $room)
				{
					//$id="text".$room;
					//$accompany=$_POST[$id];
					$query2="insert into booking_detail(booking_id,room_id,accompany_name,checkout_status) values('$b_id','$room','unavailable','0')";
		    		$result2=mysqli_query($conn,$query2);
					$query3="update room_info set status=0 where room_id='$room'";
					$result3=mysqli_query($conn,$query3);
					
				}	*/
			
		}
		
			
			?>
           
			
			
