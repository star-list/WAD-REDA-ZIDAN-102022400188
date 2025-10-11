<?php
include 'connect.php';

// ===============1==============
// If statement untuk mengambil GET request dari URL kemudian simpan di variabel id
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM books WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // =============3=============
    // Eksekusi query
    if(mysqli_affected_rows($conn) > 0) {
        header("Location: list_books.php");
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_books.php';
        </script>";
        exit;
    }
}

mysqli_close($conn);
?>