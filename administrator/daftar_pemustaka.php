<?php require_once "../service/database.php";
	$user = getPemustaka();
	//update status peminjaman buku
 ?>
 <link rel="stylesheet" href="../asset/main.administrator.css">
<body>
	<?php include "../layout/menu.administrator.php" ?>
	<div class="table">
		<table>
			<caption>Daftar Pemustaka</caption>
		<thead>
			<tr>
				<th>Id User</th>
				<th>Nama Lengkap</th>
				<th>Umur</th>
				<th>Alamat</th>
				<th>No Telepon</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user as $detail): ?>
				<tr>
					<td><?= $detail['ID_USER'] ?></td>
					<td><?= $detail['NAMA_USER'] ?></td>
					<td><?= $detail['umur'] ?></td>
					<td><?= $detail['ALAMAT_USER'] ?></td>
					<td><?= $detail['TELEPON'] ?></td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
</body>	