<?php
	$conn=mysqli_connect("localhost","root","");
	
	$db=mysqli_select_db($conn,"hotel_db");
	
	if(isset($_GET['list_counter']))
	{
		
		$i=0;
		?>
        
		<div id="parent_list<?php echo $_GET['list_counter']; ?>" class="plst">
        <table width="500px"  class="list_header">
        <tr>
       <td width="35px"><input type="button"class="button"  id="collapse<?php echo $_GET['list_counter'];?>" value="+" onClick="toggle('<?php echo $_GET['list_counter']; ?>')"></td>
		<td><p id="guest_n<?php echo $_GET['list_counter']; ?>" class="guest_n"><?php echo $_GET['guest'];?></p></td>
        
        <td><p class="room_n"><?php echo "Room no ";?>
        
        <input type="hidden" id="room_e<?php echo $_GET['list_counter']; ?>" value="<?php echo $_GET['room']?>">
         <?php echo $_GET['room']?></p></td>
          
          <td>
        
        <input type="button" class="button" value="print" onClick="print_details('_list<?php echo $_GET['list_counter']; ?>')" id="print_list<?php echo $_GET['list_counter']; ?>"></td>
       <td>
        <input type="button" class="button" onClick="reedit_list('<?php echo $_GET['list_counter']; ?>',1)" value="edit" id="reedit_list<?php echo $_GET['list_counter'];?>"></td>
        <td><input type="button" class="button" onClick="final_submit('<?php echo $_GET['list_counter'];?>')" value="Submit" id="final_submit<?php echo $_GET['list_counter'];?>">
</td>
        </tr></table>
            </div>
           
           
            
		<?php
		
		while($i<$_GET['number'])
		{
			$tmp='item_id'.$i;
		$nm='name'.$i;	
			$fcd=$_GET[$tmp];//primary key
			
			$name=$_GET[$nm];
			$qty='item_qty'.$i;
			$quantity=$_GET[$qty];
			$rt='item_rate'.$i;
			$rate=$_GET[$rt];
		
		
		?>
			
            <div id="child_list_1<?php echo $fcd;?>" name="child_list<?php echo $_GET['list_counter'];?>" style="display:none" class="child_list_r">
         
         <?php  
		 if($i==0)
		 {
			?>
			 <table width="500px" class="list_body">
            <tr>
            <td width="35px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
            <b>
          Name</b>
		   </td>
           <td width="100px">
		 <b> Quantity</b>
           </td>
          
           <td width="100px"><b>Rate/unit</b></td>
            <td width="100px"><b>Total</b></td>
           </tr></table>
			
			<?php 
			}
		 ?>
           <table width="500px" class="list_body">
            <tr>
            <td width="35px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
           <p class="items_r<?php echo $_GET['list_counter'];?>"> <?php echo $name;?></p>
		   </td>
           <td width="100px">
		   <?php echo $quantity;?>
           </td>
          
           <td width="100px"><p><?php echo $rate;?></p></td>
            <td width="100px"><p><?php echo $rate*$quantity;?></p></td>
           </tr></table>
           <input type="hidden" class="quantities_<?php echo $_GET['list_counter'];?>" value=" <?php echo $quantity;?>">
           
           <input type="hidden" class="rate_e<?php echo $_GET['list_counter'];?>" value="<?php echo $rate;?>">
           <input type="hidden" class="items_id<?php echo $_GET['list_counter'];?>" value="<?php echo $fcd;?>">
            </div>
		<?php
		$i++;
		}
		
	}
	if(isset($_GET['submit_list']))
	{
		$room=$_GET['room'];
		$query="select * from room_info, booking_detail where c_room_no='$room' and room_info.room_id=booking_detail.room_id and booking_detail.checkout_status=0";
		$res=mysqli_query($conn,$query);
		$data=mysqli_fetch_assoc($res);
		$bid=$data['booking_id'];
		$bdid=$data['booking_detail_id'];
		$query="insert into service_master (bid,bdid,orderdate,type,status)values('$bid','$bdid','2017/03/04','1','0')";
		$res=mysqli_query($conn,$query);
		
		$query="select max(oid) as oid from service_master";
		$res=mysqli_query($conn,$query);
		$data=mysqli_fetch_assoc($res);
		$odid=$data['oid'];
		$i=0;
		
		while($i<$_GET['number'])
		{
			$tmp='item_id'.$i;
			$qty='item_qty'.$i;
			$rte='item_rate'.$i;
			$item_rate=$_GET[$rte];
			$quantity=$_GET[$qty];
			$fcd=$_GET[$tmp];
			$query="insert into service_detail(odid,fcd,quantity,rate)values('$odid','$fcd','$quantity','$item_rate')";
		//	echo $query;
			$res=mysqli_query($conn,$query);
			$i++;	
		}
		
		
	}
	if(isset($_GET['add_list_e']))
	{
		//$_GET['add_list']=1;
		$i=0;
		while($i<$_GET['n'])
		{
			$id='id'.$i;
			$_GET['id']=$_GET[$id];
			$prk='prk'.$i;
			$_GET['prk']=$_GET[$prk];
			$add_list='add_list_en'.$i;
			$_GET['add_list']=$_GET[$add_list];
			$rate='rate'.$i;
			$_GET['rate']=$_GET[$rate];
			$qty='qty'.$i;
			$_GET['qty']=$_GET[$qty];
			create_list();
			$i++;
		}	
		unset($_GET['add_list']);
		
	}
	if(isset($_GET['add_list']))
	{
		if(!isset($_GET['qty']))
			$_GET['qty']='';
		create_list();
		
	}
	function create_list()
	{
	?>
			
            <div id="list<?php echo $_GET['id'];?>" name="prk<?php echo $_GET['prk'];?>" class="item_holder">
            	<input type="hidden" value='<?php echo $_GET['prk'];?>' id="temp<?php echo $_GET['id'];?>">
				<table class="item_table" cellpadding="5"  width="500px">
                <col width="250px"><col width="80px"><col width="100px"><col width="100px"><col width="30px">
               <!-- <tr><td>Item Name</td><td>Quantity</td><td>Rate per unit</td><td>Total</td></tr>-->
                <tr><td ><p id="item_name<?php echo $_GET['id'];?>" class="items_temp"><?php echo $_GET['add_list'];?></p></td>
                <td width="40px">
                <p class="list_para" id="pgf<?php echo $_GET['id'];?>" style="display:none" onClick="show_text('<?php echo $_GET['id']?>')"><?php echo $_GET['qty'];?></p>
                <input value="<?php echo $_GET['qty'];?>"  class="list_text" type="text" size ="1" id="qty<?php echo $_GET['id']?>" onClick="show_text('<?php echo $_GET['id']?>')" onFocus="show_text('<?php echo $_GET['id']?>')" onKeyup="shift_focus(event)">
               
               </td><td width="40px"> <input type="text" id="s_qty<?php echo $_GET['id']?>" size="1" onKeyUp="shift_focus(event)" class="s_qty" style="visibility:hidden">
                </td>
                <td width="60px"><p id="cost<?php echo $_GET['id']?>"><?php echo $_GET['rate'];?></p></td>
                <td width="100px"><p id="total<?php echo $_GET['id']?>"><?php echo (int)$_GET['rate']*(int)$_GET['qty'];?></p></td><td><p onClick="remove('<?php echo $_GET['id'];?>')">x</p></tr></table>
                
            </div>
		<?php		
	}
	if(isset($_GET['room_no']))
	{
		$room=$_GET['room_no'];
		$query="select * from booking_detail,room_info,booking_master where booking_detail.checkout_status=0 and booking_detail.booking_id=booking_master.booking_id and room_info.room_id=booking_detail.room_id and room_info.c_room_no=$room and booking_master.checkin_status=1";
		$res=mysqli_query($conn,$query);
		$flag=0;
		while($data=mysqli_fetch_assoc($res))
		{
			echo "<p class='guest_name' id='gn'>".$data['accompany_name']."</p>";
			//echo "<p class='user_date'>Check in Date : ".$data['checkin_date'];
			//echo "<br>Check out Date: ".$data['checkout_date']."</p>";
			$flag=1;
		}
		if($flag==0)
		{
			echo "Guest details not available. The room is empty";	
			
		}
	}
	if(isset($_GET['food']) || isset($_GET['service']))
	{
			$pattern=$_GET['pattern'];
			if(isset($_GET['food']))
				$query="select * from food_master where fname LIKE '%$pattern%'";
			else
				$query="select * from item_master where fname LIKE '%$pattern%'";
		
			$i=0;
			//echo $query;
			$res=mysqli_query($conn,$query);
			?>
			<table class="item_table2" id="list_of_items" width="240px" cellspacing="0">
			<?php
			while($data=mysqli_fetch_assoc($res))
			{
				
				if($i==0)
				{
				?>
					<tr id='tr<?php echo $i;?>' name='<?php $data['idf'];?>' bgcolor="#227AFF">
                    <?php
				}
				else
				{
					?>
                    <tr id='tr<?php echo $i;?>' name='<?php $data['idf'];?>'>
                    <?php 
				}
				?>
                 <td  ><input type="hidden" id="i_rate<?php echo $i; ?>" value="<?php echo $data['rate'];?>"><input type="hidden" id="para<?php echo $i; ?>" value="<?php echo $data['fname'];?>"><input type="hidden" value="<?php echo $data['idf'];?>" id="idt<?php echo $i; ?>">
				<?php
				
				 echo $data['fname'];
				
				 ?>
				 	</td><td>Rs <?php echo $data['rate'];?> /plate</tr>
				 <?php
				 $i++;
			}
			
			?>
				</table>
                <input type="hidden" id="max" value='<?php echo $i;?>'>
                <input type="hidden" id="sl" value=0>
			<?php
	}
	
		
?>