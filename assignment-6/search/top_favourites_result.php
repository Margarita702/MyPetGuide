<?php
include '../db/db_connect.php';

// my query
$sql = <<<SQL
SELECT 
    COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,   -- returns first non-Null argument
    COUNT(f.animal_id) AS total_favorites
FROM Favorite f
JOIN Animal a ON f.animal_id = a.animal_id   -- join fav to animal table
LEFT JOIN Dog d ON a.animal_id = d.animal_id   -- include all animals, if breeds don't match then breed_name=NULL (COALESCE takes care of that)
LEFT JOIN Cat c ON a.animal_id = c.animal_id
LEFT JOIN Bird b ON a.animal_id = b.animal_id
GROUP BY breed_name   -- group all rows with same breed name -> COUNT() gives total times that breed's been favorited (per group)
ORDER BY total_favorites DESC   -- order by most favorited->least and only show top 3
LIMIT 3;
SQL;

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Top 3 Most Favourited Pets - MyPetGuide</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<header class="header">
  <div class="container header-inner">
    <div class="brand">
      <img src="../img/logo.png" alt="logo" width="28" height="28" />
      <span class="brand-title">MyPetGuide</span>
    </div>
  </div>
</header>

<main class="section">
  <div class="container">
    <a href="../index.html" class="back-home">← Back to Home</a>
    <a href="../search.php" class="back-home">← Back to Search Center</a>

    <h1 class="h1" style="font-size:38px;">Top 3 Most Favourited Animals</h1>
    <p class="sub">Take a look at the current stars!</p>

    <?php if (!$res): ?>
      <div class="cards" style="grid-template-columns:1fr;">
        <div class="card">
          <h3>Error showing top 3 favourited animals</h3>
          <p><?php echo h($error ?: 'Unknown error'); ?></p>
        </div>
      </div>

    <?php elseif ($res->num_rows === 0): ?>
      <div class="cards" style="grid-template-columns:1fr;">
        <div class="card">
          <h3>No results</h3>
          <p class="note">There are no favorites yet.</p>
        </div>
      </div>

    <?php else: ?>
      <div class="cards">
        <?php
          $rank = 1;
          while ($row = $res->fetch_assoc()):
        ?>

          <div class="card">
            <div class="icon-tile">
              <img class="icon-img" src="../img/paw.png" alt="paw">
            </div>
            <h3>#<?php echo h($rank); ?> — <?php echo h($row['breed_name'] ?: 'Unknown Breed'); ?></h3>
            <p>Favorites: <strong><?php echo h($row['total_favorites']); ?></strong></p>
            <span class="note">Popularity ranking updated from favorites</span>
          </div>

        <?php
          $rank++;
          endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</main>

  <footer class="footer">
    <div class="container">
      <p>© 2025 MyPetGuide. A Constructor University Database Project.</p>
      <p style="margin-top: 8px;">
        <a href="imprint.html" class="gradlink">Imprint & Disclaimer</a>
      </p>
    </div>
  </footer>
</html>