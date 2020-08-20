
<?php
$nameerr= $firstnameErr = $lastnameerr = $middlenameerr = $photoerr = $emailErr = $addresserr = $additionalremarkerr = $phonenumbererr = $usererr= $passwderr = $confirmpwderr = $genderErr =  "";
$firstname = $middlename = $photo = $lastname = $address = $email = $gender = $additionalremark = $phonnumber = $username = $password = $confirmpassword = "";
$flag=true;
$flag1=false;


if(isset($_POST['submit']))
{
		$firstname = $_POST["firstname"];
		$middlename = $_POST["middlename"];
		$lastname = $_POST["lastname"];
		$email =$_POST["email"];
		$gender =$_POST["gendr"];
		$phonnumber=$_POST["mobileno"];
		$address=$_POST["address"];
		$username=$_POST["username"];
		$password=$_POST["pass"];
		$additionalremark=$_POST["additionalremarks"];
		$role=$_POST["role"];
		$filename=addslashes($_FILES["photo"]["name"]);
		$tempfilename=addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
		$filetype=addslashes($_FILES["photo"]["type"]);
		$array=array('jpg','jpeg');
		$ext=pathinfo($filename,PATHINFO_EXTENSION);
		if(!empty($filename))
		{
			if (in_array($ext,$array))
			{
			}
			else{
				echo "unsupproted format";
			}
		}
		
		
	if($flag1==false)
	{		
						  if(empty($firstname))
						  {
							$nameerr = "Name is required";
							$flag=false;
						  }
						  else if(!preg_match("/^[A-Za-z]+$/",$firstname))
							{
								$firstnameErr= "Name must contain characters";
								$flag=false;
							}
						  
						  
						   if (empty($middlename)) 
						   {
							$nameerr = "Name is required";
							$flag=false;

						   } 
						  else if (!preg_match("/^[a-zA-Z ]*$/",$middlename))
							{
							  $middlenameerr = "Only letters and white space allowed";
							  $flag=false;
							}
						  
						  
						  if (empty($lastname))
						  {
							$nameerr = "Name is required";
							$flag=false;
						  } 
						  else if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
							  $lastnameerr = "Only letters and white space allowed";
							  $flag=false;
						  }
						  
						  if (empty($email)) {
							$emailErr = "Email is required";
							$flag=false;
						  } 
							
							
							if (empty($address)) 
							{
							$addresserr = "address is required";
							$flag=false;
							}  
							

							if (empty($additionalremark))
							{
							$additionalremarkerr = "Remark is required";
							$flag=false;
						   } 
						  
						  if (empty($gender)) 
						  {
							$genderErr = "Gender is required";
							$flag=false;
						  } 
						  
						   if (empty($phonnumber)) {
							$phonenumbererr = "phone number is required";
							$flag=false;
						  } 
						  
						  if (empty($username)) {
							$usererr = "User name is required";
							$flag=false;
						  } 
						  
						  if (empty($password)) {
							$passwderr = "password is required";
							$flag=false;
						  } 
						  
						  if (empty($confirmpassword)) {
							$confirmpwderr = "password is required";
							$flag=false;
							$flag1=true;
							
						if($password!=$confirmpassword)
						{
								$confirmpwderr = "password match is required";
							$flag=false;
							
						}
				  }
  } 
  if($flag1)
		{
			$conn = mysqli_connect("localhost","root","","employee");
			if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
			$sql_u = "SELECT * FROM empinfo WHERE loginid='$username'";
  	$sql_e = "SELECT * FROM empinfo WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo"Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}
				else{
			$sql = "INSERT INTO empinfo (firstname ,middlename,lastname,loginid,password ,Role,gender,email,mobileno ,address,remark ,DateTime,photo)
					VALUES ('$firstname','$middlename','$lastname','$username','$password','$role','$gender','$email','$phonnumber','$address','$additionalremark',CURTIME(),'$tempfilename')";
	
	if (mysqli_query($conn, $sql)) {
			echo '<h4 style="color:white">'."Record inserted successfully.".'</h4>';
			} 
	/*else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}*/

		mysqli_close($conn);
				}
		}
}
?>	
<?php
if ((($_FILES["file1"]["type"] == "image/gif") || ($_FILES["file1"]["type"] == "image/jpeg") || ($_FILES["file1"]["type"] == "image/pjpeg")||($_FILES["file1"]["type"] == "image/jpg")) 
&& ($_FILES["file1"]["size"] < 200000)) 
{
if ($_FILES["file1"]["error"] > 0) 
    		{ 
    			echo "Return Code: " . $_FILES["file1"]["error"] . "<br />"; 
    		} 
  		else 
    		{ 
			    echo "Upload: " . $_FILES["file1"]["name"] . "<br />"; 
			    echo "Type: " . $_FILES["file1"]["type"] . "<br />"; 
			    echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " Kb<br />"; 
			    echo "Temp file: " . $_FILES["file1"]["tmp_name"] . "<br />"; 
		                    if (file_exists("upload/" . $_FILES["file1"]["name"])) 
      			{
				      echo $_FILES["file1"]["name"] . " already exists. "; 
      			} 
    			else 
      			{ 
      				move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $_FILES["file1"]["name"]); 
      				echo "Stored in: " . "upload/" . $_FILES["file1"]["name"]; 
      			} 
    		} 
} 

