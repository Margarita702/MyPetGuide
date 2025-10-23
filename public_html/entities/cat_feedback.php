<?php
include '../db/db_connect.php';

// Read submitted data
$animal_id     = $_POST['animal_id'];
$breed_name    = $_POST['breed_name'];
$coat_length   = $_POST['coat_length'];
$grooming_need = $_POST['grooming_need'];
$image_url     = $_POST['image_url'];

// Insert into Cat
$sql = "INSERT INTO Cat (animal_id, breed_name, coat_length, grooming_need, image_url)
        VALUES ($animal_id, '$breed_name', '$coat_length', '$grooming_need', '$image_url')";

if (mysqli_query($conn, $sql)) {
    echo "<p>Cat added successfully!</p>";
} else {
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
}

echo '<a href="../maintenance.html">← Back to Maintenance Page</a>';

mysqli_close($conn);
?>
