<?php 
	try {
		$db = new PDO("mysql:host=localhost;dbname=perpustakaan;charset=utf8mb4", "root", "");
	
	} catch (PDOException $e) {
		echo "Koneksi Gagal";
	}