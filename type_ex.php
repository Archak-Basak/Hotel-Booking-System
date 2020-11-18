<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$flag=0;
	 
	
	function show_floor_info_combo($conn)
	{
		$qry="select distinct floor_no from floor_info";
		$rs=mysqli_query($conn,$qry);
		?>
			<option value=-1>All</option>
		<?php
		while($dt=mysqli_fetch_assoc($rs))
		{
			?>
				<option value='<?php echo $dt['floor_no'];?>'><?php echo $dt['floor_no'];?></option>
			<?php
		}
		
	}
	
	
	function show_alias_combo($conn)
	{
		$qry="select distinct floor_name from floor_info";
		$rs=mysqli_query($conn,$qry);
		?>
			<option value=-1>All</option>
		<?php
		while($dt=mysqli_fetch_assoc($rs))
		{
			?>
				<option value='<?php echo $dt['floor_name'];?>'><?php echo $dt['floor_name'];?></option>
			<?php
		}
		
	}
	
	
    
  
   $n_d_r=0;
	if(isset($_GET['ed_args']))
	{
		$i=1;
		$tmp='';
		$ct=$_GET['ed_args'];
		$n_d_r=$ct;
		$q="type_id='$_GET[type_0]'";
		while($i<$ct)
		{
			$tmp="type_".$i;
			$q=$q."or type_id='$_GET[$tmp]'";
			//echo $tmp;
			$i++;
		}
		//echo $q;
		/*$query0="select * from floor_info where ".$q;
		$q_p=$query0;
		$res0=mysqli_query($conn,$query0);
		while($d0=mysqli_fetch_assoc($res0))
		{
			
			run_query($conn,$d0);
			//$qr0="insert into room_info_backup(room_no,floor_no,status,type,upgradable,c_room_no,rate)values('$d0[room_no]','$d0[floor_no]','$d0[status]','$d0[type]','$d0[upgradable]','$d0[c_room_no]','$d0[rate]')";
			
			
			
		}*/
		$qy="delete from room_type where ".$q;
		$rs=mysqli_query($conn,$qy);
		$flag=1;
		//echo $ct;
	}
	function run_query($conn,$d0)
	{
	$qr0="insert into floor_info_backup(floor_no,floor_status,floor_name)values('$d0[floor_no]','$d0[floor_status]','$d0[floor_name]')";
	
		//	echo $qr0;
			$r0=mysqli_query($conn,$qr0);
	}
	$q_p='';
	if(isset($_GET['submit']))
	{
		//code to submit data in database
		
		
		 $class_name=$_GET['class_name'];
        $rate=$_GET['rate'];
        
        
        $query="insert into room_type(type_name,rate)values('$class_name','$rate')";
        
        $result=mysqli_query($conn,$query);
	   $flag=1;
	   $q_p=$query;
	}
	$undone_entries=0;
	if(isset($_GET['undo']))
	{
		$qr="select * from floor_info_backup";
		$rs=mysqli_query($conn,$qr);
		while($d=mysqli_fetch_assoc($rs))
		{
		
		
		
       $floor_no=$d['floor_no'];
       $floor_status=$d['floor_status'];
       $floor_name=$d['floor_name'];
       
       $query="insert into floor_info(floor_no,floor_status,floor_name)values('$d[floor_no]','$d[floor_status]','$d[floor_name]')";
	 $result=mysqli_query($conn,$query);
	   $undone_entries++;
		}
	   $flag=1;
		
	}
	
	if(isset($_GET['delete']))
	{
	
		/*$b_q="select * from floor_info where type_id='$_GET[delete]'";
		$b_r=mysqli_query($conn,$b_q);
		$d=mysqli_fetch_assoc($b_r);
		$n_dt="insert into floor_info_backup(floor_no,floor_status,floor_name)values('$d[floor_no]','$d[floor_status]','$d[floor_name]')";
		$n_q=mysqli_query($conn,$n_dt);*/
		
		$qr="delete from room_type where type_id='$_GET[delete]'";
		$rslt=mysqli_query($conn,$qr);
		$flag=1;
		
	}
	else
	{
		if(!isset($_GET['ed_args']))
		{
		$qr="delete from floor_info_backup";
		
		$rslt=mysqli_query($conn,$qr);
	}
	}
	if(isset($_GET['save']))
	{
		
		$qry="update room_type set type_name='$_GET[class_name]',rate='$_GET[rate]' where type_id='$_GET[class_id]'";
		$res=mysqli_query($conn,$qry);
		$flag=1;
	
		//echo $qry;
		$q_p=$qry;
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


	$color_floor='#0078d7';
	$color_alias='#0078d7';
	$color_status='#0078d7';
	

$query_n='';
if(isset($_GET['filter_mode']))
{
	$str='';
	
	if($_GET['floor_f']!=-1)
	{
		$str=$str=$str."floor_no='$_GET[floor_f]' and ";
		$color_floor='#FF9933';
	}
	if($_GET['alias_f']!=-1)
	{
		$str=$str."floor_name='$_GET[alias_f]' and ";
		$color_alias='#FF9933';
	}
	if($_GET['status_f']!=-1)
	{
		$str=$str."floor_status='$_GET[status_f]' and ";	
		$color_status='#FF9933';
	}
	
	$str=$str." type_id <>-1";	
	$query_n="select * from floor_info where ".$str." order by type_id desc";
	
	//$rst=mysqli_query($conn,$query_n);
	//echo $query_n;
	$flag=1;
	
	
}




	if(isset($_GET['update']) || $flag==1 || $ed>0)
	{
		?>
       
       <table cellspacing="0"  class="table_h" id="table_n" width="1098">
        <?php 
			if(isset($_GET['filter']))
			{
				?>
				 <tr bgcolor="0078d7">
         <td width="44"></td>
        <td width="80" height="44" align="center" ><select name="floor_select_f" id="filter_floor" class="cmb2"><?php echo show_floor_info_combo($conn);?></select></td>
         <td  width="150" align="center" ><p class="header" ><select name="status_select_f" id="filter_status" class="cmb">
         <option value=-1 selected>All</option>
         <option value=0>Booked</option>
                       
                        <option value=1 >Available</option>
                        <option value=2>Unavailable</option></select></p></td>
        <td  width="168" align="center"><p class="header" ><select name="alias_select_f" id="filter_alias" class="cmb"><?php echo show_alias_combo($conn,$db);?></select></p></td>
        <td width="120" align="center" ><p class="header"></p></td>
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
        <td width="120" height="44" align="center" bgcolor='<?php echo $color_floor;?>'><p class="header">Class Name</p></td>
         <td  width="170" align="center" bgcolor='<?php echo $color_status;?>'><p class="header">Rate</p></td>
        <td  width="130" align="center" bgcolor='<?php echo $color_alias;?>'><p class="header">No of rooms</p></td>
        <td width="160" align="center" bgcolor='#0078d7'><p class="header">No of booked rooms</p></td>
          <td  width="100"><?php if($query_n!=''){?><input type="button" onClick="unset_filter()" value="cancel" class="button"><?php }?></td>
        <td width="100"></td>
        </tr></tr></table><table class="table"  width="1098" cellspacing="0" id="table">
        
        
        <?php
			}
			?><?php
			if($query_n!='')
			$query2=$query_n;
			else
			
		$query2="select * from room_type order by type_id desc";
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
			
			
			
						if($ed==$data['type_id'])
						{
						?>
                        <form method='POST'>
						<tr bgcolor="#c7e0f4">
						
						
                        <td width="63"></td>
                            <td class="td" height="49" align="center" width="151"><input type='hidden' name='type_id_e' value='<?php echo $data['type_id'];?>' id='type_id_e'>
                            <input type='text' name='type_name_e' value='<?php echo $data['type_name'];?>' size='10' class="txt22" id='type_name_e' REQUIRED onKeyUp="validate_type_edit('<?php echo $data['type_id'];?>')"></td>
                            
                           
                           
                                
                            
                           
                      
                       
                                          
                            <td align="center" class="td" width="154"><input type="text" name="rate_e" id="rate_e"  size='40' class="txt220" REQUIRED value='<?php echo $data['rate'];?>'></td> 
                             <td align="center" class="td" width="154">
          
           <?php
          
		  $tq="select count(*) as n_r from room_info,room_type where room_info.type=room_type.type_id and room_type.type_id='$data[type_id]'";
		 // echo $tq;
		  $result_n=mysqli_query($conn,$tq);
		  $dt=mysqli_fetch_assoc($result_n);
		  echo $dt['n_r'];
		  ?></td>
           <td width="190" class="td">
            
          <?php
          
		  $tq="select count(*) as n_r from room_info,room_type where room_info.type=room_type.type_id and room_type.type_id='$data[type_id]' and room_info.status='0'";
		 // echo $tq;
		  $result_n=mysqli_query($conn,$tq);
		  $dt=mysqli_fetch_assoc($result_n);
		  echo $dt['n_r'];
		  ?>
         </td>
                          <td align="center" class="td" width="142"><input type='button'  value='Cancel' class="button_r" onClick="update_content()" ></td>
                            <td align="center" class="td" width="145"><input type='submit' name='submit_e' value='Save' class="button_g" onClick="update_class_info()" id="submit_e"></td> </tr><tr><td colspan="8"><div id="e_d" class="e_d"><input type='hidden' id='error_received_e' value='0'></div></td></tr>
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
				echo"<tr id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_floor('$data[type_id]') class='added'> ";
				$a++;
			}
			else
			{
				if(isset($_GET['save']))
				{
					if($data['type_id']==$_GET['class_id'])
					{
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=oom('$data[type_id]') class='added'>";
				
					}
					else
					{
						
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit_floor('$data[type_id]')>";
					
					}
				}
				else
				{
					
					echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)' onDblClick=edit_floor('$data[type_id]') >";
				}
			}
			

		?>
        <td class="td" width="63">
       
 <?php
         
		  $tq="select count(*) as n_r from room_info,room_type where room_info.type=room_type.type_id and room_type.type_id='$data[type_id]' and room_info.status='0'";
		 // echo $tq;
		  $result_n=mysqli_query($conn,$tq);
		  $dt=mysqli_fetch_assoc($result_n);
		  if($dt['n_r']==0)
		  
		   {
        
		  ?>
        <input type="checkbox" class="poll" id='<?php echo $data['type_id'];?>' onClick="try_menu()"  >
        <?php } ?>
        <input type="hidden" id='<?php echo "text".$data['type_id'];?>' value='<?php echo $data['type_id'];?>'>
       
           
        </td>
        
        <td height="50" width="151" align="center" class="td"><?php echo $data['type_name'];?></td> 
         
          <td align="center" class="td" width="237"><?php echo $data['rate']; ?></td>
          <td align="center" class="td" width="154">
          
           <?php
          
		  $tq="select count(*) as n_r from room_info,room_type where room_info.type=room_type.type_id and room_type.type_id='$data[type_id]'";
		 // echo $tq;
		  $result_n=mysqli_query($conn,$tq);
		  $dt=mysqli_fetch_assoc($result_n);
		  echo $dt['n_r'];
		  $n_r_m=$dt['n_r'];
		  ?></td>
           <td width="190" class="td">
            
          <?php
          $n_r=0;
		  $tq="select count(*) as n_r from room_info,room_type where room_info.type=room_type.type_id and room_type.type_id='$data[type_id]' and room_info.status='0'";
		 // echo $tq;
		  $result_n=mysqli_query($conn,$tq);
		  $dt=mysqli_fetch_assoc($result_n);
		  echo $dt['n_r'];
		   $n_r=$dt['n_r'];
        
		  ?>
          </td>
     	        
		<?php 
			if ($n_r>0)
			{
			?>
			<td align="center" class="td" width="142"><input type="button" class="button_r" value="Delete" onClick="try_delete('<?php echo $data['type_id'];?>')" disabled></td>
        <td width="145" align="center" class="td"><input type="button" class="button_g" value="Edit" onClick="edit_type('<?php echo $data['type_id'];?>')" disabled> </td>  </tr><tr><td colspan="7"></td></tr>                
     
			<?php
			}
			else
			{
				
				if($n_r_m==0)
				{?>
            
			<td align="center" class="td" width="142"><input type="button" class="button_r" value="Delete" onClick="try_delete('<?php echo $data['type_id'];?>')"></td>
        <?php } else {?>
		<td align="center" class="td" width="142"><input type="button" class="button_r" value="Delete" onClick="try_delete('<?php echo $data['type_id'];?>')" disabled></td>
     
		<?php }?>
        <td width="145" align="center" class="td"><input type="button" class="button_g" value="Edit" onClick="edit_type('<?php echo $data['type_id'];?>')"  > </td>  </tr><tr><td colspan="7"></td></tr>                
     
			<?php
			
			}
		?>
        
		   <?php 
		
	} }
?>           
                   </tr>
        
        </table>
        
        <?php
		//echo $q_p;
				 
	}
?>