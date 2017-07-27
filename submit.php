<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>

	<style>

a:link {
    color: red;
    text-decoration: none;
}
/* visited link */
a:visited {
    color: green;
}

/* mouse over link */
a:hover {
    color: hotpink;
}

/* selected link */
a:active {
    color: blue;
}
	</style>
  <meta charset="UTF-8">
  <title>Welcome <?= $username?></title>
  <?php include 'css/css.html'; ?>
  <link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="font-awesome.css" />
</head>

<body>
  <div class="form">

          <h1>Welcome <?=$_SESSION['user'];?></h1>
          <marquee behavior="alternate"><h1>Cloud Marketplace</h1></marquee>
          		<b><a href="ec2.php" >OpenCloud</a></b>
          	</br>
          		<b><a href="#" >PAAS</a></b>
          	</br>
          		<b><a href="#" >CAAS</a></b>
          	</br>
          
               <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
    

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
