<?php

session_start();

error_reporting(0);
?>
<!DOCTYPE html>
<html>
<style>
#a{
background-image:url("login2img.jpg");
height:800px;
width:100%;


}
</style>
<body>
<div id="a">
<?php

	$conn = mysqli_connect("localhost","root","","employee");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
			
	
			$unm=$_SESSION['user_name'];
			 if($unm==true)
			 {
			 }
			 else{
			 	header('location:index.php');
			 }
  			$pass=$_SESSION['pass'];
			$query = "SELECT  * FROM empinfo where loginid='$unm' and password='$pass'";
	
	
	$count=mysqli_num_rows($res);
			
			$res1=mysqli_query($conn,$query);
	if(mysqli_num_rows($res1)>0)
	{
				
		
		
		
	while($row = mysqli_fetch_array($res1))
	{  

         echo '<h1 style="color:black;font-family:Times New Roman;"> You have sucessfully loggedIn.....</h1>';
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'""width="200" height="200">';
			
		echo '<br>';
		echo '<b style="color:black; font-size:25px;font-family:Times New Roman;"> Welcome   </b>';
				echo '<br>';
                echo  "Firstname: ".'<b style="color:black">'.$row['firstname'].'</b>' ;
				echo '<br>';
			
                echo  "Middle Name: ".'<b style="color:black">'.$row['middlename'] .'</b>';
				echo '<br>';

                echo  "Last Name: ".'<b style="color:black">'.$row['lastname'].'</b>';
				echo '<br>';
			
				echo  "Email address: ".'<b style="color:black">'.$row['email'].'</b>';
				echo '<br>';
				
				echo  "Mobile Number: ".'<b style="color:black">'.$row['mobileno'].'</b>';
				echo '<br>';
				echo  "Address: ".'<b style="color:black">'.$row['address'].'</b>';
				echo '<br>';
				
			

		
	}


	}


?>


<br><br>
<p><button onclick="myFunction()" style="background-color:blue; height:50px; width:20%;margin:10px;color:white;">Click Here to change text </button></p>

<div id="b">Hello</div>

<script>
function myFunction() {
  var x = document.getElementById("b");
  if (x.innerHTML === "Hello") {
    x.innerHTML = "Welcome Priyanka Girmal!";
  } else {
    x.innerHTML = "Hii click the button";
  }
}
</script>
<a href="secondpage.php"><input type="button" value="NEXT" style="background-color:blue; height:50px; width:80px;margin:10px;color:white;"></a></div>
</body>
</html>




