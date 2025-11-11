<?php 
	try {
		$db = new PDO("mysql:host=localhost;dbname=library;charset=utf8mb4", "root", "");
	
	} catch (PDOException $e) {
		echo "Koneksi Gagal";
	}