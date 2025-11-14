<?php
require_once("../base.php");
require_once(BASE_PATH . '/function.php');

$idDetail = $_GET['id'] ?? 0;

// Ambil detail + peminjaman
$stmt = DBH->prepare("
    SELECT d.ID_DETAIL,
           d.ID_PEMINJAMAN,
           d.STATUS_DETAIL,
           p.TANGGAL_RENCANA,
           p.STATUS AS STATUS_PEMINJAMAN
    FROM detail_transaksi d
    JOIN peminjaman p ON d.ID_PEMINJAMAN = p.ID_PEMINJAMAN
    WHERE d.ID_DETAIL = :id
");
$stmt->execute([':id' => $idDetail]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Data tidak ditemukan");
}

$idPeminjaman = $row['ID_PEMINJAMAN']; // ID penting untuk update peminjaman

// PROSES UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $statusBaru = strtolower($_POST['status_baru'] ?? '');
    $tglRencana = $_POST['tanggal_rencana'] ?? '';

    $allowed = ['proses','pinjam','kembali','rusak','hilang', 'terlambat'];

    if (!in_array($statusBaru, $allowed, true)) {
        $err = "Status tidak valid";
    } elseif (!$tglRencana) {
        $err = "Tanggal rencana wajib diisi";
    } else {

        // cek status lama peminjaman
        $check = DBH->prepare("SELECT STATUS FROM peminjaman WHERE ID_PEMINJAMAN = :idp");
        $check->execute([':idp' => $idPeminjaman]);
        $currentStatus = $check->fetchColumn();

        // Jika baru berubah ke 'pinjam' → set tanggal_pinjaman
        if ($statusBaru === 'pinjam' && $currentStatus !== 'pinjam') {
            $tglNow = date("Y-m-d");
            $upPinjam = DBH->prepare("
                UPDATE peminjaman 
                SET TANGGAL_PINJAM = :tgl 
                WHERE ID_PEMINJAMAN = :idp
            ");
            $upPinjam->execute([':tgl' => $tglNow, ':idp' => $idPeminjaman]);
        }

        // Update status peminjaman & tanggal rencana
        $up = DBH->prepare("
            UPDATE peminjaman 
            SET STATUS = :s, TANGGAL_RENCANA = :t 
            WHERE ID_PEMINJAMAN = :idp
        ");
        $up->execute([':s' => $statusBaru, ':t' => $tglRencana, ':idp' => $idPeminjaman]);

        // Update juga status detail_transaksi
        $updDetail = DBH->prepare("
            UPDATE detail_transaksi
            SET STATUS_DETAIL = :s
            WHERE ID_DETAIL = :idd
        ");
        $updDetail->execute([':s' => $statusBaru, ':idd' => $idDetail]);

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
                <option value="pinjam"   <?= $row['STATUS_DETAIL']==='pinjam'?'selected':'' ?>>Pinjam</option>
                <option value="kembali"  <?= $row['STATUS_DETAIL']==='kembali'?'selected':'' ?>>Kembali</option>
                <option value="proses"   <?= $row['STATUS_DETAIL']==='proses'?'selected':'' ?>>Proses</option>
                <option value="rusak">Rusak</option>
                <option value="hilang">Hilang</option>
                <option value="terlambat">Terlambat</option>
            </select>
        </div>

        <label>Tanggal Rencana</label>
        <input type="date" 
               name="tanggal_rencana"
               value="<?= htmlspecialchars($row['TANGGAL_RENCANA'] ?? date('Y-m-d')) ?>">

        <a href="kelola_peminjaman.php">Batal</a>
        <button type="submit">Simpan</button>

    </form>
</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>
