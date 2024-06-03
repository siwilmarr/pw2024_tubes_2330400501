<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}


require 'functions.php';

$no = 1;
$handphone = query("SELECT * FROM technology");

if (isset($_POST['login'])) {

    $login = login($_POST);
}

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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- link google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- boxicon link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color:#2a2a2a">
        <div class="container-fluid">
            <h3 class="navbar-brand">Teknologi Handphone</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            <form action="" method="POST" class="d-flex">
                <input type="text" name="keywoard" placeholder="Masukkan Pencarian..." autocomplete="off" class="keyword form-control me-2">
                <button type="submit" name="cari" class="btn btn-dark" class="tombol-cari-user">Search</button>
            </form>

        </div>
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
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <br><br><br><br><br><br><br><br>







    <div class="container" style="background-color:#2a2a2a;">
        <div class="row justify-content-center mt-5" style="padding-top:80px; padding-bottom:80px;">

            <div class="card" style="width: 19rem;">
                <div class="box">
                    <div class="icon text-center pt-3">
                        <i class="bx bxs-user-circle fs-1 text-center"></i>
                    </div>
                    <div class="card-body ">
                        <h4 class="card-title text-center">Login</h4>
                        <?php if (isset($login['error'])) : ?>
                            <p style="color: red;"><?= $login['pesan']; ?></p>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="type" class="form-control" id="username" name="username" placeholder="username" id="username" required>
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-dark" name="login">Sign In</button>

                            <button type="button" class="btn btn-dark" name="register">
                                <a href="register.php" class=" text-decoration-none text-white">Sign Up</a>
                            </button>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

                        <script src="js/script.user.js"></script>

</body>

</html>