<?php
require "db/db_connect.php";

// Get search term (breed) from query string
$search = isset($_GET['breed']) ? trim($_GET['breed']) : "";

// Base SQL: all breeds from all animal types
$baseSql = "
    SELECT 'Dog' AS type, breed_name AS name FROM Dog
    UNION
    SELECT 'Cat' AS type, breed_name AS name FROM Cat
    UNION
    SELECT 'Bird' AS type, breed_name AS name FROM Bird
";

// Wrap base query so we can safely add WHERE
if ($search !== "") {
    $safe = $conn->real_escape_string($search);
    $sql = "
        SELECT * FROM (
            $baseSql
        ) AS all_breeds
        WHERE name LIKE '%$safe%'
        ORDER BY name
    ";
} else {
    $sql = "
        SELECT * FROM (
            $baseSql
        ) AS all_breeds
        ORDER BY name
    ";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Browse Animals</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- jQuery + jQuery UI for autocomplete -->
    <link rel="stylesheet"
        href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>

    <header class="header">
        <div class="container header-inner">
            <div class="brand">
                <img src="img/logo.png" width="28" height="28" alt="logo">
                <a href="index.html" class="brand-title">MyPetGuide</a>
            </div>

            <nav>
                <a href="search.php" class="signin">🐾 Search</a>
                <a href="maintenance.php" class="signin">Maintenance</a>
                <a href="login.php" class="signin">Sign In</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="section">
            <div class="container">

                <a href="index.html" class="back-home">← Back to Home</a>

                <h1 class="h1">Browse Animals</h1>
                <p>Search by breed name or view all available animals.</p>

                <!-- Search Form -->
                <form action="browse.php" method="get" style="margin-top:25px; margin-bottom:30px;">
                    <input
                        type="text"
                        id="breed"
                        name="breed"
                        class="search-bar"
                        placeholder="Search breed name..."
                        value="<?php echo htmlspecialchars($search); ?>">

                    <button type="submit" class="search-btn">Search</button>
                </form>

                <script>
                    $(function() {
                        $("#breed").autocomplete({
                            source: "autocomplete.php",
                            minLength: 1
                        });
                    });
                </script>

                <hr>

                <h2>
                    <?php
                    if ($search === "") {
                        echo "All Animals";
                    } else {
                        echo "Results for: " . htmlspecialchars($search);
                    }
                    ?>
                </h2>

                <!-- Results List -->
                <?php if ($result && $result->num_rows > 0): ?>
                    <ul style="list-style: none; padding-left: 0; font-size: 18px;">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li style="margin-bottom: 8px;">
                                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                <span style="color: #777;">(<?php echo htmlspecialchars($row['type']); ?>)</span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No animals found.</p>
                <?php endif; ?>

            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>© 2025 MyPetGuide. A Constructor University Database Project.</p>
            <p>
                <a href="imprint.html" class="gradlink">Imprint & Disclaimer</a>
            </p>
        </div>
    </footer>

</body>

</html>