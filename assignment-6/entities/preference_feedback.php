<?php
include '../db/db_connect.php';

$user_id = $_POST['user_id'];
$attribute = $_POST['attribute'];
$desired_value = $_POST['desired_value'];

$sql = "INSERT INTO Preference (user_id, attribute, desired_value)
        VALUES ('$user_id', '$attribute', '$desired_value')";

if (mysqli_query($conn, $sql)) {
    $message = "Preference added successfully!";
} else {
    $message = "Error adding preference: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Preference - Feedback</title>
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