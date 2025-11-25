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
    }

    $idbuku = getBukuOne($id_buku);

    if(isset($_POST['IYAA'])){
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
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
     <main class="site-main">
     
     
     <div class="container">
             <div class="logout-box">
                 <h2>Hii, <?= $_SESSION['nama'];?> Ingin Pinjem Bukuu Yakk?</h2>
                 <h2><?= $idbuku['JUDUL'] ?></h2>
                 <p><?= $idbuku['DESKRIPSI'] ?></p>
     
     
                 <!-- FORM POST -->
                 <form action="#" method="POST">
                     <button type="submit" name="IYAA" class="btn-log btn-logout">IYAA </button>
                     <a class="btn-log btn-cancel-logout" href="<?= BASE_URL ?>/daftar_buku.php">TIDAKK</a>
                 </form>
             </div>
     </div>
     </main>
    
 </body>
 </html>