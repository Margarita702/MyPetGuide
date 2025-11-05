<?php include '../db/db_connect.php'; ?>
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

<main class="section">
  <div class="container">
    <a href="../index.html" class="back-home">← Back to Home</a>
    <a href="search_high_cost_form.php" class="back-home">← Back to Search Form</a>
    <h1 class="h1" style="font-size:38px;">Animal Details</h1>

<?php
if (!isset($_GET['id'])) {
    echo "<p>No animal selected.</p>";
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("
    SELECT a.*, 
           COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
           CASE 
              WHEN d.animal_id IS NOT NULL THEN 'Dog'
              WHEN c.animal_id IS NOT NULL THEN 'Cat'
              WHEN b.animal_id IS NOT NULL THEN 'Bird'
           END AS species,
           COALESCE(d.image_url, c.image_url, b.image_url) AS image_url
    FROM Animal a
    LEFT JOIN Dog d ON a.animal_id = d.animal_id
    LEFT JOIN Cat c ON a.animal_id = c.animal_id
    LEFT JOIN Bird b ON a.animal_id = b.animal_id
    WHERE a.animal_id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<div class='card' style='margin-top:20px; text-align:center;'>
            <img src='" . htmlspecialchars($row['image_url'] ?: '../img/no-image.png') . "' 
                 alt='Animal image' style='width:200px; height:200px; object-fit:cover; border-radius:10px;'>
            <h2 style='margin-top:12px;'>" . htmlspecialchars($row['breed_name']) . "</h2>
            <p><strong>Species:</strong> " . htmlspecialchars($row['species']) . "</p>
            <p><strong>Care Cost Level:</strong> " . htmlspecialchars($row['care_cost_level']) . "</p>
            <p><strong>Energy:</strong> " . htmlspecialchars($row['energy']) . "</p>
            <p><strong>Sociability:</strong> " . htmlspecialchars($row['sociability']) . "</p>
            <p><strong>Climate Tolerance:</strong> " . htmlspecialchars($row['climate_tolerance']) . "</p>
            <p><strong>Space Requirements:</strong> " . htmlspecialchars($row['space_requirements']) . "</p>
          </div>";
} else {
    echo "<p>Animal not found.</p>";
}
?>

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
