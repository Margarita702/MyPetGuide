<?php
include '../db/db_connect.php';

// Collect form data
$user_id = $_POST['user_id'];
$animal_id = $_POST['animal_id'];

// Insert into Favorite table
$sql = "INSERT INTO Favorite (user_id, animal_id)
        VALUES ($user_id, $animal_id)";

if (mysqli_query($conn, $sql)) {
    $message = "<p>Favorite link created successfully! (User ID: $user_id ↔ Animal ID: $animal_id)</p>";
} else {
    $message = "<p>Error: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Favorite - Feedback</title>
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