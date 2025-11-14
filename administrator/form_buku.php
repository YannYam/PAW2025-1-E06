<form action="#" method="POST">
	<input type="text" name="judul" placeholder="judul" value="<?= $detail['JUDUL'] ?? '' ?>">
	<input type="text" name="deskripsi" placeholder="deskripsi" value="<?= $detail['DESKRIPSI'] ?? '' ?>">
	<input type="text" name="penulis" placeholder="penulis" value="<?= $detail['PENULIS'] ?? '' ?>">
	<input type="text" name="penerbit" placeholder="penerbit" value="<?= $detail['PENERBIT'] ?? '' ?>">
	<input type="text" name="tahun" placeholder="tahun" value="<?= $detail['TAHUN'] ?? '' ?>">
	<input type="text" name="stok" placeholder="stok" value="<?= $detail['STOK'] ?? '' ?>">
	<button type="submit" name="simpan">Simpan</button>
</form>