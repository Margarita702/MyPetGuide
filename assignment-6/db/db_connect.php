
<?php
$servername = "localhost";
$username   = "username";
$password   = "password";  
$dbname     = "db_username";       

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("<p style='color:red;'>❌ Database connection failed: " . mysqli_connect_error() . "</p>");
}
?>
