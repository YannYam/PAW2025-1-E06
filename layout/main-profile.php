<?php 
include_once '../function.php';

$nama = $alamat = $telepon = $tanggal= '';
$error_nama = $error_alamat = $error_telepon = $error_tanggal = '';
$pesan_sukses= '';

$profile = getProfil($_SESSION['nama']);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // membersihkan input 
    $nama    = test_input($_POST['nama']);
    $alamat  = test_input($_POST['alamat']);
    $telepon = test_input($_POST['telepon']);

    if(!wajib($nama)){
        $error_nama = "Nama Wajib Diisi";
    } elseif (!alfabet($nama)){
        $error_nama = "Nama hanya boleh huruf dan spasi";
    } 

    if (!wajib($alamat)) {
        $error_alamat = 'Alamat wajib diisi.';
    } elseif (!alamat($alamat)) {
        $error_alamat = 'Alamat hanya boleh berisi huruf, angka, dan tanda baca umum.';
    } elseif (strlen($alamat) > 30) {
        $error_alamat = 'Alamat maksimal 30 karakter.';
    }
    // --- PERBAIKAN LOGIKA TANGGAL ---
    // Cek: Kalau user kirim tanggal kosong, pakai tanggal lama dari database.
    // Kalau tanggal lama juga kosong, biarkan NULL (jangan string kosong "").
    if (!empty($_POST['tanggal'])) {
        $tanggal = $_POST['tanggal'];
    } elseif (!empty($profile['TANGGAL_LAHIR'])) {
        $tanggal = $profile['TANGGAL_LAHIR'];
    } else {
        $tanggal = null; // Kirim NULL agar MySQL tidak error
    }

    // validasi telepon
    if (!wajib($telepon)) {
        $error_telepon = 'nomer telepon wajib diisi.';
    } elseif (!numerik($telepon)) {
        $error_telepon = 'nomer telepon hanya boleh berisi angka.';
    } elseif (!cekNomorHP($telepon)) {
        $error_telepon = "Format salah. Nomor harus diawali '08' atau '628' (10-13 digit).";
    }
    
    if (
        empty($error_nama) &&
        empty($error_alamat) &&
        empty($error_telepon) && isset($_POST['simpan'])
    ){

        gantiDataProfil($_SESSION['nama'], $_POST);
        header('Location: ' . BASE_URL .'/homepage.php');
    }

}


$list_css_tambahan = [
    'main.administrator.css',
    'menu.administrator.css'
];

include_once BASE_PATH . '/layout/header.php';
?>

<!-- code -->
    <div class="main-profile">
        <div class="profile">
            <h1>Profile</h1>
            <div class="detail-profile">
                <form action="#" method="POST">
                    <input type="text" value="<?= $profile['NAMA_LENGKAP'] ?>" name="nama">
                    <span class="error"><?= $error_nama ?></span>

                    <input type="text" value="<?= $profile['ALAMAT'] ?>" name="alamat">
                    <span class="error"><?= $error_alamat ?></span>

                    <input type="text" value="<?= $profile['TELEPON'] ?>" name="telepon">
                    <span class="error"><?= $error_telepon ?></span>
                    <input type="date" value="<?= $profile['TANGGAL_LAHIR'] ?>" name="tanggal">
                    <span class="error"><?= $error_tanggal ?></span>


                    <a href="<?= BASE_URL . '/homepage.php' ?>">Cancel</a>
                    <button type="submit" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/layout/footer.php' ?>

