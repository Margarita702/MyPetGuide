<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- Header -->
  <header class="header">
    <div class="container header-inner">
      <div class="brand">
        <img src="img/logo.png" alt="logo" width="28" height="28">
        <a href="index.html" class="brand-title">MyPetGuide</a>
      </div>
      <nav>
        <a href="index.html" class="signin">Home</a>
        <a href="maintenance.html" class="signin">Maintenance</a>
        <a href="#" class="signin" onclick="return false;">Sign In</a>
      </nav>
    </div>
  </header>

  <!-- Main content -->
  <main class="container" style="padding:80px 20px 120px; text-align:center;">
    <h1 class="h1" style="font-size:38px;">Search Center</h1>
    <p style="margin-top:10px; max-width:700px; margin-inline:auto;">
      Welcome to the Search Center. Choose a search task below to explore our database.
    </p>

    <section class="section" style="padding-top:40px;">
      <div class="cards">

        <!-- Query 1: Hypoallergenic Animals -->
        <article class="card">
          <img src="img/icon-search.png" class="icon-img" alt="search icon">
          <h3>Hypoallergenic Animals</h3>
          <p>View all animals that are marked as hypoallergenic in the database.</p>
          <a href="search/search_hypoallergenic_form.php" class="gradlink" style="margin-top:auto;">Go to Search →</a>
        </article>

        <!-- Query 2: Top Favorite Animals -->
        <article class="card">
          <img src="img/icon-favourite.png" class="icon-img" alt="heart icon">
          <h3>Top Favorited Animals</h3>
          <p>See which breeds are the most favorited by registered users.</p>
          <a href="search/top_favourites_form.php" class="gradlink" style="margin-top:auto;">Go to Search →</a>
        </article>

        <!-- Query 3: High-Cost Animals -->
        <article class="card">
          <img src="img/icon-money.png" class="icon-img" alt="money icon">
          <h3>High-Cost Animals</h3>
          <p>Find all animals that have a high care cost level.</p>
          <a href="search/search_high_cost_form.php" class="gradlink" style="margin-top:auto;">Go to Search →</a>
        </article>

      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>© 2025 MyPetGuide. A Constructor University Database Project.</p>
      <p style="margin-top: 8px;">
        <a href="imprint.html" class="gradlink">Imprint & Disclaimer</a>
      </p>
    </div>
  </footer>

</body>

</html>