<?php
  //  echo PHP_VERSION;
    //Global Connection to hotel_db
    $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"hotel_db");
   
    function show_floor_info_combo($conn,$db,$selected)
    {
        $query="select * from floor_info where floor_status=1";
        $result2=mysqli_query($conn,$query);
        
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
    
   function show_type_combo($conn,$db,$selected)
   {
        $query="select * from room_type";
        $result3=mysqli_query($conn,$query);
        while($data=mysqli_fetch_assoc($result3))
        {
               if ($selected==$data['type_id'])
                      echo "<option value= $data[type_id] selected>$data[type_name]</option>";//the selected option will be the one currently assigned in the db.         
               else
                      echo "<option value= $data[type_id]>$data[type_name]</option>";                        
        }                     
    }
   
   if(isset($_GET['uid']))
   {
        $query="delete from room_info where room_id=".$_GET['uid'];
        $result4=mysqli_query($conn,$query);
        if($result4)
        {
            echo "<script>alert('Deleted');location.replace('room.php?');</script>";
        }
   } 
   
   if(isset($_POST['submit_e']))
   {
        $room_id=$_POST['room_id_e'];
        $room_no_e=$_POST['room_no_e'];
        $floor_no_e=$_POST['floor_e'];
        $status_e=$_POST['status_e'];
        $type_e=$_POST['type_e'];
        $upgradable_e=$_POST['upgradable_e'];   
		$c=$floor_no_e*100+$room_no_e;
      $query="update room_info set room_no=$room_no_e,floor_no=$floor_no_e,status=$status_e,type=$type_e,upgradable=$upgradable_e,c_room_no='$c' where room_id=$room_id";
        $result=mysqli_query($conn,$query);  
        if ($result)
            echo "<script>location.replace('room.php?');</script>" ;
        else 
            echo "<script>alert('Room No already taken');</script>";        
   }
   
   if(isset($_POST['submit']))
   {
       $room_no=$_POST['room_no'];
       $floor_no=$_POST['floor_no'];
       $status=$_POST['status'];
       $type=$_POST['type'];
       $upgradable=$_POST['upgradable'];  
       $c_room_no=$floor_no*100+$room_no;
       $query="insert into room_info(room_no,floor_no,status,type,upgradable,c_room_no) values('$room_no','$floor_no','$status','$type','$upgradable','$c_room_no')";
       $result=mysqli_query($conn,$query);
       if($result)
       {
          echo "<script>alert('Data Inserted');location.replace('room.php?');</script>";
       }
       else 
            echo "<script>alert('Room No already taken');location.replace('room.php?');</script>";
   }
?>
<html>
<head>
<style>
.txt2
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:10px 10px;
		width:100px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.txt2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	.txt22
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:10px 10px;
		width:40px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.txt2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	.cmb
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		//padding:10px 10px;
		width:100px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		
		
	}
	.cmb:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	.cmb2
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		//padding:10px 10px;
		width:40px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		
		
	}
	.cmb2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	body
	{
		font-family:'Segoe UI';
		font-size:14px;
		
	}
	table
	{
	border: 1.5px solid #4a8bc1;
	font-size: 14px;
	background-color: white;
	text-align: center;
	}
	.header
	{
		font-weight:200;
		color:white;
	}
	.button
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:14px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button:hover
	{
		background-color:#999;
		
	}
	
	.button_r
	{
		
		border: 1.5px solid #F30;
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button_r:hover
	{
		background-color:#F30;
		color:white;
		
	}
	
	.button_g
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button_g:hover
	{
		background-color:#4a8bc1;
		color:white;
		
	}
	a
	{
		text-decoration:none;
	}
	.main
	{
		font-size:18px;
	}
	.navigation
	{
		width:1800px;
		height:30px;
		position:fixed;
		background-color:white;
		box-shadow: 0.2px 0.2px 0.5px #000000;
	}
	body{

		margin:0;
	}
</style>
<script>
function highlight(e)
{
	document.getElementById(e).style.backgroundColor='#CCD4D0';
}
function remove_highlight(e)
{
	if(e%2==1)
		document.getElementById(e).style.backgroundColor='#f1f1f1';
	else
		document.getElementById(e).style.backgroundColor='white';
	
}
function edit(e)
{
	location.replace('room.php?ed='+e);
}
</script>
</head>
<body bgcolor="#f1f1f1">
<div class="navigation">

</div>
<br/>
<br/><br/>
    <center>
        <form name="f1" method="POST">
             <table width="1045" cellpadding="0"   cellspacing="0"  >
                  <tr bgcolor="#4a8bc1">
                      <td width="174" height="44"><p class="header">Room no</p></td>
                      <td width="182"><p class="header">Floor</p></td>
                      <td width="246"><p class="header">Status</p></td>
                          <td width="223">
              <p class="header">  Type</p>
                </td>
                 <td width="152">
               <p class="header"> Upgradable</p>
                </td>
                </tr>
                <tr  bgcolor='#f1f1f1'>
                      <td height="42" align="center"> <input type="text" name="room_no" size="10" REQUIRED class="txt22"></td>
                 
                       <td><select name="floor_no" default="1" class="cmb">                  
                       <?php
                            
                          show_floor_info_combo($conn,$db,-1)
                        
                        ?>                                     
                    </select></td>
                
                    <td align="center"><select name="status"  class="cmb">
                        <option value=0>Booked</option>
                        <option value=1 selected>Available</option>
                        <option value=2>Unavailable</option>
                    </select></td>
               
                <td align="center">
                <select name="type"  class="cmb">
                
                  <?php
                   show_type_combo($conn,$db,-1);
                  ?>
                   
                </select>
                </td>
            
            
                <td align="center">
                <select name="upgradable"  class="cmb">
                    <option value=0>No</option>
                    <option value=1>Yes</option>
                    </select>
                </td>
            </tr>
            <tr >
                <td height="46" align="center" colspan="7"><input type="submit" name="submit" class="button"></td>
                </tr>           
        </table>
     </form>
    <p class="main"> Room List</p>
     
     
    <table  width="1048" cellspacing="0">
        <tr bgcolor="#4a8bc1">
        <td width="107" height="44" align="center"><p class="header">Room no</p></td>
        <td  width="155" align="center"><p class="header">Floor no</p></td>
        <td  width="180" align="center"><p class="header">Status</p></td>
        <td  width="162" align="center"><p class="header">Type</p></td>
        <td width="130" align="center"><p class="header">Upgradable</p></td>
          <td  width="89"></td>
        <td width="50"></td>
        </tr>
       
        <?php
         
                $i=0;
				
				 $query2="select * from room_info,room_type where type=type_id order by c_room_no";
                 $result1=mysqli_query($conn,$query2);
                 while($data=mysqli_fetch_assoc($result1))
                 {
					 if(isset($_GET['ed']) && $_GET['ed']==$data['room_id'] )
					 {
						echo"<tr bgcolor='#4CAF50' >";
					}
                        else
						
						{
							if($i%2==1)
						{
							echo"<tr bgcolor='#f1f1f1' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)' onDblClick=edit('$data[room_id]')>";
						}
						
						else
						{
							echo"<tr bgcolor='white' id='$i' onMouseOver='highlight($i)' onMouseOut='remove_highlight($i)'  onDblClick=edit('$data[room_id]')>";
							}
						
						}
							$i++;
                       if(isset($_GET['ed']) && $_GET['ed']==$data['room_id'] ) //Edit Mode
                       {
                           ?>
                           
                           <form method='POST'>
                            <td height="42" align="center"><input type='hidden' name='room_id_e' value='<?php echo $data['room_id'];?>'>
                            <input type='text' name='room_no_e' value='<?php echo $data['room_no'];?>' size='4' class="txt22" REQUIRED></td>
                            <td align="center"><select name='floor_e' value=1  class="cmb2">
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
                                
                            <td align="center"><select name='status_e'  class="cmb">
                            <option value=0 <?php echo $zero;?>>Booked</option>
                            <option value=1 <?php echo $one;?>>Available</option>
                            <option value=2 <?php echo $two;?>>Unavailable</option>
                            </select>
                           <td align="center"><select name='type_e'>
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
                            <td align="center"><select name='upgradable_e'  class="cmb2">
                            
                    <option value=0 <?php echo $no; ?>>No</option>
                    <option value=1 <?php echo $yes; ?>>Yes</option>
                    </select></td> 
                            <td align="center"><a href='room.php?'><input type='button'  value='Cancel' class="button_r"></a></td>
                            <td align="center"><input type='submit' name='submit_e' value='Save' class="button_g"></td> 
                           </form>
                    <?php }  
                    else //Normal Mode
                    {
                      
                        ?>
                       <td height="42" align="center"><?php echo $data['room_no'];?></td> 
                       <td align="center"><?php echo $data['floor_no'];?></td>
                       <?php 
                        if($data['status']==0)
                            $st='Booked';
                            else if($data['status']==1)
                                $st='Available';
                                else 
                                    $st='Unavailable';
                            ?>    
                       <td align="center"><?php echo $st; ?></td>
                       <td align="center"><?php echo $data['type_name']; ?></td>
                       <?php
                        if($data['upgradable']==1)
						{
                            ?> <td align="center">Yes</td>
                            <?php }
                        else
						{
						?>
                         <td align="center">No</td>
                         <?php
                         
						 }
                        ?> 
                          
                       <td align="center"><a href='room.php?uid=<?php echo $data['room_id']?>'><input type="button" class="button_r" value="Delete"></a></td>
                       <td width="155" align="center"><a href='room.php?ed=<?php echo $data['room_id']?>'><input type="button" class="button_g" value="Edit"> </a></td>                  
                    <?php } ?>           
                    </tr>
                      <!--<tr><td colspan="7"><hr/></td></tr>-->
             <?php } ?>
            
         
      </table>
     </center>
</body>
</html>