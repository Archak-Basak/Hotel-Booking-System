<?php
	session_start();
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$flag=0;
	 function show_floor_info_combo($conn,$db,$selected)
    {
        $query="select * from floor_info where floor_status=1";
        $result2=mysqli_query($conn,$query);
		if($selected==-1)
		{
      	  echo "<option value=-1>All</option>";
		}
         while($data=mysqli_fetch_assoc($result2))
        {                        
           if($selected==-1)//when accessed through the new room entry section
           {
                echo "<option value=$data[floor_no]>$data[floor_name]</option>";//display floor name
           }
           else // when accessed through the edit section 
           {
               if ($selected==$data['floor_no'])
                    echo "<option value=$data[floor_no] selected >$data[floor_no]</option>";//the selected option will be the one currently assigned in the db.
                else
                    echo "<option value=$data[floor_no]>$data[floor_no]</option>";                      
            }
         }         
		
    }
	function show_room_info_combo($conn,$db,$mode)
	{
		$qry="select distinct room_no from room_info";
		$rl=mysqli_query($conn,$qry);
		if($mode==-1)
		{
		 echo "<option value=-1>All</option>";
		while($assoc=mysqli_fetch_assoc($rl))		
		{
			?>
				<option value='<?php echo $assoc['room_no'];?>'><?php echo $assoc['room_no'];?></option>
			<?php
		}	
		}
	}
	
	
	function show_rate_info_combo($conn,$db,$mode)
	{
		$qry="select distinct rate from room_info";
		$rl=mysqli_query($conn,$qry);
		if($mode==-1)
		{
		 echo "<option value=-1>All</option>";
		while($assoc=mysqli_fetch_assoc($rl))		
		{
			?>
				<option value='<?php echo $assoc['rate'];?>'><?php echo $assoc['rate'];?></option>
			<?php
		}	
		}
	}
    
   function show_type_combo($conn,$db,$selected)
   {
        $query="select * from room_type";
        $result3=mysqli_query($conn,$query);
		if($selected==-1)
		{
		echo "<option value= -1>All</option>";              
        
		}
		
		while($data=mysqli_fetch_assoc($result3))
        {
               
			   if ($selected==$data['type_id'])
                      echo "<option value= $data[type_id] selected>$data[type_name]</option>";//the selected option will be the one currently assigned in the db.         
               else
                      echo "<option value= $data[type_id]>$data[type_name]</option>";                        
        }        
    }
   $n_d_r=0;
	if(isset($_GET['ed_args']))
	{
		$i=1;
		$tmp='';
		$ct=$_GET['ed_args'];
		$n_d_r=$ct;
		$q="room_id='$_GET[room_0]'";
		while($i<$ct)
		{
			$tmp="room_".$i;
			$q=$q."or room_id='$_GET[$tmp]'";
			//echo $tmp;
			$i++;
		}
		//echo $q;
		$query0="select * from room_info where ".$q;
		$res0=mysqli_query($conn,$query0);
		while($d0=mysqli_fetch_assoc($res0))
		{
			
			run_query($conn,$d0);
			//$qr0="insert into room_info_backup(room_no,floor_no,status,type,upgradable,c_room_no,rate)values('$d0[room_no]','$d0[floor_no]','$d0[status]','$d0[type]','$d0[upgradable]','$d0[c_room_no]','$d0[rate]')";
			
			
			
		}
		$qy="delete from room_info where ".$q;
		$rs=mysqli_query($conn,$qy);
		$flag=1;
		//echo $ct;
	}
	function run_query($conn,$data)
	{
	$qr0="insert into room_info_backup(room_no,floor_no,status,type,upgradable,c_room_no,rate)values('$data[room_no]','$data[floor_no]','$data[status]','$data[type]','$data[upgradable]','$data[c_room_no]','$data[rate]')";
			
		//	echo $qr0;
			$r0=mysqli_query($conn,$qr0);
	}
	if(isset($_GET['submit']))
	{
		//code to submit data in database
		
		
		 $room_no=$_GET['room'];
       $floor_no=$_GET['floor'];
       $status=$_GET['status'];
       $type=$_GET['type'];
       $rate=0;  
	  
       $c_room_no=$floor_no*100+$room_no;
       $query="insert into room_info(room_no,floor_no,status,type,rate,c_room_no) values('$room_no','$floor_no','$status','$type','$rate','$c_room_no')";
       $result=mysqli_query($conn,$query);
       if($result)
       {
         // echo "Data Inserted";
       }
       else 
	   {
           // echo "Duplicate Entry";
	   }
	   $flag=1;
	   //echo $query;
	}
	$undone_entries=0;
	if(isset($_GET['undo']))
	{
		$qr="select * from room_info_backup";
		$rs=mysqli_query($conn,$qr);
		while($d=mysqli_fetch_assoc($rs))
		{
		
		
		$room_no=$d['room_no'];
       $floor_no=$d['floor_no'];
       $status=$d['status'];
       $type=$d['type'];
      // $rate=$d['rate'];  
       $c_room_no=$d['c_room_no']; 
       $query="insert into room_info(room_no,floor_no,status,type,c_room_no) values('$room_no','$floor_no','$status','$type','$c_room_no')";
       $result=mysqli_query($conn,$query);
	   $undone_entries++;
		}
	   $flag=1;
		
	}
	
	if(isset($_GET['delete']))
	{
	
		$b_q="select * from room_info where room_id='$_GET[delete]'";
		$b_r=mysqli_query($conn,$b_q);
		$d=mysqli_fetch_assoc($b_r);
		$n_dt="insert into room_info_backup(room_no,floor_no,status,type,upgradable,c_room_no,rate)values('$d[room_no]','$d[floor_no]','$d[status]','$d[type]','$d[upgradable]','$d[c_room_no]','$d[rate]')";
		$n_q=mysqli_query($conn,$n_dt);
		
		$qr="delete from room_info where room_id='$_GET[delete]'";
		$rslt=mysqli_query($conn,$qr);
		$flag=1;
		
	}
	else
	{
		if(!isset($_GET['ed_args']))
		{
		$qr="delete from room_info_backup";
		
		$rslt=mysqli_query($conn,$qr);
	}
	}
	if(isset($_GET['save']))
	{
		$c_room_no=$_GET['floor_no']*100+$_GET['room_no'];
		$qry="update room_info set room_no='$_GET[room_no]',floor_no='$_GET[floor_no]',status='$_GET[status]',type='$_GET[type]',c_room_no='$c_room_no' where room_id='$_GET[room_id]'";
		$res=mysqli_query($conn,$qry);
		$flag=1;
	
		//echo $qry;
	}
	
	
