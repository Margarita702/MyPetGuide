<?php include '../db/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Link Sets</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <h1 class="h1">Link User with Preference (Sets)</h1>
    <p class="sub">Select a User and a Preference to create a connection in the Sets table.</p>

    <form action="rel_sets_feedback.php" method="POST">
      <!-- Select User -->
      <label for="user_id">User:</label><br>
      <select name="user_id" required>
        <option value="">-- choose user --</option>
        <?php
        $res_users = mysqli_query($conn, "SELECT user_id FROM User ORDER BY user_id ASC");
        while ($row = mysqli_fetch_assoc($res_users)) {
          echo "<option value='{$row['user_id']}'>User ID {$row['user_id']}</option>";
        }
        ?>
      </select>
      <br><br>

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

      <input type="submit" value="Create Sets Link">
    </form>

    <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
  </div>
</body>
</html>
