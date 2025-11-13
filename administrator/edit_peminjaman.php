<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$id = $_GET['id'] ?? 1;

$stmt = DBH->prepare("SELECT ID_PEMINJAMAN, STATUS, TANGGAL_RENCANA FROM peminjaman WHERE ID_PEMINJAMAN = :id");
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $tglRencana = $_POST['tanggal_rencana'] ?? '';
    $allowed = ['Pinjam','Kembali','Proses'];

    if (!in_array($statusBaru, $allowed, true)) {
        $err = "Status tidak valid";
    } elseif (!$tglRencana) {
        $err = "Tanggal rencana wajib diisi";
    } else {
        // cek status lama
        $check = DBH->prepare("SELECT STATUS FROM peminjaman WHERE ID_PEMINJAMAN = :id");
        $check->execute([':id'=>$id]);
        $current = $check->fetchColumn();

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
        exit;
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
  <form method="post">
    <div class="field">
      <label>Status</label>
      <select name="status_baru">
        <option value="Pinjam"  <?= $row['STATUS']==='Pinjam'?'selected':'' ?>>Pinjam</option>
        <option value="Kembali" <?= $row['STATUS']==='Kembali'?'selected':'' ?>>Kembali</option>
        <option value="Proses"  <?= $row['STATUS']==='Proses'?'selected':'' ?>>Proses</option>
      </select>
    </div>
    <label>Tanggal Rencana</label>
    <input type="date" name="tanggal_rencana" value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>">
    <a href="kelola_peminjaman.php">Batal</a>
    <button type="submit">Simpan</button>
  </form>
</div>
