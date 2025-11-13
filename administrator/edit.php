<?php
  require_once("../base.php");
  require_once(BASE_PATH . '/function.php');

  $detail = getBukuOne($_GET['id_buku']);
  if (isset($_POST['simpan'])) {
    editBuku($_GET['id_buku'], $_POST);
    header('location: ' . BASE_URL . '/administrator/daftar_buku.php');
    exit();
  }
  $list_css_tambahan = ['form-buku.css', 'menu.administrator.css'];
?>
<?php 
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php'); 
?>

<div class="form container-form">
  <div class="page-header">
    <h1>Edit Buku</h1>
    
    <a href="daftar_buku.php">
      &larr; Kembali
    </a>
  </div>
  <?php include_once "form_buku.php"; ?>
  
</div>
</body>