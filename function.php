<?php
require_once('base.php');
require_once(BASE_PATH . '/service/connect.php');
require_once(BASE_PATH . '/service/session.php');


	function checkUser($data) {
		$stmt = DBH->prepare("SELECT * FROM user WHERE USERNAME = :username");
        $stmt->execute([':username' => $data]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function checkPassword($data1, $data2){
		$stmnt = DBH->prepare("SELECT * FROM user WHERE USERNAME = :username and PASSWORD = SHA2(:password, 0)");
		$stmnt->execute([
			':username' => $data1,
			':password' => $data2
		]);

		return $stmnt->rowCount() > 0;
	}

	function isAdmin() {
	    return isset($_SESSION['peran']) && $_SESSION['peran'] === 'Administrator';
	}

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
		return !($data == '');
	}

	function alfabet($data) {
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function numerik($data) {
		return is_numeric($data);
	}

	function noTelp($data){
		return preg_match("/^(08 || 628)[0-9]{10,11}$/", $data);
	}

	function email($data) {
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	function alfanumerik($data) {
		return preg_match("/^[A-Za-z0-9]+$/", $data);
	}

	function alfaDesc($data){
		return preg_match("/^[A-Za-z0-9 \s\.\,\'\?\-]+$/", $data);
	}

	function password($data) {
		return preg_match("/^[a-zA-Z0-9]+$/", $data);
	}

	function username($data) {
		return preg_match("/^[a-zA-Z0-9\_]+$/", $data);
	}

	function alamat($data) {
		return preg_match("/^(?=.*[A-Za-z])[A-Za-z0-9\s.,\/#()'-]+$/", $data);
	}

	function valid_tanggal($data) {
		$d = DateTime::createFromFormat("Y-m-d", $data);
		return $d && $d->format("Y-m-d") === $data;
	}

	function year($data){
		return preg_match("/^[0-9]{4}$/", $data);
	}

	function alfabetOrAlfanumerik($data){
		return alfanumerik($data) || alfabet($data) || alfaDesc($data);
	}

	function alfaJudul($data){
		return alfanumerik($data) || alfabet($data);
	}

	function tambahBuku(array $data){
		$state = DBH->prepare("INSERT INTO buku (JUDUL, DESKRIPSI, PENULIS, PENERBIT, TAHUN, STOK) VALUES (:judul, :deskripsi, :penulis, :penerbit, :tahun, :stok)");
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
        			JUDUL = :judul, 
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
  		header("location: index.php");
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
		$state = DBH->prepare("SELECT ID_USER, NAMA_LENGKAP, ALAMAT, TELEPON, TIMESTAMPDIFF(YEAR, TANGGAL_LAHIR, CURDATE()) AS umur FROM user WHERE PERAN = 'pemustaka'");
		$state->execute();
		$artikel = $state->fetchAll();
		return $artikel;
	}

	function getDaftarPeminjaman() {
	    $stmt = DBH->prepare("
	        SELECT 
	            buku.JUDUL,
	            buku.PENULIS,
	            buku.PENERBIT,
	            buku.TAHUN,
	            peminjaman.STATUS,
	            peminjaman.ID_PEMINJAMAN,
	            user.NAMA_LENGKAP,
	            peminjaman.TANGGAL_PINJAM,
	            peminjaman.TANGGAL_RENCANA
	        FROM peminjaman
	        JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	        JOIN user ON peminjaman.ID_USER = user.ID_USER
	        WHERE peminjaman.STATUS IN ('proses','pinjam')
	    ");
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function getDaftarKembali() {
	    $stmt = DBH->prepare("
	        SELECT 
	            buku.JUDUL,
	            buku.PENULIS,
	            buku.PENERBIT,
	            buku.TAHUN,
	            peminjaman.STATUS,
	            peminjaman.ID_PEMINJAMAN,
	            user.NAMA_LENGKAP,
	            peminjaman.TANGGAL_PINJAM,
	            peminjaman.TANGGAL_RENCANA
	        FROM peminjaman
	        JOIN buku ON peminjaman.ID_BUKU = buku.ID_BUKU
	        JOIN user ON peminjaman.ID_USER = user.ID_USER
	        WHERE peminjaman.STATUS NOT IN('proses', 'pinjam')
	    ");
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Validasi format tanggal Y-m-d dan memastikan tanggal valid
	function validTanggal($data) {
	    $d = DateTime::createFromFormat("Y-m-d", $data); // parsing format tanggal
	    return $d && $d->format("Y-m-d") === $data;      // cek valid dan format sesuai
	}

	function gantiDataProfil(int $id,array $data){
		$stmnt = DBH->prepare("UPDATE user SET NAMA_LENGKAP = :nama, ALAMAT = :alamat, TANGGAL_LAHIR = :tanggal, TELEPON = :telepon WHERE ID_USER = :id");
		$stmnt->execute([
			':nama' => $data['nama'],
			':alamat' => $data['alamat'],
			':tanggal' => $data['tanggal'],
			':telepon' => $data['telepon'],
			':id' => $id
		]);
	}
	
	function getProfil($data){
		$stmnt = DBH->prepare("SELECT * FROM user WHERE ID_USER = :id ");
		$stmnt->execute([':id' => $data]);
		return $stmnt->fetch();
	}
