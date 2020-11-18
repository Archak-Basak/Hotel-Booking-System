<html>
<?php

session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('index.php');</script>";
	}
?>
<head>
<script>
	function request_rooms(e)
	{
		if(e==0)
		{
		var a=document.getElementById('floor');
		var aa=a.options[a.selectedIndex].value;
		
		var b=document.getElementById('type');
		var bb=b.options[b.selectedIndex].value;
		}
		else
		{
		var aa=0;
		var bb=-1;
		}
	var xmlhttp=new XMLHttpRequest();
		
		
		str="dashboard_ex.php?state="+aa+"&type="+bb;
		
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("body").innerHTML = this.responseText;
				//alert("ok");
				//division();
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
	}
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
</script>
<style>
.n_r
{
	font-family:'Segoe UI';
}
.nav
	{
		background-color:#000;
		position:fixed;
		top:0px;
		width:100%;
		height:40px;
		z-index:1;
		//box-shadow: 0.5px 0.5px 0.5px 0.5px #CCCCCC;
		
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
	.room
	{
		width:180px;
		height:90px;
		box-shadow:0.5px 0.5px 0.5px 0.5px #CCCCCC;
		
	}
	
	.room_no
	{
		font-size:17px;
		color:white;
		font-family:'Segoe UI';
	}
	.floor
	{
		font-size:20px;
		color:#333;
		font-family:'Segoe UI Light';
	}
	body
	{
		margin:0;
	}
	.body
	{
		margin-left:250px;
	}
	.analytics
	{
	background-color:white;
		font-family:'Segoe UI';
		height:100%;
		position:fixed;
		//box-shadow: 0.1px 0.1px 0.1px #000000;	
		width:250px;
		transition:.5s;
		overflow:hidden;
		//border-right:1px solid #4a8bc1;
		padding:5px;
		box-shadow: 0.5px 0.5px 0.5px 0.5px #CCCCCC;
	
	}
	.name
	{
		overflow:hidden;
		height:0;
		transition :.2s;
		font-size:14px;
		color:white;
		font-family:'Segoe UI';
		
	}
	.room:hover .name
	{
		height:20px;
	}
	.float
	{
		position:fixed;
		background-color:#4a8bc1;
		color:white;
		position:fixed;
		left:1250px;
		padding:10px;
		font-family:'Segoe UI';
		transition:.5s;
		top:0px;
		text-decoration:none;
		
		
	}
	.float:hover
	{
		background-color:white;	
	}
	
	.br
	{
		border: 1px solid #333;
	}
	.header_text
	{
		font-family:'Segoe UI Light';
		font-size:21px;
	}
		.head_text
	{
		font-family:'Segoe UI';
		font-size:14px;
	}
	.bar
	{
	box-shadow: 0.5px 0.5px 0.5px 0.5px #CCCCCC;
	
	}
	
	.c_nav
	{
		position:fixed;
		top:40px;
		margin-left:10px;
		width:100%;
		background-color:#0078d7;
		height:40px;
		overflow:hidden;
		transition:.5s;
		box-shadow: 0.5px 0.5px 0.5px 0.5px #CCCCCC;
		
	}
	.filter
	{
		margin-left:1024px;
		margin-top:-30px;
	}	
	.button
	{
		
		//border:none;
		background-color:#0078d7;
		border:1px solid white;
		//font-size:16px;
		padding:5px 10px;
		//height:30px;
		//margin-top:20px;
		transition: .5s;
		font-family:'Segoe UI';
		color:white;
		
	}
	.button:hover
	{
		color:#0078d7;
		background-color:#FFF;
		
	}
	.txt
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		//width:220px;
		height:30px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		//display:block;
		//box-shadow: 0.1px 0.1px 0.1px 0.1px #CCCCCC;
		
	}
	
	.a
	{
		text-decoration:none;
	//color:white;
	font-family:'Segoe UI';
	font-size:12px;
	}
	.lnk:hover
{
	//background-color:#f44336;
	background-color:#0078d7;
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

	.header_info
	{
		width:100px;
		background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:24px;
		
	}
	
	.room_number
	{
		font-family:'Segoe UI';
		font-size:16px;
	}
	.rate_box
	{
		font-family:'Segoe UI';
		font-size:12px;
	}
	.a
	{
		text-decoration:none;
		color:white;
	}
	.user
{
	font-family:'Segoe UI';
	cursor:default;
	border:1px solid :#FFF;
	color:white;
	font-size:12px;
	
	
}
	
</style>
<?php 


if(isset($_GET['id']))
	{
		session_unset();
		session_destroy();
		echo "<script>location.replace('index.php');</script>";
	}
	 $conn=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($conn,"hotel_db");
		$un=str_split($_SESSION['user_name']);

	
?>
<title>::Hotel Booking System::</title>
</head>
<body onLoad="request_rooms(1)">
<div class="nav">
<?php
	if($_SESSION['user_type']==1)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk"  ><a href="booking_home.php" class="a">Home</a></td>
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
<td width="86" align="center" class="lnk" bgcolor="#0078d7"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk"><a href="check.php" class="a">Checkout</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php }
	else if($_SESSION['user_type']==2)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>

<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>

<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="74" align="center"class="lnk" ><a href="advance.php" class="a" >Payments</a></td>
<td width="72" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="86" align="center" class="lnk" bgcolor="#0078d7"><a href="dashboard.php" class="a">Dashboard</a></td>
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

<div class="c_nav"><form method="POST" name="frm1" class="filter">
<br><br>
<select name='floor' id="floor" class="txt">

<option value=0>Floor wise</option>
<option value=1>Type wise</option>

</select>
<select name='type' id="type" class="txt" >
<option value=-1 >All rooms</p></option>
<option value=1>Available rooms</option>
<option value=0>Booked rooms</option>
<option value=2>Unavailable rooms</option>
</select>
<input type="button" onClick="request_rooms(0)" class="button" value="filter">
</form>
</div>

<div class="float" align="left"> <a href="dashboard.php?id=1">logout</a><br></div>


<?php

      $qr="select count(*) as total from room_info";
	  $r_qr=mysqli_query($conn,$qr);
	  $dt_qr=mysqli_fetch_assoc($r_qr);
	  
	  
	    $qr2="select count(*) as total from room_info where status='0'";
	  $r_qr2=mysqli_query($conn,$qr2);
	  $dt_qr2=mysqli_fetch_assoc($r_qr2);
	  
	  $qr3="select count(*) as total from room_info where status='1'";
	  $r_qr3=mysqli_query($conn,$qr3);
	  $dt_qr3=mysqli_fetch_assoc($r_qr3);
	  
	  $qr4="select count(*) as total from room_info where status='2'";
	  $r_qr4=mysqli_query($conn,$qr4);
	  $dt_qr4=mysqli_fetch_assoc($r_qr4);
	  
?>
<div class="analytics">
<br>
<p class="header_text">
Dashboard</p>

<p class="head_text">Room info</p>
<hr>
<table width="209" cellpadding="5" cellspacing="5">
<tr><td bgcolor="#0078d7"></td>
<td><p class="head_text">Total rooms</p></td>
<td><p class="head_text"><?php echo $dt_qr['total'];?></p></td>
</tr><tr><td bgcolor="#53b567"></td>
<td><p class="head_text">Rooms available</td>
<td><p class="head_text"><?php echo $dt_qr3['total'];?></td>
</tr><tr><td bgcolor="#f44336"></td>
<td><p class="head_text">Rooms booked</td>
<td><p class="head_text"><?php echo $dt_qr2['total'];?></p></td>
</tr><tr><td bgcolor="#ff9800"></td>
<td><p class="head_text">Rooms unavailable</td>
<td><p class="head_text"><?php echo $dt_qr4['total'];?></td>
</tr>
</table>

<?php
$av=($dt_qr3['total']/$dt_qr['total'])*100;
$un_av=($dt_qr4['total']/$dt_qr['total'])*100;
$bookd=($dt_qr2['total']/$dt_qr['total'])*100;
$unavailable2=(int)$un_av*2;
$booked2=(int)$bookd*2;
$available2=(int)$av*2;
$unavailable=(int)$un_av;
$booked=(int)$bookd;
$available=(int)$av;

?>

<p class="head_text">Graphical Analysis</p><hr>
<table width="221"  >
<tr><td width="63" valign="bottom">
<table cellspacing="5" cellpadding="5">
<tr>
<td height="<?php echo $available2?>" bgcolor="#53b567" width="10px" class="bar"></td><td></td></tr><tr><td colspan="2"><p class="head_text"><?php echo $available."%";?></p></td></tr></table>
</td><td width="68" valign="bottom"><table   cellspacing="5" cellpadding="5"><tr>
<td height="<?php echo $booked2?>" bgcolor="#f44336" width="10px" class="bar"></td><td></td></tr><tr><td colspan="2"><p class="head_text"><?php echo $booked."%";?></p></td></tr></table>
</td><td width="68" valign="bottom"><table cellspacing="5" cellpadding="5"><tr>
<td height="<?php echo $unavailable2?>" bgcolor="#ff9800" width="10px" class="bar"></td><td></td></tr><tr><td colspan="2"><p class="head_text"><?php echo $unavailable."%";?></p></td></tr>
</table></td></tr></table>


</div>
<br>
<br>
<br>
<div class="body" id="body">


</div>
<input type="hidden" value="0" id="context">
</body>
</html>