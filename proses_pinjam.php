<?php require_once 'function.php';
    if(isset($_POST['IYAA'])){
        header('location: daftar_buku.php');
        exit();
    }
    $list_css_tambahan = [
        'logout.css',
    ];

    include_once BASE_PATH . '/layout/header.php';
    ?>

<div class="container-logout">
        <div class="logout-box">
            <h2>Pinjem Bukuu?</h2>

            <!-- FORM POST -->
            <form action="#" method="POST">
                <button type="submit" name="IYAA" class="btn-log btn-logout">IYAA BANG </button>
                <a class="btn-log btn-cancel-logout" href="<?= BASE_URL ?>/daftar_buku.php">GAAJADI BANGG</a>
            </form>
        </div>
</div>