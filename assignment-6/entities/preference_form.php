<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Preference</title>
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
        <h1 class="h1">Add Preference</h1>

        <form action="preference_feedback.php" method="POST">
            <label for="user_id">Select User ID:</label><br>
            <select name="user_id" required>
                <option value="">-- choose user --</option>
                <?php
                $users = mysqli_query($conn, "SELECT user_id FROM User ORDER BY user_id ASC");
                while ($row = mysqli_fetch_assoc($users)) {
                    echo "<option value='{$row['user_id']}'>User ID {$row['user_id']}</option>";
                }
                ?>
            </select><br>

            <label>Attribute:</label>
            <select name="attribute">
                <option>avg_size</option>
                <option>vocality</option>
                <option>shedding</option>
                <option>temperament</option>
                <option>energy</option>
                <option>sociability</option>
                <option>assertiveness</option>
                <option>independence</option>
                <option>climate_tolerance</option>
                <option>space_requirements</option>
                <option>care_cost_level</option>
                <option>hypoallergenic</option>
            </select><br>

            <label>Desired Value:</label>
            <input type="text" name="desired_value" required><br>

            <input type="submit" value="Add Preference" class="signin" style="margin-top: 20px;">
        </form>

        <a href="../maintenance.html" class="back-home">← Back</a>
    </main>

</body>

</html>