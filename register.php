<?php

require 'functions.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan ! silahkan login.');
        document.location.href = 'login.php';
    </script>";
    } else {
        echo 'user gagal ditambahkan';
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- boxicon link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#2a2a2a;">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="card" style="width: 22rem;">
                <div class="box">
                    <div class="icon text-center pt-3">
                        <i class="bx bxs-user-circle fs-1 text-center"></i>
                    </div>
                    <div class="card-body ">
                        <h4 class="card-title text-center">Sign Up</h4>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="type" class="form-control" id="username" name="username" placeholder="Enter your username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm your password" id="password2" required>
                            </div>
                            <button type="submit" class="btn btn-dark" name="register"></a>Confirm</button>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>