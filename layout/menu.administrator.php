<?php
    if(isNotAdmin($_SESSION['nama'])){
        header('Location: ' . BASE_URL . '/daftar_buku.php');
        exit();
    }
?>
<main>
    <div class="side">
        <span class="name-option first">MAIN NAVIGATION</span>
        <a href="<?= BASE_URL ?>/administrator/index.php">Daftar Buku</a>
        <a href="<?= BASE_URL ?>/administrator/daftar_pemustaka.php">Daftar Pemustaka</a>
        <a href="<?= BASE_URL ?>/administrator/kelola_peminjaman.php">Requesting riwayat</a>
        <span class="name-option">SETTING</span>
        <a href="<?= BASE_URL ?>/layout/logout.php">Log Out</a>
    </div>