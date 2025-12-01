<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$id = $_GET['id'] ?? 1;
$current = getDataPeminjaman($id);
$error_hari = $error_status = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $statusBaru = $_POST['status_baru'] ?? '';
  $durasiPinjam = $_POST['tanggal_rencana'] ?? '';
  $sama = $current['STATUS'] == $statusBaru;

  if (!wajib($durasiPinjam)) {
    $error_hari = 'Masukkan wajib diisi';
  } elseif (!numerik($durasiPinjam)) {
    $error_hari = "Masukkan harus berupa numerik";
  }elseif(!digitMinim2($durasiPinjam)) {
    $error_hari = "Masukkan harus maksimal 2 digit";
  } else {
    $error_hari = '';
  }

  if ($sama) {
    $error_status = 'Status wajib diisi';
  } else {
    $error_status = '';
  }

  if (!$sama && empty($error_hari) && empty($error_status) && ($current['STATUS'] == 'Proses' && isset($_POST['submit']))) {
    $tanggal = date('Y-m-d', strtotime('+' . $durasiPinjam . ' days'));
    $data = [
      'status' => test_input($statusBaru),
      'tanggal_rencana' => $tanggal,
      'tanggal_pinjam' => date('Y-m-d')
    ];

    updatePeminjaman($id, $data);
    header("Location: kelola_peminjaman.php");
    exit();
  } elseif (!$sama && empty($error_hari) && empty($error_status) && isset($_POST['submit'])) {
    $data = [
      'tanggal_kembali' => date('Y-m-d'),
      'status' => test_input($statusBaru)
    ];

    updateKembali($id, $data);
    header("Location: kelola_peminjaman.php");
    exit();
  }
}

$list_css_tambahan = ['main.administrator.css', 'menu.administrator.css', 'form-buku.css'];
include_once(BASE_PATH . '/layout/header.php');
include_once(BASE_PATH . '/layout/menu.administrator.php');
?>

<div class="form">
  <div class="form-status">
    <h1>Edit Peminjaman</h1>
    <form action="#" method="POST">
      <div class="field">
        <label>Status</label>
        <select name="status_baru">
          <?php if ($current['STATUS'] == 'Proses'): ?>
            <option value="Proses" <?= $current['STATUS'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
            <option value="Pinjam" <?= $current['STATUS'] == 'Pinjam' ? 'selected' : '' ?>>Pinjam</option>
          <?php else: ?>
            <option value="Pinjam" <?= $current['STATUS'] == 'Pinjam' ? 'selected' : '' ?>>Pinjam</option>
            <option value="Kembali">Kembali</option>
            <option value="Rusak">Rusak</option>
            <option value="Hilang">Hilang</option>
            <option value="Terlambat">Terlambat</option>
          <?php endif; ?>
        </select>
        <span class="error"><?= $error_status ?></span>
      </div>
      <?php if ($current['STATUS'] == 'Proses'): ?>
        <label>Durasi Pinjam (hari)</label>
        <input class="hari" type="text" name="tanggal_rencana" value="<?= $_POST['tanggal_rencana'] ?? '' ?>" placeholder="0">
        <div class="error hari-error"><?= $error_hari ?></div>
      <?php endif; ?>
      <br>
      <a href="kelola_peminjaman.php">Batal</a>
      <button type="submit" name="submit">Simpan</button>
    </form>
  </div>
</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>