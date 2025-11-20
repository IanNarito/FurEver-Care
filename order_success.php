<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmed! - FurEver Care</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <?php include 'partials/navbar.php'; ?>
  <main class="py-5 bg-light" style="min-height: 60vh;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <div class="card shadow-sm p-5">
            <i class="bi bi-patch-check-fill" style="font-size: 80px; color: var(--main-color);"></i>
            <h2 class="fw-bold mt-4">Thank You For Your Order!</h2>
            <p class="lead text-muted">Your order (ID: #<?php echo htmlspecialchars($_GET['id'] ?? 'N/A'); ?>) has been confirmed and will be processed shortly. You can track its status in your profile.</p>
            <div class="mt-4">
              <a href="shop.php" class="btn btn-primary" style="background-color: var(--main-color); border: none;">Continue Shopping</a>
              <a href="profile.php" class="btn btn-outline-secondary">View My Orders</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include 'partials/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>