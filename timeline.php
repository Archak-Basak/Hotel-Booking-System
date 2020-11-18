<!doctype html>
<html>
<?php
session_start();
			if(!isset($_SESSION["user_name"]))
			{
				echo "location.replace('index.php');</script>";
			}
			?>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function request_ajax()
	{
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		var rt=document.getElementById('room_type');
	var room_type=parseInt(rt.options[rt.selectedIndex].value);
	alert(room_type);
		var xmlhttp=new XMLHttpRequest();
		
		
		str="timeline_ex.php?date1="+date1+"&date2="+date2+"&room_type="+room_type;
		
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("timeline").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();	
	}
</script>
<style>
table
{

	// border-collapse: collapse;
	//border: 1px solid #999999;
	// font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
	
	}
	
	.accompany
	{
		background-color:white;
		height:0px;
		overflow:hidden;
		visibility:visible;
		padding:10;
		transition:.5s;
		
	}
	.room_no
	{
		overflow:hidden;
		//background:#0078d7;
		color:black;
		font-family:'Segoe UI';
		font-size:18px;
		//border:thick #006;
		//box-shadow: 0.5px 0.5px 0.5px 0.5px #0078d7;
		border: 1px solid #0078d7;
		transition:.5s;
		
		
	}
	.table
	{
		border:1px solid #666;
	}
	.room_no:hover
	{
		background:#2C97DE;
	}
		.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 3; /* Sit on top */
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
    //margin: auto;
    padding: 20px;
    border: 1px solid #0078d7;
    width: 80%;
	//height:20%;
	color:black
	//background-color:#4a8bc1;
	font-family:'Segoe UI';
	font-size:14px;
	//height:200px;
	opacity:1;
	margin-top:-100px;
	margin-left:120px;
	//transition:1s;
	
}

	.name
	{
		
		
		font-size:12px;
		color:#333;
		font-family:'Segoe UI';
		
	}
	.txt
	{
	outline:none;
		
		border: 0.5px solid  #999;

		padding:5px 5px;
		width:220px;
		height:16px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		//box-shadow: 0.1px 0.1px 0.1px 0.1px #CCCCCC;
		
	}
	.txt:focus
	{
		//border: 1.5px solid #4a8bc1;
	}
	
	.txt2
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:80px;
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
	.header_text
	{
		font-size:18px;
		font-family:'Segoe UI';
		//box-shadow:.1px .1px .1px .1px black;
		//color:white;
		border-bottom:1px solid #999;
	}
	.maintable
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
	.body_div
	{
		margin-left:250px;
		margin-top:-60px;
		transition:.5s;
	}
	.acc_name
	{
		outline:none;
		
		border: 1px solid #ccc;
		
		padding:2px 2px;
		
		transition:.8s;
		font-family:'Product Sans';
		
	}
	.acc_name:focus
	{
		border: 1px solid #4a8bc1;
	}
	body
	{
		margin:0;	
		
	}
	.parent
	{
		transition:.5s;
	}
	.room_parent
	{
		background-color:white;
		width:200px;
	}
	.header
	{
		font-size:22px;
		color:#333;
		font-family:'Segoe UI Light';
	}
	.button
	{
		
		border:none;
		background-color:#CCCCCC;
		font-size:16px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button:hover
	{
		background-color:#999;
		
	}
	.header0
	{
		font-size:14px;
		color:#333;
		font-family:'Segoe UI';
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
	a
	{
		text-decoration:none;
		//background-color:white;
		color:black;
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
.error_div
{
	transition:.5s;
	background-color:#F30;
	overflow:hidden;
	color:white;
	//padding:5px;
	height:-10px;
	font-family:'Segoe UI';
	margin-left:260px;
	margin-top:-50px;
	position:fixed;
	text-align:center;
	font-size:14px;
	width:1100px;
}


.logout
{
	font-family:'Segoe UI';
	font-size:12px;
	//color:#666;
	text-decoration:none;
	
}
.user:hover
{
	color:black;
	background-color:white;
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
	.valid
	{
		font-size:12px;
		color:red;
		height:0px;
		transition:.5s;
	overflow:hidden;
	}
	.valid2
	{
		font-size:12px;
		color:red;
		//height:0px;
		transition:.5s;
	//overflow:hidden;
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
	.sel
	{
		position:fixed;
		background-color:#0078d7;
		width:100%;
		padding:10px;
	}
	.txt
	{
		outline:none;
		
		//border: 1.5px solid #ccc;
		
		padding:2px 2px;
		width:240px;
		height:25px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.text
	{
		font-family:'Segoe UI';
	}
	.text2
	{
		font-family:'Segoe UI';
		color:white;
		padding:0px;
	}
	.tab
	{
		table-layout:fixed;
		width:1400px;
	}
	
</style>
</head>

<body>
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
<td width="82" align="center" class="lnk" bgcolor="#0078d7"><a href="timeline.php" class="a">Timeline</a></td>
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

<td width="82" align="center" class="lnk" bgcolor="#0078d7"><a href="timeline.php" class="a">Timeline</a></td>
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
<div class="sel">
<table><tr>
<td>
<input type="date" id="date1" class="txt">
</td><td>
<input type="date" id="date2"  class="txt"></td><td>
<select id="room_type"  class="txt">
<option value=-1>All rooms</option>
<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$query="select * from room_type";
	$run=mysqli_query($conn,$query);
	while($data=mysqli_fetch_assoc($run))
	{
		?>
			<option value="<?php echo $data['type_id'];?>"><?php echo $data['type_name'];?></option>
		<?php
	}
?>
</select></td><td>
<input type="button" onClick="request_ajax()" value="Get timeline"></td></tr></table>
</div>
<br>
<br><br>

<div class="timeline" id="timeline">
</div>
</body>
</html>