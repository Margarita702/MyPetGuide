<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top Loved Pets</title>
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
    <a href="top_favourites_form.php" class="back-home">← Back to Search Form</a>
    <h1 class="h1" style="font-size:38px;">Top Loved Pets</h1>

<?php
if (!isset($_GET['limit'])) {
    echo "<p>Please choose how many top pets to show.</p>";
    exit;
}

$limit = intval($_GET['limit']);

$stmt = $conn->prepare("
    SELECT a.animal_id, 
           COUNT(f.user_id) AS fav_count,
           COALESCE(d.breed_name, c.breed_name, b.breed_name) AS breed_name,
           CASE 
              WHEN d.animal_id IS NOT NULL THEN 'Dog'
              WHEN c.animal_id IS NOT NULL THEN 'Cat'
              WHEN b.animal_id IS NOT NULL THEN 'Bird'
           END AS species
    FROM Favorite f
    JOIN Animal a ON f.animal_id = a.animal_id
    LEFT JOIN Dog d ON a.animal_id = d.animal_id
    LEFT JOIN Cat c ON a.animal_id = c.animal_id
    LEFT JOIN Bird b ON a.animal_id = b.animal_id
    GROUP BY a.animal_id
    ORDER BY fav_count DESC
    LIMIT ?
");
$stmt->bind_param("i", $limit);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p class='sub'>Top " . htmlspecialchars($limit) . " most loved animals:</p>";
    echo "<table border='1' cellspacing='0' cellpadding='8' style='margin-top:12px; width:100%; text-align:left;'>";
    echo "<tr>
            <th>Breed Name</th>
            <th>Species</th>
            <th>Likes</th>
            <th>Details</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['breed_name'] ?? '') . "</td>
                <td>" . htmlspecialchars($row['species'] ?? '') . "</td>
                <td>" . htmlspecialchars($row['fav_count'] ?? 0) . "</td>
                <td><a href='top_favourites_detail.php?id=" . $row['animal_id'] . "' class='gradlink'>View Details</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No favourites found.</p>";
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
