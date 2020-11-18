<!doctype html>
<?php
session_start();
			if(!isset($_SESSION["user_name"]))
			{
				echo "location.replace('index.php');</script>";
			}
			?>
<html>
<head>
<meta charset="utf-8">
<title>::Hotel Booking System::</title>
</head>
<style>
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
	
</style>
<script>
	var prev=-1;
	var global_rate=0;
	function same_as_clicked(e)
	{
		
			
			var temp='text'+e;
			var t=temp.toString();
			var tm='accompany'+e;
			var tmp=tm.toString();
			if(document.getElementById(tmp).checked)
			{
				//if(document.getElementById('guest_name').value!='')
				document.getElementById(t).value=document.getElementById('guest_name').value;
				/*else
				document.getElementById(tmp).checked=false;*/
				
			}
			else
				document.getElementById(t).value='';	
				if(prev!=-1)
				{
						if(prev!=e)
						{
							if(document.getElementById('text'+prev).value==document.getElementById('guest_name').value)
							{
								document.getElementById('text'+prev).value='';
							}
						}
							
						
				}
				prev=e;
				validate_rooms(0);
				try_submit();
					
			
				
	}
	function preview()
	{
		var guest=document.getElementById('guest_name').value;
		var address=document.getElementById('guest_address').value;
		var phone=document.getElementById('guest_phone').value;
		var email=document.getElementById('guest_email').value;
		document.getElementById('g_n').innerHTML=guest;
		document.getElementById('g_a').innerHTML=address;
		document.getElementById('g_p').innerHTML=phone;
		document.getElementById('g_e').innerHTML=email;
		var chk=document.getElementsByTagName('input');
		var i;
		var tmp='';
		var room;
		var p;
		var height=0;
		var temp='';
		p=document.getElementById('table_content');
		p.innerHTML="<table class='table' cellspacing='10px'><tr><td width='80px'>Room no</td><td width='100px'>Type</td><td width='180px'>Accompany name</td></tr></table>";
		for(i=0;i<chk.length;i++)
		{
			if(chk[i].type=='checkbox' && chk[i].checked)
			{
				t='room_no'+chk[i].value;
				tm='text'+chk[i].value;
				r='room_type'+chk[i].value;
				room=document.getElementById(t).innerHTML;
				
				name=document.getElementById(tm).value;
				room_type=document.getElementById(r).value;
				temp=p.innerHTML;
				temp=temp +"<table class='table' cellspacing='10px' ><tr><td width='80px'>"+room+"</td><td width='100px'>"+room_type+"</td><td width='180px'>"+name+"</td></tr></table>";
				p.innerHTML=temp;
				//alert(room);
				height++;
				
			}
		}
		//height_0=200;
		var h=height*80+300;
		var ht=h+"px"
		document.getElementById('modal-content').style.height=ht;
		open_modal();
	}
	
	function open_modal()
{
	document.getElementById('modal').style.display="block";
	//document.getElementById('modal-content').style.height="800px"
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

function close_modal()
{
	document.getElementById('modal').style.display="none";
	//document.getElementById('modal-content').style.height="800px"
}
	function toggle_radio(e)
	{
		var tmp="accompany"+e;
		var txt="text"+e;
		if(document.getElementById(tmp).checked)
		{
			document.getElementById(tmp).checked=false;
			document.getElementById(txt).value='';
			//alert('ok');
		}
		try_submit();
	}
	function room_no_checked(e)
	{
		
		//alert('ok');
		var temp='div'+e;
		if(!document.getElementById(e).checked)
			document.getElementById(temp).style.visibility="hidden";
		else
			document.getElementById(temp).style.visibility="visible";
		
	}
	
	function trigger_anim(e)
	{
		
		
		if(document.getElementById(e).checked)
		{	e_h(e,100);
			var tmp='rate'+e;
			global_rate+=parseInt(document.getElementById(tmp).value);
			//alert(global_rate);
		}
		else
			{e_h(e,0);
			
			var tmp='rate'+e;
			global_rate-=parseInt(document.getElementById(tmp).value);}
			document.getElementById('rate').value=global_rate;
			setActive();
	}
	
	
	
	function e_h(e,a)
	{
		document.getElementById('div'+e).style.height=a.toString()+'px';
		
		
		
	}
	function init()
	{
		
		document.getElementById('maintable').style.width="330px";
	}
	function try_check(e,user)
	{
		
		
		var flag=0;
		
		
				var room_id=document.getElementById("sync").value;
				var rooms=room_id.split(",");
				var i;
				for(i=0;i<rooms.length-1;i++)
				{
					//alert(rooms[i] + " === " + e);
					tb=rooms[i];
					if(tb==e)
					{
						flag=1;
						break;
					}
				
					
				}
		
		if(flag==0)
		{
		if(document.getElementById(e).checked)
		{
			document.getElementById(e).checked=false;
			//document.getElementById('text'+e).required=false;
			document.getElementById('accompany'+e).checked=false;
			document.getElementById('text'+e).value='';
			send_room(e,user,0);
		}
		else
		{
			document.getElementById(e).checked=true;
			
			//document.getElementById('text'+e).required=true;
			send_room(e,user,1);
			
		}
		var chk=document.getElementsByClassName('rooms_');
		var ab;
		//for 
		validate_rooms(0);
		
		trigger_anim(e);
		try_submit();
		}
	}
	function try_submit()
	{
		var r=document.getElementsByClassName('rooms_');
		var i;
		var flag=true;
		for(i=0;i<r.length;i++)
		{
			if(r[i].checked)
			{
				flag=false;
				ab=r[i].id.toString();
				if(document.getElementById('text'+ab).value=='')
				{
					flag=true;
					break;
					e_h(e,100);
				}
				else
				{
				
				var regEx=/[~!@#$%^&*()_+`1234567890-={}:";'<>,.?]/;
		var user=document.getElementById('text'+ab).value;
		
		if(user.match(regEx)!=null)
		{
			
			document.getElementById('text'+e).style.borderColor="red";
			e_h(e,140);
			flag=true;
			break;
		}
		else
		{
			document.getElementById('text'+e).style.borderColor="#666";
			e_h(e,100);
		}
				}
				
				
			}
			
		}
		if(flag)
		{
			document.getElementById('confirm').disabled=true;
		}
		
		
		
	}
	function validate_name()
	{
		var regEx=/[~!@#$%^&*()_+`1234567890-={}:";'<>,.?]/;
		var user=document.getElementById('guest_name').value;
		if(user.match(regEx)!=null)
		{
			document.getElementById('guest_name').style.borderColor="red";
			
			document.getElementById('name_valid').innerHTML="Invalid name";
			document.getElementById('name_valid').style.height="20px";
			document.getElementById('confirm').disabled=true;
		}
		else
		{
			document.getElementById('guest_name').style.borderColor="#666";
			document.getElementById('name_valid').innerHTML="";
			document.getElementById('name_valid').style.height="0px";
		}
		var r=document.getElementsByTagName('input');
		var i;
		for(i=0;i<r.length;i++)
		{
			if(r[i].type=='radio' && r[i].checked)
			{
				t=r[i].className.toString();
				
				//alert(t);
				document.getElementById('text'+t).value=document.getElementById('guest_name').value;
				break;
			}
		}
		setActive();
	}
	
	function validate_acc(e)
	{
		var regEx=/[~!@#$%^&*()_+`1234567890-={}:";'<>,.?]/;
		var user=document.getElementById('text'+e).value;
		
		if(user.match(regEx)!=null)
		{
			
			document.getElementById('text'+e).style.borderColor="red";
			e_h(e,140);
			document.getElementById('confirm').disabled=true;
		}
		else
		{
		document.getElementById('text'+e).style.borderColor="#666";
		e_h(e,100);
		}
		
		validate_rooms(0);
		setActive();
	}
	
	
	function validate_phone()
	{
		var no=document.getElementById('guest_phone').value;
		if(isNaN(no) || (no.indexOf('.')!=-1) || (no.indexOf('-')!=-1))
		{
			document.getElementById('guest_phone').style.borderColor='red';
			document.getElementById('phone_valid').innerHTML="Invalid Phone no";
			document.getElementById('phone_valid').style.height="20px";
			document.getElementById('confirm').disabled=true;
		}
		else
		{
			document.getElementById('guest_phone').style.borderColor='#666';
			document.getElementById('phone_valid').innerHTML="";
			document.getElementById('phone_valid').style.height="0px";
			
		}
		setActive();
	}
	function validate_email()
	{
		var email=document.getElementById('guest_email').value;
		var at=email.indexOf('@');
		var dot=email.indexOf('.');
		if((at+1==dot || at==-1 || dot ==-1)&& email!='' )
		{
		document.getElementById('guest_email').style.borderColor='red';
			document.getElementById('email_valid').innerHTML="Invalid email";
			document.getElementById('email_valid').style.height="20px";
			document.getElementById('confirm').disabled=true;
		}
		else
		{
		//var regEx=/[@.]/;
		document.getElementById('guest_email').style.borderColor='#666';
			document.getElementById('email_valid').innerHTML="";
			document.getElementById('email_valid').style.height="0px";
		validate_email_server();
		}
		setActive();
	}
	function validate_rooms(a)
	{
	var rad=document.getElementsByTagName('input');
	
			var i;
			var flag=false;
			for(i=0;i<rad.length;i++)
			{
				if(rad[i].type=='checkbox' && rad[i].checked )
				{
					e=rad[i].id;
					if(document.getElementById('text'+e).value=='')
					{
						
						e_h(e,100);
						
						flag=true;
						break;
						
					}
					else
					{
						
						var regEx=/[~!@#$%^&*()_+`1234567890-={}:";'<>,.?]/;
						var user=document.getElementById('text'+e).value;
		
						if(user.match(regEx)!=null)
						{
			
							document.getElementById('text'+e).style.borderColor="red";
			//document.getElementById('confirm').disabled=true;
			e_h(e,140);
							flag=true;
							break;
						}
						else
						{
							document.getElementById('text'+e).style.borderColor="#666";
							e_h(e,100);
	
						}
					
					}
				
				}
			}
			
			
			if(flag)
			{
				if(a==1)
				{
				expand_div(true);
				document.getElementById('error_div').innerHTML='Some selected rooms do not have accompany names. Please fill them out before proceeding';
				}
				
				document.getElementById('confirm').disabled=true;
				
			}
			else
			{
				//expand_div(false);
				document.getElementById('confirm').disabled=true;
			}
			
			
	}
	function validate_email_server()
	{
		var email=document.getElementById('guest_email').value;
		str="booking_valid.php?email="+email;
		//alert(str);
		var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("error_div").innerHTML = this.responseText;
				//alert("ok");
				//division();
				if(document.getElementById('error_status').value=='1')
				{
					expand_div(true);
					document.getElementById('confirm').disabled=true;
				}
				else
					expand_div(false);
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
		setActive();
	}
	function expand_div(e)
	{
		
		if(e)
		{
			document.getElementById('error_div').style.height="20px";
			document.getElementById('body_div').style.marginTop="-40px";
		}
		else
		{
			document.getElementById('error_div').style.height="0px";
			document.getElementById('body_div').style.marginTop="-60px";
		
		}
		
	}
	
	function setActive()
	{
		
		document.getElementById('confirm').disabled=false;
		
		if(document.getElementById('guest_name').value=='' || document.getElementById('guest_phone').value=='' || document.getElementById('guest_email').value=='' || document.getElementById('guest_address').value=='')
		{
				document.getElementById('confirm').disabled=true;
				//alert('ok');
		}
		
			
		
		var no=document.getElementById('guest_phone').value;
		if(isNaN(no) || (no.indexOf('.')!=-1) || (no.indexOf('-')!=-1))
		{
			document.getElementById('confirm').disabled=true;
		}
		var email=document.getElementById('guest_email').value;
		var at=email.indexOf('@');
		var dot=email.indexOf('.');
		if((at+1==dot || at==-1 || dot ==-1)&& email!='' )
		{
			document.getElementById('confirm').disabled=true;
		}
		if(document.getElementById('error_status').value==1)
		{
		document.getElementById('confirm').disabled=true;
		
		}
		
		var regEx=/[~!@#$%^&*()_+`1234567890-={}:";'<>,.?]/;
		var user=document.getElementById('guest_name').value;
		if(user.match(regEx)!=null)
		{
		document.getElementById('confirm').disabled=true;
	
		}
		//document.getElementById('text'+e).required=false;
			//document.getElementById('accompany'+e).checked=false;
			try_submit();
			
			
			
			
	}
	var user_name;
	function init_sync(e)
	{
		
		
		window.setInterval(sync,1000);	
		user_name=e;
		//alert("ok");	
	}
	function sync(e)
	{
		
	
		var occupied=new Array();
		var f=0;
		var xmlhttp=new XMLHttpRequest();
		str="room_sync.php?query=1&username="+user_name;

        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
                document.getElementById("sync").value = this.responseText;
				var room_id=document.getElementById("sync").value;
				var rooms=room_id.split(",");
				var i;
				for(i=0;i<rooms.length-1;i++)
				{
					
					tb="table"+rooms[i];
					document.getElementById(tb).style.backgroundColor="#D8D8D8";
					occupied[f]=tb;
					f++;
				
					
				}
				var flag;
				var all_rooms=document.getElementsByClassName('tct');
				var ar;
				for(ar=0;ar<all_rooms.length;ar++)
				{
					flag=0;
					for(ab=0;ab<f;ab++)
					{
						if(occupied[ab]==all_rooms[ar].id)
						{
							flag=1;
							break;
						}	
					}
					if(flag==0)
						all_rooms[ar].style.backgroundColor="white";
				}
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
			
		
	
	}
	function send_room(room,user,mode)
	{
		var xmlhttp=new XMLHttpRequest();
		
		
		
		str="room_sync.php?mode="+mode+"&booking=1&username="+user+"&room="+room;
		
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
			 
					
				
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
	
	}
	function retrieve_rooms()
	{
		
		
		var checkin=document.getElementById('guest_checkin_date').value;
		var checkout=document.getElementById('guest_checkout_date').value;
		
		var xmlhttp=new XMLHttpRequest();
		
		
		
		str="booking_ex.php?checkin="+checkin+"&checkout="+checkout;
		
        xmlhttp.onreadystatechange = function()
		 {
            if (xmlhttp.readyState == 4 || xmlhttp.readyState == "complete")
			 {
			 
					document.getElementById('body_div').innerHTML=this.responseText;
				
				
            }
        };
        xmlhttp.open("GET", str , true);
		
        xmlhttp.send();
		
		
		
		
	}
	
	
	
	
</script>
<body onClick="init_sync('<?php echo $_SESSION['login_name'];?>')">



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
   
	
	if(isset($_POST['submit']))
	{
		
		
		$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

		
		
		$name=$_POST['guest_name'];
		$address=$_POST['guest_address'];
		$phone=$_POST['guest_phone'];
		$email=$_POST['guest_email'];  
		//$cur_date=date('Y.m.d'); 
		$cur_date=date_create(date('Y.m.d'));
		$c_date=date_create($_POST['guest_checkin_date']);
		$n=date_diff($c_date,$c_date);
		$no_of_days=$n->format("%a");
		
		/*if($no_of_days==0)
		{
			$checkin_status=1;
		}
		else
		{
			$checkin_status=0;	
		}
		echo "ok";*/
		
		$t_d=strtotime(date('Y-m-d'));
		$t_d2=strtotime($_POST['guest_checkin_date']);
		if($t_d==$t_d2)
		{
			$checkin_status=1;
		}
		else
		{
			$checkin_status=0;	
		}
		$c_to_date=$_POST['guest_checkout_date'];
		$query="insert into 			  
		booking_master(guest_name,guest_address,guest_phone,guest_email,guest_id_proof,checkin_date,checkout_date,checkin_status)values('$name','$address','$phone','$email','$target_file','$_POST[guest_checkin_date]','$c_to_date','$checkin_status')";
		echo $query;
		$result=mysqli_query($conn,$query);
		if($result)
		{
			$query1="select * from booking_master where guest_email='$email'";
			$result1=mysqli_query($conn,$query1);
			$temp=mysqli_fetch_assoc($result1);
			$b_id=$temp['booking_id'];
			$chq="select * from checkin";
		$resq=mysqli_query($conn,$chq);
		$dq=mysqli_fetch_assoc($resq);
		$ctr=$dq['counter'];
			if(!empty($_POST['room']))
			{
				foreach($_POST['room'] as $room)
				{
					$id="text".$room;
					$accompany=$_POST[$id];
					$query2="insert into booking_detail(booking_id,room_id,accompany_name,checkout_status) values('$b_id','$room','$accompany','0')";
		    		$result2=mysqli_query($conn,$query2);
					if($checkin_status==1)
						$ch_s=0;
					else
						$ch_s=1;
					$query3="update room_info set status=$ch_s where room_id='$room'";
					$result3=mysqli_query($conn,$query3);
					$ctr++;
					
				}	
			}
			$chq="delete  from checkin";
		$resq=mysqli_query($conn,$chq);
			
				$chq="insert into checkin(counter)values('$ctr')";
		$resq=mysqli_query($conn,$chq);
			

			
			
			
			echo"<script>location.replace('booking.php?');</script>";
				
		}
	}
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
<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk" bgcolor="#0078d7"><a href="booking.php "class="a">Booking</a></td>
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
<td width="79" align="center" class="lnk"  bgcolor="#0078d7"><a href="booking.php "class="a">Booking</a></td>
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
<td width="64" align="center" class="lnk"  ><a href="booking_home.php" class="a">Home</a></td>

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

<form method="post" name="form1" enctype="multipart/form-data"><div class="maintable" id="maintable">
<center><input type="hidden" id="sync">

  <table cellpadding="0" cellspacing="0">
    
    
    <tr>
      <td>Booking      </tr>
      
      <tr><td colspan="3">
      <table><tr><td>
       <p class="header0"> Guest Name</p>
       </td><td></td></tr></table></td>
      </tr><tr>
      <td ><input type="text" name="guest_name" id="guest_name" class="txt"  onKeyUp="validate_name()">
      <div class="valid" id="name_valid"></div></td>
    </tr>
    
    <tr>
   <td colspan="3">
      <table> <tr><td>
       <p class="header0"> Check in Date</p>
       </td><td></td></tr></table></td>
      </tr><tr>
      <td ><input type="date" name="guest_checkin_date" id="guest_checkin_date" class="txt" >
     </td>
    </tr>
    
    <tr>
   <td colspan="3">
      <table> <tr><td>
       <p class="header0"> Check out Date</p>
       </td><td></td></tr></table></td>
      </tr><tr>
      <td ><input type="date" name="guest_checkout_date" id="guest_checkout_date" class="txt" onChange="retrieve_rooms()">
     </td>
    </tr>
    
    
    
    <tr>
      <td><p class="header0">Guest Address</p>
      </td>
      </tr><tr>
      <td ><textarea name="guest_address" id="guest_address" class="txt" required ></textarea></td>
    </tr>
    <tr>
      <td ><table><tr><td><p class="header0">Guest Phone</p>
      </td><td></td></tr></table></td>
     </tr><tr>
      <td ><input type="text" name="guest_phone" id="guest_phone" class="txt" onKeyUp="validate_phone()">
      <div class="valid" id="phone_valid"></td>
    </tr>
    <tr>
      <td colspan="3"><table><tr><td><p class="header0">Guest Email</p></td><td></td></tr></table></td>
      </tr><tr>
      <td><input type="text" name="guest_email" id="guest_email" class="txt" onKeyUp="validate_email()">
      <div class="valid" id="email_valid"></td>
    </tr>
    <tr>
      <td ><p class="header0">Guest ID Proof</p></td>
       </tr><tr>
      <td><input type="file" name="fileToUpload" id="fileToUpload" class="txt">
      <div class="valid" id="phone_valid"></td>
    </tr>
    
   <tr>
      <td><p class="header0">Rate per day</p></td>
       </tr><tr>
      <td ><input name="rate" type="text" id="rate" size="5" class="txt" readonly></td>
      
      
     
    </tr>
  </table>
   <input type="button" id="confirm" onClick="preview()" value="book" class="button" disabled>
    <input type="button" id="cirm" onClick="validate_rooms(1)" value="ok" class="button"  style="visibility:hidden">
  
 
</div>
<br><br><br><br><br>
<div class="float" align="left"> <a href="booking.php?id=1">logout</a><br></div>
<div class="error_div" id="error_div"><input type="hidden" value='0' id="error_status"></div>
  <div class="body_div" id="body_div">
  
  
 
</div>


</center>

  <div class="modal" id="modal">
<div class="modal-content" id="modal-content">
<br>

Please review the information before confirming booking.
<br>
<table>
<tr>
	<td>
		<table class='table'>
		<tr>
			<td>Guest Name </td>
			<td>:</td>
			<td><p id="g_n"></p></td>
		</tr>
		<tr>
			<td>Guest Address</td>
			<td>:</td>
			<td><p id="g_a"></p></td>
		</tr>
		<tr>
			<td>Guest Phone</td>
			<td>:</td>
			<td><p id="g_p"></p></td>
		</tr>
		<tr>
			<td>Guest Email</td>
			<td>:</td>
			<td><p id="g_e"></p></td>
		</tr>
		</table>
	</td>
	<td>
		
	</td>
 </tr>
 </table>
<table>
		<tr>
			<td>
			
			<p id="table_content">
          
            </p>
            </td>
            </tr>
		</table>
        <table align="center"><tr><td><input type="submit" name="submit" class="button" id="submit"></td><td><input type="button" value="Cancel" onClick="close_modal()" class="button"></td></table>

</div>
</div>
</form>
 <input type="hidden" value="0" id="context">
 
</body>
</html>