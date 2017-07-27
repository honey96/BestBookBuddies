<?php
$host = 'localhost';
$user = 'harshit';
$password = 'redhat';

//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//selecct the database
$select=mysqli_select_db($conn,"signin");


//create users table with all the fields
$mysqli->query('
CREATE TABLE `signin`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);
?>
