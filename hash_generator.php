<?php
$passwordToHash = 'AngelValencia123'; // Use the exact password you want
$hashedPassword = password_hash($passwordToHash, PASSWORD_DEFAULT);
echo "Copy this hash into your database: <br><br>";
echo "<strong>" . $hashedPassword . "</strong>";
?>