<?php
    if(isNotAdmin($_SESSION['nama'])){
        header('Location: ' . BASE_URL . '/daftar_buku.php');
        exit();
    }
?>
<main>
    <div class="side">
        <span class="name-option first">MAIN NAVIGATION</span>
        <div class="active-menu <?php if($current_page == 'index.php' OR $_SESSION['current_page'] == 'index.php') echo 'hover'; ?>">
            <a href="<?= BASE_URL ?>/administrator/index.php">Daftar Buku</a>
        </div>
        <div class="active-menu <?php if($current_page == 'daftar_pemustaka.php' OR $_SESSION['current_page'] == 'daftar_pemustaka.php') echo 'hover'; ?>">
            <a href="<?= BASE_URL ?>/administrator/daftar_pemustaka.php">Daftar Pemustaka</a>
        </div>
        <div class="active-menu <?php if($current_page == 'kelola_peminjaman.php' OR $_SESSION['current_page'] == 'kelola_peminjaman.php') echo 'hover'; ?>">
            <a href="<?= BASE_URL ?>/administrator/kelola_peminjaman.php">Daftar Peminjaman</a>
        </div>
        <span class="name-option">SETTING</span>
        <div class="active-menu">
            <a href="<?= BASE_URL ?>/layout/logout.php">Log Out</a>
        </div>
    </div>