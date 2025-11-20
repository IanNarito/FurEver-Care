<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FurEver Health and Wellness Shop</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/phwellness.css"/>
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
      <h2 class="text-center fw-bold mb-5">Pet Health and Wellness</h2>

      <div class="row g-4">

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="17" 
               data-name="Inhancer Hip and Joint Formula Dog Supplement 340g"
               data-price="₱699"
               data-img="assets/img/Inhancer Hip and Joint Formula Dog Supplement 340g.png"
               data-description="A premium supplement formulated with Glucosamine, Chondroitin, and MSM to support healthy joints, improve mobility, and reduce discomfort in active and aging dogs. 340g container.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/Inhancer Hip and Joint Formula Dog Supplement 340g.png" class="card-img-top" alt="Product Image">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Inhancer Hip and Joint Formula</h6>
                  <p class="text-muted mb-1">₱699</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="17">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="18"
               data-name="Floof Pets 8-in-1 Probiotic and Multivitamins Cat Supplement 160s 210g"
               data-price="₱599"
               data-img="assets/img/Floof Pets 8-in-1 Probiotic and Multivitamins Cat Supplement 160s 210g.png"
               data-description="An all-in-one chewable supplement for cats supporting immune health, digestion, skin/coat, and energy levels. Contains essential vitamins and 8 strains of probiotics.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Floof Pets 8-in-1 Probiotic and Multivitamins Cat Supplement 160s 210g.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Floof Pets 8-in-1 Cat Supplement</h6>
                  <p class="text-muted mb-1">₱599</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="18">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="19"
               data-name="Floof Pets Dental Drops Water Additive For Oral Care Solutions 250ml"
               data-price="₱399"
               data-img="assets/img/Floof Pets Dental Drops Water Additive For Oral Care Solutions 250ml.png"
               data-description="An easy-to-use water additive that freshens breath and helps reduce plaque and tartar buildup without brushing. Simply add to your pet's drinking water daily. 250ml.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Floof Pets Dental Drops Water Additive For Oral Care Solutions 250ml.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Floof Pets Dental Drops</h6>
                  <p class="text-muted mb-1">₱399</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="19">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="20"
               data-name="Floof Pets Senior Probiotic and Multivitamins Dog Supplement 75g"
               data-price="₱499"
               data-img="assets/img/Floof Pets Senior Probiotic and Multivitamins Dog Supplement 75g.png"
               data-description="Targeted supplement for senior dogs to support digestion, energy, and overall vitality. Contains probiotics, antioxidants, and a comprehensive multivitamin blend. 75g.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Floof Pets Senior Probiotic and Multivitamins Dog Supplement 75g.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Floof Pets Senior Dog Supplement</h6>
                  <p class="text-muted mb-1">₱499</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="20">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="21"
               data-name="Dr. Shiba Wild Salmon Oil Pet Supplement 200ml"
               data-price="₱500"
               data-img="assets/img/Dr. Shiba Wild Salmon Oil Pet Supplement 200ml.png"
               data-description="Rich in Omega-3 fatty acids (EPA and DHA) for a healthy skin, shiny coat, and joint support. Sourced from wild-caught salmon. 200ml bottle.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Dr. Shiba Wild Salmon Oil Pet Supplement 200ml.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Dr. Shiba Wild Salmon Oil</h6>
                  <p class="text-muted mb-1">₱500</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="21">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="22"
               data-name="Happy Life Wound and Skin Pet Spray 120ml"
               data-price="₱349"
               data-img="assets/img/Happy Life Wound and Skin Pet Spray 120ml.png"
               data-description="An antiseptic spray for cleaning minor cuts, scrapes, and skin irritations. Promotes fast healing and is safe for use on dogs and cats. 120ml.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Happy Life Wound and Skin Pet Spray 120ml.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Happy Life Wound Spray</h6>
                  <p class="text-muted mb-1">₱349</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="22">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="23"
               data-name="Harley's Diatomaceous Earth Meal Topper Pet Supplement"
               data-price="₱449"
               data-img="assets/img/Harley's Diatomaceous Earth Meal Topper Pet Supplement.png"
               data-description="A natural, food-grade powder used as a meal topper to support digestive cleansing and help control internal and external parasites in pets.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Harley's Diatomaceous Earth Meal Topper Pet Supplement.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Harley's Diatomaceous Earth</h6>
                  <p class="text-muted mb-1">₱449</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="23">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="24"
               data-name="Catsan Ultra Odor Control Formula Cat Litter 10L"
               data-price="₱1099"
               data-img="assets/img/Catsan Ultra Odor Control Formula Cat Litter 10L.png"
               data-description="Premium clumping cat litter offering superior odor control and high absorption. Forms solid clumps for easy scooping. 10L bag.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Catsan Ultra Odor Control Formula Cat Litter 10L.png" class="card-img-top" alt="Product Image" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Catsan Ultra Cat Litter</h6>
                  <p class="text-muted mb-1">₱1099</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="24">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
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
          const id = button.getAttribute('data-id'); // We added this attribute

          // Update the modal's content
          document.getElementById('modal-product-name').textContent = name;
          document.getElementById('modal-product-price').textContent = price;
          document.getElementById('modal-product-img').src = img;
          document.getElementById('modal-product-description').textContent = description;
          
          // CRITICAL: Pass the ID to the Modal's Add to Cart button
          const modalBtn = document.getElementById('modal-add-to-cart-btn');
          modalBtn.setAttribute('data-product-id', id);
          
          // Reset button text if it was previously clicked
          modalBtn.innerHTML = 'Add to Cart';
          modalBtn.classList.remove('btn-outline-success'); // Ensure consistent styling
          modalBtn.classList.add('btn-success');
          modalBtn.disabled = false;
        });
      }

      // 2. Unified Add to Cart Logic (Works for Cards AND Modal)
      const isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
      
      // Use event delegation for the modal button (since it might not have data-id initially)
      // But simpler: just attach listener to all .btn-add-to-cart
      const attachCartListeners = () => {
        const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
        
        addToCartButtons.forEach(button => {
            // Remove old listeners to avoid duplicates if we re-run this
            const newButton = button.cloneNode(true);
            button.parentNode.replaceChild(newButton, button);

            newButton.addEventListener('click', (e) => {
            e.preventDefault();
            
            // If clicking the button on the card, stop it from opening the modal
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
                // For styling: remove outline, add solid success
                newButton.classList.remove('btn-outline-success');
                newButton.classList.add('btn-success');
                
                updateCartCount(data.cartCount);
                } else {
                alert(data.message);
                newButton.innerHTML = originalText;
                newButton.disabled = false;
                }

                setTimeout(() => {
                newButton.innerHTML = 'Add to Cart'; // Reset text
                // If it was an outline button (on card), reset it. 
                // If it was a solid button (in modal), keep it solid or reset? 
                // Let's reset to outline for consistency on cards, but careful with modal.
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
      
      // Re-attach when modal opens? No need if we update data attribute directly.
      // But we need to make sure the modal button has the listener.
      // The cloneNode method above handles the "resetting" of listeners.
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
