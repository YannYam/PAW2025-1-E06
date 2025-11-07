<?php include 'service/session.php'; ?>

<head>
	<link rel="stylesheet" href="">
</head>
<nav>
	<div class="left">
		<?php if(isset($_SESSION['is_login'])): ?>
			<img src="menu">
		<?php endif ?>
		<img src="logo">
		<p>Lembah Seribu Cerita</p>
	</div>
	<div class="right">
		<?php if(isset($_SESSION['is_login'])): ?>
			<img src="profile"><p><?= $_SESSION['user'] ?></p>
		<?php else: ?>
			<p>
			    <?php
			      if(isset($_SESSION['on_pemustaka'])) {
			        echo 'Administrator';
			      } else {
			        echo 'pemustaka';
			      }
			    ?>
			</p>
		<?php endif ?>
	</div>
</nav>