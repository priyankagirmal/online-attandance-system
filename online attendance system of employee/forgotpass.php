<?php
	session_start();
	$email=$pass=$conpass='';
	$nameerr1=$nameerr2=$passerr=$conpasserr='';
	$flag = true;
	{
			if(isset($_POST['submit']))
			{	
				$fname = $_POST['Firstname'];
				$pass= $_POST['pass'];
		
				{                   if (empty($email)) {
							               $emailErr = "Email is required";
							               $flag=false;
						            } 
							
									if(empty($pass))
									{
											$passerr="<span>"."*password is compulsory"."</span>";
											$flag1=false;
									}
									if(empty($conpass))
									{
											$conpasserr="<span>"."*Confirm password is compulsory"."</span>";
											$flag1=false;
									}
									$servername = "localhost";
	
// Create connection
	$conn = mysqli_connect("localhost","root","","employee");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
	


	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	
		$sql = "Update empinfo SET password='$pass' WHERE email='$email'";
		
		$result = mysqli_query($conn, $sql);

		if(mysqli_query($conn, $sql))
			{
				echo "Record Updated Successfully.";
				echo "<br>";
				header('location:index.php');
			}
		else
		{
			echo "Error updating record: ".mysqli_error($conn);
		}
	mysqli_close($conn);
									
				}
			}
		
	}	

	

?>

<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
body{
	background-image: url('login2img.jpg');
background-size:cover;	
background-repeat:no repeat;
}

#a{
background: rgba(0,0, 100, 0.1);
font-size:15px;
height:350px;
width:400px;
align:center;
margin-left:480px;
font-family:verdana;
margin-top:50px;
}
#b{
	color:white;
	margin-top:80px;
	margin:40px;
}
</style>
</head>
  
<body>
<div id="a" >
	<form action="forgotpass.php" method="post">
	<h3 style='font-family:timesnewroman;margin-left:100px;padding-top:10px;color:white'>Forgot Password</h2>
	<pre>
<b>	
<p style='margin-left:40px;color:white;font-family:timesnewroman;font-size:17px'>  Email : 
<input  type='email' name="email" style='margin-left:5px;margin-top:0px;width:300px' required><?php echo $nameerr1; ?><?php echo $nameerr2;?></p></b><b><p style='margin-left:30px;color:white;font-family:timesnewroman;font-size:17px'>    Password :
   <input style='margin-left:5px;width:300px'  type='password' name="pass" required><?php echo $passerr; ?></p></b><b><p style='color:white;font-family:timesnewroman;font-size:17px;margin-left:42px'>  Confirm Password : 
<input style='margin-left:3px;width:300px'  type='password' name="pass" required><?php echo $conpasserr; ?></p></b></pre>
			  <p style='margin-left:60px'> <input type='submit' style='margin-left:80px;width:120px' value='Reset' name="submit"> 
			  
			
			
		
	</form>
	</div>
</body>

</html>