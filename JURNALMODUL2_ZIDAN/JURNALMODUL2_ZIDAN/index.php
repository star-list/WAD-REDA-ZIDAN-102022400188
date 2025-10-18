<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Studio Film EAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1117, #1f2937);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero img {
            max-width: 180px;
            margin-bottom: 25px;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
        }

        .btn-primary {
            background-color: #e50914;
            border: none;
            padding: 12px 25px;
            font-size: 1.1rem;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #b0060f;
        }

        .btn-outline-light {
            border: 1px solid #fff;
            padding: 12px 25px;
            font-size: 1.1rem;
            color: #fff;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #111;
        }

        footer {
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
            color: #ccc;
            background-color: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="hero">
        <div>
            <img src="logo-ead.png" alt="Logo Studio Film EAD" class="img-fluid">
            <h1 class="fw-bold mb-3 text-light">Selamat Datang di <span class="text-danger">EAD Movie Studio</span>
            </h1>
            <p class="lead text-secondary mb-4">Jelajahi, kelola, dan temukan film terbaru di koleksi kami!</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="list_movies.php" class="btn btn-primary">🎬 Lihat Film</a>
                <a href="form_create_movie.php" class="btn btn-outline-light">➕ Tambah Film Baru</a>
            </div>
        </div>
    </section>

    <footer>
        © <?= date('Y'); ?> EAD Movie Studio | Didukung oleh PHP & MySQL
    </footer>
</body>

</html>