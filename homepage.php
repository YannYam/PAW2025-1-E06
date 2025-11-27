<?php
require_once('function.php');

// 1. Cek Login
if (!isset($_SESSION['nama'])){
    header('Location: index.php');
    exit();
}

$list_css_tambahan = [
	'style.css'
];

// 2. Ambil Data untuk Statistik
// A. Total Koleksi (Ambil semua buku)
$semua_buku = getBuku(); 
$total_koleksi = count($semua_buku);

// B. Pinjaman Aktif (Ambil riwayat user, lalu filter manual)
$idUser = $_SESSION['nama'];
$riwayat_user = daftarPinjaman($idUser);

$pinjaman_aktif = 0;
foreach ($riwayat_user as $r) {
 
    if ($r['STATUS'] == 'Pinjam') { 
        $pinjaman_aktif++;
    }
}

// 3. Include Header
include_once(BASE_PATH . '/layout/header.php');
?>
<main class="site-main">
    <div class="container"> <div class="container-homepage">
            
            <div class="hero-section">
                <h1>Halo, <?= htmlspecialchars(ucfirst($_SESSION['nama'])); ?>! 🚀</h1>
                <p>Selamat datang kembali di Libra. Pengetahuan semesta ada di genggamanmu.</p>
                <a href="daftar_buku.php" class="search-btn">Jelajahi Buku Sekarang</a>
            </div>

            <div class="stats-sidebar">
                <div class="stat-card">
                    <span class="stat-number"><?= $total_koleksi; ?></span>
                    <span class="stat-label">Total Koleksi</span>
                </div>
                
                <div class="stat-card">
                    <span class="stat-number"><?= $pinjaman_aktif; ?></span>
                    <span class="stat-label">Pinjaman Aktif</span>
                </div>
            </div>

        </div>

    </div>
</main>

<?php
// Footer opsional
// include_once(BASE_PATH . '/layout/footer.php');
?>