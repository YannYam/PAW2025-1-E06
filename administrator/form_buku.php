<?php 

if(!isset($_SESSION['nama'])){
  header('Location: ../');
  exit();
}


$error_cover = $error_judul = $error_deskripsi = $error_penulis = $error_penerbit = $error_tahun = $error_stok = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $judul = test_input($_POST['judul']);
    $deskripsi = test_input($_POST['deskripsi']);
    $penulis = test_input($_POST['penulis']);
    $penerbit = test_input($_POST['penerbit']);
    $tahun = test_input($_POST['tahun']);

    if(!wajib($judul)){
      $error_judul = 'Masukan wajib diisi';
    }elseif(!digitMinim($judul)){
      $error_judul = "Masukan minimal 3 digit";
    } elseif(!alfaJudul($judul)){
      $error_judul = 'Masukan harus berupa Judul';
    }else{
      $error_judul = '';
    }

    if(!wajib($deskripsi)){
      $error_deskripsi = 'Masukan wajib diisi';
    }elseif(!digitMinim($deskripsi)){
      $error_deskripsi = "Masukan minimal 3 digit";
    } elseif(!alfaDesc($deskripsi)){
      $error_deskripsi = 'Masukan harus berupa alfanumerik';
    }else{
      $error_deskripsi = '';
    }

    if(!wajib($penulis)){
      $error_penulis = 'Masukan wajib diisi';
    }elseif(!digitMinim($penulis)){
      $error_penulis = "Masukan minimal 3 digit";
    } elseif(!alfaSpaceDot($penulis)){
      $error_penulis = 'Masukan harus alfabet';
    }else{
      $error_penulis = '';
    }

    if(!wajib($penerbit)){
      $error_penerbit = 'Masukan wajib diisi';
    }elseif(!digitMinim($penerbit)){
      $error_penerbit = "Masukan minimal 3 digit";
    } elseif(!alfabet($penerbit)){
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

	  if(isset($add) AND empty($error_judul) AND empty($error_deskripsi) AND empty($error_penulis) AND empty($error_penerbit) AND empty($error_tahun) AND empty($error_stok) AND isset($_POST['simpan'])){
      tambahBuku($_POST);
    	if($_FILES['cover']['name'] == ''){
        $cover = 'default.png';
        isiCover($judul,$cover);
      }else{
        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
        $ekstensi = pathinfo($cover, PATHINFO_EXTENSION);
        $namaBaru = $judul . '-' . $tahun.'.'.$ekstensi;
        $namaBaru = str_replace(' ', '-', $namaBaru);
        move_uploaded_file($tmp, BASE_PATH . '/asset/images/cover/' . $namaBaru);
        isiCover($judul,$namaBaru);
      }
    	header('location: ' . BASE_URL . '/administrator/index.php');
    	exit();
  	}elseif(empty($error_judul) AND empty($error_deskripsi) AND empty($error_penulis) AND empty($error_penerbit) AND empty($error_tahun) AND empty($error_stok) AND isset($_POST['simpan'])){
    	if($_FILES['cover']['name'] != ''){
        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
        $ekstensi = pathinfo($cover, PATHINFO_EXTENSION);
        $namaBaru = $judul . '-' . $tahun . '.' . $ekstensi;
        $namaBaru = str_replace(' ', '-', $namaBaru);
        isiCover($judul,$namaBaru);
        unlink(BASE_PATH . '/asset/images/cover/' . $detail['COVER']);
        move_uploaded_file($tmp, BASE_PATH . '/asset/images/cover/' . $namaBaru);
      }
      editBuku($_GET['id_buku'], $_POST);
    	header('location: ' . BASE_URL . '/administrator/index.php');
    	exit();
  	}
  }
?>

<form action="#" method="POST" enctype="multipart/form-data">
  <fieldset> 
    <legend>Cover buku</legend>
    <input type="file" name="cover">
  </fieldset>
  <input type="text" name="judul" placeholder="judul" value="<?= $_POST['judul'] ?? $detail['JUDUL'] ?? '' ?>">
	<span class="error"><?= $error_judul ?></span>
	<input type="text" name="deskripsi" placeholder="deskripsi" value="<?= $_POST['deskripsi'] ?? $detail['DESKRIPSI'] ?? '' ?>">
	<span class="error"><?= $error_deskripsi ?></span>
	<input type="text" name="penulis" placeholder="penulis" value="<?= $_POST['penulis'] ?? $detail['PENULIS'] ?? '' ?>">
	<span class="error"><?= $error_penulis ?></span>
	<input type="text" name="penerbit" placeholder="penerbit" value="<?= $_POST['penerbit'] ?? $detail['PENERBIT'] ?? '' ?>">
	<span class="error"><?= $error_penerbit ?></span>
	<input type="text" name="tahun" placeholder="tahun" value="<?= $_POST['tahun'] ?? $detail['TAHUN'] ?? '' ?>">
	<span class="error"><?= $error_tahun ?></span><br>
	<button type="submit" name="simpan">Simpan</button>
</form>