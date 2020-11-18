<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function request_ajax()
	{
		interval()
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		
		var xmlhttp=new XMLHttpRequest();
		
		
		str="online_ex2.php?date1="+date1+"&date2="+date2;
		
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("rooms").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();	
	}
	function reserve_room()
	{
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		var name=document.getElementById('guest_name').value;
		var email=document.getElementById('guest_email').value;
		var phone=document.getElementById('guest_phone').value;
		
		var xmlhttp=new XMLHttpRequest();
		
		
		var str="online_ex3.php?date1="+date1+"&date2="+date2+"&guest_name="+name+"&guest_email="+email+"&guest_phone="+phone;
		var rooms=document.getElementsByClassName('room_nos');
		var i;
		var n=0;
		var rate=0;
		//alert('here');
		for (i=0;i<rooms.length;i++)
		{
			if(rooms[i].value>0)
			{
				str+="&type"+n+"="+rooms[i].id+"-"+rooms[i].value;
				rt="amt"+rooms[i].id;
				rate+=parseInt(document.getElementById(rt).value)*parseInt(rooms[i].value);
				n++;
			}
		}
		
		str+="&n="+n;
		alert(str);
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
               document.getElementById("test").innerHTML = this.responseText;
			    location.replace("http://innstay.esy.es/payment.php?guest_name="+name+"&guest_email="+email+"&guest_phone="+phone+"&rate="+rate);
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
	}
	var i=0;
	var intr;
	function interval()
	{
		intr=window.setInterval(scroll_to,1);
	}
	function scroll_to()
	{
		/*window.scrollTo(0,i);
		//document.getElementById('dv').innerHTML=i;
		i+=4;
		if(i>300)
		{
			clearInterval(intr);
			i=0;
		}*/
	}
</script>
<style>
.parallax { 
    /* The image used */
    background-image: url("res/img.jpg");

    /* Set a specific height */
    height: 550px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
body
{
	margin:0;
	 font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
}
.nav
{
	width:100%;
	height:40px;
	background-color:black;
	position:fixed;
	box-shadow: 1px 1px 1px #666666;
}


.user{
    border: none;
    border-bottom: 1px solid #666;
	padding: 6px 10px;
	font-size:18px;
	font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	width:300px;
	transition:.5s;
}
.user2{
    border: none;
    border-bottom: 1px solid #666;
	padding: 4px 8px;
	font-size:18px;
	font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	width:200px;
	transition:.5s;
}
.user:focus
 {
    border-bottom: 1px solid #009;
	
}
.rooms_t
{

	// border-collapse: collapse;
	 font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
	
	}
	.dates
	{
		
		
		background-color:#000;
		opacity:0.9;	
		color:white;
		
	}
	.table_main
{

	// border-collapse: collapse;
	border: 1px solid #999999;
	 font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
	
	}
	.bordr
	{
		//border: 1px solid #999999;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
	}
	.room_nos
	{
		width:40px;
	}
	.br
	{
		margin:0px;
	}
	.button_m
	{
		
		border: 1.5px solid white;
		background-color:#000;
		//font-size:12px;
		padding:8px 16px;
		transition: .5s;
		width:200px;
		color:white;
		
	}
	.button_m:hover
	{
		background-color:white;
		color:#000;
	}
	.right_border
	{
		border-left:1px #666666;
	}
	.header
	{
		font-family:'Segoe UI Light';
		//opacity:.5;
		font-size:56px;
		//color:white;
		box-shadow:#000;
	}
	.loc
	{
		font-family:'Segoe UI Light';
		//opacity:.5;
		font-size:26px;
		//color:white;
		box-shadow:#000;
	}
</style>
</head>

<body><div class="nav">Nav bar</div>

<div class="parallax">
<br>
<br><br>
<br><br><br><br>
<br>


<br><p class="header">
Hotel Amber Residency</p>
<p class="loc">
Siliguri |  Kolkata  |  Mumbai</p>

</div>


<div class="dates">
<table cellpadding="10" cellspacing="10" align="center">
<tr><td>From</td><td><input type="date" id="date1" class="user2"></td><td>To</td><td><input type="date" id="date2" class="user2"></td><td><input type="button" class="button_m" onClick="request_ajax()" value="Check Availibility">
</td></tr>
</table>
</div>
<br>




<div id="rooms">
</div>


<div id="test">
</div>
</center>
</body>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>