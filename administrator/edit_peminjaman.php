<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$id = $_GET['id'];
$current = getDataPeminjaman($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $tglRencana = $_POST['tanggal_rencana'] ?? '';

  if(!valid_tanggal($tglRencana)){
    $error_tanggal = 'Tanggal harus diisi';
  }else {
    $error_tanggal = '';
  }

  if (isset($statusBaru) && isset($_POST['submit'])) {
      // cek status lama
      // jika baru dipinjam, isi tanggal pinjam
      if ($statusBaru === 'Pinjam' && $current !== 'Pinjam') {
          $ctime = date("Y-m-d");
          $op = DBH->prepare("UPDATE peminjaman SET TANGGAL_PINJAM=:p WHERE ID_PEMINJAMAN=:id");
          $op->execute([':p'=>$ctime, ':id'=>$id]);
      }

      // update status dan tanggal rencana
      $up = DBH->prepare("UPDATE peminjaman SET STATUS=:s, TANGGAL_RENCANA=:t WHERE ID_PEMINJAMAN=:id");
      $up->execute([':s'=>$statusBaru, ':t'=>$tglRencana, ':id'=>$id]);

      header("Location: kelola_peminjaman.php");
      exit();
  }

}

$list_css_tambahan = ['menu.administrator.css', 'form-buku.css','main.administrator.css'];
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php');
?>

  <div class="form">
    <h1>Edit Peminjaman</h1>
    <?php if (!empty($err)): ?>
      <div class="error"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>
    <form action="#" method="POST">
      <div class="field">
        <label>Status</label>
        <select name="status_baru">
          <option value="Proses"  <?= $current['STATUS']=='Proses'?'selected':'' ?>>Proses</option>
          <option value="Pinjam"  <?= $current['STATUS']=='Pinjam'?'selected':'' ?>>Pinjam</option>
          <option value="Kembali">Kembali</option>
          <option value="Rusak">Rusak</option>
          <option value="Hilang">Hilang</option>
          <option value="Terlambat">Terlambat</option>
        </select>
      </div>
      <label>Tanggal Rencana</label>
      <input type="date" name="tanggal_rencana" value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>">
      <a href="kelola_peminjaman.php">Batal</a>
      <span class="error"><?= $error_tanggal ?></span>
      <button type="submit" name="submit">Simpan</button>
    </form>
  </div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>