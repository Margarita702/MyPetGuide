<?php
include '../db/db_connect.php';

// Get data from form
$user_id = $_POST['user_id'];
$pref_id = $_POST['pref_id'];

// Insert into Sets
$sql = "INSERT INTO Sets (user_id, pref_id) VALUES ($user_id, $pref_id)";

if (mysqli_query($conn, $sql)) {
    echo "<p>Relationship created successfully! (User $user_id ↔ Preference $pref_id)</p>";
} else {
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
}

echo '<a href="../maintenance.html">← Back to Maintenance Page</a>';
mysqli_close($conn);
?>
