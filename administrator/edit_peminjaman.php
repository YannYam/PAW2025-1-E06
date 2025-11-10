<?php
require_once "../service/database.php";
if (!isset($_GET['id'])) { http_response_code(400); exit("ID tidak ada"); }
$id = $_GET['id'];

// Ambil data untuk prefill (opsional)
$stmt = $db->prepare("SELECT ID_PEMINJAMAN, STATUS, TANGGAL_RENCANA FROM peminjaman WHERE ID_PEMINJAMAN = :id");
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) { http_response_code(404); exit("Data tidak ditemukan"); }

// proses submit
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $tglRencana = $_POST['tanggal_rencana'] ?? '';
    $allowed = ['pinjam','kembali','proses'];
    if (!in_array($statusBaru, $allowed, true)) {
        $err = "Status tidak valid";
    } elseif (!$tglRencana) {
        $err = "Tanggal rencana wajib diisi";
    } else {
        $up = $db->prepare("UPDATE peminjaman SET STATUS=:s, TANGGAL_RENCANA=:t WHERE ID_PEMINJAMAN=:id");
        if($statusBaru == 'pinjam'){
            $ctime = date("Y-m-d");
            $op = $db->prepare("UPDATE peminjaman SET TANGGAL_PINJAM=:p WHERE ID_PEMINJAMAN=:id");
            $op->execute([':p'=>$ctime, ':id'=>$id]);
        }
        $up->execute([':s'=>$statusBaru, ':t'=>$tglRencana, ':id'=>$id]);
        header("Location: kelola_peminjaman.php?ok=1"); exit;
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Peminjaman</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;margin:24px}
    form{max-width:420px;padding:16px;border:1px solid #ddd;border-radius:8px}
    .field{margin-bottom:12px}
    label{display:block;margin-bottom:6px}
    select,input[type=date]{width:100%;padding:8px}
    .actions{display:flex;gap:8px;justify-content:flex-end;margin-top:12px}
    .error{color:#b00;margin-bottom:8px}
  </style>
</head>
<body>
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
    <div class="field">
      <label>Tanggal Rencana</label>
      <input type="date" name="tanggal_rencana" value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>" required>
    </div>
    <div class="actions">
      <a href="daftar_peminjaman.php">Batal</a>
      <button type="submit">Simpan</button>
    </div>
  </form>
</body>
</html>
