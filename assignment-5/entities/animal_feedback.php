<?php
include '../db/db_connect.php';

// Collect form data
$avg_size = $_POST['avg_size'];
$vocality = $_POST['vocality'];
$shedding = $_POST['shedding'];
$temperament = $_POST['temperament'];
$energy = $_POST['energy'];
$sociability = $_POST['sociability'];
$assertiveness = $_POST['assertiveness'];
$independence = $_POST['independence'];
$climate_tolerance = $_POST['climate_tolerance'];
$space_requirements = $_POST['space_requirements'];
$care_cost_level = $_POST['care_cost_level'];
$hypoallergenic = isset($_POST['hypoallergenic']) ? 1 : 0;

// Insert into Animal table
$sql = "INSERT INTO Animal (
    avg_size, vocality, shedding, temperament, energy,
    sociability, assertiveness, independence, climate_tolerance,
    space_requirements, care_cost_level, hypoallergenic
) VALUES (
    '$avg_size', '$vocality', '$shedding', '$temperament', '$energy',
    '$sociability', '$assertiveness', '$independence', '$climate_tolerance',
    '$space_requirements', '$care_cost_level', $hypoallergenic
)";

if (mysqli_query($conn, $sql)) {
  $animal_id = mysqli_insert_id($conn);
  $msg = "Animal added successfully! (Animal ID: $animal_id)";
} else {
  $msg = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Animal — Feedback</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <h1 class="h1">Animal — Feedback</h1>
    <p class="sub"><?php echo $msg; ?></p>
    <a href="../maintenance.html" class="back-home">← Back to Maintenance</a>
  </div>
</body>

</html>