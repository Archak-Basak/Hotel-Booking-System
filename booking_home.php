<!doctype html>
<html>
<?php 

session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('login.php');</script>";
	}
?>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.large_pr
{
	font-family:'Segoe UI light';
	font-size:62px;
	//color:#FFF;
}
.large_text
{
	font-family:'Segoe UI light';
	font-size:62px;
	color:#FFF;
}
.small_text
{
	font-family:'Segoe UI light';
	//font-size:62px;
	color:#FFF;
}
	.guest
	{
		width:250px;
		
	}
	.body
	{
		margin-left:300px;
		position:fixed;
		margin-top:10px;
		height:100%;
		box-shadow: .1px .1px .1px .1px #000000;
		width:100%;
	}
	body
	{
		margin:0;
	}
	.border_down
	{
	//border-bottom:1px solid #000;
		//box-shadow:.1px .1px .1px .1px #000000;
		padding:10px;
	}
	.b
	{
		border-bottom:1px solid #999;
	}
	.google
	{
		margin-left:10px;
		font-family:'Segoe UI';
		//border:1px solid #999;
		//margin-top:20px;
		box-shadow: 1px 1px 1px 1px #999999;
	}
	.border_down:hover
	{
		background-color:#0078d7;
		//color:white;
	}
	.mn
	{
		font-family:'Segoe UI Light';
		font-size:18px;
	}
	.guests
	{
	//border:1px solid #999;
	font-family:'Segoe UI';
	font-size:14px;
	box-shadow: 1px 1px 1px 1px #999999;

	}
	.header
	{
		color:white;
	}
	.search
	{
		
		
		outline:none;
		position:fixed;
		margin-left:10px;
		//box-shadow:.1px .1px .1px .1px #000000;
		border:1px solid #000;
		width:277px;
		height:30px;
		margin-top:40px;
		border:1px solid #999;
	}
	.search:focus
	{
	border:1px solid #0078d7;
	}
	.nav
	{
		background-color:#000;
		position:fixed;
		top:0px;
		width:100%;
		height:40px;
		z-index:1;
		box-shadow: 0.5px 0.5px 0.5px 0.5px #CCCCCC;
		
	}
	.header_info
	{
		width:100px;
		background-color:#0078d7;
		//padding:2px;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:22px;
		
	}
	li {
    display: inline;
	color:white;
	list-style-type: none;
    //margin: 0;
   // padding: 0;
    overflow: hidden;
   // background-color: #333;
   font-size:12px;
}
.a
{
	text-decoration:none;
	color:white;
	font-family:'Segoe UI';
	font-size:12px;
}

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
	z-index:4;
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




.div_t, .td1, .th1 {    
    border: 1px solid #ddd;
    text-align: left;
}

.div_t {
    border-collapse: collapse;
    width: 100%;
}

.th1, .td1 {
    padding: 15px;
}



.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #FFF; /* Fallback color */
  background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  //opacity:0.5;
	transition:1s;
}

.modal-content {
    background-color: white;
    margin: auto;
    padding: 20px;
    border: 1px solid #0078d7;
    width: 400px;
	color:black
	//background-color:#4a8bc1;
	font-family:'Segoe UI Light';
	font-size:18px;
	height:100%;
	opacity:1;
	margin-top:-40px;
	//transition:1s;
	
}
</style>
<script>
function show_context()
{
	
	if(document.getElementById('context').value==0)
	{
		document.getElementById('user_name').style.display="block";
		document.getElementById('context').value=1;
	}
		else
		{
			document.getElementById('user_name').style.display="none";
			document.getElementById('context').value=0;
		
		}
		
}
function departures()
{
	var str="booking_home_ex.php?dep=1";
	var xmlHttp=new XMLHttpRequest();
	
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('modal-content').innerHTML=this.responseText;
			open_modal()
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();	
}

function checkins()
{
	var str="booking_home_ex.php?chk=1";
	var xmlHttp=new XMLHttpRequest();
	
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('modal-content').innerHTML=this.responseText;
			open_modal();
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();	
}

function inhouse()
{
	var str="booking_home_ex.php?i_h=1";
	var xmlHttp=new XMLHttpRequest();
	
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('modal-content').innerHTML=this.responseText;
			open_modal()
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();	
}
function online()
{
	var str="booking_home_ex.php?online=1";
	var xmlHttp=new XMLHttpRequest();
	
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('modal-content').innerHTML=this.responseText;
			open_modal();
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();	
}

function arrival()
{
	var str="booking_home_ex.php?arr=1";
	var xmlHttp=new XMLHttpRequest();
	
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('modal-content').innerHTML=this.responseText;
			open_modal()
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();	
}

function open_modal()
{
	document.getElementById('modal').style.display="block";
	//document.getElementById('modal-content').style.height="800px"
}

function close_modal()
{
	document.getElementById('modal').style.display="none";
	//document.getElementById('modal-content').style.height="800px"
}
</script>
</head>

<body>
<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$nos=0;
	$nos2=0;
	$nos3=0;
	$query="select * from room_info where status=0";
	$result=mysqli_query($conn,$query);
	$un=str_split($_SESSION['user_name']);
	
	
	
	
?>
<div class="nav">
<?php
	if($_SESSION['user_type']==1)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk"  bgcolor="#0078d7"><a href="booking_home.php" class="a">Home</a></td>
