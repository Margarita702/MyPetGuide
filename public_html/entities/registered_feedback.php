<?php
include '../db/db_connect.php';

// Read form data
$first = $_POST['first_name'];
$last  = $_POST['last_name'];
$email = $_POST['email'];
$pass  = $_POST['user_password'];
$join  = $_POST['join_date'];

// Insert into User
mysqli_query($conn, "INSERT INTO User () VALUES ()");
$user_id = mysqli_insert_id($conn);

// Insert into Registered
$sql = "INSERT INTO Registered (user_id, first_name, last_name, email, user_password, join_date)
        VALUES ($user_id, '$first', '$last', '$email', '$pass', '$join')";

if (mysqli_query($conn, $sql)) {
    echo "<p>Registered user added successfully!</p>";
} else {
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
}

echo '<a href="../maintenance.html">← Back to Maintenance Page</a>';
mysqli_close($conn);
?>
