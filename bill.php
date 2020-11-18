<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>::Hotel Booking System::</title>
<?php
session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('index.php');</script>";
	}
	if(!isset($_GET['name']))
	{
		$_GET['name']='';
		$_GET['room']='';
		$_GET['date']='';
	}
	
?>
<script>
var len;
var length;
	function set_length(e)
	{
		len=e;
	}

	function print_date()
	{
		alert(document.getElementById('to').value);
	}
	function request_data()
	{
		var rooma=document.getElementById('room');
		var room=rooma.options[rooma.selectedIndex].value;
		var guest=document.getElementById('guest').value;
		var to=document.getElementById('to').value;
		var from=document.getElementById('from').value;
		//var room='101';
		var str="bill_ex.php?room="+room+"&guest="+guest+"&to="+to+"&from="+from;
		//alert(str);
		var xmlhttp=new XMLHttpRequest();
		
		// var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("q").innerHTML = this.responseText;
				//alert(this.responseText);
				//division();
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
		
	}
	function division()
		{
			
			//alert('ok');
			len=parseInt(document.getElementById('len').value);
			
			len=len*90;
			
			if(len>90)
				length=len+"px";
			else
				length="0px";
			//alert(length);
			document.getElementById('b_r').style.height=length;
		//	alert(len);
			
		}
	function poll_rest(e,a)
	{
		//alert(a);
		if(document.getElementById(a).checked)
		{
			var rooms=document.getElementsByClassName(e);
			var i;
			for(i=0;i<rooms.length;i++)
			{
				rooms[i].checked=true;	
			}
			//alert(rooms.length);
		}
		
		else
		{
			var rooms=document.getElementsByClassName(e);
			var i;
			for(i=0;i<rooms.length;i++)
			{
				rooms[i].checked=false;	
			}
		}
		
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
function validate_name()
{
	
	checkAll();
	var regEx=/[~!@#$%^&*()_+`1234567890-=<>?,.";'{}|]/;
	var user=document.getElementById('guest').value;
	if(user.match(regEx)!=null)
	{
		user=document.getElementById('guest').style.borderColor="red";
		document.getElementById('guest_error').style.height="20px";
		document.getElementById('guest_error').innerHTML="Invalid name";
		document.getElementById('details').disabled=true;
		
	
		
	}
	else
	{
		user=document.getElementById('guest').style.borderColor="black";
		document.getElementById('guest_error').style.height="0px";
		document.getElementById('guest_error').innerHTML="";
	
		
	}
}
function checkAll()
{
 if(document.getElementById('guest').value=='' || document.getElementById('from').value=='')	
 {
	document.getElementById('details').disabled=true;
	
	}
	else
	{
		document.getElementById('details').disabled=false;
	
	}
}

</script>
<style>

.a
	{
		text-decoration:none;
	color:white;
	font-family:'Segoe UI';
	font-size:12px;
	}
	.table_php
	{
		font-size:13px;
	}
	.table_php2
	{
		font-size:13px;
		position:fixed;
		z-index:0;
		margin-top:4px;
		margin-left:262px;
		color:white;
		font-family:'Segoe UI Light';
		box-shadow: 1px 1px 1px 1px #CCCCCC;
	}
.txt
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:220px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.txt:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	.txt2
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:230px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.txt2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	table
	{
	//border: 1.5px solid #4a8bc1;
	font-size: 18px;
	//background-color: white;
	font-family:'Segoe UI';
	//text-align: center;
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
	body
	{
		margin:0;
	}
	.side
	{
		position:fixed;
		height:100%;
		background-color:white;
		top:40px;
		border: 1.5px solid #4a8bc1;
		width:260px;
	}
	.b_r
	{
		//height:0;
		margin-top:20px;
		//margin-top:40px;
		margin-left:260px;
		transition:1s;
		background-color:white;
		//border: 1.5px solid #4a8bc1;
		overflow:hidden;
		width:1120px
		margin-top:10px;
	}
	.b_d
	{
		border-bottom:1px solid #666;
	}
	.nav
	{
		background-color:#000;
		position:fixed;
		top:0px;
		width:100%;
		height:40px;
		z-index:1;
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
.error
{
	color:red;
	height:0px;
	transition:.5s;
	font-size:12px;
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
.q
{
	font-size:14px;
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
.header0
	{
		font-size:14px;
		color:#333;
		font-family:'Segoe UI';
	}

.realname
{
	font-family:'Segoe UI';
	font-size:14px;
	
	
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
	
	.user
{
	font-family:'Segoe UI';
	cursor:default;
	border:1px solid :#FFF;
	color:white;
	font-size:12px;
	
	
}
.header1
	{
		font-size:22px;
		color:#333;
		font-family:'Segoe UI Light';
	}
.user:hover
{
	color:black;
	background-color:white;
}
.link_table
{
	height:40x;
}
.header_info
	{
		width:100px;
		background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:20px;
		
	}
</style>
</head>

<body>
<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$un=str_split($_SESSION['user_name']);
	$query="select * from room_info";
	$res=mysqli_query($conn,$query);
?>
<div class="nav">
<?php
	if($_SESSION['user_type']==1)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>
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
<td width="72" align="center" class="lnk"  bgcolor="#0078d7"><a href="bill.php" class="a">Billing</a></td>
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
<td width="72" align="center" class="lnk"  bgcolor="#0078d7"><a href="bill.php" class="a">Billing</a></td>
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
<form name="f1" method="GET" >
<div class="side">

<table cellspacing="5" cellpadding="0">
<tr><td><p class="header1">Billing</p></td></tr>
<tr>
<td>
<p class="header0">
Guest Name
</p></td></tr><tr><td><input type="text" name="guest" id="guest" class="txt" onKeyUp="validate_name()" value=<?php echo $_GET['name'];?>>
<div class="error" id=guest_error></div></td></tr><tr>

<td><p class="header0">Room No</p></td></tr><tr><td> <select name="room_s" name="room" id="room" class="txt2">
<?php
	
while($data=mysqli_fetch_assoc($res))
{
	?>
	<option value='<?php echo $data['c_room_no'];?>' <?php if($data['c_room_no']==$_GET['room']) echo "selected";?>><?php echo $data['c_room_no']; ?></option>
	<?php
}
?>
</select>
</td></tr><tr>

<td><p class="header0">Check in Date</p></td></tr><tr><td><input type="date" name="from" id="from" value='<?php echo $_GET['date'];?>'class="txt" onChange="checkAll()" onClick="checkAll()"></td></tr><tr><td> </td></tr><tr><td><input type="date" name="to" id="to" class="txt" style="visibility:hidden"></td></tr>
<tr><td align="center"><input type="button" onClick="request_data()" value="Get Billing Details" class="button" disabled id="details"></tr>
</table>

</div>


</form><br><br>
<table width="1120" height="39" cellpadding="10" cellspacing="0" bgcolor="#0078d7" class="table_php2" id="r">
        <tr>
        <td width="107" height="37">Name</td>
        <td width="53">Room No</td>
        <td width="74">Rate</td>
        <td width="116">Service</td>
         <td width="125">Service rate</td>
        <td width="89">Checkin Date</td>
        <td width="86">Checkout Date</td>
        <td width="65">Total Days</td>
        <td width="105">Forwarded Rooms</td>
       
        <td width="98">Bill Status</td>
        </tr></table>
<div class="b_r" id="b_r">

<p id="q"></p>
</div>
<input type="hidden" value="0" id="context">

</body>

</html>