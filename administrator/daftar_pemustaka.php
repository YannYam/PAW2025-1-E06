<?php include "function.php";
	$user = getPemustaka();
 ?>
<main>
	<table>
		<caption>Daftar Pemustaka</caption>
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
				<th>No Telepon</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user as $detail): ?>
				<tr>
					<td><?= $detail['NAMA_USER'] ?></td>
					<td><?= $detail['ALAMAT_USER'] ?></td>
					<td><?= $detail['TELEPON'] ?></td>
				</tr>
			<?php endforeach?>
		</tbody>
	</table>
</main>	