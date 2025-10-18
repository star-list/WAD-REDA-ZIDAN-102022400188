<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $release_year = mysqli_real_escape_string($conn, $_POST['release_year']);

    // ===============2===============
    // Definisikan $query untuk melakukan tambah data ke database
    $query = "INSERT INTO movies (title, genre, director, release_year)
     VALUES ('$title' , '$genre' , '$director' , '$release_year')";
    $result = mysqli_query($conn, $query);

    // ==============3================
    // Eksekusi query
    if ($result) {
        header("Location: list_movies.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to add movie: " . mysqli_error($conn) . "');
            window.location='form_create_movie.php';
        </script>
        ";
        exit;
    }
}
?>