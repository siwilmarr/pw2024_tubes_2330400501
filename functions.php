<?php
function koneksi()
{
    $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040050') or die("Koneksi Ke DB gagal");
    return $db;
}
function query($sql)
{

    // Koneksi Ke Database
    $conn = koneksi();
    // Lakukan query ke tabel technology
    $result = mysqli_query($conn, "$sql") or die(mysqli_error($conn));

    // menyiapkan produk data (fetch)
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function upload()
{
    $nama_file = $_FILES['tgambar']['name'];
    $tipe_file = $_FILES['tgambar']['type'];
    $ukuran_file = $_FILES['tgambar']['size'];
    $error = $_FILES['tgambar']['error'];
    $tmp_file = $_FILES['tgambar']['tmp_name'];

    // ketika tidak ada gambar yang dipilih
    if ($error == 4) {
        // echo "<script>
        // alert('pilih dulu dong gambarnya !');
        // </script>";
        return 'nopoto.png';
    }

    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
        alert('itu bukan gambar woi !');
        </script>";
        return false;
    }

    // cek type file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
        alert('itu bukan gambar woi !');
        </script>";
        return false;
    }

    // ukuran file
    // max 5mb ==== 5jt bite
    if ($ukuran_file > 5000000) {
        echo "<script>
        alert('ukurannya kegedean bro !');
        </script>";
        return false;
    }

    // lolos pengecekan
    // siap upload file
    // generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

    return $nama_file_baru;
}





function tambah($data)
{
    $conn = koneksi();
    // $gambar = htmlspecialchars($data["tgambar"]);
    $produk = htmlspecialchars($data['tproduk']);
    $harga = htmlspecialchars($data['tharga']);
    $detail = htmlspecialchars($data['tdetail']);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO technology VALUES
    (null, '$gambar', '$produk', '$harga', '$detail');
    ";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    $conn = koneksi();

    // menghapus gambar di folder img
    $hp = query("SELECT * FROM technology WHERE id = $id");
    if ($hp['gambar_produk'] != 'nopoto.png') {
        unlink('img/' . $hp['gambar_produk']);
    }

    mysqli_query($conn, "DELETE FROM technology WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = $data["id"];
    $gambar_lama = htmlspecialchars($data["gambar_lama"]);
    $produk = htmlspecialchars($data["tproduk"]);
    $harga = htmlspecialchars($data["tharga"]);
    $detail = htmlspecialchars($data['tdetail']);


    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    if ($gambar == 'nopoto.png') {
        $gambar = $gambar_lama;
    }


    $query = "UPDATE technology SET
    gambar_produk = '$gambar',
    nama_produk = '$produk',
    harga_beli = '$harga',
    detail = '$detail'
    WHERE id = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keywoard)
{
    $conn = koneksi();

    $query = "SELECT * FROM technology
        WHERE nama_produk LIKE '%$keywoard%'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}





function register($data)
{
    $conn = koneksi();

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);





    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('password tidak sesuai');
        </script>";
        return false;
    }


    // cek user sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terpakai !')
        </script>";
        return false;
    }

    // jika username atau pass salah
    if (empty($username) || empty($password) || empty($password2)) {
        echo "<script>
        alert('username / password tidak boleh kosong !');
        document.location.href = 'register.php';
        </script>";

        return false;
    }

    // jika password tidak sesuai
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai !');
        document.location.href = 'register.php';
        </script>";

        return false;
    }

    // jika pw tidak < 5
    if (strlen($password) < 5) {
        echo "<script>
        alert('password terlalu pendek !');
        document.location.href = 'register.php';
        </script>";
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user ke db
    $sql = "INSERT INTO user VALUES(null, '$username', '$password')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}


function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // cek dulu username
    if ($user = query("SELECT * FROM user WHERE username = '$username'")["0"]) {
        // cek password
        if (password_verify($password, $user['password'])) {

            // set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
    ];
}
