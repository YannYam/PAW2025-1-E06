<?php require_once "../function.php";
	$buku = getBuku();
	$list_css_tambahan = [
		'main.administrator.css',
		'menu.administrator.css'
	];
	include_once(BASE_PATH . '/layout/header.php');
 ?>
	<?php include_once(BASE_PATH . "/layout/menu.administrator.php")?>

	<div class="table table-books">
		<table>
			<caption>Daftar buku perpustakaan</caption>
			<thead>
				<tr>
					<th>Nomer Buku</th>
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
					<td><?= $book['ID_BUKU'] ?></td>
					<td><?= $book['JUDUL'] ?></td>
					<td><?= $book['DESKRIPSI'] ?></td>
					<td><?= $book['PENULIS'] ?></td>
					<td><?= $book['PENERBIT'] ?></td>
					<td><?= $book['TAHUN'] ?></td>
					<td><?= $book['STOK'] ?></td>
					<td><a href="<?= BASE_URL . '/administrator/edit.php' ?>?id_buku=<?= $book['ID_BUKU'] ?>" class="btn btn-edit">Edit</a><a href="<?= BASE_URL . '/administrator/delete.php' ?>?id_buku=<?= $book['ID_BUKU'] ?>" class="btn btn-delete">Delete</a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="add.php">Tambah buku</a>
	</div>
</body>