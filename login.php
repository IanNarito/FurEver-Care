<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
include 'db/config.php'; 
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $error = "Invalid request. Please try again.";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $error = "Please enter both username and password.";
        } else {
            $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
            if ($stmt) {
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 1) {
                    $stmt->bind_result($id, $dbUsername, $dbPasswordHash);
                    $stmt->fetch();

                    if (password_verify($password, $dbPasswordHash)) {
                        session_regenerate_id(true); 

                        $_SESSION['user_id'] = $id;
                        $_SESSION['username'] = $dbUsername;
                        header("Location: shop.html");
                        exit();
                    }
                }
                $error = "Invalid username or password.";
                $stmt->close();
            } else {
                // Database or statement preparation error
                error_log("MySQLi prepare failed: " . $conn->error); 
                $error = "An unexpected error occurred. Please try again later.";
            }
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - FurEver Care</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

  <header class="navbar">
    <a href="home.html" class="logo">
      <img src="assets/img/MAINLOGO.jpg" alt="FurEver Care Logo">
    </a>
    <nav class="nav-links">
      <a href="#services">Services Offered</a>
      <a href="appointment.html">Book an Appointment</a>
      <a href="adopt.html">Adopt a Pet</a>
      <a href="shop.html">Shop</a>
      <a href="signup.php">Sign up</a>
      <a href="login.php">Login</a>
    </nav>
  </header>
  
<main class="main-container py-5 px-4">
    <div class="container">
      <div class="login-panel card shadow-lg border-0 mx-auto">
        <div class="row g-0">
          
          
          <div class="col-md-6 login-image-container"></div>
          
          <div class="col-md-6 login-form-container p-4 p-md-5">
            <div class="text-center mb-4">
              <img src="assets/img/2.png" alt="Logo" class="rounded-circle" style="width: 100px; height: 100px;">
              <h1 class="h3 fw-bold mt-3">Welcome Back!</h1>
              <p class="text-muted">Login to continue to FurEver Care.</p>
            </div>
            
            <?php if (!empty($error)): ?>
              <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= htmlspecialchars($error) ?>
              </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="needs-validation" novalidate>
              <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                <label for="username"><i class="bi bi-person-fill me-2"></i>Username</label>
                <div class="invalid-feedback">
                  Please enter your username.
                </div>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                <label for="password"><i class="bi bi-lock-fill me-2"></i>Password</label>
                 <div class="invalid-feedback">
                  Please enter your password.
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mb-4">
                 <a href="forgot-password.php" class="form-text text-decoration-none">Forgot Password?</a>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">Log In</button>
              </div>

              <div class="text-center mt-4">
                <p class="text-muted">Don't have an account? <a href="signup.php" class="fw-bold text-decoration-none">Sign Up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

    <footer class="site-footer">
    <div class="footer-container">
      <p>&copy; 2025 Furever Care. All Rights Reserved.</p>
      <nav class="footer-nav">
        <a href="#services">Services</a>
        <a href="#why">Why Choose Us</a>
        <a href="#adoption">Adopt</a>
        <a href="#comments">Comments</a>
      </nav>
    </div>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>
</html>