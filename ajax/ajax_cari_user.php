<?php
require '../functions.php';
$handphone = cari($_GET['keyword']);
?>

<div class="row">
    <?php foreach ($handphone as $hp) : ?>
        <div class="col-lg-4 col-md-6 my-2  d-flex justify-content-around ">
            <div class="card" style="width: 18rem;">
                <img src="img/<?= $hp["gambar_produk"]; ?>" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $hp["nama_produk"]; ?></h5>
                    <p><?= $hp["harga_beli"]; ?></p>
                    <a href="detail.php?id=<?= $hp["id"]; ?>" class="btn btn-dark mb-3">Lihat Detail</a> <br>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>