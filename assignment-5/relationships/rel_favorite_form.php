<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Favorite</title>
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

    <div class="container" style="padding: 40px;">
        <h1 class="h1">Link Favorite</h1>
        <p class="sub">Connect a Registered User with an Animal as a favorite.</p>

        <form action="rel_favorite_feedback.php" method="POST">
            <!-- Select Registered User -->
            <label for="user_id">Registered User:</label><br>
            <select name="user_id" required>
                <option value="">-- choose user --</option>
                <?php
                $res_users = mysqli_query($conn, "SELECT user_id, first_name, last_name FROM Registered ORDER BY user_id ASC");
                while ($row = mysqli_fetch_assoc($res_users)) {
                    echo "<option value='{$row['user_id']}'>User ID {$row['user_id']} - {$row['first_name']} {$row['last_name']}</option>";
                }
                ?>
            </select>
            <br><br>

            <!-- Select Animal -->
            <label for="animal_id">Animal:</label><br>
            <select name="animal_id" required>
                <option value="">-- choose animal --</option>
                <?php
                $res_animals = mysqli_query($conn, "SELECT animal_id FROM Animal ORDER BY animal_id ASC");
                while ($row = mysqli_fetch_assoc($res_animals)) {
                    echo "<option value='{$row['animal_id']}'>Animal ID {$row['animal_id']}</option>";
                }
                ?>
            </select>
            <br><br>

            <input type="submit" value="Create Favorite Link">
        </form>

        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </div>
</body>

</html>