if(isset($_GET['edit_r']))
{
	$ed=$_GET['edit_r'];
}	
else
{
	$ed=-1;
}
if(isset($_GET['filter']))
{
	$flag=1;
}

$color_room='#0078d7';
	$color_floor='#0078d7';
	$color_type='#0078d7';
	$color_status='#0078d7';
	$color_upgradable='#0078d7';

$query_n='';
if(isset($_GET['filter_mode']))
{
	$str='';
	
	if($_GET['room_f']!=-1)
	{
		$str=$str=$str."room_no='$_GET[room_f]' and ";
		$color_room='#FF9933';
	}
	if($_GET['floor_f']!=-1)
	{
		$str=$str."room_info.floor_no='$_GET[floor_f]' and ";
		$color_floor='#FF9933';
	}
	if($_GET['status_f']!=-1)
	{
		$str=$str."status='$_GET[status_f]' and ";	
		$color_status='#FF9933';
	}
	if($_GET['type_f']!=-1)
	{
		$str=$str."type='$_GET[type_f]' and ";
		$color_type='#FF9933';	
	}
	if($_GET['rate_f']!=-1)
	{
		$str=$str."rate='$_GET[rate_f]' and ";	
		$color_upgradable='#FF9933';
	}
	$str=$str."c_room_no <>-1";	
	$query_n="select * from room_info,room_type where type=type_id and ".$str." order by room_id desc";
	
	//$rst=mysqli_query($conn,$query_n);
	//echo $query_n;
	$flag=1;
	
	
}




	if(isset($_GET['update']) || $flag==1 || $ed>0)
	{
		?>
       
       <table cellspacing="0"  class="table_h" id="table_n" width="1098" >
        <?php 
			if(isset($_GET['filter']))
			{
				?>
				 <tr bgcolor="0078d7">
         <td width="44"></td>
        <td width="80" height="44" align="center" ><select name="room_select_f" id="filter_room" class="cmb2"><?php echo show_room_info_combo($conn,$db,-1);?></select></td>
        <td  width="140" align="center" ><p class="header" ><select name="floor_select_f" id="filter_floor" class="cmb"><?php echo show_floor_info_combo($conn,$db,-1);?></select></p></td>
        <td  width="150" align="center" ><p class="header" ><select name="status_select_f" id="filter_status" class="cmb">
         <option value=-1 selected>All</option>
         <option value=0>Booked</option>
                       
                        <option value=1 >Available</option>
                        <option value=2>Unavailable</option></select></p></td>
        <td  width="168" align="center"><p class="header" ><select name="type_select_f" id="filter_type" class="cmb"><?php echo show_type_combo($conn,$db,-1);?></select></p></td>
        <td width="93" align="center" ><p class="header"><select name="rate_select_f" id="filter_rate" class="cmb2" style="visibility:hidden">
        <?php echo show_rate_info_combo($conn,$db,-1);?></p></td>
          <td  width="100"><input type="button" onClick="unset_filter()" value="cancel" class="button"></td>
        <td width="100"><input type="button" onClick="filter_result()" class="button" value="filter"></td>
        </tr></table><table class="table"  width="1098" cellspacing="0" id="table" >
				
				<?php
			}
			
			else
			{
				if($query_n=='')
				{
		?>
         <tr bgcolor="#0078d7" onDblClick="filter()">
         <?php
				}
		 else
		 {
		  ?>
           <tr bgcolor="#0078d7" onDblClick="filter()">
           <?php }?>
         <td width="44" ><input type="checkbox" id="master_check" onclick="master_check_all()"></td>
        <td width="80" height="44" align="center" bgcolor='<?php echo $color_room;?>'><p class="header">Room no</p></td>
        <td  width="140" align="center" bgcolor='<?php echo $color_floor;?>'><p class="header" >Floor no</p></td>
        <td  width="150" align="center" bgcolor='<?php echo $color_status;?>'><p class="header">Status</p></td>
        <td  width="168" align="center" bgcolor='<?php echo $color_type;?>'><p class="header">Type</p></td>
        <td width="93" align="center" bgcolor='<?php echo $color_upgradable;?>'><p class="header">Rate</p></td>
          <td  width="100"><?php if($query_n!=''){?><input type="button" onClick="unset_filter()" value="cancel" class="button"><?php }?></td>
        <td width="100"></td>
        </tr></tr></table><table class="table"  width="1098" cellspacing="0" id="table">
        
        
        <?php
			}
			?><?php
			if($query_n!='')
			$query2=$query_n;
			else
			
		$query2="select * from room_info,room_type where type=type_id order by room_id desc";
        $result1=mysqli_query($conn,$query2);
		$i=0;
		$a=0;
		$del=0;
		if(!mysqli_num_rows($result1))
		{
			if((isset($_GET['delete']) || isset($_GET['ed_args'])) && $del==0)
							{
								echo "<tr><td colspan='8'><div class='d_u' id='d_u'> $n_d_r rows deleted <input type='button' onClick='undo_d()' value='undo' class='button'></div></td></tr>";
								$del++;
							}
		}
		
        while($data=mysqli_fetch_assoc($result1))
        {
			$i++;
			
			
			
						if($ed==$data['room_id'])
						{
							
							$query_sync="insert into room_sync(page,room_id,username,user)values('room_entry','$data[room_id]','$_SESSION[user_name]','admin')";
							$run_sync=mysqli_query($conn,$query_sync);
						?>
                        <form method='POST'>
						<tr bgcolor="#c7e0f4">
						
						
                        <td width="44"></td>
                            <td class="td" height="49" align="center" width="80"><input type='hidden' name='room_id_e' value='<?php echo $data['room_id'];?>' id='room_id_e'>
                            <input type='text' name='room_no_e' value='<?php echo $data['room_no'];?>' size='4' class="txt22" id='room_no_e' REQUIRED onKeyUp="validate_room_edit('<?php echo $data['room_id'];?>')"></td>
                            <td align="center" width="140"><select name='floor_e' value=1  class="cmb2" id='floor_e' onChange="validate_room_edit('<?php echo $data['room_id'];?>')">
                           <?php
                            show_floor_info_combo($conn,$db,$data['floor_no']);
                            ?>
                           </select>
                           </td>
                           
                            <?php 
                            $zero='';
                            $one='';
                            $two='';
                            if($data['status']==0)
                                $zero='selected';
                                else if($data['status']==1)
                                $one='selected';
                                else 
                                $two='selected';
                                ?>
                                
                            <td align="center" width="150"><select name='status_e'  class="cmb" id='status_e'>
                            
                            <option value=1 <?php echo $one;?>>Available</option>
                            <option value=2 <?php echo $two;?>>Unavailable</option>
                            </select>
                           <td align="center" height="52px" width="168"><select name='type_e' id='type_e' class="cmb">
                               <?php
                            show_type_combo($conn,$db,$data['type']);?>
                           </select>
                           </td>
                           <?php
                            $yes='';
                            $no='';
                            if($data['upgradable']==0)
                                $no='selected';
                               else 
                                   
                               $yes='selected';
                               ?>                   
                            <td align="center" class="td" width="90">
                             
          <?php
		  $rq="select * from room_type where type_id='$data[type_id]'";
	   $rr=mysqli_query($conn,$rq);
	   $rate=mysqli_fetch_assoc($rr);
	   echo $rate['rate'];
		 
		 ?></td>
                            </td> 
                            <td align="center" class="td" width="100"><input type='button'  value='Cancel' class="button_r" onClick="update_content()"></td>
                            <td align="center" class="td" width="100"><input type='submit' name='submit_e' value='Save' class="button_g" onClick="update_room_info()" id="submit_e"></td> </tr><tr><td colspan="8"><div id="e_d" class="e_d"><input type='hidden' id='error_received_e' value='0'></div></td></tr>
                           </form>
						<?php	
						}
						else
						{
							if((isset($_GET['delete']) || isset($_GET['ed_args'])) && $del==0)
							{
								if($n_d_r==0)
									$n_d_r=1;
								echo "<tr><td colspan='8'><div class='d_u' id='d_u'> $n_d_r rows deleted <input type='button' onClick='undo_d()' value='undo' class='button'></div></td></tr>";
								$del++;
							}
							
							
							
							
							
			if( (isset($_GET['submit'])  && $a==0) ||(isset($_GET['undo']) && $a < $undone_entries))
			{
				echo"<tr id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_room('$data[room_id]') class='added'> ";
				$a++;
			}
			else
			{
				if(isset($_GET['save']))
				{
					if($data['room_id']==$_GET['room_id'])
					{
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_room('$data[room_id]') class='added'>";
				
					}
					else
					{
						if($data['status']!=0)
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_room('$data[room_id]')>";
					else
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  >";
				
					}
				}
				else
				{
					if($data['status']!=0)
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_room('$data[room_id]')>";
					else
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  >";
				}
			}
			

		?>
        <td class="td" width="44">
        <?php
        	if($data['status']!=0)
			{
		?>
        <input type="checkbox" class="poll" id='<?php echo $data['room_id'];?>' onClick="try_menu()"  >
        <?php
			}
		?>
        <input type="hidden" id='<?php echo "text".$data['room_id'];?>' value='<?php echo $data['room_id'];?>'>
        
        <input type="hidden"  value='<?php echo $data['c_room_no'];?>' class="combined_room_no">
        
        </td>
        
        <td height="50" width="80" align="center" class="td"><?php echo $data['room_no'];?></td> 
        <td align="center" class="td" width="140"><?php echo $data['floor_no'];?></td>
         <?php 
         if($data['status']==0)
         	$st='Booked';
         else if($data['status']==1)
         	$st='Available';
         else 
      		 $st='Unavailable';
         ?>    
         <td align="center" class="td" width="150"><?php echo $st; ?></td>
         <td align="center" class="td" width="168"><?php echo $data['type_name']; ?></td>
         
     	  <td align="center" class="td" width="90">
          
          <?php
		  $rq="select * from room_type where type_id='$data[type_id]'";
	   $rr=mysqli_query($conn,$rq);
	   $rate=mysqli_fetch_assoc($rr);
	   echo $rate['rate'];
		 
		 ?></td>
                 <?php 
				 if($data['status']!=0)
				 {
				 ?>         
        <td align="center" class="td" width="100"><input type="button" class="button_r" value="Delete" onClick="try_delete('<?php echo $data['room_id'];?>')"></td>
        <td width="100" align="center" class="td"><input type="button" class="button_g" value="Edit" onClick="edit_room('<?php echo $data['room_id'];?>')"> </td>  </tr><tr><td colspan="7"></td></tr>                
        <?php }
		else
		{
		?>
		<td align="center" class="td" width="100"><input type="button" class="button_r" value="Delete" onClick="try_delete('<?php echo $data['room_id'];?>')" disabled></td>
        <td width="100" align="center" class="td"><input type="button" class="button_g" value="Edit" onClick="edit_room('<?php echo $data['room_id'];?>')" disabled> </td>  </tr><tr><td colspan="7"></td></tr>                
        
		<?php
		}
	} }
?>           
                    </tr>
        
        </table>
        <?php
				 
	}
?>