<?php
include '../db/db_connect.php';

if (isset($_GET['breed'])) {
  $breed = mysqli_real_escape_string($conn, $_GET['breed']);
  $sql = "
  SELECT 
    a.animal_id,
    COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
    a.temperament,
    a.care_cost_level,
    a.hypoallergenic
  FROM Animal a
  LEFT JOIN Dog d ON a.animal_id = d.animal_id
  LEFT JOIN Cat c ON a.animal_id = c.animal_id
  LEFT JOIN Bird b ON a.animal_id = b.animal_id
  WHERE COALESCE(d.breed_name, c.breed_name, b.breed_name) = '$breed';
  ";
  $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breed Details - MyPetGuide</title>
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

<main class="container" style="padding:50px 20px 80px;">
  <div style="margin-bottom: 10px;">
    <a href="top_favourites_result.php" class="back-home">← Back to Results</a>
    <a href="../search.php" class="back-home" style="margin-left: 8px;">← Back to Search Center</a>
  </div>

  <h1 class="h1" style="font-size:38px;">Breed Details</h1>

  <?php if (!empty($result) && mysqli_num_rows($result) > 0): ?>
    <?php $first = mysqli_fetch_assoc($result); ?>
    <p><strong>Breed Name:</strong> <?= htmlspecialchars($first['breed_name']) ?></p>
    <p><strong>Temperament:</strong> <?= htmlspecialchars($first['temperament']) ?></p>
    <p><strong>Care Cost Level:</strong> <?= htmlspecialchars($first['care_cost_level']) ?></p>
    <p><strong>Hypoallergenic:</strong> <?= $first['hypoallergenic'] ? 'Yes' : 'No' ?></p>
  <?php else: ?>
    <p>No details found for this breed.</p>
  <?php endif; ?>

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
