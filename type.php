<?php
   
    $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"hotel_db");
    
    if(isset($_POST['submit_e']))
    {
        $type_id=$_POST['type_id_e'];
        $type_name=$_POST['type_name_e'];
        $query="update room_type set type_name='$type_name' where type_id=$type_id";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            echo "<script>location.replace('type.php');</script>";
        }
    }
    if(isset($_POST['submit']))
    {
        $type_name=$_POST['type_name'];
        echo $type_name;
        $query="insert into room_type(type_name) values('$type_name')";
        $result=mysqli_query($conn,$query);
        
        if($result)
          {
              echo "<script>alert('Data Inserted');location.replace('type.php?');</script>";
          }
        
    }
    
    if (isset($_GET['del']))
    {
        $type_id=$_GET['del'];
        $query="delete from room_type where type_id='$type_id'";
        $result=mysqli_query($conn,$query);
        if($result)
        
        echo "<script>alert('Deleted');location.replace('type.php?');</script>";
    }
?>
<html>
<head>
<script>

</script>

<style>

.lnk:hover
{
	//background-color:#f44336;
	background-color:#0078d7;
}
.user
{
	font-family:'Segoe UI';
	cursor:default;
	border:1px solid :#FFF;
	color:white;
	font-size:12px;
	
	
}
.user:hover
{
	color:black;
	background-color:white;
}
.user_name
{
	background-color:#F2F2F2;
	position:fixed;
	margin-top:0px;
	margin-left:1150px;
	padding:20px;
	box-shadow: 1px 1px 1px 1px #999999;
	width:170px;
	display:none;
	transition:.5s;
	z-index:7;
}
.circle
{
	border-radius:100%;
	background-color:#0078d7;
	height:82px;
	width:82px;
	font-size:35px;
	//padding:10px;
	font-family:'Segoe UI Light';
	color:white;
}
.g
{
	//font-size:60px;
}
.username
{
	font-family:'Segoe UI';
	font-size:12px;
	color:#666;
	
}
.NaN
{
	font-family:'Segoe UI';
	font-size:12px;
	color:red;
	//height:2px;
}
.logout
{
	font-family:'Segoe UI';
	font-size:12px;
	//color:#666;
	text-decoration:none;
	
}


.realname
{
	font-family:'Segoe UI';
	font-size:14px;
	
	
}
.a
	{
		text-decoration:none;
	color:white;
	font-family:'Segoe UI';
	font-size:12px;
	}
.nav
	{
		background-color:#000;
		position:fixed;
		top:0px;
		width:100%;
		height:40px;
		z-index:1;
		//box-shadow: .1px .1px .1px .1px #000000;
	}
	.header_info
	{
		width:100px;
		background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:24px;
		
	}
	body
	{
		margin:0;
	}
	.table_h
	{
	a8bc1;
	font-size: 14px;
	background-color: white;
	text-align: center;
	transition:.5s;
	
	//font-weight:200;
		color:black;
		font-family:'Segoe UI';
	
	
	}
	
	.td_a
	{
	 border-bottom: 1px solid #ddd;
	 transition:.5s;

	}
	.fx
	{
		
		transition: .5s;
		height:100%;
		background-color:white;
		//margin-left:0;
		width:250px;
		//width:0px;
		overflow:hidden;
		position:fixed;
		top:0;
	//	border: 1px solid #4a8bc1;
	border-right:1px solid #4a8bc1;
		padding:5px;
	//	box-shadow:1px 1px 1px #4a8bc1;
		
		
	}
	
	.header
	{
		font-weight:200;
		color:white;
		font-family:'Segoe UI Light';
		
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
	.header0
	{
		font-size:14px;
		color:#333;
		font-family:'Segoe UI';
	}
	.header1
	{
		font-size:22px;
		color:#333;
		font-family:'Segoe UI Light';
	}
	
	.txt0
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:220px;
		height:26px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.button
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:14px;
		padding:7px 14px;
		transition: .5s;
		
	}
