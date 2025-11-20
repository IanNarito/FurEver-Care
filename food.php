<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FurEver Food Shop</title>
  <link rel="stylesheet" href="css/styles.css"/>
  <link rel="stylesheet" href="css/food.css"/>
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
      <h2 class="text-center fw-bold mb-5">Foods And Treats</h2>

      <div class="row g-4">

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="9"
               data-name="Brit Care Adult Lamb Dog Treat"
               data-price="₱699"
               data-img="assets/img/Brit Care Adult Lamb Dog Treat.png"
               data-description="Hypoallergenic lamb treats designed for adult dogs with sensitive digestion. Grain-free and enriched with psyllium and bamboo lignocellulose.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/Brit Care Adult Lamb Dog Treat.png" class="card-img-top" alt="Brit Care Adult Lamb Dog Treat">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Brit Care Adult Lamb Dog Treat</h6>
                  <p class="text-muted mb-1">₱699</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="9">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="10"
               data-name="Dr. Shiba Kind Kibble Dry Dog Food 8kg"
               data-price="₱1999"
               data-img="assets/img/Dr. Shiba Kind Kibble Dry Dog Food 8kg.png"
               data-description="Premium functional dry dog food formulated to support gut health, immunity, and a shiny coat. 8kg bag suitable for all breeds.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Dr. Shiba Kind Kibble Dry Dog Food 8kg.png" class="card-img-top" alt="Dr. Shiba Kind Kibble Dry Dog Food 8kg" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Dr. Shiba Kind Kibble Dry Dog Food 8kg</h6>
                  <p class="text-muted mb-1">₱1999</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="10">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="11"
               data-name="Cesar Adult Lamb Wet Dog Food 100g (12 pcs)"
               data-price="₱1599"
               data-img="assets/img/Cesar Adult Lamb Wet Dog Food 100g (12 pcs).png"
               data-description="Delicious wet dog food made with high-quality lamb. A complete and balanced meal in convenient 100g trays. Pack of 12.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Cesar Adult Lamb Wet Dog Food 100g (12 pcs).png" class="card-img-top" alt="Cesar Adult Lamb Wet Dog Food 100g (12 pcs)" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Cesar Adult Lamb Wet Dog Food 100g (12 pcs)</h6>
                  <p class="text-muted mb-1">₱1599</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="11">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="12"
               data-name="Pedigree Tasty Bites Chewy Bones Beef Dog Treats 50g"
               data-price="₱299"
               data-img="assets/img/Pedigree Tasty Bites Chewy Bones Beef Dog Treats 50g.png"
               data-description="Chewy, meaty treats with a delicious beef flavor. Perfect for training or as a small reward. Low in fat and added vitamins.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Pedigree Tasty Bites Chewy Bones Beef Dog Treats 50g.png" class="card-img-top" alt="Pedigree Tasty Bites Chewy Bones Beef Dog Treats 50g" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Pedigree Tasty Bites Chewy Bones</h6>
                  <p class="text-muted mb-1">₱299</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="12">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="13"
               data-name="Cindy's Recipe Essential Wild Tuna Wet Cat Food 70g"
               data-price="₱399"
               data-img="assets/img/Cindy's Recipe Essential Wild Tuna Wet Cat Food 70g.png"
               data-description="Made with 100% human-grade wild tuna. Grain-free and rich in Omega-3 fatty acids to promote healthy skin and coat for your cat.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Cindy's Recipe Essential Wild Tuna Wet Cat Food 70g.png" class="card-img-top" alt="Cindy's Recipe Essential Wild Tuna Wet Cat Food 70g" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Cindy's Recipe Essential Wild Tuna</h6>
                  <p class="text-muted mb-1">₱399</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="13">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="14"
               data-name="Royal Canin Feline Care"
               data-price="₱699"
               data-img="assets/img/Royal Canin Feline Care.png"
               data-description="Specialized nutrition designed to support specific needs of cats, such as urinary care, hairball control, or weight management.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Royal Canin Feline Care.png" class="card-img-top" alt="Royal Canin Feline Care" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Royal Canin Feline Care</h6>
                  <p class="text-muted mb-1">₱699</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="14">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="15"
               data-name="Inaba Chicken Broth with Chicken and Salmon Wet Cat Food 50g"
               data-price="₱499"
               data-img="assets/img/Inaba Chicken Broth with Chicken and Salmon Wet Cat Food 50g.png"
               data-description="A savory chicken broth topper with flakes of chicken and salmon. Adds moisture and flavor to dry food, perfect for picky eaters.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Inaba Chicken Broth with Chicken and Salmon Wet Cat Food 50g.png" class="card-img-top" alt="Inaba Chicken Broth with Chicken and Salmon Wet Cat Food 50g" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Inaba Chicken Broth</h6>
                  <p class="text-muted mb-1">₱499</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="15">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card"
               data-bs-toggle="modal" data-bs-target="#productModal"
               data-id="16"
               data-name="Prof. Bengal Pro Immune Tuna Cat Treats 150g"
               data-price="₱399"
               data-img="assets/img/Prof. Bengal Pro Immune Tuna Cat Treats 150g.png"
               data-description="Delicious tuna treats fortified with essential vitamins and minerals to boost your cat's immune system and overall vitality.">
              <div class="card shadow-sm h-100">
                <img src="assets/img/Prof. Bengal Pro Immune Tuna Cat Treats 150g.png" class="card-img-top" alt="Prof. Bengal Pro Immune Tuna Cat Treats 150g" />
                <div class="card-body text-center">
                  <h6 class="fw-bold">Prof. Bengal Pro Immune Treats</h6>
                  <p class="text-muted mb-1">₱399</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="16">Add to Cart</button>
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
          const button = event.relatedTarget;
          
          const name = button.getAttribute('data-name');
          const price = button.getAttribute('data-price');
          const img = button.getAttribute('data-img');
          const description = button.getAttribute('data-description');
          const id = button.getAttribute('data-id'); // We added this

          document.getElementById('modal-product-name').textContent = name;
          document.getElementById('modal-product-price').textContent = price;
          document.getElementById('modal-product-img').src = img;
          document.getElementById('modal-product-description').textContent = description;
          
          const modalBtn = document.getElementById('modal-add-to-cart-btn');
          modalBtn.setAttribute('data-product-id', id);
          
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
            const newButton = button.cloneNode(true);
            button.parentNode.replaceChild(newButton, button);

            newButton.addEventListener('click', (e) => {
            e.preventDefault();
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
