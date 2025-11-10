<?php require_once "../service/database.php";
	$pinjam = getDaftarPeminjaman();
 ?>
<link rel="stylesheet" href="../asset/main.administrator.css">
<body>
	<?php include "../layout/menu.administrator.php" ?>
	<div class="table">
			<table>
			<caption>Daftar Pinjaman</caption>
			<thead>
				<tr>
					<th>Nama Buku</th>
					<th>Penulis</th>
					<th>Penerbit</th>
					<th>tahun</th>
					<th>Status</th>
					<th>Oleh</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Rencana</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pinjam as $hasil): ?>
        	        <tr>
        	            <td><?= $hasil['JUDUL_BUKU'] ?></td>
        	            <td><?= $hasil['PENULIS'] ?></td>
        	            <td><?= $hasil['PENERBIT'] ?></td>
        	            <td><?= $hasil['TAHUN'] ?></td>
        	            <td><?= $hasil['STATUS'] ?><button class="btn btn-edit"><a href="edit_peminjaman.php?id=<?= $hasil['ID_PEMINJAMAN'] ?>">Edit</a></button></td>
        	            <td><?= $hasil['NAMA_USER'] ?></td>
        	            <td><?= $hasil['TANGGAL_PINJAM'] ?></td>
        	            <td><?= $hasil['TANGGAL_RENCANA'] ?></td>
        	        </tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>	