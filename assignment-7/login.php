<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
                <a href="search.php" class="signin">🐾 Search</a>
                <a href="maintenance.php" class="signin">Maintenance</a>
                <a href="login.php" class="signin active">Sign In</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main">
        <section class="section">
            <div class="container" style="max-width: 420px; margin-top: 60px;">
                <div class="card" style="padding: 24px; text-align: center;">
                    <img src="img/icon-user.png" alt="user icon" width="60" style="margin-bottom: 16px;">
                    <h2 class="h1" style="margin-bottom: 10px;">Sign In</h2>
                    <p class="sub" style="margin-bottom: 24px;">Access your account to manage your favourites and preferences.</p>

                    <!-- Login Form -->
                    <form action="check_login.php" method="POST">
                        <label for="email" class="form-label">Email</label><br>
                        <input type="email" id="email" name="email" class="form-input" required><br><br>

                        <label for="password" class="form-label">Password</label><br>
                        <input type="password" id="password" name="password" class="form-input" required><br><br>

                        <input type="submit" value="Login" class="button" style="width: 100%; margin-top: 10px;">
                    </form>

                    <!-- Error message -->
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<p style='color: red; margin-top: 16px;'>Invalid email or password.</p>";
                    }
                    ?>
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