<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data produk berdasarkan id
$pdk = query("SELECT * FROM technology WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo " <script>
        alert ('Data Berhasil Diubah !');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo " <script>
        alert ('Data Gagal Diubah !');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Ubah data</h5>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $pdk["id"]; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="tnama" name="tproduk" placeholder="Masukkan Nama Produk" value="<?= $pdk["nama_produk"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="text" class="form-control" id="tharga" name="tharga" placeholder="Masukkan Harga Produk" value="<?= $pdk["harga_beli"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Produk</label>
                            <textarea name="tdetail" id="" cols="30" rows="5" placeholder="Masukkan Detail Produk"> <?= $pdk["detail"]; ?>
                        </textarea>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="gambar_lama" value="<?= $pdk["gambar_produk"]; ?>">
                            <label class="form-label">Gambar
                                <input type="file" class="gambar" onchange="previewImage()" name="tgambar" placeholder="Masukkan Gambar Produk">
                            </label>
                            <img src="img/<?= $pdk["gambar_produk"]; ?>" width="120" class="img-preview">
                        </div>
                        <button type=" submit" class="btn btn-dark justify-content-end" name="submit">Ubah Data !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>