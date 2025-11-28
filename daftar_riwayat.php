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
                <div class="card-login <?= $list['STATUS'] ?>" >
                    <img src="asset/images/cover/<?= $list['COVER'] ?>" alt="<?= $list['JUDUL'] ?>" class="card-img">
                    <div class="card-info">

                        <p><strong>ID_Peminjaman</strong> <?= $list['ID_PEMINJAMAN'] ?></p>
                        <p><strong>Judul</strong> <?= $list['JUDUL'] ?></p>
                        <p><strong>Status Peminjaman:</strong> <?= $list['STATUS'] ?></p>


                        <?php if (isset($list['STATUS']) && ($list['STATUS'] == 'Pinjam' || $list['proses'])): ?>
                            <p><strong>Tanggal pengembalian:</strong> <br> <?= $list['TANGGAL_RENCANA'] ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach ?>
        </div>

    <!-- </div> -->
</main>