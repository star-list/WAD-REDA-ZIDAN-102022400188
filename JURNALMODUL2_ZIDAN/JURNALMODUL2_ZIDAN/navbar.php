<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #141414;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-danger" href="index.php">
            🎬 EAD Movie Studio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3" href="index.php">🏠 Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="list_movies.php">🎞️ Movie List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="form_create_movie.php">➕ Add Movie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .navbar .nav-link {
        color: #ccc !important;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .navbar .nav-link:hover {
        color: #fff !important;
        transform: scale(1.05);
    }

    .navbar-brand {
        font-size: 1.25rem;
        letter-spacing: 0.5px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>