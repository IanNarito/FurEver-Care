<?php
// process_appointment.php (Corrected)
include 'db/config.php'; // Your database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Data Validation and Sanitization ---
    // These now match your form's 'name' attributes
    $fullName = trim($_POST['owner_name']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phone']);
    $petName = trim($_POST['pet_name']);
    $petType = trim($_POST['pet_type']);
    $service = trim($_POST['service']);
    $appointmentDate = trim($_POST['date']); // Already in YYYY-MM-DD format
    $appointmentTime = trim($_POST['time']); // Already in HH:MM format
    $notes = trim($_POST['notes']);

    // Basic validation
    if (empty($fullName) || empty($email) || empty($phoneNumber) || empty($petName) || empty($appointmentDate) || empty($appointmentTime)) {
        header("Location: appointment.html?error=emptyfields");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: appointment.html?error=invalidemail");
        exit();
    }
    
    // --- Database Insertion with Prepared Statement ---
    $sql = "INSERT INTO appointments (full_name, email, phone_number, pet_name, pet_type, service, appointment_date, preferred_time, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        // Log the error for debugging instead of showing a generic message
        error_log("MySQLi prepare failed: " . $conn->error);
        header("Location: appointment.html?error=dberror");
        exit();
    }

    // Bind the variables to the prepared statement
    $stmt->bind_param("sssssssss", $fullName, $email, $phoneNumber, $petName, $petType, $service, $appointmentDate, $appointmentTime, $notes);

    if ($stmt->execute()) {
        // Success
        header("Location: appointment.html?status=success");
        exit();
    } else {
        // Log the execution error
        error_log("MySQLi execute failed: " . $stmt->error);
        header("Location: appointment.html?error=dberror");
        exit();
    }

    $stmt->close();
    $conn->close();

} else {
    // If not a POST request, redirect back to the form
    header("Location: appointment.html");
    exit();
}
?>