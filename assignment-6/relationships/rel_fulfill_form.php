<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Link Fulfill</title>
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
        <h1 class="h1">Link Fulfill</h1>

        <form action="rel_fulfill_feedback.php" method="POST">

            <!-- Select Animal -->
            <label>Animal:</label>
            <select name="animal_id" required>
                <?php
                $animals = mysqli_query($conn, "SELECT animal_id FROM Animal ORDER BY animal_id ASC");

                while ($row = mysqli_fetch_assoc($animals)) {
                    echo "<option value='{$row['animal_id']}'>Animal ID {$row['animal_id']}</option>";
                }
                ?>
            </select><br>

            <!-- Select Preference -->
            <label for="pref_id">Preference:</label><br>
            <select name="pref_id" required>
                <option value="">-- choose preference --</option>
                <?php
                $res_prefs = mysqli_query($conn, "SELECT pref_id, attribute, desired_value FROM Preference ORDER BY pref_id ASC");
                while ($row = mysqli_fetch_assoc($res_prefs)) {
                    echo "<option value='{$row['pref_id']}'>Preference {$row['pref_id']} - {$row['attribute']} = {$row['desired_value']}</option>";
                }
                ?>
            </select>
            <br><br>

            <!-- Submit -->
            <input type="submit" value="Link Fulfill" class="signin" style="margin-top: 20px;">
        </form>

        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </main>

</body>

</html>