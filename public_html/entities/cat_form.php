<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Cat</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <h1 class="h1">Add Cat</h1>
    <p class="sub">Insert a new cat breed (linked to an existing Animal).</p>

    <form action="cat_feedback.php" method="POST">
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

      <!-- Cat attributes -->
      <label>Breed Name:</label><br>
      <input type="text" name="breed_name" required><br><br>

      <label>Coat Length:</label><br>
      <select name="coat_length" required>
        <option value="Short">Short</option>
        <option value="Medium">Medium</option>
        <option value="Long">Long</option>
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
      <input type="url" name="image_url" placeholder="https://example.com/cat.jpg"><br><br>

      <input type="submit" value="Add Cat">
    </form>

    <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
  </div>
</body>
</html>
