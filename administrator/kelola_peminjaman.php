<?php require_once "../function.php";
$pinjam = getDaftarPeminjaman();
$kembali = getDaftarKembali();
$list_css_tambahan = [
	'main.administrator.css',
	'menu.administrator.css'
];
include_once(BASE_PATH . '/layout/header.php');
include "../layout/menu.administrator.php" 
?>

	<div class="table table-peminjaman">
		<div class="pinjam">
			<table>
				<caption>Daftar Pinjaman</caption>
				<thead>
					<tr>
						<th>No. Data</th>
						<th>Nama Buku</th>
						<th>Oleh</th>
						<th>Status</th>
						<th>Tanggal Pinjam</th>
						<th>Jatuh Tempo</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>tahun</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pinjam as $hasil): ?>

					<tr>
						<td><?= $hasil['ID_PEMINJAMAN'] ?></td>
						<td><?= $hasil['JUDUL'] ?></td>
						<td><?= $hasil['NAMA_LENGKAP'] ?><br>(<i><?= $hasil['USERNAME'] ?></i>)</td>
						<td class="status <?= $hasil['STATUS'] ?>"><?= $hasil['STATUS'] ?></td>
						<td><?= $hasil['TANGGAL_PINJAM'] ?></td>
						<td><?= $hasil['TANGGAL_RENCANA'] ?></td>
						<td><?= $hasil['PENULIS'] ?></td>
						<td><?= $hasil['PENERBIT'] ?></td>
						<td><?= $hasil['TAHUN'] ?></td>
						<td><a href="edit_peminjaman.php?id=<?= $hasil['ID_PEMINJAMAN'] ?>" class="btn btn-edit">Edit</a></td>
					</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
		<div class="pinjam-selesai">
			<table>
				<caption>Daftar Kembali</caption>
				<thead>
					<tr>
						<th>No. Data</th>
						<th>Nama Buku</th>
						<th>Oleh</th>
						<th>Status</th>
						<th>Tanggal Pinjam</th>
						<th>Jatuh Tempo</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>tahun</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kembali as $hasil): ?>

					<tr>
						<td><?= $hasil['ID_PEMINJAMAN'] ?></td>
						<td><?= $hasil['JUDUL'] ?></td>
						<td><?= $hasil['NAMA_LENGKAP'] ?><br>(<i><?= $hasil['USERNAME'] ?></i>)</td>
						<td class="status <?= $hasil['STATUS'] ?>"><?= $hasil['STATUS'] ?></td>
						<td><?= $hasil['TANGGAL_RENCANA'] ?></td>
						<td><?= $hasil['TANGGAL_KEMBALI'] ?></td>
						<td><?= $hasil['PENULIS'] ?></td>
						<td><?= $hasil['PENERBIT'] ?></td>
						<td><?= $hasil['TAHUN'] ?></td>
					</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>

<?php include_once BASE_PATH . '/layout/footer.php'; ?>