<?php

$conn = mysqli_connect('localhost', 'root', '', 'tokokomputer') or die('Gagal terhubung ke database');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $pass1 = htmlspecialchars($data["pass"]);
    $pass2 = htmlspecialchars($data["confirmPass"]);
    $street = htmlspecialchars($data["street"]);
    $country = htmlspecialchars($data["country"]);
    $city = htmlspecialchars($data["city"]);
    $districts = htmlspecialchars($data["districts"]);
    $phone = htmlspecialchars($data["phone"]);

    $result = mysqli_query($conn, "SELECT Email FROM pelanggan WHERE Email = '$email'");

    if (
        mysqli_fetch_assoc($result)
    ) {
        echo "<script>
				alert('Email telah terdaftar!')
		      </script>";
        return false;
    }
    if ($pass1 !== $pass2) {
        echo '<script>alert("Password Salah berhasil")</script>';
        return false;
    }
    $pass = password_hash($pass1, PASSWORD_DEFAULT);

    $query = "INSERT INTO pelanggan (Email,Password,Nama,Street,Country,City,District,Phone) values ('$email','$pass','$nama','$street','$country','$city','$districts','$phone')";
    $execute = mysqli_query($conn, $query);
    if ($execute) {
        echo '<script>alert("Tambah User Berhasil")</script>';
    } else {
        echo '<script>alert("Tambah Gagal")</script> ' . mysqli_error($conn);
    }

    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;
    $email = htmlspecialchars($data["email"]);
    $pass = htmlspecialchars($data["pass"]);

    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["Password"])) {
            // set session
            if ($email === 'admin@gmail.com') {
                $_SESSION['login'] = 'Admin';
                header("Location: ../admin/");
            } else {
                $_SESSION['login'] = 'User';
                $_SESSION['purchase'] = $row['Id_Pelanggan'];
                header("Location: ../");
            }
        } else {
            echo "<script> alert('Password Salah!') </script>";
        }
    } else {
        echo "<script> alert('Email belum terdaftar!') </script>";
    }

    return mysqli_affected_rows($conn);
}


function inputData($input)
{
    global $conn;
    $namaBarang = htmlspecialchars($input["namaBarang"]);
    $kategori = htmlspecialchars($input["kategori"]);
    $stock = htmlspecialchars($input["stock"]);
    $file = htmlspecialchars($input["file"]);
    $harga = htmlspecialchars($input["harga"]);
    $deskripsi = htmlspecialchars($input["deskripsi"]);

    $query = "INSERT INTO produk (`Code_Produk`, `Code_Kategory`, `Nama_Produk`, `Harga`, `Stok_Produk`, `Deskripsi`, `Gambar`) values (NULL,'$kategori','$namaBarang','$harga','$stock','$deskripsi','$file')";
    $execute = mysqli_query($conn, $query);
    if ($execute) {
        echo '<script>alert("Tambah data berhasil")</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
    return mysqli_affected_rows($conn);
}

function cart($input)
{
    global $conn;
    $totPrice = htmlspecialchars($input["price"]);
    $daftarBarang = htmlspecialchars($input["productID"]);
    $totBarang = htmlspecialchars($input["totalBarang"]);
    $user = htmlspecialchars($input["UserID"]);
    $query = "INSERT INTO `pembelian` (`Id_pembelian`, `Id_Pelanggan`, `Tot_Harga`, `Tot_Barang`, `DaftarBarang`) VALUES ( NULL, '$user', '$totPrice', '$totBarang', '$daftarBarang');";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($data, $tabel, $col)
{
    global $conn;
    $id = $data["id"];
    mysqli_query($conn, "DELETE FROM $tabel WHERE $col = $id");
    return mysqli_affected_rows($conn);
}

function updateUser($data, $UserID)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $pass1 = htmlspecialchars($data["pass"]);
    $pass2 = htmlspecialchars($data["confirmPass"]);
    $street = htmlspecialchars($data["street"]);
    $country = htmlspecialchars($data["country"]);
    $city = htmlspecialchars($data["city"]);
    $districts = htmlspecialchars($data["districts"]);
    $phone = htmlspecialchars($data["phone"]);

    $result = mysqli_query($conn, "SELECT Email FROM pelanggan WHERE Email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
			alert('Email telah terdaftar!')
	      </script>";
        return false;
    }
    if ($pass1 !== $pass2) {
        echo '<script>alert("Password Salah berhasil")</script>';
        return false;
    }
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    mysqli_query($conn, "DELETE FROM pelanggan WHERE Id_Pelanggan = $UserID");
    $query = "INSERT INTO pelanggan (Id_Pelanggan,Email,Password,Nama,Street,Country,City,District,Phone) values ('$UserID','$email','$pass','$nama','$street','$country','$city','$districts','$phone')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateProduct($data, $UserID)
{
    global $conn;
    $namaBarang = htmlspecialchars($data["namaBarang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $stock = htmlspecialchars($data["stock"]);
    $file = htmlspecialchars($data["file"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    mysqli_query($conn, "DELETE FROM `produk` WHERE `produk`.`Code_Produk` = $UserID");
    $query = "INSERT INTO produk (`Code_Produk`, `Code_Kategory`, `Nama_Produk`, `Harga`, `Stok_Produk`, `Deskripsi`, `Gambar`) values ('$UserID','$kategori','$namaBarang','$harga','$stock','$deskripsi','$file')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addItem()
{
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
}
