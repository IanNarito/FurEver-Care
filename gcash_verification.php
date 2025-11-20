<?php
session_start();
include 'db/config.php';

// Security check
if (!isset($_SESSION['user_id']) || !isset($_GET['order_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = intval($_GET['order_id']);

// Logic to handle "payment confirmation"
if (isset($_POST['confirm_payment'])) {
    // Update the order status from 'To Pay' to 'To Ship'
    $stmt = $conn->prepare("UPDATE orders SET status = 'To Ship' WHERE id = ? AND user_id = ? AND status = 'To Pay'");
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
    
    // Redirect to success page
    header("Location: order_success.php?id=" . $order_id);
    exit();
}

// Fetch order details to display
$stmt = $conn->prepare("SELECT total_amount FROM orders WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    header("Location: profile.php"); // Order not found
    exit();
}
$order = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .gcash-sim { max-width: 450px; }
        .gcash-logo { height: 40px; }
    </g-style>
</head>
<body class="bg-light">
    <?php include 'partials/navbar.php'; ?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-sm gcash-sim">
            <div class="card-body p-4 p-md-5 text-center">
                <img src="assets/img/gcash logo.png" alt="GCash Logo" class="gcash-logo mb-3">
                <h3 class="fw-bold">GCash Payment Simulation</h3>
                <p class="text-muted">You are about to pay a total of:</p>
                <h1 class="fw-bold my-3" style="color: #0070BA;">₱<?php echo number_format($order['total_amount']); ?></h1>
                <p>This is a simulation. No real payment will be processed. Click "Confirm" to simulate a successful payment.</p>
                <form method="POST">
                    <input type="hidden" name="confirm_payment" value="1">
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: #0070BA; border: none;">Confirm Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
