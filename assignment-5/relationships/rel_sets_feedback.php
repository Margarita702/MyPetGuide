<?php
include '../db/db_connect.php';

// Get data from form
$user_id = $_POST['user_id'];
$pref_id = $_POST['pref_id'];

// Insert into Sets
$sql = "INSERT INTO Sets (user_id, pref_id) VALUES ($user_id, $pref_id)";

if (mysqli_query($conn, $sql)) {
    $message = "<p>Relationship created successfully! (User $user_id ↔ Preference $pref_id)</p>";
} else {
    $message = "<p>Error: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sets - Feedback</title>
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