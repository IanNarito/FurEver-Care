<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FurEver Clothes Shop</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/clothes.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    .product-card {
      cursor: pointer;
      display: block;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <?php include 'partials/navbar.php'; ?>

  <section class="py-4" style="background-color: #e1efed;">
    <div class="container text-center">
      <h2 class="mb-4 fw-bold">Shop by Category</h2>
      <div class="row justify-content-center g-4">
        
        <div class="col-6 col-md-2">
          <a href="toys.php" class="text-decoration-none text-dark">
            <div class="category-card bg-white p-3 shadow-sm rounded">
              <h6>Toys</h6>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="food.php" class="text-decoration-none text-dark">
            <div class="category-card bg-white p-3 shadow-sm rounded">
              <h6>Food</h6>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="clothes.php" class="text-decoration-none text-dark">
            <div class="category-card bg-white p-3 shadow-sm rounded">
              <h6>Accessories</h6>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="PetHealthWellness.php" class="text-decoration-none text-dark">
            <div class="category-card bg-white p-3 shadow-sm rounded">
              <h6>Pet Health & Wellness</h6>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>

  <section class="py-5 shop-section">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Clothes And Accessories</h2>

      <div class="row g-4">

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="25"
             data-name="Dinosaur Clothes"
             data-price="₱899"
             data-img="assets/img/dinosaur.png"
             data-description="Transform your pet into a prehistoric cutie with this soft, green dinosaur hoodie. Perfect for costume parties or keeping warm on chilly days.">
            <div class="card shadow-sm h-100 text-center">
              <img src="assets/img/dinosaur.png" class="card-img-top" alt="Dinosaur Clothes">
              <div class="card-body">
                <h6 class="fw-bold text-dark">Dinosaur Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="25">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="26"
             data-name="Blue Dinosaur Clothes"
             data-price="₱899"
             data-img="assets/img/Blue Dinosaur.png"
             data-description="A cute blue variation of our popular dinosaur costume. Made from breathable fabric to ensure comfort while looking adorable.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/Blue Dinosaur.png" class="card-img-top" alt="Blue Dinosaur Clothes" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Blue Dinosaur Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="26">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="27"
             data-name="Pig Clothes"
             data-price="₱899"
             data-img="assets/img/pig.png"
             data-description="Turn your fur baby into a little piglet with this pink, cozy outfit. Features cute ears and a curly tail design for maximum cuteness.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/pig.png" class="card-img-top" alt="Pig Clothes" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Pig Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="27">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="28"
             data-name="Cow Clothes"
             data-price="₱899"
             data-img="assets/img/cow.png"
             data-description="Moo-ve over for this adorable cow print jumpsuit! Soft fleece material keeps your pet warm and stylish during walks.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/cow.png" class="card-img-top" alt="Cow Clothes" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Cow Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="28">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="29"
             data-name="Pikachu Clothes"
             data-price="₱899"
             data-img="assets/img/pikachu.png"
             data-description="Electrify your pet's style with this yellow electric-mouse costume. Great for anime fans and cosplay events.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/pikachu.png" class="card-img-top" alt="Pikachu Clothes" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Pikachu Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="29">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="30"
             data-name="Totoro Clothes"
             data-price="₱899"
             data-img="assets/img/totoro.png"
             data-description="Inspired by the forest spirit, this gray fluffy costume is perfect for cuddles and photo ops. Includes the signature leaf on top!">
            <div class="card shadow-sm h-100">
              <img src="assets/img/totoro.png" class="card-img-top" alt="Totoro Clothes" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Totoro Clothes</h6>
                <p class="text-muted mb-1">₱899</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="30">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="31"
             data-name="Princess Skirt With Cute Bowknot"
             data-price="₱999"
             data-img="assets/img/Princess Skirt With Cute Bowknot.png"
             data-description="An elegant dress for your little princess. Features a lace skirt and a large bowknot, perfect for birthdays or special occasions.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/Princess Skirt With Cute Bowknot.png" class="card-img-top" alt="Princess Skirt With Cute Bowknot" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Princess Skirt With Cute Bowknot</h6>
                <p class="text-muted mb-1">₱999</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="31">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="#" class="text-decoration-none product-card"
             data-bs-toggle="modal" data-bs-target="#productModal"
             data-id="32"
             data-name="Purple Bunny Hat"
             data-price="₱499"
             data-img="assets/img/Purple Bunny Hat.png"
             data-description="A simple yet cute accessory. This purple bunny hat keeps ears warm and adds a touch of whimsy without a full body costume.">
            <div class="card shadow-sm h-100">
              <img src="assets/img/Purple Bunny Hat.png" class="card-img-top" alt="Purple Bunny Hat" />
              <div class="card-body text-center">
                <h6 class="fw-bold">Purple Bunny Hat</h6>
                <p class="text-muted mb-1">₱499</p>
                <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="32">Add to Cart</button>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>

  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Product Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modal-product-img" src="" class="img-fluid mb-3" alt="Product Image" style="max-height: 200px; object-fit: contain;">
          <h4 id="modal-product-name" class="fw-bold"></h4>
          <p class="text-muted fs-5" id="modal-product-price"></p>
          <p id="modal-product-description" class="text-start"></p>
          <hr>
          <button id="modal-add-to-cart-btn" class="btn btn-lg btn-success w-100 btn-add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  <footer class="site-footer mt-5">
    <div class="container">
      <p>&copy; 2025 FurEver Care. All Rights Reserved.</p>
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
    document.addEventListener('DOMContentLoaded', () => {
      
      // 1. Handle Modal Data Populating
      const productModal = document.getElementById('productModal');
      if (productModal) {
        productModal.addEventListener('show.bs.modal', event => {
          // Button/Link that triggered the modal
          const button = event.relatedTarget;
          
          // Extract info from data-* attributes
          const name = button.getAttribute('data-name');
          const price = button.getAttribute('data-price');
          const img = button.getAttribute('data-img');
          const description = button.getAttribute('data-description');
          const id = button.getAttribute('data-id'); // We need this ID

          // Update the modal's content
          document.getElementById('modal-product-name').textContent = name;
          document.getElementById('modal-product-price').textContent = price;
          document.getElementById('modal-product-img').src = img;
          document.getElementById('modal-product-description').textContent = description;
          
          // Pass the ID to the Modal's Add to Cart button
          const modalBtn = document.getElementById('modal-add-to-cart-btn');
          modalBtn.setAttribute('data-product-id', id);
          
          // Reset button visual state
          modalBtn.innerHTML = 'Add to Cart';
          modalBtn.classList.remove('btn-outline-success');
          modalBtn.classList.add('btn-success');
          modalBtn.disabled = false;
        });
      }

      // 2. Unified Add to Cart Logic
      const isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
      
      const attachCartListeners = () => {
        const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
        
        addToCartButtons.forEach(button => {
            // Clean slate: replace element to remove old listeners
            const newButton = button.cloneNode(true);
            button.parentNode.replaceChild(newButton, button);

            newButton.addEventListener('click', (e) => {
            e.preventDefault();
            
            // If clicking the button on the card, prevent it from opening the modal
            e.stopPropagation(); 

            if (!isUserLoggedIn) {
                alert('Please log in to add items to your cart.');
                window.location.href = 'login.php';
                return;
            }

            const productId = newButton.dataset.productId;
            
            if(!productId) {
                console.error("No product ID found!");
                return;
            }

            const originalText = newButton.innerHTML;

            newButton.innerHTML = 'Adding...';
            newButton.disabled = true;

            const formData = new FormData();
            formData.append('product_id', productId);

            fetch('php/add_to_cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    newButton.innerHTML = 'Added!';
                    newButton.classList.remove('btn-outline-success');
                    newButton.classList.add('btn-success');
                    
                    updateCartCount(data.cartCount);
                } else {
                    alert(data.message);
                    newButton.innerHTML = originalText;
                    newButton.disabled = false;
                }

                setTimeout(() => {
                    newButton.innerHTML = 'Add to Cart';
                    // Reset logic: if modal button, keep solid; if card button, revert to outline
                    if(newButton.id !== 'modal-add-to-cart-btn') {
                        newButton.classList.remove('btn-success');
                        newButton.classList.add('btn-outline-success');
                    }
                    newButton.disabled = false;
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                newButton.innerHTML = originalText;
                newButton.disabled = false;
            });
            });
        });
      };

      // Initial attachment
      attachCartListeners();
    });

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
  </script>

</body>
</html>
