<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}


require "functions.php";

$no = 1;
$handphone = query("SELECT * FROM technology");

// tombol cari ditekan
if (isset($_POST['cari'])) {
    $handphone = cari($_POST['keywoard']);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEKNOLOGI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- link google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color:#2a2a2a">
        <div class="container-fluid">
            <a href="tambahproduk.php" class="btn btn-light" style="margin-right:10px;">Tambah Data Produk</a>
            <a href="logout.php" class="btn btn-light" style="margin-right:210px;">Logout</a>
            <h3 class="navbar-brand">Teknologi Handphone</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            <form action="" method="POST" class="d-flex">
                <input type="text" name="keywoard" placeholder="Masukkan Pencarian..." autocomplete="off" class="keyword form-control me-2">
                <button type="submit" name="cari" class="btn btn-dark" class="tombol-cari">Search</button>
            </form>

        </div>
    </nav>



    <h3 class="text-center mb-4 fw-bold" style="padding-top:100px;">Product</h3>
    <div class="container ">

        <div class="row">
            <?php foreach ($handphone as $hp) : ?>
                <div class="col-lg-4 col-md-6 my-2  d-flex justify-content-around ">
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?= $hp["gambar_produk"]; ?>" class="card-img-top" alt="..." width="280px">
                        <div class=" card-body text-center">
                            <h5 class="card-title"><?= $hp["nama_produk"]; ?></h5>
                            <p><?= $hp["harga_beli"]; ?></p>
                            <a href="detail.php?id=<?= $hp["id"]; ?>" class="btn btn-dark mb-3">Lihat Detail</a> <br>
                            <a href="ubah.php?id=<?= $hp["id"]; ?>" class="btn btn-primary">Ubah</a> <a href="hapus.php?id=<?= $hp["id"]; ?>" onclick="return confirm('Serius Mau Dihapus ?')" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>





    <script src="js/script.js"></script>

</body>

</html>