else 
  { 
  		echo "Invalid file"; 
  }//outer if-else
 
?> 


<html>
<head>
<title>LOGIN FORM</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="registerstyle.css"> 
<!--<style>
body{
	background-image: url('bgf2.jpg');
background-size:cover;	
background-repeat:no repeat;
}

#a{
	background-image: url('bg3.jpg');

color:white;
font-size:15px;
height:900px;
width:600px;
align:center;
margin-left:400px;
font-family:verdana;
margin-top:50px;

}
</style>-->
</head>

<body>
<div id="a">
	<form action="register_php.php" method="post" enctype="multipart/form-data">
			<!--<div  style="border:5px solid black; width:580px; background-image: url('texture1.jpeg');
			background-size: 200%;
			background-repeat: no-repeat;
			box-shadow: 10px 10px 20px black;
			margin-left:450px;" align=center> -->
		
		<table style=" border-collapse:separate; border-spacing:0 15px"  align="center">
			<tr align='middle'>
				<td colspan=2 style="color:white;font-family:Times New Roman"> <h2><b style='color:georgian'>Registration Form</b></h2></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">First Name :</td>
				<td> <input type='text' name="firstname" placeholder='First Name'  style='margin-left:10px' ><?php echo $nameerr; ?><?php echo $firstnameErr; ?></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Middle Name : </td><td><input type='text' name="middlename" placeholder='Middle Name'     style='margin-left:10px' ><?php echo $nameerr;?></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Last Name : </td><td><input type='text' name="lastname" placeholder='Last Name'  style='margin-left:10px' ><?php echo $nameerr;?></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Gender :</td><td style="color:white;font-family:Times New Roman" ><input type='radio' style='margin-left:10px;color:white;font-family:Times New Roman"' name="gendr" value='Male'>Male<input type='radio' name="gendr" value='Female'style="color:white;font-family:Times New Roman" >Female</td>
			</tr>
			<tr>
				<td style="color:white;font-family:Times New Roman">E-Mail ID :</td><td><input type='email' name="email" style='margin-left:10px' placeholder='E-Mail' > <?php echo $emailErr;?></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Mobile No. :</td><td><input type='number' name="mobileno" style='margin-left:10px' pattern="[0-9].{10,}" title="enter valid mobile no." ><?php echo $phonenumbererr;?></td>
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Address : </td><td  ><textarea  name="address" rows='4'  cols='30' style='margin-left:10px' > <?php echo $addresserr;?></textarea><td>	
			</tr>
			<tr>
				<td  style="color:white;font-family:Times New Roman">Additional Remark :</td><td><textarea name="additionalremarks" rows='4' cols='30' style='margin-left:10px' > </textarea></td>
			</tr>
			<tr>
			<td style="color:white;font-family:Times New Roman"> Photo : </td><td><input type='file' name="photo" style='margin-left:10px' ><?php echo $photoerr;?></td>
			</tr>

			<tr>
			<td style="color:white;font-family:Times New Roman">Username :</td><td> <input style='margin-left:10px' type='text' name="username"  placeholder='Username' ><?php echo $usererr;?></td>
			</tr>
			<tr>
			<td style="color:white;font-family:Times New Roman">Password :</td><td> <input style='margin-left:10px' style='margin-left:10px'  type='password' title="must contain atleast one number ,one uppercase and lowercase letter and atleast 8 or more characters" placeholder='Password' ><?php echo $passwderr;?>
			</td>
			</tr>
			<tr>
			<td style="color:white;font-family:Times New Roman"> Confirm Password :</td><td> <input style='margin-left:10px' name="pass" type='password' placeholder='Password'  title="must contain atleast one number ,one uppercase and lowercase letter and atleast 8 or more characters" >
			</td>
			</tr>
			<tr>
			<tr>
			<td style="color:white;font-family:Times New Roman">Role :</td><td> <input style='margin-left:10px' style='margin-left:10px'  type='text' placeholder='role' name="role" >
			</td>
			</tr>
			
			<td align='center'><input name="submit" type='submit'  value='Submit' style="background-color:black; height:30; width:100;margin:10px;color:white;"></td>
			<td align='center' 	><input type='reset' value="Clear" style="background-color:black; height:30; width:100;margin:10px;color:white;" ></td></tr>
			<td align='center'><a href="loginpage.php"><input type='button' value='Back to LOGIN' style="background-color:black; height:30; width:160;margin:10px;color:white;"></a></td>
		
		</table>
		
		
	</form>
	</div>
</body>

</html>