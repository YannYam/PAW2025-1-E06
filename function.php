<?php
require_once('base.php');
require_once(BASE_PATH . '/service/connect.php');
	function required($data) {
		return $data == "";
	}

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function wajib($data) {
		return !empty($data);
	}

	function alfabet($data) {
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function numerik($data) {
		return is_numeric($data);
	}

	function email($data) {
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	function alfanumerik($data) {
		return preg_match("/^[A-Za-z0-9]+$/", $data);
	}

	function password($data) {
		return preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/", $data);
	}

	function username($data) {
		return preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]+$/", $data);
	}

	function alamat($data) {
		return preg_match("/^(?=.*[A-Za-z])[A-Za-z0-9\s.,\/#()'-]+$/", $data);
	}

	function valid_tanggal($data) {
		$d = DateTime::createFromFormat("Y-m-d", $data);
		return $d && $d->format("Y-m-d") === $data;
	}



	function tambahBuku(array $data){
		$state = DBH->prepare("INSERT INTO buku (JUDUL_BUKU, DESKRIPSI, PENULIS, PENERBIT, TAHUN, STOK) VALUES (:judul, :deskripsi, :penulis, :penerbit, :tahun, :stok)");
		$state->execute([
			':judul' => $data['judul'],
			':deskripsi' => $data['deskripsi'],
			':penulis' => $data['penulis'],
			':penerbit' => $data['penerbit'],
			':tahun' => $data['tahun'],
			':stok' => $data['stok']
		]);
	}

	function editBuku(int $id, array $data){
  		$state = DBH->prepare("UPDATE buku SET 
        			JUDUL_BUKU = :judul, 
        			DESKRIPSI = :deskripsi, 
        			PENULIS = :penulis, 
        			PENERBIT = :penerbit, 
        			TAHUN = :tahun, 
        			STOK = :stok 
        			WHERE ID_BUKU = :id_buku");
		$state->execute([
			':judul'=> $data['judul'],
			':deskripsi'=> $data['deskripsi'],
			':penulis'=> $data['penulis'],
			':penerbit'=> $data['penerbit'],
			':tahun'=> $data['tahun'],
			':stok'=> $data['stok'],
			':id_buku'=> $id
		]);
	}

	function deleteBuku(int $id){
		$state = DBH->prepare("DELETE FROM buku WHERE ID_BUKU = :id_buku");
  		$state->execute([':id_buku' => $id]);
  		header("location: daftar_buku.php");
  		exit();
	}

	function getBuku(){
		$state = DBH->prepare('SELECT * FROM buku');
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getBukuOne(int $id){
		$state = DBH->prepare("SELECT * FROM buku WHERE ID_BUKU = :id");
		$state->execute([':id' => $id]);
		$artikel = $state->fetch();
		return $artikel;
	}

	function getPemustaka(){
		$state = DBH->prepare("SELECT ID_USER, NAMA_USER, ALAMAT_USER, TELEPON, TIMESTAMPDIFF(YEAR, TANGGAL_LAHIR_USER, CURDATE()) AS umur FROM user WHERE PERAN = 'pemustaka'");
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getDaftarPeminjaman() {
	    $stmt = DBH->prepare("SELECT buku.JUDUL_BUKU, buku.PENULIS, buku.PENERBIT, buku.TAHUN,
	                   peminjaman.STATUS,peminjaman.ID_PEMINJAMAN, user.NAMA_USER, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA
	            FROM peminjaman
	            JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	            JOIN user ON peminjaman.ID_USER = user.ID_USER
				WHERE peminjaman.STATUS != 'kembali'");
	    $stmt->execute();
	    return $stmt->fetchAll();
	}

	function getDaftarKembali() {
	    $stmt = DBH->prepare("SELECT buku.JUDUL_BUKU, buku.PENULIS, buku.PENERBIT, buku.TAHUN,
	                   peminjaman.STATUS,peminjaman.ID_PEMINJAMAN, user.NAMA_USER, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA
	            FROM peminjaman
	            JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	            JOIN user ON peminjaman.ID_USER = user.ID_USER
				WHERE peminjaman.STATUS = 'kembali'");
	    $stmt->execute();
	    return $stmt->fetchAll();
	}