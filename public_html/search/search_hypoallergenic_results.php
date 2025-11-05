<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hypoallergenic Animal Results</title>
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
    <a href="search_hypoallergenic_form.php" class="back-home">← Back to Search Form</a>
    <h1 class="h1" style="font-size:38px;">Search Results</h1>

<?php
if (!isset($_GET['hypoallergenic'])) {
    echo "<p>Please choose an option.</p>";
    exit;
}

$hypo = $_GET['hypoallergenic'] == '1' ? 1 : 0;

if ($hypo == 1) {
    $stmt = $conn->prepare("
        SELECT a.animal_id, a.hypoallergenic,
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
        WHERE a.hypoallergenic = 1
          AND (d.animal_id IS NOT NULL OR c.animal_id IS NOT NULL OR b.animal_id IS NOT NULL)
        ORDER BY breed_name ASC
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $title = "Hypoallergenic Animals";
} else {
    $stmt = $conn->prepare("
        SELECT a.animal_id, a.hypoallergenic,
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
        WHERE (d.animal_id IS NOT NULL OR c.animal_id IS NOT NULL OR b.animal_id IS NOT NULL)
        ORDER BY breed_name ASC
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $title = "All Animals (including non-hypoallergenic)";
}

if ($result->num_rows > 0) {
    echo "<p class='sub'>" . htmlspecialchars($title) . ":</p>";
    echo "<table border='1' cellspacing='0' cellpadding='8' style='margin-top:12px; width:100%; text-align:left;'>";
    echo "<tr>
            <th>Breed Name</th>
            <th>Species</th>
            <th>Hypoallergenic</th>
            <th>Details</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['breed_name'] ?? '') . "</td>
                <td>" . htmlspecialchars($row['species'] ?? '') . "</td>
                <td>" . ($row['hypoallergenic'] ? 'Yes' : 'No') . "</td>
                <td><a href='search_hypoallergenic_detail.php?id=" . $row['animal_id'] . "' class='gradlink'>View Details</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No animals found for your selection.</p>";
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
