<?php
require_once('function.php');

// nampilin buku
$buku = getBuku();

$list_css_tambahan = [
    'table.css'
];

include_once(BASE_PATH . '/layout/header.php');
?>

<main class="site-main">
    <div class="container">


        <table class="draft-table">
            <caption>Koleksi buku Saat Ini</caption>
                <thead>
                    <tr>
						<th>Nama Buku</th>
						<th>Deskripsi Buku</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>tahun</th>
						<th>Stok</th>
						<th>tombol</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $book):?> 
                    <tr>
                        <td><a href=""><?= $book['JUDUL'] ?></a></td>
                        <td><?= $book['DESKRIPSI'] ?></td>
                        <td><?= $book['PENULIS'] ?></td>
                        <td><?= $book['PENERBIT'] ?></td>
                        <td><?= $book['TAHUN'] ?></td>
                        <td><?= $book['STOK'] ?></td>

                        <td>
                            <button type="button" class="btn btn-edit"><a href="edit.php?id_artikel=<?= $article['id_artikel']; ?>">Pinjam</a></button>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
        </table>
    </div>

</main>