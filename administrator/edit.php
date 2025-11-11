<?php
require_once("../base.php");
require_once(BASE_PATH . '/service/database.php');

$id = $_GET['id_buku'];
$detail = getBukuOne($id);
if (isset($_POST['simpan'])) {
  // Query update dengan prepared statement
  $query = $db->prepare("UPDATE buku SET 
          JUDUL_BUKU = :judul, 
          DESKRIPSI = :deskripsi, 
          PENULIS = :penulis, 
          PENERBIT = :penerbit, 
          TAHUN = :tahun, 
          STOK = :stok 
          WHERE ID_BUKU = :id_buku");

  $query->bindValue(':judul', $_POST['judul']);
  $query->bindValue(':deskripsi', $_POST['deskripsi']);
  $query->bindValue(':penulis', $_POST['penulis']);
  $query->bindValue(':penerbit', $_POST['penerbit']);
  $query->bindValue(':tahun', $_POST['tahun']);
  $query->bindValue(':stok', $_POST['stok']);
  $query->bindValue(':id_buku', $id);

  if ($query->execute()) {
    echo "Data buku berhasil diperbarui.";
    // Redirect ke daftar buku setelah update, misalnya:
    header('Location: daftar_buku.php');
    exit;
  } else {
    echo "Gagal memperbarui data buku.";
  }
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