<?php
include '../db/db_connect.php';

$pref_id = $_POST['pref_id'];

$sql = "INSERT INTO EssentialPreference (pref_id) VALUES ('$pref_id')";

if (mysqli_query($conn, $sql)) {
    $message = "Essential Preference added successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Essential Preference - Feedback</title>
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