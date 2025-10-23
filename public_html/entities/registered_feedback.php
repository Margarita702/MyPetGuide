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
    $message = "<p>Registered user added successfully!</p>";
} else {
    $message = "<p>Error: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registered User - Feedback</title>
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