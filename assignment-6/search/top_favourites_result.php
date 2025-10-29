<?php
include '../db/db_connect.php';

$sql = "
SELECT 
  COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
  COUNT(f.animal_id) AS total_favorites
FROM Favorite f
JOIN Animal a ON f.animal_id = a.animal_id
LEFT JOIN Dog d ON a.animal_id = d.animal_id
LEFT JOIN Cat c ON a.animal_id = c.animal_id
LEFT JOIN Bird b ON a.animal_id = b.animal_id
GROUP BY breed_name
ORDER BY total_favorites DESC
LIMIT 3;
";


$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top Favorited Animals - Results</title>
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
    <a href="top_favourites_form.php" class="back-home">← Back to Search</a>
    <a href="../search.php" class="back-home" style="margin-left: 8px;">← Back to Search Center</a>
  </div>

  <h1 class="h1" style="font-size:38px;">Top Favorited Animals</h1>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:25px; width:100%; border-collapse:collapse;">
      <tr style="background-color:#FFF4D6;">
        <th>Breed Name</th>
        <th>Total Favorites</th>
        <th>Details</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['breed_name']) ?></td>
          <td><?= htmlspecialchars($row['total_favorites']) ?></td>
          <td><a href="top_favourites_detail.php?breed=<?= urlencode($row['breed_name']) ?>" class="gradlink">View</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No favorites found in the database.</p>
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
