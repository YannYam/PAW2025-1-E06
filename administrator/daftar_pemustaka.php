<?php require_once "../service/database.php";
	$user = getPemustaka();
	//update status peminjaman buku
 ?>
<main>
	<table>
		<caption>Daftar Pemustaka</caption>
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>No Telepon</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user as $detail): ?>
				<tr>
					<td><?= $detail['NAMA_USER'] ?></td>
					<td><?= $detail['ALAMAT_USER'] ?></td>
					<td><?= $detail['TELEPON'] ?></td>
					<td><?= $detail['STATUS'] ?></td>
				</tr>
			<?php endforeach?>
		</tbody>
	</table>
</main>	