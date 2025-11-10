<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=perpustakaan;charset=utf8mb4", "root", "");
	
	} catch (PDOException $e) {
		echo "Koneksi Gagal";
	}

	function required($data) {
		return $data == "";
	}

	function alfabet($data) {
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function numerik($data){
		return preg_match("/^[0-9]+$/", $data);
	}

	function getBuku(){
		global $db;
		$state = $db->prepare('SELECT * FROM buku');
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getBukuOne($data){
		global $db;
		$state = $db->prepare("SELECT * FROM buku WHERE ID_BUKU = '$data'");
		$state->execute();
		$artikel = $state->fetch();
		return $artikel;
	}

	function getPemustaka(){
		global $db;
		$state = $db->prepare("SELECT NAMA_USER, ALAMAT_USER, TELEPON, TIMESTAMPDIFF(YEAR, TANGGAL_LAHIR_USER, CURDATE()) AS umur FROM pemustaka WHERE PERAN = 'pemustaka'");
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getDaftarPeminjaman() {
	    global $db;
	    $sql = "SELECT buku.JUDUL_BUKU, buku.PENULIS, buku.PENERBIT, buku.TAHUN,
	                   peminjaman.STATUS,peminjaman.ID_PEMINJAMAN, pemustaka.NAMA_USER, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA
	            FROM peminjaman
	            JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	            JOIN pemustaka ON peminjaman.ID_USER = pemustaka.ID_USER";
	    
	    $stmt = $db->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}