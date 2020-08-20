<?php
session_start();
error_reporting(0);
$username=$_SESSION['user_name'];
 if($username==true)
 { }
			 else{
			 	header('location:index.php');
			 }
echo '<h1 style="color:white;">'."welcome  ".$username.'</h1>';


$lat=$_GET["lat"];
	$lng=$_GET["lng"];
    
	$lowlat=$_GET["lowlat"];
    $highlat=$_GET["highlat"];
$highlng=90.00;
$lowlng=50.00;
$highlat=25.00;
$lowlat=10.00;
	$conn = mysqli_connect("localhost","root","","employee");
	if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
$unm=$_POST['Firstname'];
	$pass=$_POST['pass'];
	
		$date = date('y-m-d');
echo getdate();	
$sql_u = "SELECT * FROM empatt WHERE loginid='{$_SESSION['user_name']}' and empstatus='P' and DATE=CURDATE()";
  	
  	$res_u = mysqli_query($conn, $sql_u);
  	
      if($date){
  	if (mysqli_num_rows($res_u) > 0) {
  	  echo '<h1 style="color:white">'."Sorry... username already taken".'</h1>'; 	
  	}
	
	else{
			if((time() < strtotime('4 pm')) )
			{
				if($lat < $highlat && $lat > $lowlat && $lng > $lowlng && $lng < $highlng )
	
	{
	$sql = "INSERT INTO empatt (empstatus,loginid,DATE,TIME)VALUES ('P','{$_SESSION['user_name']}',CURDATE(),CURTIME())";

	if (mysqli_query($conn, $sql)) {
			echo '<h1 style="color:white">'. "Attendance Marked successfully.".'</h1>';
			} 
	else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	else{	
	$sql = 	$sql = "INSERT INTO empatt (empstatus,loginid,DATE,TIME)VALUES ('A','{$_SESSION['user_name']}',CURDATE(),CURTIME())";
	if (mysqli_query($conn, $sql)) {
			echo "Attendance not marked successfully.";
			} 
	else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
			
			}
		}
		
		
		else{
			echo '<h1 style="color:white">'."time is over........".'</h1>';
		}
		 
	}
	   
			
			
	  }
				
		
			
				
				
				
				
         
		mysqli_close($conn);
		
		
  
        
	
	
       
	
	
	
	
        
?>

<html>
<head>
<style>
body{
	background-image: url('back1.jpg');
background-size:cover;	
background-repeat:no repeat;
}
#a{
	background-color:black;
	height:10%;
	width:30%;
	
	
}
</style>
</head>
<body>
<br><br>
<div id="a">
<a href="showattendstud.php"><input type="button" value="SHOW ATTENDANCE" style="background-color:black; height:30; width:150;margin:10px;color:white;"></a>
<a href="third.php"><input type="button" value="Log Out" style="background-color:black; height:30; width:70;margin:10px;color:white;"></a>
</div></body>
</html>