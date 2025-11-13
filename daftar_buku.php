<?php
require_once('service/database.php');

// nampilin buku
$buku = getBuku();


include_once(BASE_PATH . '/layout/header.php');
?>

<main class="site-main">
    <div class="container">


        <table class="draft-table">
                <caption>Koleksi buku Saat Ini</caption>
                <thead>
                    <tr>
                        <th>Nomer</th>
						<th>Nama Buku</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>tahun</th>
						<th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $book):?> 
                    <tr>
                        <td><a href=""><?= $book['judul'] ?></a></td>
                        <td><?= $book[''] ?></td>
                        <td><?= $book['nama_lengkap'] ?></td>
                        <td><?= $book['status'] ?></td>
                        <td><?= $book['created_at'] ?></td>
                        <td><?= $book['updated_at'] ?></td>
                        <td><?= $book['published_at'] ?></td>

                        <td>
                            <button type="button" class="btn btn-edit"><a href="edit.php?id_artikel=<?= $article['id_artikel']; ?>">Edit</a></button>
                            <button type="button" class="btn btn-delete"><a href="delete.php?id_artikel=<?= $article['id_artikel']; ?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
        </table>
                    </div>

</main>