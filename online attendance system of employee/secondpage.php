<?php

	session_start();
	if(!isset($_SESSION['user_name']))
	{
		header('Location:./index.php');
	}
	
	echo "Welcome ".$_SESSION['user_name']." on second page";
	echo "<br>";
	
	
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-image: url('login2img.jpg');
background-size:cover;	
background-repeat:no repeat;
}
</style>
</head>
<body>
<br><br>



<div id="id1">WELCOME TO DKTE !!!!!!!</div><br><br>

<button onclick="myfun()" style="background-color:green; height:30; width:100;margin:10px;color:white;">Change Style!</button>
<script>
function myfun()
{
	document.getElementById("id1").style.color = "red";
	document.getElementById("id1").style.fontFamily = "italic";
	document.getElementById("id1").style.fontSize="XX-large";
}
</script>
<a href="third.php"><input type="button" value="Log Out" style="background-color:blue; height:30; width:100;margin:10px;color:white;"></a>
</body>
</html>