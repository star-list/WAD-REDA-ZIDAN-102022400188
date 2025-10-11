<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data buku + nama kategori dengan JOIN berdasarkan id
$query = "
    SELECT books.*, categories.category_name 
    FROM books
    JOIN categories ON books.category_id = categories.id
    WHERE books.id = $id
";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head> <meta charset="UTF-8">
<title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php if (!$book): ?>
        <div class='alert alert-danger text-center mt-5'>
            <h3>Book not found!</h3>
        </div>
    <?php else: ?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Detail Buku</h1>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="form-floating mb-3">
                               <!-- ====================2================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk judul buku yang diisi dengan nilai dari database -->
                                <input type="text" class="form-control" id="title" 
                                       value="<?= htmlspecialchars($book['title']); ?>" disabled>
                                <label for="title">Judul Buku</label>
                            </div>
                            <div class="form-floating mb-3">
                                <!-- ====================3================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk kategori yang diisi dengan nilai dari database -->
                                <input type="text" class="form-control" id="category" 
                                       value="<?= htmlspecialchars($book['category_name']); ?>" disabled>
                                <label for="category">Kategori</label>
                            </div>
                            <div class="form-floating mb-3">
                                <!-- ====================4================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk penulis yang diisi dengan nilai dari database -->
                                <input type="text" class="form-control" id="author" 
                                       value="<?= htmlspecialchars($book['author']); ?>" disabled>
                                <label for="author">Penulis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <!-- ====================5================= -->
                                <!-- Isi attribute value gunakan (int) untuk stok yang diisi dengan nilai dari database -->
                                <input type="text" class="form-control" id="stock" 
                                       value="<?= (int)$book['stock']; ?>" disabled>
                                <label for="stock">Stok</label>
                            </div>

                            <a href="form_update_book.php?id=<?= $id ?>" class="btn btn-warning mb-2 w-100">Edit</a>
                            <a href="delete.php?id=<?= $id ?>" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>

</html>