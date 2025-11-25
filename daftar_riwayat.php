<?php
require_once('function.php');

if (!isset($_SESSION['nama'])){
    header('Location: index.php');
    exit();
}

$idUser = $_SESSION['nama'];
$daftar = daftarPinjaman($idUser);


include_once(BASE_PATH . '/layout/header.php');

?>
<link rel="stylesheet" href="asset/css/style.css?v=<?= time(); ?>">

<main class="site-main">
    <!-- <div class="card-container"> -->
        <div class="card-container">
            <?php foreach ($daftar as $list): ?> 
                <div class="card-login">
                    <h2 class="card-title">Daftar Riwayat</h2>
                    <div class="card-info">

                        <p><strong>ID_Peminjaman</strong> <?= $list['ID_PEMINJAMAN'] ?></p>
                        <p><strong>Judul</strong> <?= $list['JUDUL'] ?></p>
                        <p><strong>Tanggal pinjam:</strong> <?= $list['TANGGAL_PINJAM'] ?></p>
                        <p><strong>Status Peminjaman:</strong> <?= $list['STATUS'] ?></p>

                    </div>
                </div>
            <?php endforeach ?>
        </div>

    <!-- </div> -->
</main>