<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$id = $_GET['id'] ?? 1;
$current = getDataPeminjaman($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statusBaru = $_POST['status_baru'] ?? '';
    $durasiPinjam = $_POST['tanggal_rencana'] ?? '';

    if(wajib($durasiPinjam)){
      $error_tanggal = 'Masukkan wajib diisi';
    }elseif(numerik($durasiPinjam)){
      $error_tanggal = "Masukkan harus berupa numerik";
    } else{
      $error_tanggal = '';
    }
    
    if (empty($error_tanggal) && $current['STATUS'] == 'Proses' && isset($_POST['submit'])) {
      $tanggal = date('Y-m-d', strtotime('+'.$durasiPinjam.' days'));
      $data = [
        'status' => test_input($statusBaru),
        'tanggal_rencana' => $tanggal
      ];
      
      updatePeminjaman($id, $data);
        header("Location: kelola_peminjaman.php");
        exit();
    }else{
      $data = [
        'tanggal_kembali' => date('Y-m-d'),
        'status' => test_input($statusBaru)
      ];

      updateKembali($id, $data);
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
    <form action="#" method="POST">
      <div class="field">
        <label>Status</label>
        <select name="status_baru">
          <?php if($current['STATUS'] == 'Proses'): ?>
          <option value="Proses"  <?= $current['STATUS']=='Proses'?'selected':'' ?>>Proses</option>
          <option value="Pinjam"  <?= $current['STATUS']=='Pinjam'?'selected':'' ?>>Pinjam</option>
          <?php else: ?>
          <option value="Kembali">Kembali</option>
          <option value="Rusak">Rusak</option>
          <option value="Hilang">Hilang</option>
          <option value="Terlambat">Terlambat</option>
          <?php endif; ?>
        </select>
      </div>
      <?php if($current['STATUS'] == 'Proses' ): ?>
      <label>Tanggal Rencana</label>
      <input type="text" name="tanggal_rencana" value="<?= htmlspecialchars($current['tanggal_rencana'] ?? date('Y-m-d')) ?>">
      <?php endif; ?>
      <a href="kelola_peminjaman.php">Batal</a>
      <span class="error"><?= $error_tanggal ?></span>
      <button type="submit" name="submit">Simpan</button>
    </form>
  </div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>