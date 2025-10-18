<?php
include 'connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// ============1============
// Definisikan $query untuk mengambil data film sesuai dengan yang dicari
$query = "SELECT * FROM movies WHERE title LIKE '%$search%' OR genre LIKE '%$search%'";
$result = mysqli_query($conn, $query);

$movies = [];
while ($row = mysqli_fetch_assoc($result)) {
    $movies[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>Daftar Film - EAD Movie Studio</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1117, #1f2937);
            color: #fff;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .table-dark th {
            background-color: #161b22;
            color: #e5e5e5;
        }

        .table-dark td {
            color: #ddd;
        }

        .btn-primary {
            background-color: #e50914;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #b0060f;
        }

        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #111;
        }

        input.form-control {
            border: 1px solid #30363d;
        }

        input.form-control:focus {
            border-color: #e50914;
            box-shadow: 0 0 5px rgba(229, 9, 20, 0.5);
        }

        .card {
            background-color: #1f2937;
            border: none;
            color: #fff;
        }

        h2 {
            color: #e50914;
            font-weight: bold;
        }

        .text-muted {
            color: #9ca3af !important;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🎬 Daftar Film</h2>
            <a href="form_create_movie.php" class="btn btn-primary px-4">+ Tambah Film</a>
        </div>
        <!-- ==================2================= -->
        <!-- Isi attribute method dengan GET -->
         <form action="list_movies.php" method="GET" class="mb-4">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul film..."
                    value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form> <div class="card shadow-lg p-4 rounded-3"> <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Sutradara</th>
                            <th>Tahun Rilis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($movies) == 0): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    🎞️ Tidak ada data film ditemukan
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($movies as $i => $movie): ?>
                                <tr>
                                    <!-- ==================3================= -->
                                    <!-- Buatlah kolom untuk masing-masing variabel pada $movie -->
                                  <td class="text-center"><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($movie['title']) ?></td>
                                    <td><?= htmlspecialchars($movie['genre']) ?></td>
                                    <td><?= htmlspecialchars($movie['director']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($movie['release_year']) ?></td>
                                    <td class="text-center">
                                        <a href="form_detail_movie.php?id=<?= $movie['id'] ?>" class="btn btn-sm btn-outline-light">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>  </table>  </div> </div> </div>
</body>
