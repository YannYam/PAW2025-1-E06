<?php require_once '../database.php';
  if(isset($_POST['simpan'])){
    tambahBuku($_POST);
    header('location: ' . BASE_URL . '/administrator/daftar_buku.php');
    exit();
  }
$list_css_tambahan = ['menu.administrator.css','form-buku.css'];
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php'); 
?>

<div class="form container-form">
  <div class="page-header">
    <h1>Tambah Buku</h1>
    
    <a href="daftar_buku.php">
      &larr; Kembali
    </a>
  </div>
  <?php include_once "form_buku.php"; ?>
  
</div>
</body>