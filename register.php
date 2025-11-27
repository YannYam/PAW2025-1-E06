<?php
require_once 'function.php';

// Inisialisasi variabel
$nama = $tanggal_lahir = $nomor = $alamat = $username = $password = '';
$error_nama = $error_tanggal_lahir = $error_nomor = $error_alamat = $error_username = $error_password =  '';
$pesan_error = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Ambil input
    $nama = test_input($_POST['nama']);
    $tanggal_lahir = test_input($_POST['tanggal_lahir']);
    $nomor = test_input($_POST['nomor']);
    $alamat = test_input($_POST['alamat']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    // validasi nama
    if (!wajib($nama)) {
        $error_nama = 'Nama wajib diisi.';
    } elseif (!alfabet($nama)) {
        $error_nama = 'Nama hanya boleh berisi huruf.';
    }

    // validasi tanggal
    if (!wajib($tanggal_lahir)) {
        $error_tanggal_lahir = "Tanggal lahir wajib diisi.";
    } elseif (!validTanggal($tanggal_lahir)) {
        $error_tanggal_lahir = "Format tanggal tidak valid.";
    } else {
        $lahir = new DateTime($tanggal_lahir);
        $hari_ini = new DateTime();
        $umur = $hari_ini->diff($lahir)->y;

        if ($umur >= 6 && $umur <= 11) {
            $kategori = "Anak-anak";
        } elseif ($umur >= 12) {
            $kategori = "Remaja";
        } else {
            $error_tanggal_lahir = "Umur minimal harus 6 tahun.";
        }
    }

    // validasi nomor
    if (!wajib($nomor)) {
        $error_nomor = 'Nomor telepon wajib diisi.';
    } elseif (!numerik($nomor)) {
        $error_nomor = 'Nomor hanya boleh berisi angka.';
    } elseif (strlen($nomor) < 10 || strlen($nomor) > 12) {
        $error_nomor = 'Nomor harus 10–12 digit.';
    }

    // validasi alamat
    if (!wajib($alamat)) {
        $error_alamat = 'Alamat wajib diisi.';
    } elseif (!alamat($alamat)) {
        $error_alamat = 'Alamat hanya boleh berisi huruf, angka, dan tanda baca umum.';
    } elseif (strlen($alamat) > 30) {
        $error_alamat = 'Alamat maksimal 30 karakter.';
    }

    //VALIDASI username

    if (!wajib($username)) {
        $error_username = 'Username wajib diisi.';
    } elseif (!username($username)) {
        $error_username = 'Username hanya berisi huruf & angka.';
    } elseif (strlen($username) < 5 || strlen($username) > 20) {
        $error_username = 'Username 5–20 karakter.';
    }

    //validasi password
    if (!wajib($password)) {
        $error_password = 'Password wajib diisi.';
    } elseif (!password($password)) {
        $error_password = 'Password harus mengandung huruf kapital & angka.';
    } elseif (strlen($password) < 5) {
        $error_password = 'Password minimal 5 karakter.';
    }

    // Validasi Sukses
    if (
        empty($error_nama) &&
        empty($error_tanggal_lahir) &&
        empty($error_nomor) &&
        empty($error_alamat) &&
        empty($error_username) &&
        empty($error_password)
    ) 
    if (cekUsernameExists($username)) {
        $error_username = "Username sudah digunakan!";
    } else {
        if (registerPemustaka($_POST)) {
            header("Location:index.php");
            exit();
        } else {
            $pesan_error = "Gagal menyimpan data ke database!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libra - Daftar Akun</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

<header class="navbar">
    <img src="asset/images/libra.jpg" class="logo" alt="logo Libra">
    <h2>Libra</h2>
</header>

<div class="container">
    <div class="card-login tengah">

        <h2>Daftar Akun</h2>
        <p>“Silahkan isi data diri untuk membuat akun baru.”</p>

        <form action="#" method="POST">

    <div class="form-grid">

        <!-- NAMA -->
        <div class="form-item">
            <input type="text" placeholder="Nama Lengkap" name="nama" value="<?= $nama ?>">
            <div class="error"><?= $error_nama ?></div>
        </div>

        <!-- TANGGAL LAHIR -->
        <div class="form-item">
            <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>">
            <div class="error"><?= $error_tanggal_lahir ?></div>
        </div>

        <!-- NOMOR TELEPON -->
        <div class="form-item">
            <input type="text" placeholder="Nomor Telepon" name="nomor" value="<?= $nomor ?>">
            <div class="error"><?= $error_nomor ?></div>
        </div>

        <!-- ALAMAT -->
        <div class="form-item">
            <input type="text" placeholder="Alamat" name="alamat" value="<?= $alamat ?>">
            <div class="error"><?= $error_alamat ?></div>
        </div>

        <!-- USERNAME -->
        <div class="form-item">
            <input type="text" placeholder="Username" name="username" value="<?= $username ?>">
            <div class="error"><?= $error_username ?></div>
        </div>

        <!-- PASSWORD -->
        <div class="form-item">
            <input type="password" placeholder="Password" name="password" value="<?= $password ?>">
            <div class="error"><?= $error_password ?></div>
        </div>

    </div>

    <button type="submit" class="login-btn">Selesai</button>

</form>

        <a href="index.php">Sudah punya akun? Login</a>

    </div>
</div>

</body>
</html>