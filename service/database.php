<?php
require_once('../base.php');
require_once(BASE_PATH . '/service/connect.php');
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
		$state = $db->prepare("SELECT ID_USER, NAMA_USER, ALAMAT_USER, TELEPON, TIMESTAMPDIFF(YEAR, TANGGAL_LAHIR_USER, CURDATE()) AS umur FROM user WHERE PERAN = 'pemustaka'");
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getDaftarPeminjaman() {
	    global $db;
	    $sql = "SELECT buku.JUDUL_BUKU, buku.PENULIS, buku.PENERBIT, buku.TAHUN,
	                   peminjaman.STATUS,peminjaman.ID_PEMINJAMAN, user.NAMA_USER, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA
	            FROM peminjaman
	            JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	            JOIN user ON peminjaman.ID_USER = user.ID_USER
				WHERE peminjaman.STATUS != 'kembali'";
	    
	    $stmt = $db->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}

	function getDaftarKembali() {
	    global $db;
	    $sql = "SELECT buku.JUDUL_BUKU, buku.PENULIS, buku.PENERBIT, buku.TAHUN,
	                   peminjaman.STATUS,peminjaman.ID_PEMINJAMAN, user.NAMA_USER, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA
	            FROM peminjaman
	            JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	            JOIN user ON peminjaman.ID_USER = user.ID_USER
				WHERE peminjaman.STATUS = 'kembali'";
	    
	    $stmt = $db->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}