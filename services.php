<html>
<head>
<?php 

session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('login.php');</script>";
	}
?>
<script>
var edit=false;
var g_idt;
var list_counter=0;
var edit_=false;
function request()
{
	var textr=document.getElementById('room_no').value;
	if(isNaN(textr))
	{
		document.getElementById("error_room").style.height="20px";
		return;
	}
	if(textr.length==3)
	{
		get_guest_details();
		document.getElementById("error_room").style.height="0px"
	}
	else
	{
		
		if(textr.length==0)
		{
			document.getElementById("guest").innerHTML="";
			document.getElementById("error_room").style.height="0px";
		}
		else
			document.getElementById("error_room").style.height="20px";
	
		
		
	}
}
function get_guest_details()
{
	var xmlhttp=new XMLHttpRequest();
	var room=document.getElementById('room_no').value;
	var str="service_ex.php?room_no="+room;
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("guest").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();	
}
function clear_selection(e)
{
	var prev=document.getElementById('sl').value;
	var size=document.getElementById("max").value;
	if(e==0)
	var next=(parseInt(prev)+1)%size;
	else
	{
		if(prev==0)
			var next=size-1;
		else
			var next=(parseInt(prev)-1);
		
	}
	
	var s_prev='tr'+prev;
	var s_next='tr'+next;
	if(prev>-1)
	{
		document.getElementById(s_prev).style.backgroundColor="white";
	}
	document.getElementById(s_next).style.backgroundColor="#227AFF";
	document.getElementById('sl').value=next;
	
	
	
}
function remove_items()
{
	document.getElementById('item_list').innerHTML="";	
}
function create_entry()
{
/*	var prev=document.getElementById('sl').value;
		var pgf='para'+prev;
		document.getElementById('selected').innerHTML+="<br>"+document.getElementById(pgf).innerHTML;	
	*/	
		
		
		
		var prev=document.getElementById('sl').value;
		var pgf='para'+prev;
		
		
		var pgf_i='idt'+prev;
		
	var room=document.getElementById('room_no').value;
	var food=document.getElementById(pgf).value;
try{
		var a=document.getElementsByClassName('items_temp');
		var aa;
		var tdt;
		var id_t;
		var ab;
		var tq;
		//////alert("creating entry");
		////alert(a.length);
		for (aa=0;aa<a.length;aa++)
		{
			//////alert(a[aa].innerHTML+ " "+ food.length);
			if(a[aa].innerHTML.trim()==food.trim())
			{
				////alert('found');
				id_t=a[aa].id.toString();
				ab=id_t.substr(9,id_t.length);
				//////alert(id_t);
				tq='s_qty'+ab;
				document.getElementById(tq).style.visibility="visible";
				document.getElementById(tq).focus();
				return;
				
			}
		}
		}catch(e)
		{
			////alert("caught");
		}
	var id_f=document.getElementById(pgf_i).value;
	var idt=parseInt(document.getElementById('list_no').value);
	if(idt>=0)
	{
		document.getElementById('submit_list').style.visibility="visible";
	document.getElementById('cancel_list').style.visibility="visible";
	
	}
		//var q='qty'+idt;
	//document.getElementById(q).focus();
	document.getElementById('list_no').value=idt+1;
	var rate='i_rate'+prev;
	var i_r=document.getElementById(rate).value;
	var str="service_ex.php?add_list="+food+"&id="+idt+"&prk="+id_f+"&rate="+i_r;
	//////alert(str);
	//window.open(str);
	var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
		 {
            if(xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
               document.getElementById('selected').innerHTML+=this.responseText;
				////////alert("here");
				update_texts();
				
				////////alert(d_idt);
				
				var idt=parseInt(document.getElementById('list_no').value)-1;
	var q='qty'+idt;
	////////alert(q);
	document.getElementById(q).focus();
            }
        };
        xmlhttp.open("GET", str , true);
		  xmlhttp.send();	
		
		
 
			
}
function fetch_items(event)
{
	
	
	var room=document.getElementById('room_no').value;
	var pattern=document.getElementById('items').value;
	var txtbox=document.getElementById('items');
	
	
	if(pattern=="")
	{
		remove_items();
		
		return;
	}
		
	if(event.keyCode==40)
	{
	clear_selection(0);	
	txtbox.setSelectionRange(pattern.length,pattern.length);
	
		return;
	}
	else if(event.keyCode==38)
	{
		clear_selection(1);
		txtbox.setSelectionRange(pattern.length,pattern.length);
		return;	
	}
	else if(event.keyCode==13)
	{
		create_entry()
	
		txtbox.value="";
		document.getElementById("item_list").innerHTML = "";
			
		return;
			
		
	}
	//document.getElementById('selected').innerHTML=event.keyCode;
	var room=document.getElementById('room_no').value;
	var str;
	
	if(document.getElementById('r1').checked==true)
	{
		 str="service_ex.php?food=1&pattern="+pattern;
	}
	else
	{
		 str="service_ex.php?service=1&pattern="+pattern;
	}
	////////alert(str);
	var xmlhttp=new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("item_list").innerHTML = this.responseText;
				////////alert('ok');
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();	
		test();
		
}
function update_texts()
{
	var p=document.getElementsByClassName('list_para');
	var t=document.getElementsByClassName('list_text');	
	var i;
	for(i=0;i<p.length;i++)
	{
		t[i].value=p[i].innerHTML;
		
	}	
}
function edit_en()
{
	edit=true;	
}
function shift_focus(event)
{
	var temp_t;
	if(edit==false)
		var idt=parseInt(document.getElementById('list_no').value)-1;
		else
		var idt=g_idt;
	if(event.keyCode==13)
	{
		var qtty=document.getElementsByClassName('s_qty');
		var ab;
		for(ab=0;ab<qtty.length;ab++)
		{
			if(qtty[ab].value!='')
			{
				var q_str=qtty[ab].id.toString();
				////alert(q_str);
				var idt2=q_str.substr(5,q_str.length);
				////alert(idt2);
				temp_t=qtty[ab].value;
				var no='qty'+idt2;
				var total='total'+idt2;
				var rate_pi='cost'+idt2;
				document.getElementById(no).value=parseInt(document.getElementById(no).value)+parseInt(temp_t);
				document.getElementById(total).innerHTML=parseInt(document.getElementById(no).value)*parseInt(document.getElementById(rate_pi).innerHTML);
		document.getElementById('items').focus();	
		qtty[ab].value="";
		qtty[ab].style.visibility="hidden";
				return;
			}
			
		}
		
		
			
		
		document.getElementById('items').focus();	
		
		
	var q='pgf'+idt;
	var r='qty'+idt;
	//document.getElementById(q).style.display="block";
	document.getElementById(q).innerHTML=document.getElementById(r).value;
	//document.getElementById(r).style.display="none";
	edit=false;
	
	}
	else
	{
		var rate_pi='cost'+idt;
		var total='total'+idt;
		var no='qty'+idt;
		if(document.getElementById(no).value!='')
		{
		////////alert(parseInt(document.getElementById(no).value));
		document.getElementById(total).innerHTML=parseInt(document.getElementById(no).value)*parseInt(document.getElementById(rate_pi).innerHTML);
		}
		else
		{
			document.getElementById(total).innerHTML="0";
		}
	}
}
function show_text(idt)
{
	
	var q='pgf'+idt;
	var r='qty'+idt;
	//document.getElementById(r).style.display="block";
	//document.getElementById(r).value=document.getElementById(q).innerHTML;
	//document.getElementById(q).style.display="none";
	edit=true;
	g_idt=idt;
}
function clear_s()
{
	
}
function remove(e)
{
	var list='list'+e;	
	document.getElementById(list).style.height="0px";
}
function submit_list(e)
{
	//can be done using counter
	document.getElementById('submit_list').style.visibility="hidden";
	document.getElementById('cancel_list').style.visibility="hidden";
	var holder=document.getElementsByClassName('item_holder');
	var i;
	var tid;
	var id;
	var qty;
	var tqt;
	var n;
	var rt;
	var rate;
	var guest=document.getElementById('gn').innerHTML;
	//var guest="guest";
	list_counter+=1;
	//////alert(list_counter);
	if(e==1)
		var str="service_ex.php?guest="+guest+"&list_counter="+list_counter+"&room="+document.getElementById('room_no').value;
	else
		var str="service_ex.php?submit_list=1&room="+document.getElementById('room_no').value;
	
	for(i=0;i<holder.length;i++)
	{
		tid='temp'+i;
		
		id=document.getElementById(tid).value;
		rt='cost'+i;
		rate=document.getElementById(rt).innerHTML;
		tqt='qty'+i;
		t_in='item_name'+i;
		i_name=document.getElementById(t_in).innerHTML;
		//////alert(i_name);
		qty=document.getElementById(tqt).value;
		if(e==0)
		str+="&item_id"+i+"="+id+"&item_qty"+i+"="+qty+"&name"+i+"="+i_name+"&item_rate"+i+"="+rate*qty;
		else
		str+="&item_id"+i+"="+id+"&item_qty"+i+"="+qty+"&name"+i+"="+i_name+"&item_rate"+i+"="+rate;
		
		//////alert('in loop');
	
	}
	n=i;
	str+="&number="+n;
	
		//alert('str='+str);
	
	
var xmlhttp=new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("pending_list").innerHTML += this.responseText;
				document.getElementById('selected').innerHTML="";
				document.getElementById('list_no').value="0";
				document.getElementById('guest').innerHTML="";
				document.getElementById('room_no').value="";
			
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();	
}
function print_details(e)
{
	//window.print(document.getElementById(e).innerHTML); 	
	//alert(e);
	var prt='parent'+e;
	var chld='child'+e;
	var a='print'+e;
	var b='reedit'+e;
	var e_t=e[5];
	
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(b).style.visibility="hidden";
	var clsp='collapse'+e_t;
	var f_s='final_submit'+e_t;
	document.getElementById(clsp).style.visibility="hidden";
	document.getElementById(f_s).style.visibility="hidden";
	
	var wnd=window.open();
	wnd.document.writeln(document.getElementById(prt).innerHTML);
	var i;
	var chd=document.getElementsByName(chld);
	for(i=0;i<chd.length;i++)
	{
		wnd.document.writeln("<br>");
		wnd.document.writeln(chd[i].innerHTML);
	
	}
	
	wnd.print();
	wnd.close();
	document.getElementById(a).style.visibility="visible";
	document.getElementById(b).style.visibility="visible";
	
	document.getElementById(clsp).style.visibility="visible";
	document.getElementById(f_s).style.visibility="visible";
	
}
function make_list()
{
	
}
function final_submit(e)
{
	reedit_list(e,0);
	//submit_list(0);	
}
function reedit_list(e,ee)
{
	var flag=false;
	var p_id;
	var name;
	var qty;
	var rate;
	var t_name='guest_n'+e;
	var items_r='items_r'+e;
	var items_id='items_id'+e;
	var i_qt='quantities_'+e;
	var rt='rate_e'+e;
	var prt='parent_list'+e;
	var chld='child_list'+e;
	var r='room_e'+e;
	edit_=true;
	document.getElementById('submit_list').style.visibility="visible";
	document.getElementById('cancel_list').style.visibility="visible";
	
	document.getElementById('room_no').value=document.getElementById(r).value;
	cld=document.getElementsByName(chld);
	var a;
	for(a=0;a<cld.length;a++)
	{
		cld[a].style.display="none";	
	}
	 
	
	
	document.getElementById(prt).style.display="none";
	//document.getElementById(chld).style.display="none";
	//p_id=document.getElementById().innerHTML;
	var rate=document.getElementsByClassName(rt);
	//alert(rate[0].innerHTML);
	var t_i=document.getElementsByClassName(items_r);//names
	//var t_id=document.getElementsByClassName(items_id)
	var p_id=document.getElementsByClassName(items_id);
	var qty=document.getElementsByClassName(i_qt);
	var i;
	name=document.getElementById(t_name).innerHTML;
	document.getElementById('list_no').value=0;
	var idt=0;
	var n=0;
	var str="service_ex.php?add_list_e=1";
	for(i=0;i<t_i.length;i++)
	{
		
		////////alert(t_i[i].innerHTML);
		////////alert(p_id[i].value);
		////////alert(qty[i].value);
	 str+="&add_list_en"+i+"="+t_i[i].innerHTML+"&id"+i+"="+idt+"&prk"+i+"="+p_id[i].value+"&rate"+i+"="+0+"&qty"+i+"="+qty[i].value+"&rate"+i+"="+rate[i].value;
	
	 idt+=1;
	 
	
		  
	}
	n=i;
	str+="&n="+n;
		
		//alert(str);
		var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
		 {
            if(xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
               document.getElementById('selected').innerHTML+=this.responseText;
				//////alert("here");
				//update_texts();
				document.getElementById('list_no').value=n;
				
				////////alert(d_idt);
				
			//	var idt=parseInt(document.getElementById('list_no').value)-1;
	//var q='qty'+idt;
	////////alert(q);
	//document.getElementById(q).focus();
	if(ee==0)
	{
		submit_list(0);	
	}
	
            }
        };
        xmlhttp.open("GET", str , true);
		  xmlhttp.send();	
		 
		document.getElementById('guest').innerHTML="<p class='guest_name' id='gn'>"+name+"</p>";
		document.getElementById('current_edit').value=e;
		
 

}
function cancel_edit()
{
	
	document.getElementById('selected').innerHTML="";
	document.getElementById('guest').innerHTML="";
	document.getElementById('list_no').value="0";
	var id=document.getElementById('current_edit').value;
	var pl='parent_list'+id;
	if(edit_==true)
	{
			////alert("edit==true");
			document.getElementById(pl).style.display="block";
			
	}
	edit_=false;
	document.getElementById('submit_list').style.visibility="hidden";
	document.getElementById('cancel_list').style.visibility="hidden";
	
}

