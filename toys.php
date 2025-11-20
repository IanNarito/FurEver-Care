<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FurEver Toys Shop</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/toys.css"/>
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
      <h2 class="text-center fw-bold mb-5">Toys for Your Fur Babies</h2>

      <div class="row g-4">

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="1"
               data-name="Squeaky Toy Ball"
               data-price="₱250"
               data-img="assets/img/squeaky toy ball.png"
               data-description="A durable, brightly colored ball with an internal squeaker to keep dogs entertained for hours. Great for fetch and solo play.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/squeaky toy ball.png" class="card-img-top" alt="Squeaky Toy Ball">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Squeaky Toy Ball</h6>
                  <p class="text-muted mb-1">₱250</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="1">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="2"
               data-name="Dog Chew Bone"
               data-price="₱200"
               data-img="assets/img/dog chew bone.png"
               data-description="Made from tough, non-toxic rubber, this bone is perfect for aggressive chewers. Promotes healthy teeth and gums.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/dog chew bone.png" class="card-img-top" alt="Dog Chew Bone">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Dog Chew Bone</h6>
                  <p class="text-muted mb-1">₱200</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="2">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="3"
               data-name="Pineapple Chew Toy"
               data-price="₱350"
               data-img="assets/img/pineapple chew toy.png"
               data-description="A fun, pineapple-shaped chew toy with small grooves to help clean teeth. Can be stuffed with treats for extra stimulation.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/pineapple chew toy.png" class="card-img-top" alt="Pineapple Chew Toy">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Pineapple Chew Toy</h6>
                  <p class="text-muted mb-1">₱350</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="3">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="4"
               data-name="Handmade Grid Cotton Rope"
               data-price="₱199"
               data-img="assets/img/handmade grid cotton rope.png"
               data-description="Thick, hand-knotted cotton rope for tugging and chewing. The natural fibers help floss your pet's teeth while they play.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/handmade grid cotton rope.png" class="card-img-top" alt="Handmade Grid Cotton Rope">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Handmade Grid Cotton Rope</h6>
                  <p class="text-muted mb-1">₱199</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="4">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="5"
               data-name="Cat Gravity Screaming Ball"
               data-price="₱299"
               data-img="assets/img/cat gravity screaming ball.png"
               data-description="An interactive ball that makes realistic animal sounds when moved. Keeps your feline friend engaged and mentally stimulated. Batteries included.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/cat gravity screaming ball.png" class="card-img-top" alt="Cat Gravity Screaming Ball">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Cat Gravity Screaming Ball</h6>
                  <p class="text-muted mb-1">₱299</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="5">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="6"
               data-name="Cat Teaser Toy"
               data-price="₱399"
               data-img="assets/img/cat teaser toy.png"
               data-description="A classic feather wand toy designed to activate your cat's hunting instincts. Perfect for interactive playtime between you and your cat.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/cat teaser toy.png" class="card-img-top" alt="Cat Teaser Toy">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Cat teaser toy</h6>
                  <p class="text-muted mb-1">₱399</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="6">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="7"
               data-name="Cat Toy Fish"
               data-price="₱150"
               data-img="assets/img/cat toy fish.png"
               data-description="A soft, plush fish toy infused with catnip to encourage playful wrestling and kicking. Great for indoor exercise.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/cat toy fish.png" class="card-img-top" alt="Cat Toy Fish">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Cat Toy Fish</h6>
                  <p class="text-muted mb-1">₱150</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="7">Add to Cart</button>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="product-card-wrapper">
            <a href="#" class="text-decoration-none product-card" 
               data-bs-toggle="modal" 
               data-bs-target="#productModal"
               data-id="8"
               data-name="Rooster Plush"
               data-price="₱499"
               data-img="assets/img/rooster plush.png"
               data-description="A large, soft plush toy with crinkly wings and multiple squeakers. Perfect for cuddling or a gentle game of fetch.">
              <div class="card shadow-sm h-100 text-center">
                <img src="assets/img/rooster plush.png" class="card-img-top" alt="Rooster Plush">
                <div class="card-body">
                  <h6 class="fw-bold text-dark">Rooster Plush</h6>
                  <p class="text-muted mb-1">₱499</p>
                  <button class="btn btn-sm btn-outline-success btn-add-to-cart" data-product-id="8">Add to Cart</button>
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
          const id = button.getAttribute('data-id'); // We added this attribute

          document.getElementById('modal-product-name').textContent = name;
          document.getElementById('modal-product-price').textContent = price;
          document.getElementById('modal-product-img').src = img;
          document.getElementById('modal-product-description').textContent = description;
          
          // Pass the ID to the Modal's Add to Cart button
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