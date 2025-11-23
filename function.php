<?php
require_once('base.php');
require_once(BASE_PATH . '/service/connect.php');
require_once(BASE_PATH . '/service/session.php');


	function checkUser($data) {
		$stmt = DBH->prepare("SELECT * FROM pemustaka WHERE USERNAME = :username");
        $stmt->execute([':username' => $data]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function checkPassword($data1, $data2){
		$stmnt = DBH->prepare("SELECT * FROM pemustaka WHERE USERNAME = :username and PASSWORD = SHA2(:password, 0)");
		$stmnt->execute([
			':username' => $data1,
			':password' => $data2
		]);

		return $stmnt->rowCount() > 0;
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

	function alfaJudul($data){
		return preg_match("/^[A-Za-z0-9 \s\!\-]+$/", $data);
	}

	function tambahBuku(array $data){
		$state = DBH->prepare("INSERT INTO buku (JUDUL, DESKRIPSI, PENULIS, PENERBIT, TAHUN) VALUES (:judul, :deskripsi, :penulis, :penerbit, :tahun)");
		$state->execute([
			':judul' => $data['judul'],
			':deskripsi' => $data['deskripsi'],
			':penulis' => $data['penulis'],
			':penerbit' => $data['penerbit'],
			':tahun' => $data['tahun']
		]);
	}

	function editBuku(int $id, array $data){
  		$state = DBH->prepare("UPDATE buku SET 
        			JUDUL = :judul, 
        			DESKRIPSI = :deskripsi, 
        			PENULIS = :penulis, 
        			PENERBIT = :penerbit, 
        			TAHUN = :tahun
        			WHERE ID_BUKU = :id_buku");
		$state->execute([
			':judul'=> $data['judul'],
			':deskripsi'=> $data['deskripsi'],
			':penulis'=> $data['penulis'],
			':penerbit'=> $data['penerbit'],
			':tahun'=> $data['tahun'],
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
		$state = DBH->prepare("SELECT * FROM buku LEFT JOIN peminjaman ON 
		peminjaman.ID_PEMINJAMAN = buku.ID_PEMINJAMAN 
		WHERE peminjaman.STATUS NOT IN ('Hilang', 'Pinjam')");
		$state->execute();
		return $state->fetchAll();
	}

	function getBukuOne(int $id){
		$state = DBH->prepare("SELECT * FROM buku WHERE ID_BUKU = :id");
		$state->execute([':id' => $id]);
		return $state->fetch();
	}
	
	function insertPeminjaman(int $id,array $data){
		$idUser = $_SESSION['username'];
		
		$state = DBH-> prepare("
		INSERT INTO peminjaman (USERNAME,TANGGAL_PINJAM,TANGGAL_RENCANA,STATUS) 
		VALUES (:username, :tanggalpinjam, :status)");
		$state->execute([
			'username' => $idUser,
			'tanggalpinjam' => date("Y-m-d"),
			'tanggalrencana' => date("Y-m-d"),
			'status' => 'Proses'
		]);

		$idPeminjaman = DBH->lastInsertId();
		$state2 = DBH->prepare("
            UPDATE buku SET ID_PEMINJAMAN = :idpinjam WHERE ID_BUKU = :idbuku
        ");
		$state2->execute([
            ':idpinjam' => $idPeminjaman,
            ':idbuku' => $id
        ]);

	    return $state2->fetchAll(PDO::FETCH_ASSOC);
	} 

	function getPemustaka(){
		$state = DBH->prepare("SELECT * FROM pemustaka");
		$state->execute();
		return $state->fetchAll();
	}

	function getDaftarPeminjaman() {
	    $stmt = DBH->prepare("
			SELECT peminjaman.ID_PEMINJAMAN, buku.JUDUL, buku.PENULIS, buku.PENERBIT, buku.TAHUN, pemustaka.NAMA_LENGKAP, pemustaka.USERNAME, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA, peminjaman.STATUS
			FROM peminjaman
			JOIN pemustaka ON peminjaman.USERNAME = pemustaka.USERNAME
			JOIN buku ON peminjaman.ID_PEMINJAMAN = buku.ID_PEMINJAMAN
			WHERE peminjaman.STATUS IN ('Proses', 'Pinjam');
	    ");
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function getDaftarKembali() {
	    $stmt = DBH->prepare("
			SELECT peminjaman.ID_PEMINJAMAN, buku.JUDUL, buku.PENULIS, buku.PENERBIT, buku.TAHUN, pemustaka.NAMA_LENGKAP, pemustaka.USERNAME, peminjaman.TANGGAL_PINJAM, peminjaman.TANGGAL_RENCANA, peminjaman.STATUS
			FROM peminjaman
			JOIN pemustaka ON peminjaman.USERNAME = pemustaka.USERNAME
			JOIN buku ON peminjaman.ID_PEMINJAMAN = buku.ID_PEMINJAMAN
			WHERE peminjaman.STATUS NOT IN ('Proses', 'Pinjam');
	    ");
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Validasi password minimal mengandung:
	// 1 huruf besar, 1 huruf kecil, dan 1 angka
	function password($data) {
	    return preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/", $data);
	}

	// Validasi format tanggal Y-m-d dan memastikan tanggal valid
	function validTanggal($data) {
	    $d = DateTime::createFromFormat("Y-m-d", $data); // parsing format tanggal
	    return $d && $d->format("Y-m-d") === $data;      // cek valid dan format sesuai
	}

	function gantiDataProfil($username,array $data){
		$stmnt = DBH->prepare("UPDATE pemustaka SET NAMA_LENGKAP = :nama, ALAMAT = :alamat, TANGGAL_LAHIR = :tanggal, TELEPON = :telepon WHERE username = :username");
		$stmnt->execute([
			':nama' => test_input($data['nama']),
			':alamat' => test_input($data['alamat']),
			':tanggal' => test_input($data['tanggal']),
			':telepon' => test_input($data['telepon']),
			':username' => $username
		]);
	}
	
	function getProfil($data){
		$stmnt = DBH->prepare("SELECT * FROM pemustaka WHERE username = :username ");
		$stmnt->execute([':username' => $data]);
		return $stmnt->fetch();
	}


	function getDataPeminjaman($id){
		$stmt = DBH->prepare("SELECT * FROM peminjaman WHERE ID_PEMINJAMAN = :id");
		$stmt->execute([':id'=>$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function getUserByUsername($username){
		$stmnt = DBH->prepare('SELECT * FROM pemustaka WHERE username = :username');
		$stmnt->execute([':username' => $username]);
		return $stmnt->fetch();
	}

	function getUserByAdmin($username){
		$stmnt = DBH->prepare('SELECT * FROM administrator WHERE username_admin = :username');
		$stmnt->execute([':username' => $username]);
		return $stmnt->fetch();
	}
?>