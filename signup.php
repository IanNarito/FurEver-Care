<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
include 'db/config.php'; 

$error = "";
$success = "";
$username = ""; 
$email = "";    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $error = "Invalid request. Please try again.";
    } else {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $error = "All fields are required.";
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        }
        elseif (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
            $error = "Username must be 3-20 characters long and can only contain letters, numbers, and underscores.";
        }
        elseif (strlen($password) < 8) {
            $error = "Password must be at least 8 characters long.";
        }
        elseif ($password !== $confirmPassword) {
            $error = "Passwords do not match.";
        } else {
            
            // 7. Check if username or email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $error = "A user with that username or email already exists.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insertStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $insertStmt->bind_param("sss", $username, $email, $hashedPassword);

                if ($insertStmt->execute()) {
                    header("Location: login.php?signup=success");
                    exit();
                } else {
                    error_log("MySQLi execute failed: " . $insertStmt->error); 
                    $error = "An unexpected error occurred. Could not create account.";
                }
                $insertStmt->close();
            }
            $stmt->close();
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
  <title>Sign Up - FurEver Care</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/styles.css">
  
  <style>
    body {
      background-color: #f8f9fa; 
    }
    
    .main-container {
      display: flex;
      min-height: calc(100vh - 76px); /* Full height minus navbar height */
      align-items: center;
      justify-content: center;
      background-size: cover;
    }

    .signup-panel {
      max-width: 900px;
      width: 100%;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 0 .5rem .5rem 0;
    }

    .image-container {
      background: url('https://images.unsplash.com/photo-1596854407944-bf87f6fdd49e?q=80&w=2080&auto=format&fit=crop') no-repeat center center;
      background-size: cover;
      border-radius: .5rem 0 0 .5rem;
    }

    @media (max-width: 767.98px) {
      .image-container { display: none; }
      .form-container { border-radius: .5rem; }
    }
  </style>
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
      <a href="login.php">Shop</a>
      <a href="signup.php">Sign up</a>
      <a href="login.php">Login</a>
    </nav>
  </header>
  
  <main class="main-container py-5 px-4">
    <div class="container">
      <div class="signup-panel card shadow-lg border-0 mx-auto">
        <div class="row g-0">
          
          
          <div class="col-md-6 image-container"></div>
          
          <div class="col-md-6 form-container p-4 p-md-5">
            <div class="text-center mb-4">
              <img src="assets/img/2.png" alt="Logo" class="rounded-circle" style="width: 100px; height: 100px;">
              <h1 class="h3 fw-bold mt-3">Create Your Account</h1>
              <p class="text-muted">Join the FurEver Care family today!</p>
            </div>
            
            <?php if (!empty($error)): ?>
              <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= htmlspecialchars($error) ?>
              </div>
            <?php endif; ?>

            <form method="POST" action="signup.php" class="needs-validation" novalidate>
              <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" value="<?= htmlspecialchars($username) ?>" required>
                <label for="username"><i class="bi bi-person-fill me-2"></i>Username</label>
                <div class="invalid-feedback">Please choose a username.</div>
              </div>
              
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com" value="<?= htmlspecialchars($email) ?>" required>
                <label for="email"><i class="bi bi-envelope-fill me-2"></i>Email Address</label>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                <label for="password"><i class="bi bi-lock-fill me-2"></i>Password</label>
                <div class="form-text">Password must be at least 8 characters long.</div>
                <div class="invalid-feedback">Please create a password.</div>
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                <label for="confirmPassword"><i class="bi bi-check-circle-fill me-2"></i>Confirm Password</label>
                <div class="invalid-feedback">Please confirm your password.</div>
              </div>

              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success btn-lg">Create Account</button>
              </div>

              <div class="text-center mt-4">
                <p class="text-muted">Already have an account? <a href="login.php" class="fw-bold text-decoration-none">Login Here</a></p>
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