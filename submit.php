<?php
$conn = new mysqli("192.168.0.118", "root","redhat");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";
$select=mysqli_select_db($conn,"signin");
if($select=='1')
{
	
	echo "  selected database signin";

}
else
echo "not selected";

?>
