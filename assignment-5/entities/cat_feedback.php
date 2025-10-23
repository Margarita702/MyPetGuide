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
    $message = "Cat added successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cat - Feedback</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="header">
        <div class="container header-inner">
            <div class="brand">
                <img src="../img/logo.png" alt="logo" width="28" height="28">
                <a href="../index.html" class="brand-title">MyPetGuide</a>
            </div>
        </div>
    </header>

    <main class="container" style="padding: 40px;">
        <h1 class="h1">Feedback</h1>
        <p><?php echo $message; ?></p>
        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </main>
</body>

</html>