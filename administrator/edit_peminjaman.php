<?php
require_once("../base.php");
require_once(BASE_PATH . '/service/database.php');

if (!isset($_GET['id'])) { http_response_code(400); exit("ID tidak ada"); }
$id = $_GET['id'];

$stmt = $db->prepare("SELECT ID_PEMINJAMAN, STATUS, TANGGAL_RENCANA FROM peminjaman WHERE ID_PEMINJAMAN = :id");
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) { http_response_code(404); exit("Data tidak ditemukan"); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $tglRencana = $_POST['tanggal_rencana'] ?? '';
    $allowed = ['pinjam','kembali','proses'];

    if (!in_array($statusBaru, $allowed, true)) {
        $err = "Status tidak valid";
    } elseif (!$tglRencana) {
        $err = "Tanggal rencana wajib diisi";
    } else {
        // cek status lama
        $check = $db->prepare("SELECT STATUS FROM peminjaman WHERE ID_PEMINJAMAN = :id");
        $check->execute([':id'=>$id]);
        $current = $check->fetchColumn();

        // jika baru dipinjam, isi tanggal pinjam
        if ($statusBaru === 'pinjam' && $current !== 'pinjam') {
            $ctime = date("Y-m-d");
            $op = $db->prepare("UPDATE peminjaman SET TANGGAL_PINJAM=:p WHERE ID_PEMINJAMAN=:id");
            $op->execute([':p'=>$ctime, ':id'=>$id]);
        }

        // update status dan tanggal rencana
        $up = $db->prepare("UPDATE peminjaman SET STATUS=:s, TANGGAL_RENCANA=:t WHERE ID_PEMINJAMAN=:id");
        $up->execute([':s'=>$statusBaru, ':t'=>$tglRencana, ':id'=>$id]);

        header("Location: kelola_peminjaman.php?ok=1");
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
      <select name="status_baru" required>
        <option value="pinjam"  <?= $row['STATUS']==='pinjam'?'selected':'' ?>>pinjam</option>
        <option value="kembali" <?= $row['STATUS']==='kembali'?'selected':'' ?>>kembali</option>
        <option value="proses"  <?= $row['STATUS']==='proses'?'selected':'' ?>>proses</option>
      </select>
    </div>
    <label>Tanggal Rencana</label>
    <input type="date" name="tanggal_rencana" value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>" required>
    <a href="kelola_peminjaman.php">Batal</a>
    <button type="submit">Simpan</button>
  </form>
</div>
</body>
</html>
