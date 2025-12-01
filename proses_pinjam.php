<?php 
require_once 'function.php';

$list_css_tambahan = [
    'logout.css',
    'style.css',
];
    
    if (!isset($_SESSION['nama'])){
        header('Location: index.php');
        exit();
    }else if (!isNotAdmin($_SESSION['nama'])) {
    header('location: administrator/index.php');
    exit();
}
    $idBuku = $_GET['id_buku'] ?? 0;

    $idbuku = getBukuOne($idBuku);

    if(isset($_POST['pinjam'])){
        insertPeminjaman($idBuku);
        header('location: daftar_buku.php');
        exit();
    } 
    
    include_once BASE_PATH . '/layout/header.php';
    ?>
     <main class="site-main">
     
     
     <div class="container">
             <div class="logout-box">
                 <h4>Hai, <?= ucfirst($_SESSION['nama']);?> mau pinjam buku ini?</h4>
                 <h2><?= $idbuku['JUDUL'] ?></h2>
                 <p><?= $idbuku['DESKRIPSI'] ?></p>
     
     
                 <!-- FORM POST -->
                 <form action="#" method="POST">
                     <button type="submit" name="pinjam" class="btn-pinjam">Pinjam</button>
                     <a class="btn-kembali" href="<?= BASE_URL ?>/daftar_buku.php">Kembali</a>
                 </form>
             </div>
     </div>
     </main>
    
 </body>
 </html>