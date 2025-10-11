<?php
include 'connect.php';

// ====================1================= 
// Ambil semua kategori dari tabel categories
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Tambah Buku</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?> <div class="container py-5">
        <div class="card shadow p-4"> <h3 class="mb-4 text-dark">Tambah Buku Baru</h3>
            <form action="create.php" method="POST">  <div class="form-floating mb-3">
                    <!-- ====================2================= -->
                    <!-- Isi attribute name input untuk judul yang harus diisi -->
        <input type="text" class="form-control" name="title" placeholder="Judul Buku" required><label>Judul Buku</label>
                </div> <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Isi attribute name dropdown untuk kategori yang harus diisi -->
                    <select class="form-select" id="selectCategory" name="category_id" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                            <!-- ====================4================= -->
                            <!-- 
                            - Buat option yang datanya mengambil dari $category 
                            - valuenya itu id  
                            - menampilkan nama kategori dan gunakan htmlspecialchars  
                            -->
                            <option value="<?= $category['id']; ?>">
                                <?= htmlspecialchars($category['category_name']); ?>
                            </option> <?php endwhile; ?> </select>
         <label for="selectCategory">Kategori</label> </div>
<div class="form-floating mb-3">
  <!-- ====================5================= -->
    <!-- Isi attribute name input untuk penulis yang harus diisi -->
    <input type="text" class="form-control" name="author" placeholder="Penulis" required> <label>Penulis</label> </div>
  <div class="form-floating mb-3">
     <!-- ====================6================= -->
     <!-- Isi attribute name input untuk stok yang harus diisi -->
        <input type="number" class="form-control" name="stock" placeholder="Stok" min="0" required>
          <label>Stok</label> </div>
  <button type="submit" name="create" class="btn btn-primary">+ Tambah Buku</button>
            </form></div>   </div>
</body></html>