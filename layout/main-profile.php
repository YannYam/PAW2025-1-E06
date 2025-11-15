<?php 
include_once '../function.php';

if(!$_SESSION['isLogin']){
    header('location: ' . BASE_PATH . '/index.php');
    exit();
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
}

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
                    <input type="text" value="<?= $_SESSION['nama'] ?>" name="nama">
                    <a href="<?php if($_SESSION['isAdmin']) echo BASE_URL . '/administrator/index.php' ?? BASE_URL . 'index.php' ?>">Cancel</a><button type="submit" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/layout/footer.php' ?>

