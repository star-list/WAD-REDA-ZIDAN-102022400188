<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST[''])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $categoryId = $_POST['category_id'];
    $author = $_POST['author'];
    $stock = $_POST['stock'];

    // ===============2===============
    // Definisikan $query untuk mengubah data menggunakan $id
    $query = "
        UPDATE books 
        SET title = '$title', 
            author = '$author', 
            category_id = '$categoryId', 
            stock = '$stock' 
        WHERE id = $id
    ";
    mysqli_query($conn, $query);

    // =============3=============
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to update book'); 
            window.location='list_books.php';
        </script>";
    }
}
?>