function toggle(e)
{
	
	var chld='child_list'+e;
	
		
		var cld=document.getElementsByName(chld);
		var col='collapse'+e;
		
		if(cld[0].style.display=="none")
		{
			var a;
			for(a=0;a<cld.length;a++)
			{
				cld[a].style.display="block";	
			}
			document.getElementById(col).value="-";	
		}
		else
		{
			var a;
			for(a=0;a<cld.length;a++)
			{
				cld[a].style.display="none";	
			}
			document.getElementById(col).value="+";
		}
		
		
		
	
	
}

</script>
<style>
	.controls
	{
		position:fixed;
		height:100%;
		width:250px;
		//background-color:#999;
		border:1px solid #CCC;
		border-color:#00F;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;	
	}
	body
	{
		margin:0;
	}
	.right
	{
		margin-left:260px;
	}
	.item_holder
	{
		overflow:hidden;
		transition:.5s;
		//background-color:#03F;
		color:white;
		
		width:400px;
		
			height:40px;
		
	}
	.item_table
	{
		border:1px solid #CCC;
		border-color:#00F;
		box-shadow: 1px 1px 1px #CCCCCC;
		font-family:'Segoe UI';
		font-size:14px;
		width:400px;
		//text-align:center;
	}
	.item_table2
	{
		border:1px solid #CCC;
		border-color:#00F;
		box-shadow: 1px 1px 1px #CCCCCC;
		font-family:'Segoe UI';
		font-size:14px;
	}
	.txt
	{
	outline:none;
		
		border: 0.5px solid  #999;

		padding:5px 5px;
		width:220px;
		height:30px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		font-size:14px;
		//box-shadow: 0.1px 0.1px 0.1px 0.1px #CCCCCC;
		
	}
	.guest_name
	{
		font-size:32px;
		font-family:'Segoe UI';
	}
	.guest_n
	{
		font-size:16px;
		font-family:'Segoe UI';
	}
	.room_n
	{
		font-size:16px;
		font-family:'Segoe UI';
	}
	.user_date
	{
		font-size:14px;
		font-family:'Segoe UI';
	}
	.plst
	{
		overflow:hidden;
	}
	.child_list
	{
		overflow:hidden;
	}
	.temp_box
	{
		background-color:#00C;
		position:absolute;
		z-index:2;
		
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
}.button
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:14px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button:hover
	{
		background-color:#4a8bc1;
		
	}
