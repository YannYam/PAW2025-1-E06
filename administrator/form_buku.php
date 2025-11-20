<?php 

$error_judul = $error_deskripsi = $error_penulis = $error_penerbit = $error_tahun = $error_stok = '';

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $judul = test_input($_POST['judul']);
    $deskripsi = test_input($_POST['deskripsi']);
    $penulis = test_input($_POST['penulis']);
    $penerbit = test_input($_POST['penerbit']);
    $tahun = test_input($_POST['tahun']);
    $stok = test_input($_POST['stok']);

    if(!wajib($judul)){
        $error_judul = 'Masukan wajib diisi';
    }elseif(!alfaJudul($judul)){
      $error_judul = 'Masukan harus berupa Judul';
    }else{
      $error_judul = '';
    }

    if(!wajib($deskripsi)){
      $error_deskripsi = 'Masukan wajib diisi';
    }elseif(!alfaDesc($deskripsi)){
      $error_deskripsi = 'Masukan harus berupa alfanumerik';
    }else{
      $error_deskripsi = '';
    }

    if(!wajib($penulis)){
      $error_penulis = 'Masukan wajib diisi';
    }elseif(!alfabet($penulis)){
      $error_penulis = '';
    }else{
      $error_penulis = '';
    }

    if(!wajib($penerbit)){
      $error_penerbit = 'Masukan wajib diisi';
    }elseif(!alfabet($penerbit)){
      $error_penerbit = 'Masukan harus berupa huruf';
    }else{
      $error_penerbit = '';
    }

    if(!wajib($tahun)){
      $error_tahun = 'Masukan wajib diisi';
    }elseif(!year($tahun)){
      $error_tahun = 'Masukan harus format 4 digit';
    }else{
      $error_tahun = '';
    }

    if(!wajib($stok)){
      $error_stok = 'Masukan wajib diisi';
    }elseif(!numerik($stok)){
      $error_stok = 'Masukan harus numerik';
    }else{
      $error_stok = '';
    }
	
	  if(isset($add) AND empty($error_judul) AND empty($error_deskripsi) AND empty($error_penulis) AND empty($error_penerbit) AND empty($error_tahun) AND empty($error_stok) AND isset($_POST['simpan'])){
    	tambahBuku($_POST);
    	header('location: ' . BASE_URL . '/administrator/index.php');
    	exit();
  	}elseif(empty($error_judul) AND empty($error_deskripsi) AND empty($error_penulis) AND empty($error_penerbit) AND empty($error_tahun) AND empty($error_stok) AND isset($_POST['simpan'])){
    	editBuku($_GET['id_buku'], $_POST);
    	header('location: ' . BASE_URL . '/administrator/index.php');
    	exit();
  	}
  }
?>

<form action="#" method="POST">
	<span class="error"><?= $error_judul ?></span>
	<input type="text" name="judul" placeholder="judul" value="<?= $detail['JUDUL'] ?? '' ?>">
	<span class="error"><?= $error_deskripsi ?></span>
	<input type="text" name="deskripsi" placeholder="deskripsi" value="<?= $detail['DESKRIPSI'] ?? '' ?>">
	<span class="error"><?= $error_penulis ?></span>
	<input type="text" name="penulis" placeholder="penulis" value="<?= $detail['PENULIS'] ?? '' ?>">
	<span class="error"><?= $error_penerbit ?></span>
	<input type="text" name="penerbit" placeholder="penerbit" value="<?= $detail['PENERBIT'] ?? '' ?>">
	<span class="error"><?= $error_tahun ?></span>
	<input type="text" name="tahun" placeholder="tahun" value="<?= $detail['TAHUN'] ?? '' ?>">
	<span class="error"><?= $error_stok ?></span>
	<input type="text" name="stok" placeholder="stok" value="<?= $detail['STOK'] ?? '' ?>">
	<button type="submit" name="simpan">Simpan</button>
</form>