<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animals by Care Cost Level</title>
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
    <h1 class="h1" style="font-size:38px;">Search Results</h1>

<?php
if (!isset($_GET['care_cost_level'])) {
    echo "<p>Please select a care cost level.</p>";
    exit;
}

$level = $_GET['care_cost_level'];

$stmt = $conn->prepare("
    SELECT a.animal_id, a.care_cost_level,
           COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
           CASE 
              WHEN d.animal_id IS NOT NULL THEN 'Dog'
              WHEN c.animal_id IS NOT NULL THEN 'Cat'
              WHEN b.animal_id IS NOT NULL THEN 'Bird'
           END AS species
    FROM Animal a
    LEFT JOIN Dog d ON a.animal_id = d.animal_id
    LEFT JOIN Cat c ON a.animal_id = c.animal_id
    LEFT JOIN Bird b ON a.animal_id = b.animal_id
    WHERE a.care_cost_level = ?
      AND (d.animal_id IS NOT NULL OR c.animal_id IS NOT NULL OR b.animal_id IS NOT NULL)
    ORDER BY breed_name ASC
");
$stmt->bind_param("s", $level);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p class='sub'>Animals with <strong>" . htmlspecialchars($level) . "</strong> care cost:</p>";
    echo "<table class='data-table' border='1' cellspacing='0' cellpadding='8' style='margin-top:12px; width:100%; text-align:left;'>";
    echo "<tr>
            <th>Breed Name</th>
            <th>Species</th>
            <th>Care Cost</th>
            <th>Details</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['breed_name'] ?? '') . "</td>
                <td>" . htmlspecialchars($row['species'] ?? '') . "</td>
                <td>" . htmlspecialchars($row['care_cost_level'] ?? '') . "</td>
                <td><a href='search_high_cost_detail.php?id=" . $row['animal_id'] . "' class='gradlink'>View Details</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No animals found with care cost level <strong>" . htmlspecialchars($level) . "</strong>.</p>";
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
