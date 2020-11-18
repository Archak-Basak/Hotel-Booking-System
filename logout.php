<html>
<body>
<?php 
	session_start();
	session_unset();
	session_destroy();
	echo "<script>location.replace('login.php');</script>";
?>
</body>
</html>