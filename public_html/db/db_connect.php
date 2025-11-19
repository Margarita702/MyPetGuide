<?php
$servername = "db";
$username = "myuser";
$password = "mypass";
$dbname = "mypetguide";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>