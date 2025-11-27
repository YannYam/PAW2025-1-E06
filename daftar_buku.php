<?php
require_once('function.php');

if (!isset($_SESSION['nama'])){
    header('Location: index.php');
    exit();
}

$list_css_tambahan = [
	'style.css'
];
// Ambil data buku
$buku = getBuku();

// Include header (jangan diubah)
include_once(BASE_PATH . '/layout/header.php');
?>

<main class="site-main">
        <div class="card-container">
            <?php foreach ($buku as $book): ?> 
                <div class="card-login">
                    <h2 class="card-title"><?= $book['JUDUL'] ?></h2>
                    <p class="card-desc"><?= $book['DESKRIPSI'] ?></p>
                    
                    <div class="card-info">
                        <p><strong>Penulis:</strong> <?= $book['PENULIS'] ?></p>
                        <p><strong>Penerbit:</strong> <?= $book['PENERBIT'] ?></p>
                        <p><strong>Tahun:</strong> <?= $book['TAHUN'] ?></p>
                    </div>

                    <a href="proses_pinjam.php?id_buku=<?= $book['ID_BUKU']; ?>" class="login-btn">Pinjam</a>
                </div>
            <?php endforeach ?>
        </div>
</main> 

<?php
// include footer jika ada
?>