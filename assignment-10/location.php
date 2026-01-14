<?php
// Get REAL public IP
$ip = trim(@file_get_contents("https://api.ipify.org"));

// Fetch geolocation from ipinfo.io
$data = @file_get_contents("https://ipinfo.io/{$ip}/json?token=3aef2123d235ca");
$info = @json_decode($data, true);

$loc = $info["loc"] ?? null;

if ($loc && strpos($loc, ",") !== false) {
    list($lat, $lon) = explode(",", $loc);
} else {
    $backup = @json_decode(file_get_contents("http://ip-api.com/json/"), true);

    $lat = $backup["lat"] ?? 0;
    $lon = $backup["lon"] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Location - MyPetGuide</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
        <a href="location.php" class="signin" style="font-weight:bold;">My Location</a>
        <a href="search.php" class="signin">🐾 Search</a>
        <a href="maintenance.php" class="signin">Maintenance</a>
        <a href="login.php" class="signin">Sign In</a>
      </nav>
    </div>
  </header>

  <!-- Page content -->
  <main id="main">
    <section class="section">
      <div class="container">
        <h1 class="location-title">Your Location</h1>
        <p class="location-sub">This map shows the approximate region of your IP address.</p>

        <!-- Map container -->
        <div id="map"></div>
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

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- Map logic -->
  <script>
    var lat = <?php echo $lat; ?>;
    var lon = <?php echo $lon; ?>;
    var ip = "<?php echo $ip; ?>";

    var map = L.map('map').setView([lat, lon], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19
    }).addTo(map);

    L.marker([lat, lon])
      .addTo(map)
      .bindPopup("Your IP: " + ip)
      .openPopup();
  </script>

</body>

</html>
