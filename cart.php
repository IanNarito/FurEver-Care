<?php
session_start();
include 'db/config.php';

// User must be logged in to see their cart
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=cart");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for this user
// We JOIN with the products table to get names, prices, and images
$sql = "SELECT 
            ci.id AS cart_item_id, 
            ci.quantity, 
            p.id AS product_id, 
            p.name, 
            p.price, 
            p.image_url 
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.user_id = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$subtotal = 0;
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
  <title>Your Cart | FurEver Care</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root { --main-color: #3ba99c; }
    body { background-color: #f8f9fa; }
    .navbar { display: flex; justify-content: space-between; align-items: center; background-color: var(--main-color); padding: 1rem 2rem; }
    .nav-links a { color: white; margin: 0 15px; text-decoration: none; font-weight: 500; }
    .logo img { height: 80px; }
    .cart-table { width: 100%; background-color: white; border-radius: 10px; overflow: hidden; }
    .cart-table thead { background-color: var(--main-color); color: white; }
    .cart-table th, .cart-table td { padding: 1rem; vertical-align: middle; text-align: center; }
    .cart-table img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
    .quantity-input { width: 60px; text-align: center; }
    .btn-checkout { background-color: var(--main-color); color: white; font-weight: bold; }
    .btn-checkout:hover { background-color: #2f867b; color: white; }
    footer.site-footer { background-color: var(--main-color); color: white; text-align: center; padding: 20px 0; margin-top: 4rem; }
    .footer-nav a { color: #e1e1e1; margin: 0 10px; text-decoration: none; }
  </style>
</head>
<body>

  <?php include 'partials/navbar.php'; ?>

  <div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Your Shopping Cart</h2>

    <?php if (empty($cart_items)): ?>
      <div class="card shadow-sm text-center p-5">
        <i class="bi bi-cart-x" style="font-size: 80px; color: #ccc;"></i>
        <h3 class="mt-3">Your Cart is Empty</h3>
        <p class="text-muted">Looks like you haven't added any items to your cart yet.</p>
        <div class="mt-3">
          <a href="shop.php" class="btn btn-primary btn-checkout">Start Shopping</a>
        </div>
      </div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table cart-table shadow-sm">
          <thead>
            <tr>
              <th>Product</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cart_items as $item): ?>
              <tr data-cart-item-id="<?php echo $item['cart_item_id']; ?>">
                <td>
                  <div class="d-flex align-items-center justify-content-center">
                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="me-3" />
                    <span><?php echo htmlspecialchars($item['name']); ?></span>
                  </div>
                </td>
                <td class="unit-price">₱<?php echo number_format($item['price']); ?></td>
                <td>
                  <div class="input-group" style="width: 130px; margin: auto;">
                    <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                    <input type="text" class="form-control quantity-input" value="<?php echo $item['quantity']; ?>" readonly>
                    <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                  </div>
                </td>
                <td class="total-price">₱<?php echo number_format($item['price'] * $item['quantity']); ?></td>
                <td>
                  <button class="btn btn-danger btn-sm btn-delete">
                    <i class="bi bi-trash-fill"></i> Delete
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="row justify-content-end mt-4">
        <div class="col-md-5">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Cart Summary</h4>
              <div class="d-flex justify-content-between mb-2">
                <span>Merchandise Subtotal:</span>
                <span id="summary-subtotal">₱<?php echo number_format($subtotal); ?></span>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span>Shipping Fee:</span>
                <span id="summary-shipping">₱<?php echo number_format($shipping); ?></span>
              </div>
              <hr>
              <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total Payment:</span>
                <span id="summary-total">₱<?php echo number_format($total); ?></span>
              </div>
              <div class="d-grid mt-4">
                <a href="checkout.php" class="btn btn-checkout btn-lg">Proceed to Checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <?php include 'partials/footer.php'; ?>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      
      // --- Update Cart Function ---
      function updateCart(cartItemId, action) {
        const formData = new FormData();
        formData.append('cart_item_id', cartItemId);
        formData.append('action', action);

        fetch('php/update_cart.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Update UI
            const row = document.querySelector(`tr[data-cart-item-id="${cartItemId}"]`);
            if (action === 'delete') {
              row.remove();
            } else {
              row.querySelector('.quantity-input').value = data.newQuantity;
              row.querySelector('.total-price').innerText = `₱${data.newTotalPrice.toLocaleString()}`;
            }
            // Update summary
            document.getElementById('summary-subtotal').innerText = `₱${data.newSubtotal.toLocaleString()}`;
            document.getElementById('summary-total').innerText = `₱${data.newTotal.toLocaleString()}`;
            // Update navbar count
            updateCartCount(data.cartCount);
            
            // Check if cart is now empty
            if (data.cartCount === 0) {
              location.reload(); // Reload page to show "Empty Cart" message
            }
          } else {
            alert(data.message);
          }
        })
        .catch(console.error);
      }
      
      // --- Event Listeners ---
      document.querySelectorAll('.btn-increase').forEach(btn => {
        btn.addEventListener('click', e => {
          const cartItemId = e.target.closest('tr').dataset.cartItemId;
          updateCart(cartItemId, 'increase');
        });
      });
      
      document.querySelectorAll('.btn-decrease').forEach(btn => {
        btn.addEventListener('click', e => {
          const cartItemId = e.target.closest('tr').dataset.cartItemId;
          updateCart(cartItemId, 'decrease');
        });
      });
      
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', e => {
          const cartItemId = e.target.closest('tr').dataset.cartItemId;
          if (confirm('Are you sure you want to remove this item?')) {
            updateCart(cartItemId, 'delete');
          }
        });
      });
      
      // Function to update navbar count
      function updateCartCount(count) {
        const cartBadge = document.getElementById('cart-count-badge');
        if (cartBadge) {
          if (count > 0) {
            cartBadge.innerText = count;
            cartBadge.style.display = 'inline-block';
          } else {
            cartBadge.style.display = 'none';
          }
        }
      }
    });
  </script>
  <?php $conn->close(); // <-- ADD THIS LINE HERE ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
