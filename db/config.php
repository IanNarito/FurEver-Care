<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "furevercare";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->Connect_error);
}
?>