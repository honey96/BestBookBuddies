<html>
<head>
  <meta charset ="UTF-8" >
  <meta name="viewport" content="width-device-width,initial-scale="1.0" >
  <link rel="stylesheet" type="text/css" href="signup.css" />
  <title>
    sign up
  </title>
</head>
 <?php include 'css/css.html'; ?>
 <?php
 $emailerr="";
 session_start();
 $_SESSION['message']=='';
 $host = '192.168.0.118';
$user = 'root';
$password = 'redhat';

//create mysql connection
$mysqli = new mysqli($host,$user,$password,"signin");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if (($_POST['password'])== ($_POST['confirmpassword']))
{
  $username=$_POST["username"];
  $email=$_POST["email"];
  $password=md5($_POST["password"]);
  $_SESSION['username']==$username;
  $sql = "INSERT INTO users (username,email,password)
VALUES ('$username', '$email', '$password')";

if ($mysqli->query($sql) == TRUE) {
    $_SESSION[ 'message' ] = "Registration succesful! Added $username to the database!";
    header("Location: http://server1.openlx.com/index.php");
} 
else
$_SESSION['message'] = 'connection timeout';
header("Location: http://server1.openlx.com/signup.php");
}
  else {
                    $_SESSION['message'] = 'Password does not match';
                    header("Location: http://server1.openlx.com/signup.php");
              }
}

?>
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required pattern=".{6}" title="6 characters"/>
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
</html>