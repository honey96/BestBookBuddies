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
   if (isset($_POST['submit']))
    { //User has Sucessfully Signed in 
        $username=$_POST['username'];
        $password=$_POST['password'];
        $mysqli=new mysqli('localhost','harshit','redhat','signin') or die($mysqli->error());
        $query = $mysqli->query("SELECT * FROM users WHERE username='$username'AND password= '$password' ") or die($mysqli->error());
         if ( $query->num_rows !=0 ) 
         {
             while($row=mysqli_fetch_assoc($query))
             {
             	$dbusername=$row['username'];
                $dbpassword=$row['password'];
             }
              if(($username==$dbusername)&&($password==$dbpassword))
              {
              	session_start();
              	$_SESSION['user'] = $username;
              	header("Location: submit.php");              
              }
              else

              {
              	
              	header("Location: error.php");              
              }

   		}
   		else
   		{
   			
              	header("Location: error.php");              
               
        }
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
			<a href="forgot.php">Forget Password?</a>
		</br>
			<a href="signup.php">Sign Up</a>
		</div>
		</body>
			</html>