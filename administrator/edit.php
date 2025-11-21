<?php
  require_once("../base.php");
  require_once(BASE_PATH . '/function.php');


  $detail = getBukuOne($_GET['id_buku']);

  $list_css_tambahan = ['form-buku.css', 'menu.administrator.css', 'main.administrator.css'];

  include_once(BASE_PATH . '/layout/header.php');
  include_once(BASE_PATH . '/layout/menu.administrator.php'); 
?>

<div class="form container-form">
  <div class="page-header">
    <h1>Edit Buku</h1>
    
    <a href="index.php">
      &larr; Kembali
    </a>
  </div>
  <?php include_once "form_buku.php"; ?>
  
</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>
