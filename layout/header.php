<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Libraa</title>
	<link rel="stylesheet" href="<?= BASE_URL . '/assets/style.css'; ?>">
	<?php if (isset($list_css_tambahan)): ?>
		<?php foreach ($list_css_tambahan as $file_css): ?>

			<link rel="stylesheet" href="<?= BASE_URL . '/asset/' . $file_css; ?>">
		<?php endforeach; ?>
	<?php endif; ?>

</head>

<body>

	<!-- Header & Navigasi -->
	<header class="site-header">
		<div class="container">

			<?php isset($nav_file) ? include_once($nav_file) : ''; ?>

		</div>
	</header>
	