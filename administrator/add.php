<?php 
require_once '../function.php';

$add = $_GET['tambah'];
#Menambahkan buku ketika meng klik tombol simpan


#menambahkan css
$list_css_tambahan = ['menu.administrator.css','form-buku.css'];

#menambahkan header dan menu administrator
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php'); 
?>

<div class="form container-form">
  <div class="page-header">
    <h1>Tambah Buku</h1>
    
    <a href="index.php">
      &larr; Kembali
    </a>
  </div>
  <?php include_once "form_buku.php"; ?>
  
</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>