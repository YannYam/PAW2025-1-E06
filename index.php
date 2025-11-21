<?php  
require_once 'function.php'; 

$username = $password = '';

$error_username = $error_password = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $user = getUserByUsername($username);


    
    // Validasi Username
    if (!wajib($username)) {
        $error_username = 'Username wajib diisi.';
    }

    // Validasi Password
    if (!wajib($password)) {
        $error_password = 'Password wajib diisi.';
    } 

    if (empty($error_username) && empty($error_password)) {
        if ($user && $user['USERNAME'] == $username) {
            $_SESSION['nama'] = $user['USERNAME'];

            if (sha1($password) == $user['PASSWORD']) {
                header('location: daftar_buku.php');
                exit();
            } else{
                $error_password = 'Password salah!';
            }
        } else {
            $error_username = 'Username salah!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libra</title>
    <link rel="stylesheet" href="asset/style.css">

</head>

<body>

    <!-- navbar -->
    <header class="navbar">
        <img src="asset/images/libra.jpg" class="logo" alt="logo">
        <h2>Libra</h2>

    </header>

    <!-- Card Login -->
    <div class="container">
        <div class="card-login">
            <h2>Login Akun</h2>
            <p>“Selamat Datang Kembali.”</p>

            <form action="#" method="POST">

                
                <input type="text" placeholder="Username" name="username" value="<?= $username ?>">
                <div class="error"><?= $error_username ?></div>

                <input type="password" placeholder="Password" name="password" value="<?= $password ?>">
                <div class="error"><?= $error_password ?></div>

                <button type="submit" class="login-btn">Login</button>

            </form>

            <a href="register.php">Daftar Akun</a>
        </div>
    </div>

</body>
</html>
