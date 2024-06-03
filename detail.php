<?php
require 'functions.php';

$id = $_GET['id'];
$hp = query("SELECT * FROM technology WHERE id = $id")[0];
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DETAIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <a href="login.php" class="btn btn-dark" style="margin:px;">Back</a>
    <div class="d-flex justify-content-center">
        <img src="img/<?= $hp["gambar_produk"]; ?>" width="300px" class="d-flex">
    </div>
    <h3 style="text-align:center; margin-bottom: 20px;">DETAIL HANDPHONE</h3>
    <h5 class="card-title text-center"><?= $hp["nama_produk"]; ?></h5>
    <p style="text-align:center;"><?= $hp["harga_beli"]; ?></p>
    <p><?= $hp["detail"]; ?></p>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>