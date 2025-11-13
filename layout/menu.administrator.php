<?php 
	// if(!$_SESSION['isAdmin']){
	// 	header('location: ' . BASE_URL . '/index.php');
	// 	exit();
	// }

?>
<div class="side">
    <?php include '../layout/profile.php' ?>
    <span class="name-option first">MAIN NAVIGATION</span>
    <a href="<?= BASE_URL ?>/administrator/daftar_buku.php">Daftar Buku</a>
    <a href="<?= BASE_URL ?>/administrator/daftar_pemustaka.php">Daftar Pemustaka</a>
    <a href="<?= BASE_URL ?>/administrator/kelola_peminjaman.php">Requesting riwayat</a>
    <span class="name-option">SETTING</span>
    <a href="<?= BASE_URL ?>/administrator/logout.php">Log Out</a>
</div>