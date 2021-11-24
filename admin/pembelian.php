<?php
session_start();
error_reporting(0);
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
include '../asset.php';
$data = query("SELECT * FROM pembelian");
$tabel = 'pembelian';
$col = 'Id_pembelian';

if (isset($_POST["delete"])) {
    if (delete($_POST, $tabel, $col) > 0) {
        echo " <script> alert('data berhasil dihapus!'); </script> ";
        header("Location: pembelian.php");
    } else {
        echo " <script> alert('data tidak berhasil dihapus!'); </script> ";
    }
}

if (isset($_POST["update"])) {
    $temp = $_POST['id'];
    header("Location: updateUser.php?id=$temp");
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
        Purchase Data
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
                        <a class="btn" href="../admin/">User</a>
                    </li>
                    <li>
                        <a class="btn" href="../admin/product.php">Product</a>
                    </li>
                    <li>
                        <a class="btn" href="../product/Laptop.php">Purchase</a>
                    </li>
                    <li>
                        <a class="btn login" href="../<?php echo $tempLoc; ?>"><?php echo $var; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container">
        <h2 class="line-top">User Data</h2>
        <table class="content-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Street</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>District</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($data as $row) : ?>
                <tbody>
                    <tr>

                        <td><?= $row[$col]; ?></td>
                        <td><?= $row["Email"]; ?></td>
                        <td><?= $row["Nama"]; ?></td>
                        <td><?= $row["Password"]; ?></td>
                        <td><?= $row["Street"]; ?></td>
                        <td><?= $row["Country"]; ?></td>
                        <td><?= $row["City"]; ?></td>
                        <td><?= $row["District"]; ?></td>
                        <td><?= $row["Phone"]; ?></td>
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
        <a href="../register/register.php" style="margin-bottom:100px;text-decoration: none;" class="login btn">
            Insert Data
        </a>
    </section>
</body>

</html>