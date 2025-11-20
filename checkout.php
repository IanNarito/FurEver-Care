<?php
session_start();
include 'db/config.php';

// User must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=checkout");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user's address (We'll use a placeholder for now)
// In a real app, you'd fetch this from the 'users' table or an 'addresses' table
$user_address = [
    'name' => $_SESSION['username'], // Using username as placeholder
    'phone' => '(+63) 912 345 6789', // Placeholder
    'address' => '123 Main St., Brgy. Poblacion, Quezon City, Metro Manila, 1100' // Placeholder
];

// Fetch cart items for this user
$sql = "SELECT ci.quantity, p.id AS product_id, p.name, p.price, p.image_url 
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.user_id = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$subtotal = 0;
if ($result->num_rows == 0) {
    // Cart is empty, redirect them
    header("Location: cart.php");
    exit();
}
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $subtotal += $row['price'] * $row['quantity'];
}
$stmt->close();

$shipping = 50.00; // Example shipping cost
$total = $subtotal + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Checkout | FurEver Care</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    :root { --main-color: #3ba99c; }
    body { background-color: #f0f2f5; padding-bottom: 120px; }
    .navbar { display: flex; justify-content: space-between; align-items: center; background-color: var(--main-color); padding: 1rem 2rem; }
    .nav-links a { color: white; margin: 0 15px; text-decoration: none; font-weight: 500; }
    .logo img { height: 80px; }
    footer.site-footer { background-color: var(--main-color); color: white; text-align: center; padding: 20px 0; }
    .footer-nav a { color: #e1e1e1; margin: 0 10px; text-decoration: none; }
    .checkout-section { background-color: #ffffff; border-radius: 8px; margin-bottom: 1rem; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05); }
    .checkout-section-header { padding: 1rem 1.5rem; border-bottom: 1px solid #eee; }
    .checkout-section-body { padding: 1.5rem; }
    .address-card { border-top: 3px solid var(--main-color); }
    .address-card-body { display: flex; align-items: flex-start; gap: 1rem; }
    .address-details { flex-grow: 1; }
    .address-actions { font-size: 0.9rem; font-weight: 500; color: var(--main-color); text-decoration: none; }
    .product-list-header { display: flex; justify-content: space-between; color: #555; font-size: 0.9rem; padding: 0 1.5rem 1rem 1.5rem; }
    .product-list-header .product-col { width: 45%; }
    .product-list-header .price-col, .product-list-header .qty-col, .product-list-header .subtotal-col { width: 18%; text-align: center; }
    .shop-header { padding: 1rem 1.5rem; font-weight: 600; border-bottom: 1px solid #eee; }
    .product-item { display: flex; align-items: center; justify-content: space-between; padding: 1.5rem; border-bottom: 1px solid #eee; }
    .product-item img { width: 60px; height: 60px; border-radius: 4px; border: 1px solid #eee; }
    .product-item-details { width: 45%; display: flex; align-items: center; gap: 1rem; }
    .product-item .price-col, .product-item .qty-col, .product-item .subtotal-col { width: 18%; text-align: center; font-size: 0.9rem; }
    .payment-tabs .nav-link { color: #333; border: 1px solid #ddd !important; border-bottom: 1px solid #ddd !important; margin-right: 0.5rem; background-color: #fafafa; }
    .payment-tabs .nav-link.active { color: var(--main-color); border-color: var(--main-color) !important; background-color: #fff; font-weight: 600; }
    .tab-content { padding-top: 1.5rem; }
    .summary-footer { position: sticky; bottom: 0; left: 0; width: 100%; background-color: #ffffff; border-top: 1px solid #e0e0e0; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.08); padding: 1rem 2rem; z-index: 1020; }
    /* We wrap the footer content in a form */
    .summary-footer form { display: flex; justify-content: flex-end; align-items: center; }
    .summary-totals { display: flex; align-items: center; gap: 1.5rem; margin-right: 1.5rem; }
    .total-payment { font-size: 1.5rem; font-weight: 700; color: var(--main-color); }
    .btn-main { background-color: var(--main-color); color: white; border: none; padding: 0.75rem 2.5rem; font-weight: 600; font-size: 1rem; }
    .btn-main:hover { background-color: #329a8f; color: white; }
    .form-check-input:checked { background-color: var(--main-color); border-color: var(--main-color); }
    .gcash-logo { height: 25px; vertical-align: middle; margin-left: 8px; }
  </style>
</head>
<body>

<?php include 'partials/navbar.php'; ?>

  <div class="container my-4">

    <div class="checkout-section address-card">
      <div class="checkout-section-header">
        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-location-dot me-2" style="color: var(--main-color);"></i>Delivery Address</h5>
      </div>
      <div class="address-card-body checkout-section-body">
        <div class="address-details">
          <strong class="d-block"><?php echo htmlspecialchars($user_address['name']); ?> (<?php echo htmlspecialchars($user_address['phone']); ?>)</strong>
          <div class="text-muted">
            <?php echo htmlspecialchars($user_address['address']); ?>
          </div>
        </div>
        <a href="#" class="address-actions">Change</a> </div>
    </div>

    <div class="checkout-section">
      <div class="checkout-section-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Products Ordered</h5>
      </div>
      
      <div class="product-list-header d-none d-md-flex">
        <div class="product-col">Product</div>
        <div class="price-col">Unit Price</div>
        <div class="qty-col">Quantity</div>
        <div class="subtotal-col">Item Subtotal</div>
      </div>

      <div class="shop-group">
        <div class="shop-header">
          <i class="fa-solid fa-shop me-2"></i>
          <strong>FurEver Care Shop</strong>
        </div>
        
        <?php foreach ($cart_items as $item): ?>
        <div class="product-item">
          <div class="product-item-details">
            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
            <span><?php echo htmlspecialchars($item['name']); ?></span>
          </div>
          <div class="price-col">₱<?php echo number_format($item['price']); ?></div>
          <div class="qty-col"><?php echo $item['quantity']; ?></div>
          <div class="subtotal-col fw-semibold">₱<?php echo number_format($item['price'] * $item['quantity']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    
    <form action="php/place_order.php" method="POST" id="checkoutForm">
      
      <input type="hidden" name="shipping_address" value="<?php echo htmlspecialchars($user_address['address']); ?>">

      <div class="checkout-section">
        <div class="checkout-section-body">
          <div class="row gy-3">
            <div class="col-lg-6">
               <div class="d-flex align-items-center">
                  <label for="sellerMessage" class="form-label mb-0 me-3 text-nowrap">Message:</label>
                  <input type="text" class="form-control" id="sellerMessage" name="message" placeholder="Leave a message for the seller...">
               </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
              <div>
                <strong>Shipping Option:</strong> Standard Local
              </div>
              <div class="mx-3">
                <span>₱<?php echo number_format($shipping); ?></span>
              </div>
            </div>
          </div>
          </div>
      </div>

      <div class="checkout-section">
        <div class="checkout-section-header">
          <h5 class="mb-0 fw-bold">Payment Method</h5>
        </div>
        <div class="checkout-section-body">
          
          <ul class="nav nav-tabs payment-tabs" id="paymentTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="cod-tab" data-bs-toggle="tab" data-bs-target="#cod-content" type="button" role="tab" aria-controls="cod-content" aria-selected="true">Cash on Delivery</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ewallet-tab" data-bs-toggle="tab" data-bs-target="#ewallet-content" type="button" role="tab" aria-controls="ewallet-content" aria-selected="false">E-Wallet</button>
            </li>
          </ul>

          <div class="tab-content" id="paymentTabContent">
            <div class="tab-pane fade show active" id="cod-content" role="tabpanel" aria-labelledby="cod-tab">
              <input type="radio" name="payment_method" value="COD" id="payment_cod" checked class="d-none">
              <p class="mb-0">Pay when you receive your order.</p>
            </div>
            <div class="tab-pane fade" id="ewallet-content" role="tabpanel" aria-labelledby="ewallet-tab">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="gcash" value="GCash">
                <label class="form-check-label d-flex align-items-center" for="gcash">
                  <strong class="ms-2">GCash</strong>
                  <img src="assets/img/gcash logo.png" alt="GCash Logo" class="gcash-logo">
                </label>
                <p class="text-muted mt-2 ms-4">You will be redirected to the GCash payment page to confirm payment.</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </form> </div> 
  
  <div class="summary-footer">
    <div class="summary-totals">
      <div class="text-end">
        <div>Merchandise Subtotal: <span class="fw-semibold ms-2">₱<?php echo number_format($subtotal); ?></span></div>
        <div>Shipping Subtotal: <span class="fw-semibold ms-2">₱<?php echo number_format($shipping); ?></span></div>
      </div>
      <div class="d-flex align-items-center">
        <span class="fs-5 me-2">Total Payment:</span>
        <span class="total-payment">₱<?php echo number_format($total); ?></span>
      </div>
    </div>
    <button class="btn btn-main" type="submit" form="checkoutForm">
      Place Order
    </button>
  </div>


  <?php include 'partials/footer.php'; ?>
    $conn->close();
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Simple script to make sure the correct radio button is selected when a tab is clicked
    document.addEventListener('DOMContentLoaded', function() {
      const codTab = document.getElementById('cod-tab');
      const ewalletTab = document.getElementById('ewallet-tab');
      
      codTab.addEventListener('click', function() {
        document.getElementById('payment_cod').checked = true;
      });
      
      ewalletTab.addEventListener('click', function() {
        document.getElementById('gcash').checked = true;
      });
    });
  </script>
</body>
</html>
