<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Registered User</title>
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
    <h1 class="h1">Add Registered User</h1>

    <!-- POST to feedback file -->
    <form action="registered_feedback.php" method="POST">
      <label>First Name:</label><br>
      <input type="text" name="first_name" required><br><br>

      <label>Last Name:</label><br>
      <input type="text" name="last_name" required><br><br>

      <label>Email:</label><br>
      <input type="email" name="email" required><br><br>

      <label>Password:</label><br>
      <input type="password" name="user_password" required><br><br>

      <label>Join Date:</label><br>
      <input type="date" name="join_date" value="<?php echo date('Y-m-d'); ?>"><br><br>

      <input type="submit" value="Add Registered User">
    </form>

    <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
  </div>
</body>

</html>