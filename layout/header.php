<?php 

if(!$_SESSION['nama']){
	header('Location: ' . BASE_URL . '/');
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraa</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../asset/images/logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="../asset/images/logo.jpg">
    <link rel="apple-touch-icon" href="../asset/images/logo.jpg">

    <link rel="stylesheet" href="<?= BASE_URL . '/asset/css/header.css?v=' . time(); ?>">
    <?php if (isset($list_css_tambahan)): ?>
        <?php foreach ($list_css_tambahan as $file_css): ?>
            <link rel="stylesheet" href="<?= BASE_URL . '/asset/css/' . $file_css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['nama'])): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/asset/css/profile.css' ?>">
    <?php endif; ?>

</head>

<body>

	<header class="navbar">
        <!-- Bagian Kiri: Logo + Judul -->
        <div class="navbar-left">
            <img src="<?=BASE_URL . '/asset/images/libra.jpg' ?>" class="logo" alt="logo">
            <h2>Libra</h2>
        </div>

        <!-- Bagian Tengah: Menu Navigasi -->
        
        
		<?php if(!isNotAdmin($_SESSION['nama'])): ?>
            <nav class="navbar-right">
                <h2><?= $_SESSION['nama'] ?></h2>
            </nav>
        <?php endif ?>
            
            <!-- Bagian Tengah Pemustaka -->
        <?php if(isNotAdmin($_SESSION['nama'])): ?>
        <div class="navbar-menu">
            <a href="<?= BASE_URL . '/homepage.php' ?>" class="nav-link">Home</a>
            <a href="<?= BASE_URL . '/daftar_buku.php' ?>" class="nav-link">Daftar Buku</a>
            <a href="<?= BASE_URL . '/daftar_riwayat.php' ?>" class="nav-link">Riwayat Pinjaman</a>
        </div>
        <!-- Bagian Kanan: Icon/ Profile -->
        <div class="navbar-right">
            <a href="<?= BASE_URL . '/layout/main-profile.php' ?>" class="nav-link">profile</a>

            <img src="<?=BASE_URL . '/asset/images/pp/'. $_SESSION['nama'] .'.jpeg' ?>" class="nav-icon" alt="logo">
            
            <a href="<?= BASE_URL . '/layout/logout.php' ?>" class="nav-link">Logout</a>
        </div>
        <?php endif ?>

    </header>

