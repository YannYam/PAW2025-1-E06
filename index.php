<?php 
require_once 'function.php'; 

$username = $password = '';

$error_username = $error_password = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    // Validasi Username
    if (!wajib($username)) {
        $error_username = 'Username wajib diisi.';
    } elseif (!username($username)) {
        $error_username = 'Username hanya boleh berisi huruf dan angka.';
    } elseif (strlen($username) < 5 || strlen($username) > 20) {
        $error_username = 'Username minimal 5 karakter dan maksimal 20 karakter.';
    }

    // Validasi Password
    if (!wajib($password)) {
        $error_password = 'Password wajib diisi.';
    } elseif (!password($password)) {
        $error_password = 'Password harus mengandung huruf dan angka.';
    } elseif (strlen($password) < 5) {
        $error_password = 'Password minimal 5 karakter.';
    }

    // Jika tidak ada error, lanjut cek ke database
    if (empty($error_username) && empty($error_password)) {
        $user = checkUser($username);
        if ($user) {
            // Jika password-nya belum di-hash, bandingkan langsung:
            if (checkPassword($username,$password)) {
                // Simpan ke session
                $_SESSION['nama'] = $user['NAMA_LENGKAP'];
                $_SESSION['peran'] = $user['PERAN'];

                // Arahkan berdasarkan peran
                if ($user['PERAN'] === 'Administrator') {
                    $_SESSION['isAdmin'] = true;
                    header('Location: administrator/index.php');
                    exit;
                } else {
                    header('Location: daftar_buku.php');
                    exit;
                }
            } else {
                $error_password = "Password salah.";
            }
        } else {
            $error_username = "Username tidak ditemukan.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libra</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- navbar -->
    <header class="navbar">
        <img src="libra.jpg" class="logo" alt="logo">
        <h2>Libra</h2>

    </header>

    <!-- Card Login -->
    <div class="container">
        <div class="card-login">
            <h2>Login Akun</h2>
            <p>“Selamat Datang Kembali.”</p>

            <form action="" method="POST">

                
                <input type="text" placeholder="Username"name="username" value="<?= $username ?>">
                <div class="error"><?= $error_username ?></div>

                <input type="password" placeholder="Password"name="password" value="<?= $password ?>">
                <div class="error"><?= $error_password ?></div>

                <button type="submit" class="login-btn">Login</button>

            </form>

            <a href="register.php">Daftar Akun</a>
        </div>
    </div>

</body>
</html>
