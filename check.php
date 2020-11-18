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
?>
<script>
var len;
	function clear_all_textboxes()
	{
		var txt="rate_box";
		//var txt2="rate_box_name";
		
		var check=document.getElementsByClassName(txt);
		var room_number=document.getElementsByClassName('room_no_display');
		var room_r_d=document.getElementsByClassName('room_rate_display');
		var room_a_d=document.getElementsByClassName('room_amount_display');
		var cbd=document.getElementsByClassName('checkbox_display');
		//var check2=document.getElementsByClassName(txt2);
		var i;
	
		for(i=0;i<check.length;i++)
		{
			
				check[i].value="";
				check[i].name="null";
				check[i].style.display='none';
				room_number[i].innerHTML='';
				room_r_d[i].innerHTML='';
				room_a_d[i].innerHTML='';
				cbd[i].style.visibility='hidden';
				/*check2[i].innerHTML="";
				check2[i].name="null";
				check2[i].style.display='none';*/
				
			
		}
	}
	
	function poll(e,a,n)
	{
		
		document.getElementById('final_advance').value=document.getElementById('advance'+a).value;
		//	alert();
		clear_other_checkboxes(n);
		clear_all_textboxes();
		proceed_for_checkout();
		var flag=false;
		var cl=e;
		var i=a.toString();
		var is_parent_checked=false;
		
		var checkbox=document.getElementById(i);
		if(checkbox.checked)
		{
			is_parent_checked=true;
			flag=true;
			document.getElementById('guest_name').innerHTML=n;
		}
		else
		{
			is_parent_checked=false;
			//document.getElementById('guest_name').value='';
		}
		
		if(e=='parent')
		{
			poll_child(is_parent_checked,n);
		}
		set_textboxes();
		set_forward_rooms(n);
		
		
	}
	function set_forward_rooms(e)
	{
		var clear_a=document.getElementsByName('forward_info');
		var a;
		for(a=0;a<clear_a.length;a++)
		{
			clear_a[a].value='';
		}
		var group=document.getElementsByTagName('input');
		var i;
		var temp;
		for(i=0;i<group.length;i++)
		{
			if(group[i].name==e && group[i].type=='checkbox' && group[i].checked==true)
			{
				//alert(group[i].name);
				var tmp=document.getElementsByName(e);
				var k;
				for(k=0;k<tmp.length;k++)
				{
				//	alert(tmp[k].id);
					t="forward_info"+tmp[k].id;
					a="room"+tmp[k].id;
					document.getElementById(t).value=document.getElementById(a).value;
				}
				break;
			}
		}
	}
	function set_textboxes()
	{
		var ct=0;
		var text_b=document.getElementsByClassName('rate_box');
		//var para_b=document.getElementsByClassName('rate_box_name');
		var room_number=document.getElementsByClassName('room_no_display');
		var room_id=document.getElementsByClassName('room_id_display');
		var room_amount_d=document.getElementsByClassName('room_amount_display');
		var room_rate_d=document.getElementsByClassName('room_rate_display');
		var cbd=document.getElementsByClassName('checkbox_display');
		var check_b=document.getElementsByTagName('input');
		var i;
		var tmp;
		var str;
		for(i=0;i<check_b.length;i++)
		{
			if(check_b[i].type=='checkbox')
			{
			   
			   if(check_b[i].checked)
			   {
				  	tmp=document.getElementById(check_b[i].id);
					str="rate"+tmp.id;
					str2="name_a"+tmp.id;
					str3="room"+tmp.id;
					str5="room_amount"+tmp.id;
					str4="room_rate"+tmp.id;
					str6="food_amt"+tmp.id;
					if(document.getElementById(str6).value=='')
						amtt=parseInt(document.getElementById(str5).value);//+parseInt(document.getElementById(str6).value)
					else
						amtt=parseInt(document.getElementById(str5).value)+parseInt(document.getElementById(str6).value)
					/*para_b[ct].innerHTML=document.getElementById(str2).value;
					para_b[ct].name="name_for_"+tmp.id;
					para_b[ct].style.display='block';*/
					room_amount_d[ct].innerHTML=amtt;
					room_rate_d[ct].innerHTML=document.getElementById(str4).value;
					room_id[ct].value=tmp.id;
					text_b[ct].value=document.getElementById(str).value;
					text_b[ct].name="rate_for_"+tmp.id;
					text_b[ct].style.display='block';
					room_number[ct].innerHTML=document.getElementById(str3).value;
					cbd[ct].style.visibility='visible';
					//alert(document.getElementById(str3).value);
					
					
					ct++;
			   }
			   
			}
		}
		if(ct==0)
		{
			document.getElementById('guest_name').innerHTML='';	
			document.getElementById('d').style.height="0px";
		}
		else
		{
			
				len=ct*72;
			document.getElementById('d').style.height=len+"px";
		}
	}
	function poll_child(parent_state,guest_name)
	{
		children=document.getElementsByName(guest_name);
		var i;
		
		
		if(parent_state)
		{
			for(i=0;i<children.length;i++)
			{
				children[i].checked=true;
					
			}
		}
		else
		{
			for(i=0;i<children.length;i++)
			{
				children[i].checked=false;
			}
		}
	}
	function clear_other_checkboxes(chk_name)
	{
		
		var check=document.getElementsByTagName('input');
		var i;
	
		for(i=0;i<check.length;i++)
		{
			if(check[i].name!=chk_name)
			{
				check[i].checked=false;		
			}
		}
	}
	function clear_checkout_info()
	{
		var a=document.getElementsByClassName('final_room_no');
		var c=document.getElementsByClassName('final_room_no_info');
		var b=document.getElementsByClassName('final_amount');
		var i;
		for(i=0;i<a.length;i++)
		{
			a[i].innerHTML='';
			b[i].innerHTML='';
			c[i].value='';
		}	
	}
	function proceed_for_checkout()
	{
		clear_checkout_info();
		document.getElementById('div_n').style.height='0px';
				document.getElementById('forward_button').style.height='0px';
			
	//show_forward_info();
		var total=0;
		var a=0;
		var check_d=document.getElementsByClassName('checkbox_display');
		var inp=document.getElementsByClassName('rate_box');
		var room_no=document.getElementsByClassName('room_no_display');
		var room_id=document.getElementsByClassName('room_id_display');
		var room_rate=document.getElementsByClassName('room_rate_display');
		var room_amount=document.getElementsByClassName('room_amount_display');
		var i;
		for(i=0;i<check_d.length;i++)
		{
			if(check_d[i].checked==true)
			{
				
				document.getElementsByClassName('final_room_no')[a].innerHTML=room_no[i].innerHTML;
				document.getElementsByClassName('final_room_no')[a].style.color="black";
				document.getElementsByClassName('final_amount')[a].style.color="black";
			document.getElementsByClassName('final_room_no_info')[a].value=room_no[i].innerHTML;
			document.getElementsByClassName('final_amount')[a].innerHTML=room_amount[i].innerHTML;
				b=a;
			
				var forwards=document.getElementById('forward_rooms'+room_id[i].value).value;
				var forwards_amt=document.getElementById('forward_rooms_amt'+room_id[i].value).value;
				if(forwards_amt=='')
					forwards_amt=0;
			var amt=parseInt(room_amount[i].innerHTML);
				
				//alert(amt);
				var str=forwards.split(',');
				var ab=0;
				while(true)
				{
					if(str[ab]!='')
					{
						
						a++;
						document.getElementsByClassName('final_room_no')[a].innerHTML=str[ab];
						document.getElementsByClassName('final_amount')[a].innerHTML=str[ab+1];
					document.getElementsByClassName('final_room_no')[a].style.color="red";
					document.getElementsByClassName('final_amount')[a].style.color="red";
					amt+=parseInt(str[ab+1]);
						ab=ab+2;
						
						
					}
					else
					{
					//a--;
						break;
					}
					
				}
				a++;
				
				//document.getElementsByClassName('final_amount')[b].innerHTML=amt;
					
					total+=parseInt(amt);
				
				
				
				
				
			
				
				
				if(a<=3)	
					h=120;
				//h=400;
				else
				h=a*45;
				400;
				document.getElementById('proceed').style.height=h+'px';
				document.getElementById('dsc').style.height=h+'px';
				document.getElementById('dsc2').style.height=h+'px';
				document.getElementById('dsc3').style.height=h+'px';
				document.getElementById('dsc4').style.height=h+'px';
				
				
			}
		}
		if(total!=0)
		{
			document.getElementsByClassName('final_total_amount')[0].value=total;
			document.getElementsByClassName('hidden_total_amount')[0].value=total;		
		}
		else
		{
			
			document.getElementById('proceed').style.height='0px';
		document.getElementById('dsc').style.height='0px';
				document.getElementById('dsc2').style.height='0px';
				document.getElementById('dsc3').style.height='0px';
				document.getElementById('dsc4').style.height='0px';
				document.getElementById('div_n').style.height='0px';
				document.getElementById('forward_button').style.height='0px';
				
		}
		
	deduct_from_advance();
		
	}
	function deduct_from_advance()
	{
		var advance=parseInt(document.getElementById('final_advance').value);
		var total=parseInt(document.getElementById('final_total_amount').value);
		
			document.getElementById('final_due').value=total-advance;
	}
	function calculate_discount()
	{
		if(document.getElementById('f_d').value!='')
		{
			var total=parseInt(document.getElementsByClassName('hidden_total_amount')[0].value);
			var discount=parseInt(document.getElementById('f_d').value);
			var dsc=total-discount;
			document.getElementsByClassName('final_total_amount')[0].value=dsc;
		}else
		{
			if(document.getElementById('f_d').value=='' || document.getElementById('f_d').value == 0)
			{
					document.getElementsByClassName('final_total_amount')[0].value=document.getElementsByClassName('hidden_total_amount')[0].value;
			}	
		}
		deduct_from_advance();
	}
	function show_forward_info()
	{
		var r=document.getElementsByName('forward_room_no');
		var a;
		for(a=0;a<r.length;a++)
		{
			r[a].checked=false;	
		}
		document.getElementById('final_forward').style.visibility="hidden";
		var rooms=document.getElementsByName('forward_info');
		var radio_b=document.getElementsByName('forward_room_no');
		var para_b=document.getElementsByName('forward_room_display');
		var i;
		var ctr=0;
		for(i=0;i<radio_b.length;i++)
		{
		//	rooms[i].value='null';
			radio_b[i].value='null';
			para_b[i].value='null';
			para_b[i].innerHTML='';
		}
		
		var room_index=0;
		var k,flag=false;;
		for(i=0;i<rooms.length;i++)
		{
			flag=false;
			if(rooms[i].value!='' || rooms[i].value!=null)
			{
				
				checkout_rooms=document.getElementsByClassName('final_room_no');
				for(k=0;k<checkout_rooms.length;k++)
				{
					//alert(rooms[i].value + " "+checkout_rooms[k].innerHTML);
					if(rooms[i].value==checkout_rooms[k].innerHTML &&checkout_rooms[k].innerHTML!=null)
					{
						flag=true;
					}
				}
			}
			if(!flag)
			{	
			
				radio_b[room_index].value=rooms[i].value;
				para_b[room_index].innerHTML=rooms[i].value;
				room_index++;
				t=room_index*50;
				ht=t+'px';
				if(rooms[i].value.toString().length>1)
				{
					document.getElementById('div_n').style.height=ht;
					document.getElementById('forward_button').style.height=ht;
				
				ctr++;
				}
				//alert(rooms[i].value);
			
			}
			
			if(ctr==0)
			{
				document.getElementById('div_n').style.height='0px';
				document.getElementById('forward_button').style.height='0px';
			}
		}
	}
	function enable_forward()
	{
		var r=document.getElementsByName('forward_room_no');
		var i;
		var flag=false;
		for(i=0;i<r.length;i++)
		{
			if(r[i].checked==true)
			{
				flag=true;
				break;
			}
		}
		if(flag)
		{
			document.getElementById('final_forward').style.visibility="visible";
		}
		else
		{
			document.getElementById('final_forward').style.visibility="hidden";
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
</script>
<style>
	
	.gs
	{
		background-color:white;
		transition:.5s;
		height:0;
		overflow:hidden;
		border:1px solid #CCC;
		color:#666;
		font-family:'Segoe UI';
		width:492px;
		//box-shadow: 0.1px 0.1px 0.1px 0.5px black;
		
		
		
		
	}
	.header
	{
	background-color:#0078d7;
		transition:.5s;
		height:0;
		overflow:hidden;
		border:1px solid #4A8BC2;;
		color:white;
		font-family:'Segoe UI';
		box-shadow:1px 1px 1px #CCCCCC;
		font-size:14px;
		
	}
	.content
	{
	font-size:13px;
	color:black;
	}
	.room_div
	{
		background-color:white;
		position:fixed;
		height:100%;
		top:40px;
		font-size:14px;
		font-face:'Segoe UI';
		border:1px solid #4A8BC2;
		//box-shadow: 1px 1px 1px #CCCCCC;
		//overflow:visible
		
	}
	body
	{
		margin:0;
	}
	.rate_box
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:40px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
		
	}
	
	
	
	
	.bill
	{
		position:fixed;
		//width:100px;
		//background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI';
		font-size:12px;
		margin-top:-30px;
		margin-left:850px;
		
		z-index:2;
	}
	.room
	{
		position:fixed;
		//width:100px;
		//background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI';
		font-size:12px;
		margin-top:-30px;
		margin-left:750px;
		
		z-index:2;
	}
	
	.dashboard
	{
		position:fixed;
		//width:100px;
		//background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI';
		font-size:12px;
		margin-top:-30px;
		margin-left:1150px;
		
		z-index:2;
	}
	.checkout
	{
		position:fixed;
		//width:100px;
		//background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI';
		font-size:12px;
		margin-top:-30px;
		margin-left:1050px;
		
		z-index:2;
	}
	.booking
	{
		position:fixed;
		//width:100px;
		//background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI';
		font-size:12px;
		margin-top:-30px;
		margin-left:950px;
		
		z-index:2;
	}
	
		.final_discount
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:1px 1px;
		//width:80px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
	}
	.final_total_amount
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:1px 1px;
		//width:80px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
	}
	.final_advance
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:1px 1px;
		//width:80px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
	}
	.final_due
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:1px 1px;
		//width:80px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
	}
	.proceed
	{
		height:0;
		
		
		
		background-color:white;
		transition:.5s;
		
		overflow:hidden;
		border:1px solid #CCC;

		color:#666;
		font-family:'Segoe UI';
		
		width:160px;
	}
	.dsc
	{
		height:0;
		
		
		background-color:white;
		transition:.5s;
		
		overflow:hidden;
		border:1px solid #CCC;

		color:#666;
		font-family:'Segoe UI';
		font-size:14px;
		
		width:160px;
	}
	
	.div_n
	{
		height:0;
		
		
		background-color:white;
		transition:.5s;
		
		overflow:hidden;
	border:1px solid #CCC;

		color:#666;
		font-family:'Segoe UI';
		font-size:14px;
		
		width:160px;
	}
	
	.forward_button
	{
		height:0;
		
		
		background-color:white;
		transition:.5s;
		
		overflow:hidden;
		border:1px solid #CCC;

		color:#666;
		font-family:'Segoe UI';
		font-size:14px;
		
		width:320px;
		
	}
	
	.guest_name
	{
		
		height:40px;
		font-family:'Segoe UI';
		font-size:18px;
		
	}
	
	.dsc4
	{
		height:0;
		
		
		background-color:white;
		transition:.5s;
		
		overflow:hidden;
		border:1px solid #CCC;

		color:#666;
		font-family:'Segoe UI';
		font-size:14px;
		
		width:160px;
	}
	.dsc3
	{
		transition: .5s;
	}
	.button
	{
		
		border:none;
		background-color:#CCCCCC;
		font-size:16px;
		padding:7px 14px;
		transition: .5s;
		width:100px;		
	}
	.button:hover
	{
		background-color:#999;
		
	}
	
	
	.rate_box_name
	{
		
		color:#666;
		font-family:'Segoe UI';
		
	}
	.room_td
	{
	//	border:1px solid #4A8BC2;
		box-shadow:0.1px 0.1px 0.1px #333333;
		position:relative;
	}		background-color:#FFF;

	.f_room_td
	{
		postion:relative;
		//background-color:#FFA;
		//border:2px solid #F90;
		//box-shadow:0.1px 0.1px 0.1px #333333;
		//transition:.5s;
	}
	
	.ff_room_td
	{
		postion:relative;
		background-color:#FFF;
	border:1px solid #F90;
		//box-shadow:0.1px 0.1px 0.1px #333333;
		padding:10px;
		font-family:'Segoe UI';
	}
	.dd_room_td
	{
		postion:relative;
		background-color:#FFF;
	border:1px solid #0078d7;
		//box-shadow:0.1px 0.1px 0.1px #333333;
		padding:10px;
	}
	
	
	.guest_name
	{
		font-size:20px;
	}
	.body
	{
		margin-left:325px;
		margin-top:40px;
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
	.header_info
	{
		width:100px;
		background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:24px;
		
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
.user:hover
{
	color:black;
	background-color:white;
}
	
	
	
</style>
</head>
<?php
$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	$un=str_split($_SESSION['user_name']);
	
?>
<body>
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
<td width="86" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk" bgcolor="#0078d7"><a href="check.php" class="a">Checkout</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php }
	else if($_SESSION['user_type']==2)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk"  ><a href="booking_home.php" class="a">Home</a></td>

<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>

<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="74" align="center"class="lnk" ><a href="advance.php" class="a" >Payments</a></td>
<td width="72" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="86" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk" bgcolor="#0078d7"><a href="check.php" class="a">Checkout</a></td>
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
<form name="frm1" method="POST">
<div id="room_div" class="room_div">
<table cellpadding="8" cellspacing="0" bgcolor="white">
<tr>
<?php
$GLOBALS['txt']='';
date_default_timezone_set('Asia/Kolkata');

	
	function return_all_forwards($room,$string,$conn,$db,$chk_in,$bdid)
					{
						
						$query_r="select * from foreward_master where to_room='$room' and status='0'";
						
						$result_r=mysqli_query($conn,$query_r);
						while($of_rooms=mysqli_fetch_assoc($result_r))
						{
							$i_rooms=explode(",",$of_rooms['of_room']);
							$s=sizeof($i_rooms);
							$i=0;
							while($i<$s)
							{
								$checkout=date_create($of_rooms['checkout_date']);
								$checkin=date_create($chk_in);
								$n=date_diff($checkout,$checkin);
								$no_of_days=$n->format("%a");
								if($no_of_days==0)
								{
									$no_of_days=1;
								}
								
								$room_q="select * from room_info where c_room_no='$i_rooms[$i]'";
								$res_q=mysqli_query($conn,$room_q);
								//$rt="select * from room_type where type_id='$amount['type']'";
								$amount=mysqli_fetch_assoc($res_q);
								$rt="select * from room_type where type_id='$amount[type]'";
								$rr=mysqli_query($conn,$rt);
								$data=mysqli_fetch_assoc($rr);
								$q="select sum(rate) as total from service_master,service_detail where bid='$bdid' and oid=odid";
								$r=mysqli_query($conn,$q);
								$d=mysqli_fetch_assoc($r);
								$room_rate=$data['rate'];
								//echo $q;
								$total=($room_rate*$no_of_days)+$d['total'];
								
								if($i_rooms[$i]!='')
									$GLOBALS['txt']=$GLOBALS['txt'].$i_rooms[$i].",".$total.",";
									
								return_all_forwards($i_rooms[$i],$string,$conn,$db,$chk_in,$bdid);
								$i++;
							}
						}
						
						//return $temp;
						
					}
					function pay_for_all($room,$conn,$db)
					{
						
						$q_o="select * from foreward_master where to_room='$room' and status='0'";
						$r_p=mysqli_query($conn,$q_o);
						while($data=mysqli_fetch_assoc($r_p))
						{
							$of_rooms=explode(",",$data['of_room']);
							$i=0;
							$s=sizeof($of_rooms);
							while($i<$s)
							{
								pay_for_all($of_rooms[$i],$conn,$db);
								$i++;
							}
						}
						$forq="update foreward_master set status=1 where to_room='$room' and status='0'";
						$req=mysqli_query($conn,$forq);
						
					}
if(isset($_POST['Forward']) || isset($_POST['pay']))
{
	
	$str='';
	$ctr=0;
	$b_id=1;
	$room2;
	if(!empty($_POST['submit_room_no']))
	{
		foreach($_POST['submit_room_no'] as $room)
		{
			if($room !='')
			{
				$str=$str.$room.",";
				$t_q="update room_info set status=1 where c_room_no='$room'";
				$t_r=mysqli_query($conn,$t_q);
				
				$t_q="select * from room_info where c_room_no=$room";
				$t_r=mysqli_query($conn,$t_q);
				$dt=mysqli_fetch_assoc($t_r);
				
				$r_id=$dt['room_id'];
				
				$q2="select * from booking_detail where room_id='$r_id' and checkout_status=0";
					$dt2=mysqli_query($conn,$q2);
					$data_2=mysqli_fetch_assoc($dt2);
					if($b_id==1)
						$b_id=$data_2['booking_id'];
				
				
				$room_number=$dt['c_room_no'];
				$t_q2="update booking_detail set checkout_status=1 where room_id='$r_id'";
				echo "<script>alert('$t_q2');</script>";
				$res=mysqli_query($conn,$t_q2);
				
					
					
					
					
					if(isset($_POST['pay']))
					{
						//$forq="update foreward_master set status=1 where to_room='$room_number' and status='0'";
					//	$req=mysqli_query($conn,$forq);
						pay_for_all($room_number,$conn,$db);
						$name=$data_2['accompany_name'];
					$room2=$room;
					$qch="select * from booking_master where booking_id='$data_2[booking_id]'";
					$qr=mysqli_query($conn,$qch);
					$date=mysqli_fetch_assoc($qr);
					
					}
				
			}
		}
	}
	$state=1;
	if(!empty($_POST['forward_room_no']))
	{
		$room_no=$_POST['forward_room_no'];
		$state=0;
		$amt=$_POST['final_total_amount'];
		
	}
	else
	{
		$room_no='NULL';
		if($_POST['final_due']>0)
		{
			$amt=$_POST['final_due'];
			//put advance = 0 in booking master
			$qry_1="update booking_master set advance='0' where booking_id='$b_id'";
			$r_1=mysqli_query($conn,$qry_1);
		
			
		}
		else
		{
			$amt=0;
			//deduct advance as advance - final total amount in booking master.
			$qry_n="select advance from booking_master where booking_id='$b_id'";
			$r_n=mysqli_query($conn,$qry_n);
			$dt_2=mysqli_fetch_assoc($r_n);
			$advance_1=$dt_2['advance']-$_POST['final_total_amount'];
			$qry_1="update booking_master set advance='$advance_1' where booking_id='$b_id'";
			$r_1=mysqli_query($conn,$qry_1);
		}
		
	}
	
	//$amt=$_POST['final_total_amount'];
	
	$dt0=date("Y-m-d");
	$ins_query="insert into foreward_master(booking_id,of_room,to_room,amount,checkout_date,status)values('$b_id','$str',$room_no,$amt,'$dt0','$state')";
	$ins_result=mysqli_query($conn,$ins_query);
	echo "<script>location.replace('bill.php?name=$name&room=$room2&date=$date[checkin_date]');</script>";
	
}
if(isset($_POST['pay2']))
{
	
	$str='';
	$room_number;
	$book=1;
	$data_2='';
	if(!empty($_POST['submit_room_no']))
	{
		foreach($_POST['submit_room_no'] as $room)
		{
			if($room !='')
			{
				$str=$str.$room.",";
				$t_q="update room_info set status=1 where c_room_no='$room'";
				$t_r=mysqli_query($conn,$t_q);
				
				$t_q="select * from room_info where c_room_no=$room";
				$t_r=mysqli_query($conn,$t_q);
				$dt=mysqli_fetch_assoc($t_r);
				
				$r_id=$dt['room_id'];
				//$room_no=$r_id;
				$t_q2="update booking_detail set checkout_status=1 where room_id='$r_id'";
				echo "<script>alert('$t_q2');</script>";
				$res=mysqli_query($conn,$t_q2);
				
				if($book=1)
				{
					$q2="select * from booking_detail where room_id='$r_id'";
					$dt2=mysqli_query($conn,$q2);
					$data_2=mysqli_fetch_assoc($dt2);
				}
			//	$book=0;
				$qr22="update foreward_master set status=1 where to_room='$room_no' and status=0";
				echo "<script>alert($qr22);</script>";
				$rs2=mysqli_query($conn,$qr22);
			}
		}
	}
	//$data_2=mysqli_fetch_assoc($dt2);
	$b_id=$data_2['booking_id'];
	$amt=$_POST['final_total_amount'];
	$dt0=date("Y-m-d");
	$amt=$_POST['final_total_amount'];
	$ins_query="insert into foreward_master(booking_id,of_room,amount,checkout_date,status)values('b_id','$str',$amt,'$dt0','1')";
	$ins_result=mysqli_query($conn,$ins_query);
	
	
	
	
}


	
	/*if(isset($_POST['submit']))
	{
		foreach($_POST['Anish Sharma'] as $a)
		{
			echo $a;
		}
	}*/
	
	$query1="select * from room_info where status=0";
	$result1=mysqli_query($conn,$query1);
	$ctr=0;
	while($room_info=mysqli_fetch_assoc($result1))
	{
		
			$rt="select * from room_type where type_id='$room_info[type]'";
					$rr=mysqli_query($conn,$rt);
					$room_type=mysqli_fetch_assoc($rr);
		
		$query2="select * from booking_detail,booking_master where room_id='$room_info[room_id]' and checkout_status=0 and checkin_status=1 and booking_master.booking_id=booking_detail.booking_id";
		$result2=mysqli_query($conn,$query2);
		
		$booking_detail=mysqli_fetch_assoc($result2);
		
		$queryn="select count(booking_id) as rows from booking_detail group by booking_id";
		$resultn=mysqli_query($conn,$queryn);
		$maxrows=0;
		while($ct=mysqli_fetch_assoc($resultn))
		{
				if($ct['rows']>$maxrows)
				{
					$maxrows=$ct['rows'];	
				}
		}
		//echo $maxrows;
		//echo "ok".$booking_detail['accompany_name'];
		$query3="select * from booking_master where booking_id='$booking_detail[booking_id]' and checkin_status=1";
		$result3=mysqli_query($conn,$query3);
		
		$booking_master=mysqli_fetch_assoc($result3);
		
	
		$no=date_create($booking_master['checkin_date']);
		$dt=date("Y-m-d");
		$d=date_create($dt);
		
		$diff=date_diff($d,$no);
		$t_d=$diff->format("%a");
		if(date('H')>10)
		 $t_d+=1;
		if($t_d==0)
		{
		
			$t_d=1;
		}
		
		if($booking_master['guest_name']==$booking_detail['accompany_name'])	
			$class="parent";
		else
			$class="child";
			$tool='';
			$qry="select * from foreward_master where booking_id='$booking_detail[booking_id]' and to_room='$room_info[c_room_no]'";
			$rslt=mysqli_query($conn,$qry);
			$flag=0;
			$frw_r=0;
			$bdid=$booking_detail['booking_id'];
			if($forwards=mysqli_num_rows($rslt))
			{
				while($fr=mysqli_fetch_assoc($rslt))
				{
					
					return_all_forwards($room_info['c_room_no'],$tool,$conn,$db,$booking_master['checkin_date'],$bdid);
					$tool=$GLOBALS['txt'];
					$GLOBALS['txt']='';
					
					
					/*$to_date=date_create($fr['checkout_date']);//checkout date
					$from_date=date_create($booking_master['checkin_date']);//checkin date
					$no_of_days=date_diff($to_date,$from_date);//no of days
					$n_o_d=$no_of_days->format("%a");
					if($n_o_d==0)
						$n_o_d=1;
					$rooms=explode(",",$fr['of_room']);//seperate of rooms into single rooms
					
					$ii=0;
					while($rooms[$ii]!='')//calculate amount for each room
					{
						
						$room_q="select * from room_info where c_room_no='$rooms[$ii]'";
						$res_q=mysqli_query($conn,$room_q);
						$amount=mysqli_fetch_assoc($res_q);
						$room_rate=$amount['rate'];
						$total=$room_rate*$n_o_d;
						$tool=$tool.$rooms[$ii].",".$total.",";
						$ii=$ii+1;
					}
					
					
					$frw_r=$fr['amount'];*/
				}
				$flag=1;
				$frwd=$tool;
				
			}
			else
			{
				$frwd="";
			}
			
			if($flag==1)
			{
				$clr='ff_room_td';
				
			}
			else
			{
				$clr='dd_room_td';
				
			}
			
		$advance=$booking_master['advance'];	
			
			
			?>
            
            
				<td ><div class='<?php echo $clr;?>'><input type="checkbox" class='<?php echo $class;?>' name='<?php echo $booking_master['guest_name'];?>' id='<?php echo $booking_detail['room_id']; ?>' onClick="poll('<?php echo $class;?>','<?php echo $booking_detail['room_id'];?>','<?php echo $booking_master['guest_name'];?>')"><?php echo $room_info['c_room_no'];?> <input type="hidden" value='<?php echo $t_d;?>' id='<?php echo "rate".$booking_detail['room_id']?>'>
                
            
                <input type="hidden" value='<?php echo $booking_detail['accompany_name'];?>' id='<?php echo "name_a".$booking_detail['room_id']?>'>
                <input type="hidden" id='<?php echo "room".$booking_detail['room_id'];?>' value='<?php echo $room_info['c_room_no'];?>'>
                <input type="hidden" id='<?php echo "room_amount".$booking_detail['room_id'];?>' value='<?php $a=($room_type['rate']*$t_d); echo $a; ?>'>
                <input type="hidden" id='<?php echo "room_rate".$booking_detail['room_id'];?>' value='<?php echo $room_type['rate'];?>'>
                <input type="hidden" name="forward_info" id='<?php echo "forward_info".$booking_detail['room_id']; ?>' size="1" class='<?php echo $booking_master['guest_name'];?>'>
               <input type="hidden" name='<?php echo "advance".$booking_detail['room_id']; ?>' id='<?php echo "advance".$booking_detail['room_id']; ?>' value='<?php echo $advance;?>'>
               <input type="hidden" name='<?php echo "forward_rooms".$booking_detail['room_id']; ?>' value='<?php echo $frwd;?>'  id='<?php echo "forward_rooms".$booking_detail['room_id']; ?>'>
               <input type="hidden" name='<?php echo "forward_rooms_amt".$booking_detail['room_id']; ?>' value='<?php echo $frw_r;?>'  id='<?php echo "forward_rooms_amt".$booking_detail['room_id']; ?>'>
               <?php
               		$qry0="select sum(rate) as total from service_detail,service_master where bdid='$booking_detail[booking_detail_id]' and odid=oid";
					//echo $qry0;
					$run=mysqli_query($conn,$qry0);
					$dat=mysqli_fetch_assoc($run);
					//echo "hello".$dat['total'];
					
			   ?>
               <br>
                <input type="hidden" size="1" name='<?php echo "food_amt".$booking_detail['room_id']; ?>' value='<?php echo $dat['total'];?>'  id='<?php echo "food_amt".$booking_detail['room_id']; ?>'>
             
                </div>
                </td>
			<?php
			$ctr++;
			if($ctr %4==0)
			{	?></tr><tr><?php } 
	}
?>
</tr>
</table>
</div>
<div class="body">
<table cellspacing="20">
<tr>
<td valign="top">
<div class="guest_name">

<p class="guest_name" id="guest_name"></p>
</div>

<table width="494" cellpadding="7" cellspacing="7" class="header">
<tr align="center">
<td width="89">Room No</td>
<td width="88">No of Days</td>
<td width="41">Rate</td>
<td width="63">Amount</td>
<td width="100">Proceed </td>
</tr>
</table>

<div class="gs" id="d">

<table width="493" height="56"  cellpadding="7" cellspacing="7" class="content">
<tr align="center">

<?php
	$i=0;
	while($i<$maxrows)
	{
		?>
        <td width="86"><p class="room_no_display" id='<?php echo "room_no_display".$i;?>'></p><input type="hidden" size="4" id='<?php echo "room_id".$i;?>' class="room_id_display"></td>
        
		<td class="a" width="91" ><!--<p class="rate_box_name" style="font-face:'Segoe UI';"></p>--><input type="text" class="rate_box" id='<?php echo "rate_box".$i;?>'  name="null" style="display:none" size="2"></td>
        
         <td width="41"><p class="room_rate_display" id='<?php echo "room_rate_display".$i;?>'></p></td>
         <td width="62"><p class="room_amount_display" id='<?php echo "room_amount_display".$i;?>'></p></td>
          <td width="99"><input type="checkbox" style="visibility:hidden" class="checkbox_display" id='<?php echo "roomcheckbox_display".$i;?>' onClick="proceed_for_checkout()"></td>
          </tr><tr align="center">
          
		<?php
		$i++;
	}
?>
</tr>
</table>
</div>

</td><td valign="top" >

<br/>

<div class="guest_name">Checkout Summary</div>
<table width="486" cellpadding="7" cellspacing="7" class="header">
<tr align="center">
<td width="53">Room </td>
<td width="61">Amount</td>
<td width="137">Total</td>

<td width="142">Action</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0">
<tr>
<td width="162">
<div class="proceed" id="proceed">

<table width="186" height="41" cellpadding="0" cellspacing="0" class="content" >
<tr>
<?php 
	$a=0;
	while($a<$maxrows)
	{
		?>
        <td width="58" align="center"><p  class="final_room_no" ></p><input type="hidden"  class="final_room_no_info" name="submit_room_no[]" > </td>
        <td width="100" align="center"><p class="final_amount"></p></td>
        
      
       
        
		
        
        </tr><tr>
		<?php
		$a++;
	}
?>
</tr>
</table>
</div>
</td>
<td width="162">
<div class="dsc" id="dsc">
<table  id="dsc2" align="center" class="content">
<tr>
 <td  ><table class="content"><tr><td width="200px"> </td><td><input type="text" class="final_discount" size="3" id="f_d" onkeyup="calculate_discount()" style="visibility:hidden"></td></tr></table>
        <table class="content"><tr><td width="200px"width="200px">Total</td><td><input type="text" class="final_total_amount" name="final_total_amount" size="3" id="final_total_amount"><input type="hidden" class="hidden_total_amount" name="hidden_total_amount" size="3"></td></tr></table>
       <table class="content"><tr><td width="200px">Amount paid</td><td><input type="text" class="final_advance" name="final_advance" id="final_advance"  size="3"></td></tr></table>
        
        <table class="content"><tr><td width="200px">Amount due</td><td><input type="text" class="final_due" name="final_due" id="final_due"  size="3"></td></tr></table>
       
        </td>
        </tr>
</table>

</div>
</td>
<td width="160">
<div class="dsc4" id="dsc4">
<table  id="dsc3" align="center" class="content">
<tr>
 <td ><input type="submit" value="Pay" class="button" name="pay">

<br/><br/><input type="button" class="button" onClick="show_forward_info()" value="Forward">
</td>
</tr>
</table>


</div>
</td></tr>

<tr><td>
<div class="div_n" id= "div_n">
<?php 
	$ab=0;
	?>
	<table>
    <tr>
	<?php
	while($ab<$maxrows-1)
	{
		?>
			<td><input type="radio" name="forward_room_no" value="null" onClick="enable_forward()"></td><td><p name="forward_room_display">
            </p>
            </td></tr><tr>
		<?php
		$ab++;
	}
	?>
    </tr>
    </table>
    </div>

</td>

<td colspan="2" align="center" valign="bottom">
<div class="forward_button" id="forward_button">
<input type="submit" class="button" value="ok" name="Forward" id="final_forward" style="visibility:hidden"></div>
</div>

</td>

</tr>
</table>


    </td></tr></table>
    
<!--<table width="557" ><tr><td align="right">

<button value="proceed" onClick="proceed_for_checkout()" class="button">Proceed</button></td></tr></table>-->




</div>
</form>
</body>
<input type="hidden" value="0" id="context">
</html>

