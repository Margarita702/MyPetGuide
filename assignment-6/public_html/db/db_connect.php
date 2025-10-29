
<?php
$servername = "localhost";
$username   = "mstaykova";
$password   = "HH6Q/C/juk7gEtct";  
$dbname     = "db_mstaykova";       

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("<p style='color:red;'>❌ Database connection failed: " . mysqli_connect_error() . "</p>");
}
?>
