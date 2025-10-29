<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Top Favorited Animals - MyPetGuide</title>
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
  <a href="../search.php" class="back-home">← Back to Search Center</a>  
  <h1 class="h1" style="font-size:38px;">Top 3 Most Loved Pets</h1>
    <p class="sub">Take a look at the current stars!</p>

    <div class="container" style="grid-template-columns:1fr;">
      <div class="container">
        <h3>Press the button to see the favourite pets.</h3>
  <form action="top_favourites_result.php" method="GET" style="margin-top:20px;">
    <button type="submit" class="signin">Show Top Favorites</button>
  </form>
      </div>
    </div>
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
