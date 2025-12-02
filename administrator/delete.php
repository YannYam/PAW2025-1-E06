<?php 
require_once '../function.php';

  if(isNotAdmin($_SESSION['nama'])){
    header('Location: ' . BASE_URL . '/homepage.php');
    exit();
  }

  if(isset($_POST['delete'])){
    deleteBuku($_GET['id_buku']);
    header("location: index.php");
    exit();
  }

  $judul = getBukuOne($_GET['id_buku']);

  $list_css_tambahan = [
    'delete.css',
    'logout.css',
    'header.css',
    'footer.css'
  ];

  include_once BASE_PATH . '/layout/header.php';
?>
<main>
  <div class="container-logout">
    <div class="konten">
      <div class="logout-box">
        <img src="<?= BASE_URL . '/asset/images/cover/' . $judul['COVER'] ?>" alt="cover buku" class="img-cover">
        <p><b><?= $judul['JUDUL'] ?></b></p>
    </div>
    <div class="logout-box">
      <h2>Delete Buku ini?</h2>
      <p>Anda yakin ingin menghapus ini?</p>
      
        <!-- FORM POST -->
        <form action="#" method="POST">
            <button type="submit" name="delete" class="btn-log btn-logout">Delete</button>
            <a class="btn-log btn-cancel-logout" href="<?= BASE_URL . '/administrator/' ?>">Batal</a>
        </form>
      </div>
    </div>
  </div>
    
  <?php include_once BASE_PATH . '/layout/footer.php' ?>