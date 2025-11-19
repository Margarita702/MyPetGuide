<?php
require "db/db_connect.php";

$term = isset($_GET['term']) ? $conn->real_escape_string($_GET['term']) : '';

$sql = "
    SELECT breed_name FROM Dog WHERE breed_name LIKE '%$term%'
    UNION
    SELECT breed_name FROM Cat WHERE breed_name LIKE '%$term%'
    UNION
    SELECT breed_name FROM Bird WHERE breed_name LIKE '%$term%'
";

$result = $conn->query($sql);

$suggestions = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['breed_name'];
    }
}

header('Content-Type: application/json');
echo json_encode($suggestions);
