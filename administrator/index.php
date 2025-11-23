<?php
require_once "../function.php"; // Memuat file fungsi (koneksi, helper, dll)

    # mengambil isi database dari tabel buku melalui function
    $buku = getDaftarBuku(); // Mendapatkan array data semua buku

    # menambahkan css tambahan untuk halaman ini
    $list_css_tambahan = [
        'main.administrator.css',
        'menu.administrator.css'
    ];

    # header dan menu administrator dimasukkan
    include_once(BASE_PATH . '/layout/header.php'); // Header HTML
    include_once(BASE_PATH . "/layout/menu.administrator.php"); // Sidebar & pembuka <main>
    
?>

    <div class="table table-books">
        <table>
            <caption>Daftar buku perpustakaan</caption>
            <thead>
                <tr>
                    <th>Nomer Buku</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>tahun</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
               
                <?php foreach ($buku as $book): ?>
                <tr>
                    <td><?= $book['ID_BUKU'] ?></td>
                    <td><?= $book['JUDUL'] ?></td>
                    <td><?= $book['DESKRIPSI'] ?></td>
                    <td><?= $book['PENULIS'] ?></td>
                    <td><?= $book['PENERBIT'] ?></td>
                    <td><?= $book['TAHUN'] ?></td>
                    <td>
                        <a href="<?= BASE_URL . '/administrator/edit.php' ?>?id_buku=<?= $book['ID_BUKU'] ?>" class="btn btn-edit">Edit</a>
                        <a href="<?= BASE_URL . '/administrator/delete.php' ?>?id_buku=<?= $book['ID_BUKU'] ?>" class="btn btn-delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    
        <a href="add.php?tambah=true">Tambah buku</a>
    </div>

<?php include_once BASE_PATH . '/layout/footer.php'; // Memuat footer (menutup <main> dan halaman) ?>