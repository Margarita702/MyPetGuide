<?php
include '../db/db_connect.php';

$animalId = isset($_GET['animal_id']) ? (int)$_GET['animal_id'] : 0;

$detailSql = "
SELECT
  a.animal_id,
  a.avg_size, a.vocality, a.shedding, a.temperament, a.energy,
  a.sociability, a.assertiveness, a.independence,
  a.climate_tolerance, a.space_requirements, a.care_cost_level, a.hypoallergenic,
  COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
  COALESCE(d.image_url, c.image_url, b.image_url) AS image_url,
  CASE
    WHEN d.animal_id IS NOT NULL THEN 'Dog'
    WHEN c.animal_id IS NOT NULL THEN 'Cat'
    WHEN b.animal_id IS NOT NULL THEN 'Bird'
    ELSE 'Animal'
  END AS species
FROM Animal a
LEFT JOIN Dog d  ON d.animal_id = a.animal_id
LEFT JOIN Cat c  ON c.animal_id = a.animal_id
LEFT JOIN Bird b ON b.animal_id = a.animal_id
WHERE a.animal_id = $animalId
LIMIT 1
";

$detail = $conn->query($detailSql);
$info = $detail ? $detail->fetch_assoc() : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Details</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="header">
  <div class="container header-inner">
    <div class="brand"><img src="img/logo.png" alt="logo" width="28" height="28"><span class="brand-title">MyPetGuide</span></div>
    <a class="signin" href="top_favourites_form.php">Search</a>
  </div>
</header>

<main class="section">
  <div class="container">
    <a class="back-home" href="top_favourites_result.php">← Back to Results</a>
    <?php if(!$info): ?>
      <div class="cards" style="grid-template-columns:1fr;">
        <div class="card"><h3>Not found</h3><p class="note">No animal with ID <?php echo h($animalId); ?>.</p></div>
      </div>

    <?php else: ?>
      <div class="cards" style="grid-template-columns:1fr 1fr;">
        <div class="card">
          <h3><?php echo h($info['breed_name'] ?: ('Animal #'.$info['animal_id'])); ?></h3>
          <p class="note"><?php echo h($info['species']); ?></p>
          <p>Temperament: <?php echo h($info['temperament']); ?></p>
          <p>Energy: <?php echo h($info['energy']); ?></p>
          <p>Size: <?php echo h($info['avg_size']); ?>, Space: <?php echo h($info['space_requirements']); ?></p>
          <p>Vocality: <?php echo h($info['vocality']); ?> · Shedding: <?php echo h($info['shedding']); ?></p>
          <p>Social: <?php echo h($info['sociability']); ?> · Assertive: <?php echo h($info['assertiveness']); ?></p>
          <p>Independence: <?php echo h($info['independence']); ?></p>
          <p>Climate: <?php echo h($info['climate_tolerance']); ?></p>
          <p>Care Cost: <?php echo h($info['care_cost_level']); ?></p>
          <p>Hypoallergenic: <?php echo $info['hypoallergenic'] ? 'Yes' : 'No'; ?></p>
        </div>

        <div class="card" style="display:grid;place-items:center;">
          <?php if(!empty($info['image_url'])): ?>
            <img src="<?php echo h($info['image_url']); ?>" alt="Animal image" style="max-width:100%;border-radius:16px;">
          <?php else: ?>
            <div class="icon-tile"><img class="icon-img" src="img/paw.png" alt=""></div>
            <p class="note">No image available.</p>
          <?php endif; ?>
        </div>
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
