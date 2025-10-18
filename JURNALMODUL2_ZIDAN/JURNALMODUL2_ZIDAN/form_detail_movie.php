<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data movie berdasarkan id
$query = "SELECT * FROM movies WHERE id = $id";
$result = mysqli_query($conn, $query);
$movie = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1117, #1f2937);
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .card {
            background-color: #111827;
            border: 1px solid #2d3748;
        }

        .form-control {
            border: 1px solid #374151;
        }

        .form-control[disabled] {
            background-color: transparent;
            opacity: 1;
            color: #fff;
        }

        label {
            color: #d1d5db;
        }

        .btn-warning {
            background-color: #f59e0b;
            border: none;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-danger {
            background-color: #e50914;
            border: none;
        }

        .btn-danger:hover {
            background-color: #b0060f;
        }
 </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php if (!$movie): ?>
     <div class="alert alert-danger text-center mt-5">
     <h3>Film tidak ditemukan!</h3>
        </div>
 <?php else: ?>
     <div class="container mt-5">
     <h1 class="text-center mb-4 fw-bold text-light">🎬 Detail Film</h1>
    <div class="row justify-content-center">
         <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm p-3">
         <div class="card-body">
              <div class="form-floating mb-3">
                                <!-- ====================2================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk judul film -->
                  <input type="text" class="form-control" id="title" value="<?= htmlspecialchars($movie['title']) ?>" disabled>
                                <label for="title">Judul Film</label> </div>
 <div class="form-floating mb-3">
                                <!-- ====================3================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk genre -->
     <input type="text" class="form-control" id="director" value="<?= htmlspecialchars($movie['director']) ?>" disabled>
          <label for="director">Sutradara</label> </div>
 <div class="form-floating mb-3">
                                <!-- ====================4================= -->
                                <!-- Isi attribute value gunakan htmlspecialchars untuk sutradara -->
             <input type="text" class="form-control" id="director" value="<?= htmlspecialchars($movie['director']) ?>" disabled>
      <label for="director">Sutradara</label> </div>
 <div class="form-floating mb-3">
                                <!-- ====================5================= -->
                                <!-- Isi attribute value gunakan (int) untuk tahun rilis -->
                                      <input type="text" class="form-control" id="release_year" value="<?= (int)$movie['release_year'] ?>" disabled>
                                <label for="release_year">Tahun Rilis</label>
                            </div>
<a href="form_update_movie.php?id=<?= $id ?>" class="btn btn-warning mb-2 w-100">Edit</a>
             <a href="delete.php?id=<?= $id ?>" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">Hapus</a> </div>    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>