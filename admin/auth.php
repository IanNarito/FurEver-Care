<?php

session_start();
include '../db/config.php'; // Adjust path as needed

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch user details from DB to verify role
$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if user is an admin
if (!$user || $user['role'] !== 'admin') {
    // If not an admin, destroy session and redirect to login
    session_destroy();
    header("Location: ../login.php?error=unauthorized");
    exit();
}
$stmt->close();
?>