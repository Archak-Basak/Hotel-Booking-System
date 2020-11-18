
<html>
	<head>
    <script>
	function request_ajax()
	{
		
		//alert('ok');
				var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		
		var xmlhttp=new XMLHttpRequest();
		
		
		str="online_ex2.php?date1="+date1+"&date2="+date2;
		//alert(str);
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("rooms").innerHTML = this.responseText;
			//	alert('ok');
			interval();
				
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
		//intr=window.setInterval(scroll_to,1);
		window.scrollTo(0,document.body.scrollHeight);
	}
	function scroll_to()
	{
		
		/*
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
.user{
    border: none;
    border-bottom: 1px solid #666;
	padding: 6px 10px;
	font-size:18px;
	font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	width:300px;
	transition:.5s;
}
</style>

		<title>Powered by Innstay</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>Powered</strong> by INNSTAY</a>
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="generic.html">About Us</a>
						<a href="elements.html">Contact us</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						Welcome to <h1>Hotel Nevada</h1>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-car"></span>
							<h3>Easy to reach</h3>
							<p>1.5 k drive from Bagdogra Airport</p>
						</div>

						<div>
							<span class="icon fa-camera"></span>
							<h3>Great Views</h3>
							<p>Classic views of the north eastern valleys</p>
						</div>

						<div>
							<span class="icon fa-bug"></span>
							<h3>Hygenic</h3>
							<p>The most hygenic place you will visit</p>
						</div>

					</div>

					<!--<footer>
						<a href="#" class="button">Get Started</a>
					</footer>-->
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.jpg" alt="Pic 01" width="150px" height="150px"/>
							</div>
							<header>
								<h3>Wide range of Rooms</h3>
							</header>
							<p>Our hotel provides a number of rooms for your pleasent stay.</p>
							
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02"  width="150px" height="150px"/>
							</div>
							<header>
								<h3>World Class Ameneties</h3>
							</header>
							<p>A wide range of in house facilities for you.</p>
							
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<header>
								<h3>Book Rooms</h3>
							</header>
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

			
	</body>
</html>