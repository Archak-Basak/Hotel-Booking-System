<!doctype html>
<html>
<head>
<?php 

session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('login.php');</script>";
	}
?>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function request_ajax()
	{
		var name=document.getElementById('guest_name').value;
		var room=document.getElementById('room_no').value;
	
	
		var xmlhttp=new XMLHttpRequest();
		str="cancel_ex.php?name="+name+"&room="+room;
		//alert(str);
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("guests").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", str , true);
        xmlhttp.send();
	
	}
	function cancel_one(e,a)
	{
		
	
	var name=document.getElementById('guest_name').value;
		var room=document.getElementById('room_no').value;
	
		var xmlhttp=new XMLHttpRequest();
		var str="cancel_ex.php?delete="+e+"&name="+name+"&room="+room+"&bid="+a;
		alert(str);
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("guests").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", str , true);
        xmlhttp.send();
	}
	function cancel_all(e)
	{
	
		
	
		var xmlhttp=new XMLHttpRequest();
		var str="cancel_ex.php?cancel_all="+e;
		alert(str);
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("guests").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", str , true);
        xmlhttp.send();
	}
</script>
<style>
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
.guests
	{
	margin-left:300px;
	//border:1px solid #999;
	font-family:'Segoe UI';
	font-size:14px;
	box-shadow: 1px 1px 1px 1px #999999;

	}
	.header
	{
		color:#FFF;
	}
	.side
	{
		width:260px;
		border-color:#0078d7;;
		box-shadow: 1px 1px 1px 1px #999999;
		height:100%;
		position:fixed;
	}
	.txt{
	outline:none;
		
		border: 0.5px solid  #999;

		padding:5px 5px;
		width:220px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		font-size:14px;
		//box-shadow: 0.1px 0.1px 0.1px 0.1px #CCCCCC;
		
	}

</style>
</head>

<body>

<div class="nav">
<?php
	if($_SESSION['user_type']==1)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk"><a href="booking_home.php" class="a">Home</a></td>
<td width="77" align="center" class="lnk" ><a href="room_entry.php" class="a">Rooms</a></td>
<td width="66" align="center"  class="lnk"><a href="floor_entry.php" class="a">Floors</a></td>
<td width="84" align="center" class="lnk"><a href="type_entry.php" class="a">Classes</a></td>
<td width="116" align="center"  class="lnk"   bgcolor="#0078d7"><a href="cancel.php" class="a">Cancel booking</a></td>
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

<td width="116" align="center"  class="lnk"   bgcolor="#0078d7"><a href="cancel.php" class="a">Cancel booking</a></td>

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

<div class="side">
<br><br><br><br>
<table cellspacing="10">
<tr>
<td><input type="text" id="guest_name" placeholder="Name" class="txt"></td>
</tr><tr><td><input type="text" id="room_no" placeholder="room no" class="txt"></td></tr>
<tr><td><input type="button" onClick="request_ajax()" value="ok"></td></tr>
</table>
</div>

<br>
<br>
<br>
<div id="guests">
</div>
</body>
</html>