<?php 

if(!(isset($_SESSION['nama']))){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Libraa</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../asset/images/logo.jpg">
<link rel="icon" type="image/png" sizes="16x16" href="../asset/images/logo.jpg">
<link rel="apple-touch-icon" href="../asset/images/logo.jpg">

	<link rel="stylesheet" href="<?= BASE_URL . '/asset/header.css'; ?>">
	<?php if (isset($list_css_tambahan)): ?>
		<?php foreach ($list_css_tambahan as $file_css): ?>

			<link rel="stylesheet" href="<?= BASE_URL . '/asset/' . $file_css; ?>">
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if(isset($_SESSION['id'])): ?>
		<link rel="stylesheet" href="<?= BASE_URL . '/asset/profile.css' ?>">
	<?php endif; ?>

</head>

<body>

	<!-- Header & Navigasi -->
	<header class="navbar">
        <img src="<?=BASE_URL . '/asset/images//libra.jpg' ?>" class="logo" alt="logo">
        <h2>Libra</h2>

		<?php if (isset($judul_halaman)) : ?>
        <div class="judul-spesial">
            <h1><?= $judul_halaman ?></h1>
        </div>
    <?php endif; ?>
	</header>
	