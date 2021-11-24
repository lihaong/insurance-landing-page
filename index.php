  <?php
  session_start();
  error_reporting(0);
  include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
  include './asset.php'; 

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="./images/logo.png" />
    <title>Republic Of Gamers Nation</title>
    <link rel="normal" href="http://localhost/projek/Normalize/Normalize.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
  </head>

  <body>
    <nav>
      <div class="container">
        <div class="flex">
          <div class="img-wrapper">
            <img style="max-width: 200px" src="./images/rog-logo@3x.png" alt="logo" />
          </div>

          <button class="hamburger" id="hamburger" onclick="hamburger()">
            <img class="open" src="./images/icon-hamburger.svg" alt="icon-hamburger" />
            <img class="close" src="./images/icon-close.svg" alt="icon-close" />
          </button>

          <ul id="menu" class="menu">
            <li>
              <a class="btn" href="product/GPU.php">Graphic Cards</a>
            </li>
            <li>
              <a class="btn" href="product/Display.php">Monitor</a>
            </li>
            <li>
              <a class="btn" href="product/Laptop.php">Laptop</a>
            </li>
            <li>
              <a class="btn login" href="<?php echo $tempLoc; ?>"><?php echo $var; ?></a>
            </li>
            <li>
              <a id="cart" class="btn" href="./product/cart.php">
                <img src="./images/cart-icon.svg" alt="cart" style="width: 25px;" />
                <?php
                if (isset($_SESSION['cart'])) {
                  $count = count($_SESSION['cart']);
                  echo $count;
                } else {
                  echo $count = 0;
                }
                ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div class="container flex">
        <div class="flex align-start reverse-mobile">
          <div class="left-paragraph ">
            <h1 class="line-top">Our Mission</h1>
            <p>
              Unite gamers of diverse backgrounds
              to achieve their potential together
              in play. Through innovative
              technology and exceptional
              experiences, we can push boundaries
              to create a world without limits.
            </p>
          </div>
        </div>
      </div>
    </header>

    <section id="product" class="container">
      <h2>Our Product</h2>
      <div class="flex">
        <div class="card product">
          <img class="product-img" src="images/RTX 3070 White.png" alt="graphics" />
          <h3 class="product-title">
            Graphics Cards
          </h3>
          <p class="paragraph">
            The Matrix RTX 2080 Ti was the first
            graphics card to boast a fully
            integrated closed-loop liquid cooling
            system.
          </p>
          <a class="btn"> Shop Now </a>
        </div>

        <div class="product card">
          <img class="product-img" src="images/Monitor.png" alt="displays" />
          <h3 class="product-title">displays</h3>
          <p class="paragraph">
            Aggressively adopting the latest
            display technologies genuinely changed
            the game. As the world’s first with a
            144Hz refresh rate monitor and a 120Hz
            gaming laptop.
          </p>
          <a class="btn"> Shop Now </a>
        </div>

        <div class="product card">
          <img class="product-img" src="./images/Laptop.png" alt="laptops" />
          <h3 class="product-title">laptops</h3>
          <p class="paragraph">
            The original ROG Zephyrus wrapped
            desktop-class performance and a
            high-refresh display in an
            impressively portable form factor that
            redefined expectations for ultra-slim
            gaming laptops.
          </p>
          <a class="btn"> Shop Now </a>
        </div>
      </div>
    </section>

    <section class="container bg-violet">
      <div class="flex">
        <div>
          <h2>Find out more about how we work</h2>
        </div>

        <button class="btn login">How we work</button>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="flex border-bottom">
          <ul class="flex">
            <li>
              <a href="#">
                <img src="./images/icon-facebook.svg" alt="facebook" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="./images/icon-twitter.svg" alt="twitter" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="./images/icon-pinterest.svg" alt="pinterest" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="./images/icon-instagram.svg" alt="instagram" />
              </a>
            </li>
          </ul>
        </div>

        <div class="flex align-start">
          <div>
            <h4>Our company</h4>
            <ul>
              <li><a href="#">How we work</a></li>
              <li><a href="#">Cookies</a></li>
              <li><a href="#">Reviews</a></li>
            </ul>
          </div>

          <div>
            <h4>Help me</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li>
                <a href="#">Terms of use</a>
              </li>
              <li>
                <a href="#">Privacy policy</a>
              </li>
            </ul>
          </div>

          <div>
            <h4>Contact</h4>
            <ul>
              <li><a href="#">Sales</a></li>
              <li><a href="#">Support</a></li>
              <li><a href="#">Live chat</a></li>
            </ul>
          </div>

          <div>
            <h4>Others</h4>
            <ul>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Press</a></li>
              <li><a href="#">Licenses</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="copyright">
        <span class="author">
          Crafted with ❤️ by Muhammad Fajar
          Andikha & Gilang Yoenal Marinta, © 2021
        </span>
      </div>
    </footer>
  </body>

  </html>