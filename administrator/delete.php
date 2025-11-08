<?php require_once '../service/database.php';
  $query = $db->prepare("DELETE FROM buku WHERE ID_BUKU = :id_buku");
  
  $query->bindValue(':id_buku', $_GET['id_buku']);
  $query->execute();
  header("location: daftar_buku.php");
 ?>