<td width="77" align="center" class="lnk" ><a href="room_entry.php" class="a">Rooms</a></td>
<td width="66" align="center"  class="lnk"><a href="floor_entry.php" class="a">Floors</a></td>
<td width="84" align="center" class="lnk"><a href="type_entry.php" class="a">Classes</a></td>
<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>
<td width="102" align="center"  class="lnk"><a href="services.php" class="a">Room Service</a></td>
<td width="83" align="center"  class="lnk"><a href="food_entry.php" class="a">Food Entry</a></td>
<td width="92" align="center"  class="lnk"><a href="item_entry.php" class="a">Item Entry</a></td>
<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="74" align="center"class="lnk" ><a href="advance.php" class="a" >Payments</a></td>
<td width="72" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="86" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk"><a href="check.php" class="a">Checkout</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php }
	else if($_SESSION['user_type']==2)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk"  bgcolor="#0078d7"><a href="booking_home.php" class="a">Home</a></td>

<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>

<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="74" align="center"class="lnk" ><a href="advance.php" class="a" >Payments</a></td>
<td width="72" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="86" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk"><a href="check.php" class="a">Checkout</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php }
else if($_SESSION['user_type']==3)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>
<td width="500px"></td>
<td width="64" align="center" class="lnk"  bgcolor="#0078d7"><a href="booking_home.php" class="a">Home</a></td>

<td width="102" align="center"  class="lnk"><a href="services.php" class="a">Room Service</a></td>
<td width="83" align="center"  class="lnk"><a href="food_entry.php" class="a">Food Entry</a></td>
<td width="92" align="center"  class="lnk"><a href="item_entry.php" class="a">Item Entry</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php } ?>


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
<br>
<br>
<br>
<center><p class="large_pr">Welcome, <?php echo " ".$_SESSION['user_name'];?></p>
<?php
$date=date("Y-m-d");
	$query_ex="select * from booking_master where checkout_date='$date'";
	//echo $query_ex;
	$nos=0;
	$res=mysqli_query($conn,$query_ex);
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select count(*) as nos from booking_detail where booking_id='$data[booking_id]' and checkout_status=0";
		//echo $qr;
		$rs=mysqli_query($conn,$qr);
		$dt=mysqli_fetch_assoc($rs);
		$nos+=$dt['nos'];
	}
	
	
	
	
	$query_ex="select * from booking_master where checkin_date='$date' and checkin_status=1";
	//echo $query_ex;
	$nos22=0;
	$res=mysqli_query($conn,$query_ex);
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select count(*) as nos from booking_detail where booking_id='$data[booking_id]'";
		//echo $qr;
		$rs=mysqli_query($conn,$qr);
		$dt=mysqli_fetch_assoc($rs);
		$nos22+=$dt['nos'];
	}
	
	
	
	
	$query_ex="select * from booking_master where checkin_date='$date' and checkin_status=0";
//	echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	while($data=mysqli_fetch_assoc($res))
	{
		$qr="select count(*) as nos from booking_detail where booking_id='$data[booking_id]'";
	//	echo $qr;
		$rs=mysqli_query($conn,$qr);
		$dt=mysqli_fetch_assoc($rs);
		$nos2=$dt['nos'];
	}
	
	$query_ex="select count(*) as no from room_info where status='0'";
	//echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	$dt=mysqli_fetch_assoc($res);
		$nos3=$dt['no'];
	
	
	$query_ex="select count(*) as no from room_info where status='1'";
	//echo $query_ex;
	$res=mysqli_query($conn,$query_ex);
	$dt=mysqli_fetch_assoc($res);
		$nos4=$dt['no'];
		$chq="select * from checkin";
		$resq=mysqli_query($conn,$chq);
		$dq=mysqli_fetch_assoc($resq);
		
		$online="select count(*) as no from booking_master where online=1";
		$dt=mysqli_query($conn,$online);
		$dta=mysqli_fetch_assoc($dt);
?>
<table cellspacing="10" cellpadding="10">
<tr>
<td>
<table width="184" height="155"  style="cursor:help" onClick="arrival()" ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center" ><p class="small_text">Expected Arrivals</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $nos2;?></p></p></td></tr></table></td>
</tr>
</table>
</td><td>
<table width="184" height="155" style="cursor:help" onClick="inhouse()" ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center"><p class="small_text">In house Guests</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $nos3;?></p></td></tr></table></td>
</tr>
</table>
</td>

<td>
<table width="184" height="155"  ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center"><p class="small_text">Rooms available</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $nos4;?></p></td></tr></table></td>
</tr>
</table>
</td>
<td>
<table width="184" height="155" style="cursor:help" onClick="checkins()" ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center"><p class="small_text">Total Check ins</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $nos22;?></p></td></tr></table></td>
</tr>
</table>
</td>
<td>
<table width="184" height="155" style="cursor:help" onClick="departures()" ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center"><p class="small_text">Expected Departures</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $nos;?></p></td></tr></table></td>
</tr>
</table>
</td>

<td>
<table width="184" height="155" style="cursor:help" onClick="online()"  ><tr>
<td bgcolor="#0078d7"> <table width="172" height="131" cellpadding="0"><tr><td height="31" align="center"><p class="small_text">Online Bookings</p></td></tr><tr><td height="86" align="center"><p class="large_text"><?php echo $dta['no'];?></p></td></tr></table></td>
</tr>
</table>
</td></tr></table>
</center>
 <input type="hidden" value="0" id="context">
 <div id="ajax2"></div>
 
  <div class="modal" id="modal" >
  
<div class="modal-content" id="modal-content">
</div>
</div>
</body>