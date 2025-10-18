<?php
include 'connect.php';

// ===============1==============
// If statement untuk mengambil GET request dari URL kemudian simpan di variabel id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
   $delete_query = "DELETE FROM movies WHERE id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    // =============3=============
    // Eksekusi query
  if ($result) {
    header("Location: list_movies.php");
    } else {
        echo "  <script>
      alert('Failed to delete movie'); 
            window.location='list_movies.php';
        </script>";
        exit;
    }
} mysqli_close($conn);
?>