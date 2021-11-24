<?php
session_start();
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
include '../asset.php';

$data = query("SELECT * FROM produk where Code_Kategory = 'Displays'");

$x = 0;
foreach ($data as $row) :
  $tempProductID[$x] = $row['Code_Produk'];
  $tempKategori[$x] = $row['Code_Kategory'];
  $tempHarga[$x] = $row['Harga'];
  $tempNama[$x] = $row['Nama_Produk'];
  $tempDeskripsi[$x] = $row['Deskripsi'];
  $tempStock[$x] = $row['Stok_Produk'];
  $tempGambar[$x] = $row['Gambar'];
  $x++;
endforeach;

if (isset($_POST["add"])) {
  if (isset($_SESSION['cart'])) {
    //
    $item_array_id = array_column($_SESSION['cart'], "product_id");
    if (in_array($_POST['product_id'], $item_array_id)) {
      echo "
      <script>
      alert('Data telah di keranjang!');
      </script>
      ";
      header("Refresh:0");
    } else {
      $count = count($_SESSION['cart']);

      $item_array = array(
        'product_id' => $_POST['product_id']
      );
      $_SESSION['cart'][$count] = $item_array;
    }
  } else {
    $item_array = array(
      'product_id' => $_POST['product_id']
    );
    $_SESSION['cart'][0] = $item_array;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="../images/logo.png" />
  <title>
    Displays
  </title>
  <link rel="normal" href="/Normalize/Normalize.css" />
  <link rel="stylesheet" href="product.css" />
  <link rel="stylesheet" href="../style.css" />
  <script src="script.js" defer></script>
</head>

<body>
  <nav>
    <div class="container">
      <div class="flex">
        <div class="img-wrapper">
          <a href="../index.php">
            <img style="max-width: 200px" src="../images/rog-logo@3x.png" alt="logo" />
          </a>
        </div>

        <button class="hamburger" id="hamburger">
          <img class="open" src="/images/icon-hamburger.svg" alt="icon-hamburger" />
          <img class="close" src="/images/icon-close.svg" alt="icon-close" />
        </button>

        <ul id="menu" class="menu">
          <li>
            <a class="btn" href="http://localhost/projek/product/GPU.php">Grhapic Cards</a>
          </li>
          <li>
            <a class="btn" href="http://localhost/projek/product/Display.php">Monitor</a>
          </li>
          <li>
            <a class="btn" href="http://localhost/projek/product/Laptop.php">Laptop</a>
          </li>
          <li>
            <a class="btn login" href="../<?php echo $tempLoc; ?>"><?php echo $var; ?></a>
          </li>
          <li>
            <a id="cart" class="btn" href="cart.php">
              <img src="../images/cart-icon.svg" alt="cart" style="width: 25px;" />
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

  <section class="container">
    <h2 class="line-top">Our Product</h2>
    <div class="flex">
      <?php
      for ($y = 0; $y < 3; $y++) { ?>
        <div class="card product">
          <img class="product-img" src="../images/<?= $tempGambar[$y]; ?>">
          <h3 class="product-title">
            <?= $tempNama[$y]; ?>
          </h3>

          <h4 class="product-title">
            Deskripsi
          </h4>
          <p class="paragraph">
            <?= $tempDeskripsi[$y];
            ?>
          </p>
          <span>
            Stock :
            <?= $tempStock[$y];
            ?>
          </span>
          <form method="POST">
            <button type="submit" class="btn" name="add">Add to Cart</button>
            <input type="hidden" name="product_id" value="<?= $tempProductID[$y] ?>">
          </form>
        </div>
      <?php }

      ?>
    </div>
  </section>

  <section class="container">
    <div class="flex">
      <?php
      for ($y = 3; $y < 6; $y++) { ?>
        <div class="card product">
          <img class="product-img" src="../images/<?= $tempGambar[$y]; ?>">
          <h3 class="product-title">
            <?= $tempNama[$y]; ?>
          </h3>
          <h4 class="product-title">
            Deskripsi
          </h4>
          <p class="paragraph">
            <?= $tempDeskripsi[$y];
            ?>
          </p>
          <span>
            Stock :
            <?= $tempStock[$y];
            ?>
          </span>
          <form method="POST">
            <button type="submit" class="btn" name="add">Add to Cart</button>
            <input type="hidden" name="product_id" value="<?= $tempProductID[$y] ?>">
          </form>
        </div>
      <?php }
      ?>
    </div>
  </section>


  <footer>
    <div class="container">
      <div class="flex border-bottom">
        <ul class="flex">
          <li>
            <a href="#">
              <img src="../images/icon-facebook.svg" alt="facebook" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../images/icon-twitter.svg" alt="twitter" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../images/icon-pinterest.svg" alt="pinterest" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../images/icon-instagram.svg" alt="instagram" />
            </a>
          </li>
        </ul>
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