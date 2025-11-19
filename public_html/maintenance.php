<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance</title>
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
        <span class="signin">Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?> 👋</span>
        <a href="logout.php" class="signin">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Main Section -->
  <main id="main">
    <section class="section">
      <div class="container">
        <h1 class="h1">Maintenance Page</h1>
        <p class="sub">Add new data or manage relationships</p>

        <!-- Entities section -->
        <h2 style="margin-top: 40px;">Entities:</h2>
        <div class="cards">
          <article class="card">
            <img src="img/icon-user.png" class="icon-img" alt="user icon">
            <h3>Add Registered User</h3>
            <p>Insert a new registered user with login credentials.</p>
            <a href="entities/registered_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-animal.png" class="icon-img" alt="animal icon">
            <h3>Add Animal</h3>
            <p>Insert a new animal entry with its attributes.</p>
            <a href="entities/animal_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-dog.png" class="icon-img" alt="dog icon">
            <h3>Add Dog</h3>
            <p>Insert a new dog breed (linked to an animal record).</p>
            <a href="entities/dog_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-cat.png" class="icon-img" alt="cat icon">
            <h3>Add Cat</h3>
            <p>Insert a new cat breed (linked to an animal record).</p>
            <a href="entities/cat_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-preference.png" class="icon-img" alt="preference icon">
            <h3>Add Preference</h3>
            <p>Insert a new user preference for an animal attribute.</p>
            <a href="entities/preference_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-preference.png" class="icon-img" alt="essential icon">
            <h3>Add Essential Preference</h3>
            <p>Mark a preference as essential.</p>
            <a href="entities/essential_form.php" class="gradlink">Open Form →</a>
          </article>
        </div>

        <!-- Relationships section -->
        <h2 style="margin-top: 60px;">Relationships:</h2>
        <div class="cards">
          <article class="card">
            <img src="img/icon-favourite.png" class="icon-img" alt="favorite icon">
            <h3>Link Favorite</h3>
            <p>Connect a registered user with an animal as a favorite.</p>
            <a href="relationships/rel_favorite_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-link-sets.png" class="icon-img" alt="sets icon">
            <h3>Link Sets</h3>
            <p>Connect a user to a selected preference.</p>
            <a href="relationships/rel_sets_form.php" class="gradlink">Open Form →</a>
          </article>

          <article class="card">
            <img src="img/icon-fulfill.png" class="icon-img" alt="fulfill icon">
            <h3>Link Fulfill</h3>
            <p>Connect an animal with a fulfilled preference.</p>
            <a href="relationships/rel_fulfill_form.php" class="gradlink">Open Form →</a>
          </article>
        </div>
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
