<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database_name = "perpustakaan_anak";

	$db = mysqli_connect($hostname, $username, $password, $database_name);

	if($db -> connect_error) {
		echo "koneksi gagal";
		die("error!");
	}
?>