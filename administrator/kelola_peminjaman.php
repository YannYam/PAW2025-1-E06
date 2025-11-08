<?php require_once "../service/database.php";
	$pinjam = getDaftarPeminjaman();
 ?>

<main>
	<table border="1">
		<caption>Daftar Pinjaman</caption>
		<thead>
			<tr>
				<th>Nama Buku</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>tahun</th>
				<th>Status</th>
				<th>Oleh</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pinjam as $hasil): ?>
                <tr>
                    <td><?= $hasil['JUDUL_BUKU'] ?></td>
                    <td><?= $hasil['PENULIS'] ?></td>
                    <td><?= $hasil['PENERBIT'] ?></td>
                    <td><?= $hasil['TAHUN'] ?></td>
                    <td><?= $hasil['STATUS'] ?></td>
                    <td><?= $hasil['NAMA_USER'] ?></td>
                    <td><?= $hasil['TANGGAL_PINJAM'] ?></td>
                </tr>
			<?php endforeach ?>
		</tbody>
	</table>
</main>	