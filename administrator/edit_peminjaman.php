<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$current = getDataPeminjaman($_GET['id']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $tglRencana = $_POST['tanggal_rencana'] ?? '';

    if (isset($statusBaru) && isset($_POST['submit'])) {
        // cek status lama
        // jika baru dipinjam, isi tanggal pinjam
        if ($statusBaru === 'pinjam' && $current !== 'pinjam') {
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

$list_css_tambahan = ['menu.administrator.css', 'form-buku.css'];
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php');
?>

  <div class="form">
    <h1>Edit Peminjaman</h1>
    <?php if (!empty($err)): ?>
      <div class="error"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="field">
        <label>Status</label>
        <select name="status_baru">
          <option value="proses"  <?= $row['STATUS']==='proses'?'selected':'' ?>>Proses</option>
          <option value="pinjam"  <?= $row['STATUS']==='pinjam'?'selected':'' ?>>Pinjam</option>
          <option value="kembali">Kembali</option>
          <option value="rusak">Rusak</option>
          <option value="hilang">Hilang</option>
          <option value="terlambat">Terlambat</option>
        </select>
      </div>
      <label>Tanggal Rencana</label>
      <input type="date" name="tanggal_rencana" value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>">
      <a href="kelola_peminjaman.php">Batal</a>
      <button type="submit" name="submit">Simpan</button>
    </form>
  </div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>