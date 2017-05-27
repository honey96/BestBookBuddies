<html>
<head>
	<meta charset ="UTF-8" >
	<meta name="viewport" content="width-device-width,initial-scale="1.0" >
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="font-awesome.css" />
	<title>
		sign up portal
	</title>
</head>
 <?php include 'css/css.html'; ?>
<?php
$username=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["username"]))
	{
		$nameerr="Name field is Required <br>";
	}
	else
	{
		$username=$_POST["username"];
	}
	if(empty($_POST["password"]))
	{
		$passerr="password is Required <br>";
	}
	else
	{
		$password=$_POST["password"];
	}
	
    
   if (isset($_POST['submit'])) { //User has Sucessfully Signed in 
        
        header("Location: http://server1.openlx.com/submit.php");
        
    }
}
?>
	<body>
		<div class="container" >
			<img src="images/man.png">
		
		<form action="index.php" method="post">
			<div class="form-input">
			<input type="text" name="username"placeholder="Enter the Username"required autocomplete="off" >
			
		</div>
			<div class="form-input">
			<input type="password" name="password" placeholder="Enter the Password"required autocomplete="off" pattern=".{6}" title="6 characters" >
			 
		</div>
			<input type="submit"name="submit"value="LOGIN"class=btn-login >
		</form>
			<a href="#bottomOfPage">Forget Password?</a>
		</br>
			<a href="signup.php">Sign Up</a>
		</div>
		</body>
			</html>