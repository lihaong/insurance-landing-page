<?php
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';
if (isset($_POST["input"])) {
  if (inputData($_POST) > 0) {
    echo "<script> alert('user baru berhasil ditambahkan!'); </script>";
  } else {
    echo mysqli_error($conn);
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="/images/logo.png" />
  <link rel="stylesheet" href="add.css" type="text/css" />
  <title>Add Stock</title>
  <link rel="normal" href="http://localhost/projek/Normalize/Normalize.css" />
  <script src="/script.js" defer></script>
</head>

<body>
  <div class="content-body">
    <div class="form-wrapper">
      <form class="bg-white" method="POST">
        <h1 class="text-title">Add Stock</h1>
        <div class="field-group flex">
          <div class="separate">
            <label class="label" for="txt-barang">Nama Barang</label>
            <input class="input" type="text" id="txt-barang" name="namaBarang" placeholder="NVIDIA RTX 3090 TI" required />
          </div>

          <div class="separate">
            <label class="label" for="txt-kategori">Kategori</label>
            <select class="input" id="txt-kategori" name="kategori" required>
              <option disabled selected value>
                -- Select An Option --
              </option>
              <option value="GPU">
                Graphics Card
              </option>
              <option value="Displays">
                Displays
              </option>
              <option value="Laptops">
                Laptops
              </option>
            </select>
          </div>
        </div>

        <div class="field-group flex">
          <div class="separate">
            <label class="label" for="txt-stock">Stock</label>
            <input class="quantity input" type="number" id="txt-stock" name="stock" placeholder="Enter Stock" required />
          </div>

          <div class="separate">
            <label class="label" for="file">Add File</label>
            <input class="password input" type="file" id="file" name="file" required />
          </div>
        </div>

        <div class="field-group flex">
          <div class="separate">
            <label class="label" for="harga">Harga Barang</label>
            <input class="input" type="number" id="harga" name="harga" min="0.1" step="0.1" max="10000" placeholder="$30.0" required />
          </div>
        </div>
        <div class="field-group flex" style="flex-direction: column">
          <label class="label" for="txt-desk">Deskripsi Barang</label>
          <textarea class="input" type="text" id="txt-desk" name="deskripsi" placeholder="NVIDIA RTX 3090 TI" required style="
                max-width: 840px;
                min-height: 200px;
              "></textarea>
        </div>

        <div class="field-group">
          <input class="btn-submit" type="submit" name="input" value="Input Data" />
        </div>
      </form>
    </div>
  </div>
</body>

</html>