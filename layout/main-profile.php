<?php 
include_once '../function.php';

$nama = $alamat = $telepon = $tanggal= '';
$error_nama = $error_alamat = $error_telepon = $error_tanggal = '';
$pesan_sukses= '';

$profile = getUserByUsername($_SESSION['nama']);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // membersihkan input 
    $nama    = test_input($_POST['nama']);
    $alamat  = test_input($_POST['alamat']);
    $telepon = test_input($_POST['telepon']);
    $tanggal = test_input($_POST['tanggal']);

    // validasi nama
    if(!wajib($nama)){
        $error_nama = "Nama Wajib Diisi";
    } elseif (!alfabet($nama)){
        $error_nama = "Nama hanya boleh huruf dan spasi";
    } 

    // validasi alamat
    if (!wajib($alamat)) {
        $error_alamat = 'Alamat wajib diisi.';
    } elseif (!alamat($alamat)) {
        $error_alamat = 'Alamat hanya boleh berisi huruf, angka, dan tanda baca umum.';
    } elseif (strlen($alamat) > 30) {
        $error_alamat = 'Alamat maksimal 30 karakter.';
    }

    // validasi tanggal
    if (!wajib($tanggal)) {
        $error_tanggal = "Tanggal lahir wajib diisi.";
    } elseif (!validTanggal($tanggal)) {
        $error_tanggal = "Format tanggal tidak valid.";
    } else {
        $lahir = new DateTime($tanggal);
        $hari_ini = new DateTime();
        $umur = $hari_ini->diff($lahir)->y;

        if ($umur >= 6 && $umur <= 11) {
            $kategori = "Anak-anak";
        } elseif ($umur >= 12) {
            $kategori = "Remaja";
        } else {
            $error_tanggal = "Umur minimal harus 6 tahun.";
        }
    }
    
    // validasi nomor
    if (!wajib($telepon)) {
        $error_telepon = 'Nomor telepon wajib diisi.';
    } elseif (!numerik($telepon)) {
        $error_telepon = 'Nomor hanya boleh berisi angka.';
    } elseif (strlen($telepon) < 10 || strlen($telepon) > 12) {
        $error_telepon = 'Nomor harus 10–12 digit.';
    }
    
    if (
        empty($error_nama) &&
        empty($error_alamat) &&
        empty($error_telepon) && 
        empty($error_tanggal) &&
        isset($_POST['simpan'])
    ){

        $_POST['tanggal'] = $tanggal;
        gantiDataProfil($_SESSION['nama'], $_POST);
        header('Location: ' . BASE_URL .'/homepage.php');
    }

}

$list_css_tambahan = [
    'profile.css'
];

include_once BASE_PATH . '/layout/header.php';
?>

<main>
    <div class="main-profile">
        <div class="profile">
            <h1>Profile</h1>
            <div class="detail-profile">
                <form action="#" method="POST">
	
                    <input type="text" name=nama value="<?= !empty($nama) ? $nama : $profile['NAMA_LENGKAP'] ?>">
                    <span class="error"><?= $error_nama ?></span>

                    <input type="text" name=alamat value="<?= !empty($alamat) ? $alamat : $profile['ALAMAT'] ?>">
                    <span class="error"><?= $error_alamat ?></span>

                    <input type="text" name=telepon value="<?= !empty($telepon) ? $telepon : $profile['TELEPON'] ?>">
                    <span class="error"><?= $error_telepon ?></span>

                    <input type="text" name=tanggal value="<?= !empty($tanggal) ? $tanggal : $profile['TANGGAL_LAHIR'] ?>">
                    <span class="error"><?= $error_tanggal ?></span>


                    <a href="<?= BASE_URL . '/homepage.php' ?>">Cancel</a>
                    <button type="submit" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/layout/footer.php' ?>