<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
.txt
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:220px;
		height:16px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		box-shadow: 0.1px 0.1px 0.1px 0.1px #CCCCCC;
		
	}
	.txt:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	.maintable
	{
		background-color:#2C97DE;
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
		top:0;
	
	}
	.body
	{
		margin-left:260px;
		
	}
	body
	{
		margin:0;
		font-family:'Segoe UI';
		
		//margin-left:400px;
	}
	.login
	{
		margin-top:80px;
	}
	.main
	{
		font-family:'Segoe UI Light';
		font-size:22px;
	}
	.sub
	{
		font-family:'Segoe UI';
		color:#F30;
		//margin-left:300px;
	}
	.button
	{
		border:none;
		background-color:white;
		padding:7px;
		border: 1px solid #2c97de;
		width:70px;
		font-family:'Segoe UI';
		transition:.5s;
	}
	.button:hover
	{
		background-color:#2c77de;
	}
	.header
	{
		font-family:'Segoe UI Light';
		color:#2c97de;
		font-size:40px;
		//margin-left:200px;
		
	}
	.head_sub
	{
		margin-left:260px;
	}
	
</style>
</head>
<?php
	
	
	$flag=false;
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"hotel_db");
	if(isset($_POST['submit']))
	{
			$usr=$_POST['user_name'];
			$pwd=$_POST['password'];
			$query="select * from login_master where username='$usr'";
			$result=mysqli_query($conn,$query);
			if($result)
			{
				$query2="select * from login_master where password='$pwd'";
				$result2=mysqli_query($conn,$query2);
				if(mysqli_num_rows($result2))
				{
					$username=mysqli_fetch_assoc($result2);
					session_start();
					$_SESSION["user_name"]=$username['full_name'];
					$_SESSION["login_name"]=$username['username'];
					$_SESSION["user_type"]=$username['account_type'];
					
					
					echo $_SESSION['user_name'];
					
					
					
						echo "<script>location.replace('booking_home.php');</script>";
				}
				else
				{
					$flag=true;	
				}
					
			}
			else
			{
				$flag=true;
			}
	}
?>
<body bgcolor="#f1f1f1">
<div class="maintable"></div><div class="body">
<p class="header">Innstay</p>
<div class="login">


<form id="form1" name="form1" method="post">
  <table width="315" align="center" cellspacing="10">
  
  <td ><p class="main">Login</p></td></tr>
    <tr>
      
      <td width="197"><input name="user_name" type="text" class="txt" id="textfield" placeholder="username" required></td>
    </tr>
    <tr>
      
      <td><input type="password" name="password" id="textfield2" class="txt" placeholder="password" required></td>
    </tr>
    <tr>
      
      <td><input type="submit" name="submit" value="Login" class="button"></td>
    </tr>
    <tr>
    <td><?php 
	if($flag)
	{
		echo "<p class='sub'>Wrong username/password</p>";
	}
?></td></tr>
  </table>
</form>

</div>
</div>
</body>
</html>