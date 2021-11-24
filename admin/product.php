<?php
session_start();
error_reporting(0);
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
include '../asset.php';

$data = query("SELECT * FROM produk");
$tabel = "produk";
$col = "Code_Produk";

if (isset($_POST["delete"])) {
  if (delete($_POST, $tabel, $col) > 0) {
    echo " <script> alert('data berhasil dihapus!'); </script>";
    header("Location: product.php");
  } else {
    echo "<script> alert('data tidak berhasil dihapus!'); </script>";
  }
}

if (isset($_POST["update"])) {
  $temp = $_POST['id'];
  header("Location: updateProduct.php?id=$temp");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="/images/logo.png" />

  <title>
    Product Data
  </title>
  <link rel="normal" href="../Normalize/Normalize.css" />
  <link rel="stylesheet" href="../style.css" />
  <script src="script.js" defer></script>
</head>

<body>
  <nav>
    <div class="container">
      <div class="flex">
        <div class="img-wrapper">
          <a href="index.php">
            <img style="max-width: 200px" src="../images/rog-logo@3x.png" alt="logo" />
          </a>
        </div>

        <ul id="menu" class="menu">
          <li>
            <a class="btn" href="../admin/index.php">User</a>
          </li>
          <li>
            <a class="btn" href="../admin/product.php">Product</a>
          </li>
          <li>
            <a class="btn" href="../admin/purchase.php">Purchase</a>
          </li>
          <li>
            <a class="btn login" href="../<?php echo $tempLoc; ?>"><?php echo $var; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="container">
    <h2 class="line-top">Product Data</h2>
    <table class="content-table">
      <thead>
        <tr>
          <th>Product Code</th>
          <th>Category</th>
          <th>Name Product</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Description</th>
          <th>Picture</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php foreach ($data as $row) : ?>
        <tbody>
          <tr>
            <td><?= $row[$col]; ?></td>
            <td><?= $row["Code_Kategory"]; ?></td>
            <td><?= $row["Nama_Produk"]; ?></td>
            <td> $ <?= $row["Harga"]; ?></td>
            <td><?= $row["Stok_Produk"]; ?></td>
            <td><?= $row["Deskripsi"]; ?></td>
            <td><img class="product-img" src="../images/<?= $row['Gambar']; ?>"></td>
            <td>
              <form method="POST">
                <button id="button" style="text-decoration: none; background:transparent; margin: 4px;" type="submit" name="update">
                  <img src="../images/edit-icon.svg" alt="edit" />
                </button>
                <input type="hidden" name="id" value="<?= $row[$col]; ?>">
              </form>
              <form method="POST">
                <button id="button" style="text-decoration: none; background:transparent; margin: 4px;" type="submit" name="delete">
                  <img src="../images/delete-icon.svg" alt="delete" />
                </button>
                <input type="hidden" name="id" value="<?= $row[$col]; ?>">
              </form>
            </td>
          </tr>
        </tbody>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
    <a href="add.php" style="text-decoration: none; margin-bottom:100px;" class="login btn">
      Insert Data
    </a>
  </section>
</body>

</html>