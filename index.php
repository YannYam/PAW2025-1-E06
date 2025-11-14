<?php
require_once('function.php');

$list_css_tambahan = [
    'style.css'
];

include_once(BASE_PATH . '/layout/header.php');
?>


<main class="site-main">
    <div class="container">
        <div class="search-wrapper">
            <form action="daftar_buku.php" method="GET" class="search-box">
                <input type="text" name="search" placeholder="Cari judul buku..." class="search-input">
                <button type="submit" class="search-btn">Cari</button>
            </form>
        </div>

    </div>
</main>