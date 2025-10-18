<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];
    // ===============2===============
    // Definisikan $query untuk mengubah data menggunakan $id
     $query = "UPDATE movies SET title='$title', genre='$genre', director='$director', release_year='$release_year' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    // =============3=============
    // Eksekusi query
    if ($result) {
        header("Location: detail.php?id=$id");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to update movie'); 
            window.location='list_movies.php';
        </script>";
    }
}
?>