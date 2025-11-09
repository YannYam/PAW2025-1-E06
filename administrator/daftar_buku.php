<?php require_once "../service/database.php";
	$buku = getBuku();
 ?>
<head>
	<link rel="stylesheet" type="text/css" href="../asset/daftar_buku.css">
</head>
<body>
	<div class="table table-books">
		<table>
			<caption>Daftar buku perpustakaan</caption>
			<thead>
				<tr>
					<th>Judul</th>
					<th>Deskripsi</th>
					<th>Penulis</th>
					<th>Penerbit</th>
					<th>tahun</th>
					<th>Stok</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($buku as $book): ?>
					<tr>
						<td><?= $book['JUDUL_BUKU'] ?></td>
						<td><?= $book['DESKRIPSI'] ?></td>
						<td><?= $book['PENULIS'] ?></td>
						<td><?= $book['PENERBIT'] ?></td>
						<td><?= $book['TAHUN'] ?></td>
						<td><?= $book['STOK'] ?></td>
						<td><button type="button" class="btn btn-edit"><a href="edit.php?id_buku=<?= $book['ID_BUKU'] ?>">Edit</a></button><button type="button" class="btn btn-delete"><a href="delete.php?id_buku=<?= $book['ID_BUKU'] ?>">Delete</a></button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<a href="add.php">Tambah buku</a>
</body>