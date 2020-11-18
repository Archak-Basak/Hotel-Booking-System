 
 
 <table cellpadding="10" cellspacing="10" width="1090px" >
<?php
	
	/*$query0="select * from floor_info";
	$result0=mysqli_query($conn,$query0);
	while($data0=mysqli_fetch_assoc($result0))
	
	{*/
	session_start();
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
		
	$query="select * from room_info where status=1 and type='$d[type_id]' order by c_room_no";
	//echo $query;
	$result=mysqli_query($conn,$query);
	$count=0;
	
	while($data=mysqli_fetch_assoc($result))
	{
		
		?>
        	<td height="100px"  valign="top">
            
            <table bgcolor="white"><tr>
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
