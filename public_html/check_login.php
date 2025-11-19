<?php
session_start();
include 'db/db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT user_id, first_name FROM Registered WHERE email = ? AND user_password = SHA2(?, 256)");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['first_name'] = $user['first_name'];
    header("Location: maintenance.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
