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
 
$host = 'localhost';
$user = 'harshit';
$password = 'redhat';

//create mysql connection
$mysqli = new mysqli($host,$user,$password,"signin");
if($_SERVER["REQUEST_METHOD"]=="POST")
{

        $email=$_POST["email"];
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
      // We know user email exists if the rows returned are more than 0
          if ( $result->num_rows > 0 ) {
          $_SESSION['message'] = 'User with this email already exists!';    
                                         }


  else if (($_POST['password'])== ($_POST['confirmpassword']))//checking whether the password entered is correct or not
            {
  $username=$_POST["username"];

  $password=($_POST["password"]);
  $_SESSION['username']==$username;
  $sql = "INSERT INTO users (username,email,password)
  VALUES ('$username', '$email', '$password')";
                      if ($mysqli->query($sql) == TRUE) {
                          $_SESSION[ 'message' ] = "Confirmation link has been sent to $email, please verify
                                                    your account by clicking on the link in the message!";
                           $to= 'harshitpithi1967@gmail.com';
                           $from='$email';
                           $subject = 'Account Verification';
                           $message_body = 'Hello '.$username.',Thank you for signing up!';
                           $headers='from '. $from;
                           mail( $to, $subject, $message_body,$headers );
                            
                                                    
                                                   header("Location: sucess.php");

                                        } 
                    else
                          {
                            $_SESSION['message'] = 'Regestration Failed';
                         /*   sleep(10);
                          header("Location: http://server1.openlx.com/index.php");*/
                        }
      }
  else 
         {
                    $_SESSION['message'] = 'Password does not match';
                    /*sleep(10);
                    header("Location: http://server1.openlx.com/index.php");*/
              }
}

?>


<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['message'] ?>
        </div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required pattern=".{6}" title="6 characters"/>
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
</html>