.list_header
{
	background-color:#0078d7;
	font-family:'Segoe UI';
	font-size:10px;
	box-shadow: 1px 1px 1px 1px #999999;
	color:white;

}
.list_body
{
	//background-color:#0078d7;
	font-family:'Segoe UI';
	font-size:14px;
	box-shadow: 1px 1px 1px 1px #999999;
	//color:white;

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
.error_room
{
	overflow:hidden;
	height:0px;
	transition:.5s;
}
</style>
</head>
<body onClick="clear_s()">

<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	
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

<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>
<td width="77" align="center" class="lnk" ><a href="room_entry.php" class="a">Rooms</a></td>
<td width="66" align="center"  class="lnk"><a href="floor_entry.php" class="a">Floors</a></td>
<td width="84" align="center" class="lnk"><a href="type_entry.php" class="a">Classes</a></td>
<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>
<td width="102" align="center"  class="lnk"  bgcolor="#0078d7"><a href="services.php" class="a">Room Service</a></td>
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

<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>

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
<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>

<td width="102" align="center"  class="lnk"  bgcolor="#0078d7"><a href="services.php" class="a">Room Service</a></td>
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
<br><br>
<div class="controls">
<table cellpadding="10">
<tr>
<td width="239">
<input type="text" id="room_no"  onKeyUp="request()" class="txt" placeholder="Room no">
</td>
</tr>
<tr>
<td>
<div id="error_room" class="error_room">Invalid Room no</div>
</td>
</tr>
<tr>
<td>
<input type="radio" id="r1" value="1" name="service" onClick="get_item_list()">Food<input type="radio" id="r2" value="2" name="service" onClick="get_food_list()">Service
</td>
</tr>
<tr>
<td>
<input type="text" id="items" onKeyUp="fetch_items(event)" onBlur="remove_items()" onFocus="fetch_items(event)" class="txt">

<div id="item_list">

</div>
</td></tr></table>
</div>


<div class="right">
<table width="100%">
<tr><td valign="top">
<div id="guest">
<p class='guest_name' id="guest_p">
No Guest Selected</p>
</div>

<table class="item_table" cellpadding="5">
  <col width="250px"><col width="80px"><col width="100px"><col width="100px"><col width="30px">
<tr>
<td >Name</td>

<td>Quantity</td>
<td >+</td>
<td >Amount</td>

<td>Total</td>

<td ></td>
</tr>
</table>
<div id="selected">
</div>
<input type="hidden" id="list_no" value="0">
<input type="button" class="button" onClick="submit_list(0)" value="Submit Order" id="submit_order" style="visibility:hidden">
<input type="button" class="button" onClick="submit_list(1)" value="List Order" id="submit_list" style="visibility:hidden">
<input type="button" class="button"  onClick="cancel_edit()" value="cancel" id="cancel_list" style="visibility:hidden">

</td><td valign="top">
<div id="pending_list"></div>
</td></tr></table>
</div>
<input type="hidden" id="current_edit">
</body>
</html>