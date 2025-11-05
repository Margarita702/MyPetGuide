<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Animals by Care Cost Level</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="header">
  <div class="container header-inner">
    <div class="brand">
      <img src="../img/logo.png" alt="logo" width="28" height="28">
      <span class="brand-title">MyPetGuide</span>
    </div>
  </div>
</header>

<main class="section">
  <div class="container">
    <a href="../index.html" class="back-home">← Back to Home</a>
    <a href="../search.php" class="back-home">← Back to Search Center</a>

    <h1 class="h1" style="font-size:38px;">Search by Care Cost Level</h1>
    <p class="sub">Find animals based on how expensive they are to care for.</p>

    <div class="container" style="grid-template-columns:1fr;">
      <div class="container">
        <h3>Select the care cost level you want to explore:</h3>

        <form method="get" action="search_high_cost_results.php" style="margin-top:12px;">
          <label for="care_cost_level" style="font-size:18px;">Care Cost Level:</label><br>
          <select name="care_cost_level" id="care_cost_level" required
                  style="padding:8px; border-radius:8px; margin-top:6px; border:1px solid #ccc;">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
          </select>
          <br><br>
          <button type="submit" class="signin">Search</button>
        </form>

      </div>
    </div>
  </div>
</main>

<footer class="footer">
  <div class="container">
    <p>© 2025 MyPetGuide. A Constructor University Database Project.</p>
    <p style="margin-top: 8px;">
      <a href="../imprint.html" class="gradlink">Imprint & Disclaimer</a>
    </p>
  </div>
</footer>
</body>
</html>
