<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// ===========1============
// Definisikan $query untuk mengambil data buku berdasarkan id
$query = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
// ====================2================= 
// Ambil semua kategori dari tabel categories
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head> <body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-dark">Edit Data Buku</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($book['title']); ?>" required>
                    <label>Judul Buku</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="selectCategory" name="category_id" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                            <option value="<?= $category['id']; ?>"
                                <?= $category['id'] == $book['category_id'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($category['category_name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label for="selectCategory">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($book['author']); ?>" required>
                    <label>Penulis</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" value="<?= (int)$book['stock']; ?>" min="0" required>
                    <label>Stok</label>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>