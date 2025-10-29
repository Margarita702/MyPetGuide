<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog</title>
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
        <h1 class="h1">Add Dog</h1>
        <p class="sub">Insert a new dog breed (linked to an existing Animal).</p>

        <form action="dog_feedback.php" method="POST">
            <!-- Select existing Animal ID -->
            <label for="animal_id">Select Animal ID:</label><br>
            <select name="animal_id" required>
                <option value="">-- choose an animal --</option>
                <?php
                $res = mysqli_query($conn, "SELECT animal_id FROM Animal ORDER BY animal_id ASC");
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='{$row['animal_id']}'>Animal ID {$row['animal_id']}</option>";
                }
                ?>
            </select>
            <br><br>

            <!-- Dog attributes -->
            <label>Breed Name:</label><br>
            <input type="text" name="breed_name" required placeholder="e.g., Golden Retriever"><br><br>

            <label>Trainability:</label><br>
            <select name="trainability" required>
                <option value="Easy">Easy</option>
                <option value="Average">Average</option>
                <option value="Challenging">Challenging</option>
            </select>
            <br><br>

            <label>Grooming Need:</label><br>
            <select name="grooming_need" required>
                <option value="Low">Low</option>
                <option value="Moderate">Moderate</option>
                <option value="High">High</option>
            </select>
            <br><br>

            <label>Image URL (optional):</label><br>
            <input type="url" name="image_url" placeholder="https://example.com/dog.jpg"><br><br>

            <input type="submit" value="Add Dog">
        </form>

        <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
    </div>
</body>

</html>