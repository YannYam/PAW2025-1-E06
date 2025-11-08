<?php require_once '../service/database.php';
  if(isset($_POST['simpan'])){
    $query = $db->prepare("INSERT INTO buku (JUDUL_BUKU, DESKRIPSI, PENULIS, PENERBIT, TAHUN, STOK) VALUES (:judul, :deskripsi, :penulis, :penerbit, :tahun, :stok)");
  
    $query->bindValue(':judul', $_POST['judul']);
    $query->bindValue(':deskripsi', $_POST['deskripsi']);
    $query->bindValue(':penulis', $_POST['penulis']);
    $query->bindValue(':penerbit', $_POST['penerbit']);
    $query->bindValue(':tahun', $_POST['tahun']);
    $query->bindValue(':stok', $_POST['stok']);
    $query->execute();
  }
 ?>

<main>
	 <div class="page-header">
      <h1>Tambah Buku</h1>

      <a href="daftar_buku.php">
        &larr; Kembali
      </a>
    </div>
    <?php include "form_buku.php"; ?>
</main>