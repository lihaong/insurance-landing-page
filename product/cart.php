<?php
session_start();
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
include '../asset.php';

if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value["product_id"] == $_POST['id']) {
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Product has been Removed...!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
    }
}
if (isset($_POST['checkout'])) {
    if (cart($_POST) > 0) {
        echo '<script>alert("Pembelian berhasil")</script>';
        header("Location: GPU.php");
    } else {
        echo "<script> alert('Pembelian gagal!'); </script>";
        mysqli_error($conn);
    }
}
$data = query("SELECT * FROM produk");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo.png" />
    <title>
        Grhapic Cards
    </title>
    <link rel="normal" href="/Normalize/Normalize.css" />
    <link rel="stylesheet" href="product.css" />
    <link rel="stylesheet" href="../admin/admin.css" />
    <link rel="stylesheet" href="../style.css" />
    <!-- <link rel="stylesheet" href="../style.css" /> -->
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
                        <a class="btn" href="../product/GPU.php">Grhapic Cards</a>
                    </li>
                    <li>
                        <a class="btn" href="../product/Display.php">Monitor</a>
                    </li>
                    <li>
                        <a class="btn" href="../product/Laptop.php">Laptop</a>
                    </li>
                    <li>
                        <a class="btn login" href="../<?php echo $tempLoc; ?>"><?php echo $var; ?></a>
                    </li>
                    <li>
                        <a id="cart" class="btn" href="../<?php echo $tempLoc; ?>">
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
        <h2 class="line-top">My Cart</h2>
        <div class="flex">
            <table class="content-table">
                <?php
                $totalPrice = 0;
                if (isset($_SESSION['cart'])) { ?>
                    <thead>
                        <tr>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                    $test[0] = implode(" ", $product_id);
                    $hitung = 0;
                    foreach ($product_id as $id) {
                        $hitung++;
                        foreach ($data as $row) :
                            $tempID = $row['Code_Produk'];
                            if ($id === $tempID) {
                                $cart = query("SELECT * FROM produk where Code_Produk = '$id'");
                                foreach ($cart as $row) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $row["Nama_Produk"]; ?></td>
                                            <td> $ <?= $row["Harga"]; ?></td>
                                            <td><?= $row["Stok_Produk"]; ?></td>
                                            <td><img style="max-width : 40%;" src="../images/<?= $row['Gambar']; ?>"></td>
                                            <td>
                                                <form method="POST">
                                                    <button id="button" style="text-decoration: none; background:transparent; margin: 4px;" type="submit" name="remove">
                                                        <img src="../images/delete-icon.svg" alt="delete" />
                                                    </button>
                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                <?php $totalPrice = $totalPrice + (int)$row["Harga"];


                                endforeach;
                            }
                        endforeach;
                    }
                } else {
                    echo "<h4>Cart is Empty</h4>";
                }
                ?>
            </table>
        </div>
    </section>
    <section class="container">
        <h4>Total Price : $ <?php echo $totalPrice ?></h4>
        <form method="POST">
            <button id="button" style="text-decoration: none; background:transparent; margin: 4px;" type="submit" name="checkout">
                Insert
            </button>
            <input type="hidden" name="productID" value="<?= $test[0]; ?>">
            <input type="hidden" name="totalBarang" value="<?= $hitung; ?>">
            <input type="hidden" name="price" value="<?= $totalPrice; ?>">
            <input type="hidden" name="UserID" value="<?= $_SESSION['purchase']; ?>">

        </form>
    </section>
</body>

</html>