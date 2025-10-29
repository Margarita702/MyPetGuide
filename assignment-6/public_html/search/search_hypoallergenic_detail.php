<?php
include '../db/db_connect.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $sql = "
  SELECT 
    a.animal_id,
    a.hypoallergenic,
    a.care_cost_level,
    COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name
  FROM Animal a
  LEFT JOIN Dog d ON a.animal_id = d.animal_id
  LEFT JOIN Cat c ON a.animal_id = c.animal_id
  LEFT JOIN Bird b ON a.animal_id = b.animal_id
  WHERE a.animal_id = $id;
  ";
  $result = mysqli_query($conn, $sql);
  $animal = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Details</title>
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
  <a href="search_hypoallergenic_results.php" class="back-home">← Back to Results</a>
  <h1 class="h1" style="font-size:38px;">Animal Details</h1>

  <?php if (!empty($animal)): ?>
    <p><strong>ID:</strong> <?= htmlspecialchars($animal['animal_id']) ?></p>
    <p><strong>Breed Name:</strong> <?= htmlspecialchars($animal['breed_name']) ?></p>
    <p><strong>Care Cost Level:</strong> <?= htmlspecialchars($animal['care_cost_level']) ?></p>
    <p><strong>Hypoallergenic:</strong> <?= $animal['hypoallergenic'] ? 'Yes' : 'No' ?></p>
  <?php else: ?>
    <p>No animal found with this ID.</p>
  <?php endif; ?>

</main>

 <footer class="footer">
    <div class="container">
      <p>© 2025 MyPetGuide. A Constructor University Database Project.</p>
      <p style="margin-top: 8px;">
        <a href="imprint.html" class="gradlink">Imprint & Disclaimer</a>
      </p>
    </div>
  </footer>

</body>
</html>
