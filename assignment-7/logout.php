<?php
session_start();       // Start the session if not already started
session_unset();       // Remove all session variables
session_destroy();     // Destroy the session completely

header("Location: login.php"); // Redirect to login page
exit();
?>
