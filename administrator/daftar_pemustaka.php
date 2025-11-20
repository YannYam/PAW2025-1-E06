<?php 
require_once "../function.php";

// mengambil data dari tabel user dengan peran pemustaka
$user = getPemustaka();

$list_css_tambahan = [
	'main.administrator.css',
	'menu.administrator.css'
];

include_once(BASE_PATH . '/layout/header.php');
include "../layout/menu.administrator.php" 

?>

	<div class="table table-pemustaka">
		<table>
			<caption>Daftar Pemustaka</caption>
			<thead>
				<tr>
					<th>Id User</th>
					<th>Nama Lengkap</th>
					<th>Umur</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>No Telepon</th>
				</tr>
			</thead>
			<tbody>
				<!-- melakukan perulangan pada variable $user  -->
				<?php foreach ($user as $detail): ?>

				<tr>
					<td><?= $detail['ID_USER'] ?></td>
					<td><?= $detail['NAMA_LENGKAP'] ?></td>
					<td><?= $detail['TANGGAL_LAHIR'] ?></td>
					<td><?= $detail['ALAMAT'] ?></td>
					<td><?= $detail['EMAIL'] ?></td>
					<td><?= $detail['TELEPON'] ?></td>
				</tr>
				<?php endforeach ?>
				
			</tbody>
		</table>
	</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>