<?php  
require_once 'function.php'; 

if (isset($_SESSION['nama'])){
    if (isNotAdmin($_SESSION['nama'])){
        header('Location: homepage.php');
        exit();
    } else if (!isNotAdmin($_SESSION['nama'])){
        header('location: administrator/index.php');    
        exit();
    }
}

$username = $password = '';
$error_username = $error_password = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $user      = getUserByUsername($username);
    $userAdmin = getUserByAdmin($username);
    
    // Validasi input
    if (!wajib($username)) {
        $error_username = 'Username wajib diisi.';
    }
    if (!wajib($password)) {
        $error_password = 'Password wajib diisi.';
    }

    // Jika input valid
    if (empty($error_username) && empty($error_password)) {

        // Login Pemustaka
        if ($userAdmin && $userAdmin['USERNAME_ADMIN'] == $username) {

            if (hash('sha256', $password) == $userAdmin['PASSWORD_ADMIN']) {
                $_SESSION['nama'] = $userAdmin['USERNAME_ADMIN'];
                header('location: administrator/index.php');
                exit();
            } else {
                $error_password = 'Password admin salah!';
            }
        // Login Admin
        } elseif ($user && $user['USERNAME'] == $username) {
            if (hash('sha256', $password) == $user['PASSWORD']) {
                $_SESSION['nama'] = $user['USERNAME'];
                header('location: homepage.php');
                exit();
            } else {
                $error_password = 'Password salah!';
            }
        // Username tidak ada di kedua tabel
        } else {
            $error_username = 'Username tidak ditemukan!';
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
    <link rel="stylesheet" href="asset/css/style.css">

</head>

<body>

    <!-- navbar -->
    <header class="navbar">
        <img src="asset/images/libra.jpg" class="logo" alt="logo">
        <h2>Libra</h2>

    </header>

    <!-- Card Login -->
    <div class="container">
        <div class="card-login tengah">
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
