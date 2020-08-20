<html>
<body>
<?php
	session_start();
	$fname=$pass='';
	$nameerr1=$nameerr2=$passerr='';
	$flag = true;
	{
			if(isset($_POST['submit']))
			{	
				$fname = $_POST['Firstname'];
				$pass= $_POST['pass'];
		
				{
									if(empty($fname))
									{
										$nameerr1= "*username is compulsory";
										$flag = false;
									}
									elseif (!preg_match("/^[A-Za-z]+$/",$fname))
									{
										$nameerr2= "<span>"."Name must contain characters"."</span>"."<br>";
										$flag = false;
										
									}
									if(empty($pass))
									{
											$passerr="<span>"."*password is compulsory"."</span>";
											$flag1=false;
									}
									$servername = "localhost";
	
// Create connection
	$conn = mysqli_connect("localhost","root","","employee");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
	


	$unm=$_POST['Firstname'];
	$pass=$_POST['pass'];
	$sql = "SELECT  * FROM empinfo where loginid='$unm' and Role='Admin' and password='$pass'";
	$result = mysqli_query($conn, $sql);
		$total=mysqli_num_rows($result);
	//	echo $total;
	if ($total>0) {
		$_SESSION['user_name']=$unm;
		$_SESSION['pass']=$pass;
    	header('location:showattendadmin.php');

	} 
	else {
	
	
		$sql = "SELECT  * FROM empinfo where loginid='$unm' and password='$pass'";
		
		$result = mysqli_query($conn, $sql);
		$total=mysqli_num_rows($result);
		echo $total;
	if ($total==1) {
		$_SESSION['user_name']=$unm;
		$_SESSION['pass']=$pass;
    	header('location:landingpage.php');

	} 
		else {
				echo "login failed";
			}
	}
	mysqli_close($conn);
									
				}
			}
		
	}	

	

?>
</body>
</html>
<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="formstyle.css">
<!--<style>
body{
	background-image: url('login2img.jpg');
background-size:cover;	
background-repeat:no repeat;
}
#a{
background-image:url("bg3.jpg");

height:400px;
width:40%;
align:right;
font-family:"Times New Roman";
margin-left:80px;
align:center;
color:white;
padding-top:20px;
margin-top:100px;
}
#b{
font-family:Times New Roman;
margin:10px;
color:white;

}
a:link {
  color: white;
}
a:hover {
  color: hotpink;
}
a:visited {
  color: white;
}
a:link {
  text-decoration: none;
}
</style>-->
</head>
<body>


<center><div id="a" style="box-shadow: 10px 10px 5px #aaaaaa;">
<!--<h1 style="color:white;text-align:center"> Login form</h1><br>-->
<form action="loginpage.php" method="post"><b style="color:white;font-size:30px;font-family:Times New Roman;">login here</b>
<pre><p style='margin-left:20px;color:white'> Username :	<input  type='text' name="Firstname" style='margin-top:80px;'><?php echo $nameerr1; ?></p><?php echo $nameerr2;?>
<p style='margin-left:20px;color:white'> Password : 	<input style='margin-left:3px'  type='password' name="pass"s><?php echo $passerr; ?></p>
<p style='margin-left:10px'> <input type='submit' value='Login' name="submit" style="background-color:black; height:30; width:100;margin:10px;color:white;">     <input type='button' style="margin-left:60px;background-color:black; height:30; width:100;margin:10px;color:white;" value="Sign Up"  onclick="window.location.href='register_php.php'"></p>
    <a href="forgotpass.php">Forgot password ?</a></b></pre>
			
		
	</form>
	</div>
	
	
	
</body>

</html>

			
		


