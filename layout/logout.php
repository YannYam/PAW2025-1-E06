<?php require_once '../function.php';
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location: ' . BASE_URL . '/index.php');
        exit();
    }
    $list_css_tambahan = [
        'logout.css',
        'header.css',
        'style.css'
    ];

    include_once BASE_PATH . '/layout/header.php';
?>
<main>
    <div class="container-logout">
        <div class="logout-box">
            <h2>Keluar Akun?</h2>
            <p>Anda yakin ingin logout dari akun ini?</p>

            <!-- FORM POST -->
            <form action="#" method="POST">
                <button type="submit" name="logout" class="btn-log btn-logout">Logout</button>
            
                <a class="btn-log btn-cancel-logout" href="<?= isNotAdmin($_SESSION['nama']) ? BASE_URL . '/daftar_buku.php': BASE_URL . '/administrator/' ?>">Batal</a>
            </form>
        </div>
    </div>
    <?php include_once BASE_PATH . '/layout/footer.php'; ?>
