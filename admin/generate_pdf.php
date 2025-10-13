<?php
// admin/generate_pdf.php
require_once 'auth.php'; // Security check
require_once '../vendor/autoload.php'; // Composer autoloader

// Use the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// Get appointment ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Appointment ID.");
}
$appointmentId = intval($_GET['id']);

// Fetch appointment details from the database
$stmt = $conn->prepare("SELECT * FROM appointments WHERE id = ?");
$stmt->bind_param("i", $appointmentId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Appointment not found.");
}
$appointment = $result->fetch_assoc();
$stmt->close();
$conn->close();

// --- HTML Template for the PDF ---
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Details</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 0; padding: 0; color: #333; }
        .container { padding: 30px; }
        .header { text-align: center; border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { margin: 0; color: #0056b3; }
        .details-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .details-table th, .details-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .details-table th { background-color: #f2f2f2; font-weight: bold; }
        .footer { text-align: center; margin-top: 40px; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FurEver Care Appointment Confirmation</h1>
            <p>Appointment ID: #' . sprintf('%06d', $appointment['id']) . '</p>
        </div>
        
        <h2>Appointment Details</h2>
        <table class="details-table">
            <tr><th>Client Name</th><td>' . htmlspecialchars($appointment['full_name']) . '</td></tr>
            <tr><th>Email Address</th><td>' . htmlspecialchars($appointment['email']) . '</td></tr>
            <tr><th>Phone Number</th><td>' . htmlspecialchars($appointment['phone_number']) . '</td></tr>
            <tr><th>Pet Name</th><td>' . htmlspecialchars($appointment['pet_name']) . '</td></tr>
            <tr><th>Pet Type</th><td>' . htmlspecialchars($appointment['pet_type']) . '</td></tr>
            <tr><th>Service Requested</th><td>' . htmlspecialchars($appointment['service']) . '</td></tr>
            <tr><th>Date</th><td>' . date('F j, Y', strtotime($appointment['appointment_date'])) . '</td></tr>
            <tr><th>Time</th><td>' . date('h:i A', strtotime($appointment['preferred_time'])) . '</td></tr>
            <tr><th>Status</th><td>' . htmlspecialchars($appointment['status']) . '</td></tr>
        </table>

        <h2>Additional Notes</h2>
        <table class="details-table">
            <tr><td>' . (empty($appointment['notes']) ? 'No additional notes provided.' : nl2br(htmlspecialchars($appointment['notes']))) . '</td></tr>
        </table>
        
        <div class="footer">
            <p>Thank you for choosing FurEver Care. Please arrive 10 minutes before your scheduled time.</p>
            <p>Generated on: ' . date("F j, Y, g:i a") . '</p>
        </div>
    </div>
</body>
</html>
';

// --- PDF Generation ---
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the generated PDF to Browser (inline view)
$dompdf->stream("appointment-" . $appointment['id'] . ".pdf", ["Attachment" => false]);
exit();
?>