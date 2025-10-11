<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $categoryId = $_POST['category_id'];
    $stock = $_POST['stock'];

    // ===============2===============
    // Definisikan $query untuk melakukan tambah data ke database
    $query = "INSERT INTO books (title, author, category_id, stock)
              VALUES ('$title', '$author', '$categoryId', '$stock')";
    
    mysqli_query($conn, $query);

   // ==============3================
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_books.php");
    } else {
        echo "
        <script>
            alert('Failed to add book'); 
            window.location='list_books.php';
        </script>
        ";
        exit;
    }
}
?>