</style>
<title>::Hotel Booking System::</title>
</head>
<body>
<div class="nav">
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="224"></td>
<td width="98" align="center" class="lnk"><a href="user.php" class="a"></a></td>
<td width="93" align="center" class="lnk" ><a href="room_entry.php" class="a">Rooms</a></td>
<td width="93" align="center"  class="lnk" ><a href="floor.php" class="a">Floors</a></td>
<td width="110" align="center" class="lnk" bgcolor="#0078d7"><a href="type.php"  class="a">Room types</a></td>
<td width="101" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="93" align="center" class="lnk"><a href="advance.php" class="a" >Payments</a></td>
<td width="92" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="102" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="119" align="center" class="lnk"><a href="check.php" class="a">Checkout</a></td>
<td width="153" align="center" class="user" onClick="show_context()" ><?php echo " Anish Sharma";?></td>

</tr></table>

 <div class="user_name" id="user_name">
 <table align="center">
 <tr>
 <td class="circle"  valign="middle">&nbsp;&nbsp;&nbsp;<?php echo $un[0];?></td></tr></table>
  <p class="realname" align="center"><?php echo " ".$_SESSION['user_name'];?></p>
 <p class="username" align="center">Administrator</p>
  <p class="username" align="center">username: <?php echo " ".$_SESSION['login_name'];?></p>
  
   <hr>
   <p  align="center"><a href="logout.php" class="logout">logout</a></p>
   </div>

</div>


<div class="fx" id="fx">
  <form name="f1" method="POST">
  
    <table  cellpadding="0"  cellspacing="0" >
    <tr><td height="129"><p class="header1">&nbsp;</p>
      <p class="header1">Create new Class</p></td></tr>
                  <tr>
                      <td height="34" ><table cellpadding="0"  cellspacing="0"><tr><td><p class="header0">Class Name</p></td><td ><p id="NaN" class="NaN"></p></td></tr></table></td>
                      </tr><tr> <td height="20"  align="center"> <input type="text" name="floor_no" size="10" REQUIRED  class="txt0" id="floor_no" onKeyUp="validate_NaN()"></td></tr>
                     
                        <tr>
                          <td width="195" height="37">
              <p class="header0">  Rate</p>
                </td>
                </tr><tr>
                <td align="center">
                <input type="text" name="floor_no" size="10" REQUIRED  class="txt0" id="floor_alias" onKeyUp="validate_NaN()">
                
                </td></tr>
                <tr>
             
            
            
              
            
                <td height="84" align="center" ><input type="button" value="submit" class="button" onClick="submit_new_floor()" id="submit_floor"></td>
                    </tr>      
        </table>
     </form>
     
     </div>

    
    <br>
    <br>
   
<table cellpadding="10" cellspacing="0" class="table_h" width="1404px"> 
   
    <tr bgcolor="#0078d7"> <td width="297" height="48">oo</td><td width="144" align="left"><p class="header">ClassName</p></td><td width="146"><p class="header">Rate</p></td><td width="83"><p class="header">No of Rooms</p></td><td width="211"><p class="header">No of Booked Rooms</p></td><td></td><td></td></tr>
        <?php
            $query="select * from room_type";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                while($data=mysqli_fetch_assoc($result))
                {
                   $id=$data['type_id'];
                    if(isset($_GET['edit']) && $id==$_GET['edit']){
                ?>
                <form name="frm2" method="POST">
                <tr><td height="57" class="td_a"><input type="text" name="type_name_e" value="<?php echo $data['type_name'];?>"><input type="hidden" name="type_id_e" value=<?php echo $data['type_id']?>></td>
                <td class="td_a"><a href="type.php?">Cancel</a></td><td width="146" class="td_a"><input type="submit"" name="submit_e"></td>
                </form>
               <?php
                    }
                 else{ 
                
                ?>
                <tr>
                <td height="50" class="td_a" align="right"><input type="checkbox"></td>
                
                <td class="td_a" align="left"><?php echo $data['type_name']; ?> </td>
                <td class="td_a"> <?php echo $data['rate']; ?> </td>
               <td class="td_a">1</td>
               <td class="td_a">2</td>
                <td width="161" class="td_a"><input type="button" class="button_r" value="Delete" disabled></td>
      <td width="220" class="td_a"><input type="button" class="button_g" value="Edit" disabled></td></tr>
                
                <?php
                 } } }
                  ?>
                </tr>
    </table>

</body>

</html>