<?php 
include_once '../function.php';

if(!(isset($_SESSION['id']))){
    header('location: ' . BASE_URL . '/index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['simpan'])){
        gantiDataProfil($_SESSION['id'], $_POST);
        $_SESSION['nama'] = $_POST['nama'];
        if($_SESSION['peran'] === 'Administrator'){
            header('location: ' . BASE_URL . '/administrator/index.php');
            exit();
        }elseif($_SESSION['peran'] === 'Pemustaka'){
            header('location: ' . BASE_URL . '/index.php');
            exit();
        }
    }
}

$profile = getProfil($_SESSION['id']);

$list_css_tambahan = [
    'main.administrator.css',
    'menu.administrator.css'
];

include_once BASE_PATH . '/layout/header.php';
include_once BASE_PATH . '/layout/menu.administrator.php';
?>

<!-- code -->
    <div class="main-profile">
        <div class="profile">
            <h1>Profile</h1>
            <div class="detail-profile">
                <form action="#" method="POST">
                    <input type="text" value="<?= $profile['NAMA_LENGKAP'] ?>" name="nama">
                    <input type="text" value="<?= $profile['ALAMAT'] ?>" name="alamat">
                    <input type="date" value="<?= $profile['TANGGAL_LAHIR'] ?>" name="tanggal">
                    <input type="text" value="<?= $profile['TELEPON'] ?>" name="telepon">

                    <a href="<?= $_SESSION['peran'] === 'Administrator' ? BASE_URL . '/administrator/' : BASE_URL . '/' ?>">Cancel</a>
                    <button type="submit" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/layout/footer.php' ?>

