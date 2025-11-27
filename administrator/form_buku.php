<?php 

if(!isset($_SESSION['nama'])){
  header('Location: ../');
  exit();
}

$error_cover = $error_judul = $error_deskripsi = $error_penulis = $error_penerbit = $error_tahun = $error_stok = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $data = [
    'judul' => test_input($_POST['judul']),
    'deskripsi' => test_input($_POST['deskripsi']),
    'penulis' => test_input($_POST['penulis']),
    'penerbit' => test_input($_POST['penerbit']),
    'tahun' => test_input($_POST['tahun'])
  ];

    if(!wajib($_POST['judul'])){
      $error_judul = 'Masukan wajib diisi';
    }elseif(!digitMinim($_POST['judul'])){
      $error_judul = "Masukan minimal 3 digit";
    } elseif(!alfaJudul($_POST['judul'])){
      $error_judul = 'Masukan harus berupa Judul';
    }else{
      $error_judul = '';
    }

    if(!wajib($_POST['deskripsi'])){
      $error_deskripsi = 'Masukan wajib diisi';
    }elseif(!digitMinim($_POST['deskripsi'])){
      $error_deskripsi = "Masukan minimal 3 digit";
    } elseif(!alfaDesc($_POST['deskripsi'])){
      $error_deskripsi = 'Masukan harus sesuai tatanan bahasa';
    }else{
      $error_deskripsi = '';
    }

    if(!wajib($_POST['penulis'])){
      $error_penulis = 'Masukan wajib diisi';
    }elseif(!digitMinim($_POST['penulis'])){
      $error_penulis = "Masukan minimal 3 digit";
    } elseif(!alfaSpaceDot($_POST['penulis'])){
      $error_penulis = 'Masukan harus berupa alfabet, spasi, titik, atau &';
    }else{
      $error_penulis = '';
    }

    if(!wajib($_POST['penerbit'])){
      $error_penerbit = 'Masukan wajib diisi';
    }elseif(!digitMinim($_POST['penerbit'])){
      $error_penerbit = "Masukan minimal 3 digit";
    } elseif(!alfaSpaceDot($_POST['penerbit'])){
      $error_penerbit = 'Masukan harus berupa alfabet, spasi, titik, atau &';
    }else{
      $error_penerbit = '';
    }

    if(!wajib($_POST['tahun'])){
      $error_tahun = 'Masukan wajib diisi';
    }elseif(!year($_POST['tahun'])){
      $error_tahun = 'Masukan harus format 4 digit';
    }else{
      $error_tahun = '';
    }

if(empty($error_judul) AND empty($error_deskripsi) AND empty($error_penulis) AND empty($error_penerbit) AND empty($error_tahun) AND empty($error_stok) AND isset($_POST['simpan'])){
        
        // Logika Nama File untuk Cover
        $judul_clean = preg_replace('/[^A-Za-z0-9]/', '-', $data['judul']);
        $nama_file_db = 'default.png'; 
        
        // Cek Cover Lama jika Edit
        if(!isset($add) && isset($detail['COVER'])) {
             $nama_file_db = $detail['COVER'];
        }

        // Proses Upload
        if($_FILES['cover']['name'] != ''){
            $cover = $_FILES['cover']['name'];
            $tmp = $_FILES['cover']['tmp_name'];
            $ekstensi = pathinfo($cover, PATHINFO_EXTENSION);
            
            // Nama file baru
            $namaBaru = $judul_clean . '-' . $data['tahun'] . '.' . $ekstensi;
            
            if(move_uploaded_file($tmp, BASE_PATH . '/asset/images/cover/' . $namaBaru)){
                // Hapus file lama jika bukan default dan bukan mode tambah
                if(!isset($add) && $nama_file_db != 'default.png' && file_exists(BASE_PATH . '/asset/images/cover/' . $nama_file_db)){
                    unlink(BASE_PATH . '/asset/images/cover/' . $nama_file_db);
                }
                $nama_file_db = $namaBaru;
            }
        }

        if(isset($add)){
            tambahBuku($data);
            isiCover($data['judul'], $nama_file_db); // Menggunakan variabel $nama_file_db yg sudah pasti benar
        } else {
            editBuku($_GET['id_buku'], $data);
            isiCover($data['judul'], $nama_file_db);
        }

        header('location: ' . BASE_URL . '/administrator/index.php');
        exit();
      }
  }
?>

<form action="#" method="POST" enctype="multipart/form-data">
  <fieldset> 
    <legend>Cover buku (Optional)</legend>
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