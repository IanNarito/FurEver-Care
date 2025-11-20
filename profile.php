<?php
session_start();

// Security Check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db/config.php'; 

$userId = $_SESSION['user_id'];

// --- 1. Fetch User Info ---
$stmt = $conn->prepare("SELECT username, email, profile_picture_path FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); // We assume user exists from login
$stmt->close();

$profilePic = $user['profile_picture_path'] ?: 'assets/img/default_avatar.png';
$message = $_GET['message'] ?? '';


// --- 2. Fetch "My Cart" Items ---
$cart_items = [];
$sql_cart = "SELECT ci.id, ci.quantity, p.id AS product_id, p.name, p.price, p.image_url 
             FROM cart_items ci
             JOIN products p ON ci.product_id = p.id
             WHERE ci.user_id = ?";
$stmt_cart = $conn->prepare($sql_cart);
$stmt_cart->bind_param("i", $userId);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();
while ($row = $result_cart->fetch_assoc()) {
    $cart_items[] = $row;
}
$stmt_cart->close();


// --- 3. Fetch "All Orders" and Their Items ---
$orders = [];
// ======================================================
// CHANGE 1: Added o.payment_method to the SQL query
// ======================================================
$sql_orders = "SELECT 
                    o.id AS order_id, 
                    o.total_amount, 
                    o.status, 
                    o.payment_method, 
                    o.order_date,
                    oi.quantity, 
                    oi.price AS price_per_item,
                    p.name AS product_name,
                    p.image_url AS product_image
                FROM orders o
                JOIN order_items oi ON o.id = oi.order_id
                JOIN products p ON oi.product_id = p.id
                WHERE o.user_id = ?
                ORDER BY o.order_date DESC";
                
$stmt_orders = $conn->prepare($sql_orders);
$stmt_orders->bind_param("i", $userId);
$stmt_orders->execute();
$result_orders = $stmt_orders->get_result();

while ($row = $result_orders->fetch_assoc()) {
    $order_id = $row['order_id'];
    
    if (!isset($orders[$order_id])) {
        $orders[$order_id] = [
            'id' => $order_id,
            'total_amount' => $row['total_amount'],
            'status' => $row['status'],
            // ======================================================
            // CHANGE 2: Store the payment_method in the array
            // ======================================================
            'payment_method' => $row['payment_method'],
            'order_date' => $row['order_date'],
            'items' => []
        ];
    }
    
    $orders[$order_id]['items'][] = [
        'name' => $row['product_name'],
        'image' => $row['product_image'],
        'quantity' => $row['quantity'],
        'price' => $row['price_per_item']
    ];
}
$stmt_orders->close();

// --- 4. Sort Orders into Status Buckets ---
$orders_to_pay = [];
$orders_to_ship = [];
$orders_to_receive = [];
$orders_completed = [];

foreach ($orders as $order) {
    switch ($order['status']) {
        case 'To Pay':
            $orders_to_pay[] = $order;
            break;
        case 'To Ship':
            $orders_to_ship[] = $order;
            break;
        case 'To Receive':
            $orders_to_receive[] = $order;
            break;
        case 'Completed':
            $orders_completed[] = $order;
            break;
    }
}

// --- 5. Helper Functions (Unchanged) ---
function display_empty_tab_message($icon, $message) {
    echo '<div class="text-center p-5">
            <i class="bi ' . $icon . '" style="font-size: 80px; color: #ccc;"></i>
            <h5 class="mt-3 text-muted">' . $message . '</h5>
          </div>';
}
function display_product_list($items, $is_cart = false) {
    foreach ($items as $item) {
        $item_total = $item['price'] * $item['quantity'];
        echo '<div class="d-flex align-items-center mb-3 p-2 border-bottom">
                <img src="' . htmlspecialchars($item['image_url'] ?? $item['image']) . '" alt="" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;" class="me-3">
                <div class="flex-grow-1">
                    <h6 class="mb-0">' . htmlspecialchars($item['name'] ?? $item['product_name']) . '</h6>
                    <small class="text-muted">Quantity: ' . htmlspecialchars($item['quantity']) . '</small>
                </div>
                <div class="text-end">
                    <span class="fw-bold text-dark">₱' . number_format($item_total) . '</span>
                </div>
              </div>';
    }
    if ($is_cart) {
        echo '<div class="text-end mt-3">
                <a href="cart.php" class="btn btn-primary" style="background-color: var(--theme-color); border: none;">Go to Cart</a>
              </div>';
    }
}
function display_order_card($order, $action_button_html = '') {
    // Determine badge color by status
    $status_badge_class = 'bg-secondary'; // default
    if ($order['status'] == 'To Pay') $status_badge_class = 'bg-warning text-dark';
    if ($order['status'] == 'To Ship') $status_badge_class = 'bg-info text-dark';
    if ($order['status'] == 'To Receive') $status_badge_class = 'bg-primary';
    if ($order['status'] == 'Completed') $status_badge_class = 'bg-success';

    echo '<div class="card shadow-sm mb-3">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div>
                    <strong>Order ID:</strong> #' . sprintf('%06d', $order['id']) . '
                </div>
                <span class="badge ' . $status_badge_class . '">' . htmlspecialchars($order['status']) . '</span>
            </div>
            <div class="card-body p-2 p-md-3">';
    
    display_product_list($order['items']);
    
    echo '  </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>' . $action_button_html . '</div>
                <div class="text-end">
                    <strong>Order Total: <span class="fs-5 text-dark">₱' . number_format($order['total_amount']) . '</span></strong>
                </div>
            </div>
          </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - FurEver Care</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root { --theme-color: #3ba99c; }
    .profile-picture { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); position: relative; }
    .profile-pic-container { position: relative; display: inline-block; }
    .change-pic-btn { position: absolute; bottom: 5px; right: 5px; background-color: rgba(0,0,0,0.6); color: #fff; border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; transition: background-color 0.3s; }
    .change-pic-btn:hover { background-color: rgba(0,0,0,0.8); color: #fff; }
    .nav-tabs .nav-link { color: #6c757d; font-weight: 500; }
    .nav-tabs .nav-link.active { color: var(--theme-color); border-color: var(--theme-color) var(--theme-color) #fff; border-bottom-width: 3px; }
  </style>
</head>
<body>

  <?php include 'partials/navbar.php'; ?>

  <main class="py-5 bg-light">
    <div class="container">
      
      <?php if ($message): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($message) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4 p-md-5">
          <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
              <div class="profile-pic-container">
                <img src="<?= htmlspecialchars($profilePic) ?>" alt="Profile Picture" class="profile-picture">
                <a href="#" class="change-pic-btn" data-bs-toggle="modal" data-bs-target="#uploadPicModal" title="Change Picture">
                  <i class="bi bi-camera-fill"></i>
                </a>
              </div>
              <h2 class="h4 fw-bold mt-3">Welcome, <br> <?= htmlspecialchars($user['username']) ?>!</h2>
            </div>
            <div class="col-md-8">
              <h3 class="fw-bold border-bottom pb-2 mb-4">Account Details</h3>
              <div class="mb-3">
                <strong class="d-block text-muted">Username</strong>
                <p class="fs-5"><?= htmlspecialchars($user['username']) ?></p>
              </div>
              <div class="mb-3">
                <strong class="d-block text-muted">Email Address</strong>
                <p class="fs-5"><?= htmlspecialchars($user['email']) ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-header p-0">
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-cart-tab" data-bs-toggle="tab" data-bs-target="#nav-cart" type="button" role="tab">
                <i class="bi bi-cart-fill me-1"></i> My Cart
              </button>
              <button class="nav-link" id="nav-pay-tab" data-bs-toggle="tab" data-bs-target="#nav-pay" type="button" role="tab">
                <i class="bi bi-wallet-fill me-1"></i> To Pay
              </button>
              <button class="nav-link" id="nav-ship-tab" data-bs-toggle="tab" data-bs-target="#nav-ship" type="button" role="tab">
                <i class="bi bi-truck me-1"></i> To Ship
              </button>
              <button class="nav-link" id="nav-receive-tab" data-bs-toggle="tab" data-bs-target="#nav-receive" type="button" role="tab">
                <i class="bi bi-box-seam-fill me-1"></i> To Receive
              </button>
              <button class="nav-link" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab">
                <i class="bi bi-check-circle-fill me-1"></i> Completed
              </button>
            </div>
          </nav>
        </div>
        <div class="card-body p-4">
          <div class="tab-content" id="nav-tabContent">
            
            <div class="tab-pane fade show active" id="nav-cart" role="tabpanel" aria-labelledby="nav-cart-tab">
              <?php if (empty($cart_items)): ?>
                <?php display_empty_tab_message('bi-cart-x', 'You have no items in your cart.'); ?>
              <?php else: ?>
                <h5 class="fw-bold mb-3">Your Shopping Cart</h5>
                <?php display_product_list($cart_items, true); ?>
              <?php endif; ?>
            </div>
            
            <div class="tab-pane fade" id="nav-pay" role="tabpanel" aria-labelledby="nav-pay-tab">
              <?php if (empty($orders_to_pay)): ?>
                <?php display_empty_tab_message('bi-wallet-fill', 'You have no orders awaiting payment.'); ?>
              <?php else: ?>
                <?php foreach ($orders_to_pay as $order): ?>
                  <?php 
                  // ======================================================
                  // CHANGE 3: Smartly show button based on payment method
                  // ======================================================
                  $action_html = ''; // Start with empty
                  if ($order['payment_method'] == 'GCash') {
                      $action_html = '<a href="gcash_verification.php?order_id=' . $order['id'] . '" class="btn btn-sm btn-primary" style="background-color: #0070BA; border: none;">Pay Now</a>';
                  } elseif ($order['payment_method'] == 'COD') {
                      $action_html = '<span class="text-muted fst-italic">Pay upon delivery</span>';
                  }
                  display_order_card($order, $action_html); 
                  ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <div class="tab-pane fade" id="nav-ship" role="tabpanel" aria-labelledby="nav-ship-tab">
              <?php if (empty($orders_to_ship)): ?>
                <?php display_empty_tab_message('bi-truck', 'You have no orders being prepared for shipment.'); ?>
              <?php else: ?>
                <?php foreach ($orders_to_ship as $order): ?>
                  <?php 
                  $shipping_message = '<span class="text-muted fst-italic">Your order is being prepared.</span>';
                  display_order_card($order, $shipping_message); 
                  ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <div class="tab-pane fade" id="nav-receive" role="tabpanel" aria-labelledby="nav-receive-tab">
              <?php if (empty($orders_to_receive)): ?>
                <?php display_empty_tab_message('bi-box-seam-fill', 'You have no orders on the way.'); ?>
              <?php else: ?>
                <?php foreach ($orders_to_receive as $order): ?>
                  <?php 
                  $receive_button = '<button class="btn btn-sm btn-success">Order Received</button>'; // This would need JS/PHP
                  display_order_card($order, $receive_button); 
                  ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
              <?php if (empty($orders_completed)): ?>
                <?php display_empty_tab_message('bi-check-circle-fill', 'You have no completed orders.'); ?>
              <?php else: ?>
                <?php foreach ($orders_completed as $order): ?>
                  <?php display_order_card($order); ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>
  </main>

  <div class="modal fade" id="uploadPicModal" tabindex="-1" aria-labelledby="uploadPicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadPicModalLabel">Change Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="php/upload_picture.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <p>Please choose a new photo. Max 5MB. (JPG, PNG, GIF)</p>
            <input type="file" name="profilePicture" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'partials/footer.php'; ?>
  <?php $conn->close(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>