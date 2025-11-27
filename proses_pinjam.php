<?php 
require_once 'function.php';

$list_css_tambahan = [
    'logout.css',
    'style.css',
];
    
    if (!isset($_SESSION['nama'])){
        header('Location: index.php');
        exit();
    }

    $id_buku = null;

    if (isset($_GET['id_buku']) && !empty($_GET['id_buku'])) {
        $id_buku = test_input($_GET['id_buku']);
    } else {
        echo "ID buku tidak ditemukan!";
        exit();
    };

    $idbuku = getBukuOne($id_buku);

    if(isset($_POST['pinjam'])){
        $pinjam = insertPeminjaman($id_buku,[]);
        if ($pinjam){
            header('location: daftar_buku.php');
            exit();
        } else {
            echo "<p>Gagal meminjam buku!</p>";
        }
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