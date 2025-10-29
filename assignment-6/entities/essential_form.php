<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Essential Preference</title>
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
        <h1 class="h1">Add Essential Preference</h1>

        <form action="essential_feedback.php" method="POST">
            <!-- User dropdown -->
            <label for="pref_id">Select Preference ID:</label><br>
            <select name="pref_id" required>
                <?php
                $res = mysqli_query($conn, "SELECT pref_id FROM Preference ORDER BY pref_id ASC");
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='{$row['pref_id']}'>Preference ID {$row['pref_id']}</option>";
                }
                ?>
            </select><br>

            <!-- Submit -->
            <input type="submit" value="Add Essential Preference" class="signin" style="margin-top: 20px;">
        </form>

        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </main>

</body>

</html>