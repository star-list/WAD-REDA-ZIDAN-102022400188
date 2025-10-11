<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head> <meta charset="UTF-8">
        <title>Perpustakaan Cerdas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                   </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="container py-5 text-center">
            <h1 class="fw-bold text-dark">Selamat Datang di Perpustakaan Cerdas!</h1>
            <div class="my-5">
                <img src="logo-ead.png" alt="EAD Logo" class="img-fluid" style="max-width: 50%;">
            </div> <a href="list_books.php" class="btn btn-lg btn-primary">Lihat Buku</a>
            <a href="form_create_book.php" class="btn btn-lg btn-outline-primary">Tambah Buku</a>
        </div> </body></html>